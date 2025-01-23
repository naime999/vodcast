<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\AdminRequest;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Libraries\CommonFunction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

use App\Mail\ExampleMail;
use Illuminate\Support\Facades\Mail;

class RequestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:request-list|request-edit|request-delete', ['only' => ['index', 'getData']]);
        $this->middleware('permission:request-edit', ['only' => ['changeStatus']]);
        $this->middleware('permission:request-delete', ['only' => ['delete']]);
    }

    public function index()
    {
        return view('admin.request.index');
    }

    public function getData(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {
            $list = AdminRequest::with('requestedUser')->get();
            return DataTables::of($list)
                ->addColumn('name', function ($list) {
                    return $list->requestedUser->full_name;
                })
                ->addColumn('email', function ($list) {
                    return $list->requestedUser->email;
                })
                ->addColumn('role', function ($list) {
                    return $list->requestedUser->role_name;
                })
                ->addColumn('status', function ($list) {
                    return CommonFunction::getRequestStatus($list->status).($list->request_step != 1 ? ' Step - ' . $list->request_step :'');
                })
                ->addColumn('action', function ($list) {
                    // return "";
                    if(auth()->user()->id == $list->approve_user_id){
                        $ht = '<a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="text-primary ti ti-dots-vertical"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end m-0 p-0">
                            <li><a href="javascript:;" class="dropdown-item py-2 text-center">Options</a></li>
                            <div class="dropdown-divider m-0"></div>
                            <li>';

                        $ht .= '<button class="dropdown-item btn py-2 text-primary" onclick="changeStatus(this)" data-id="'. $list->id.'" data-select="'. $list->status.'"><i class="fa-solid fa-rotate fa-fade"></i> Change Status</button>';
                        $ht .= '</li>
                            </ul>
                            </div>';
                        return $ht;
                    }else{
                        return '<i class="fas fa-lock pr-2 text-warning"></i>';
                    }
                })
                ->addIndexColumn()
                ->rawColumns(['description', 'status', 'action'])
                ->make(true);
        } catch (\Exception $e) {
            // Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }

    }

    public function changeStatus(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        $this->validate($request, [
            'select_status' => 'required',
        ],[
            'select_status:required' => "Please select a option.",
        ]);

        if(auth()->user()->can('request-edit')){
            $adminRequest = AdminRequest::find($request->id);
            $adminRequest->status = $request->select_status;

            $user = User::find($adminRequest->requested_user_id);
            DB::table('model_has_roles')->where('model_id',$user->id)->delete();

            if($request->select_status == 2){
                $user->assignRole(3);
            }else{
                if($request->select_status == 0){
                    $adminRequest->request_step = $adminRequest->request_step + 1;
                }
                $user->assignRole(2);
            }

            if($adminRequest->save()){
                return response()->json(['status' => 'success', 'message' => 'Request status update successfully.']);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Request status update failed.']);
            }
        }else{
            return response()->json(['status' => 'error', 'message' => 'You don`t have permission.']);
        }

    }

    public function delete(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        $this->validate($request, [
            'select_status' => 'required',
        ],[
            'select_status:required' => "Please select a option.",
        ]);

        $adminRequest = AdminRequest::find($request->id);
        $adminRequest->status = $request->select_status;

        $user = User::find($adminRequest->requested_user_id);
        DB::table('model_has_roles')->where('model_id',$user->id)->delete();

        if($request->select_status == 1){
            $user->assignRole(3);
        }else{
            $user->assignRole(2);
        }

        if($adminRequest->save()){
            return response()->json(['status' => 'success', 'message' => 'Request status update successfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Request status update failed.']);
        }
    }

}
