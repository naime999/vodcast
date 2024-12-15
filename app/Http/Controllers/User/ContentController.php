<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Content;
use App\Models\Category;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Libraries\CommonFunction;
use Yajra\DataTables\Facades\DataTables;

class ContentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:content-list|content-create|content-edit|content-delete', ['only' => ['index', 'getData']]);
        $this->middleware('permission:content-create', ['only' => ['create','store', 'updateStatus']]);
        $this->middleware('permission:content-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:content-delete', ['only' => ['delete']]);
    }


    /**
     * List User
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function index()
    {
        $page_title = "Video Content";
        return view('frontend.users.content.index', compact('page_title'));
    }

    public function create()
    {
        $page_title = "Create Content";
        $categories = Category::where('is_active', 1)->get();

        return view('frontend.users.content.add', compact('page_title', 'categories'));
    }

    public function getData(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {
            $list = Content::where('user_id', Auth()->user()->id)->get();
            // dd($list);
            return DataTables::of($list)
                ->editColumn('status', function ($list) {
                    return CommonFunction::getContentStatus($list->status);
                })
                ->editColumn('title', function ($list) {
                    return $list->title;
                })
                ->addColumn('action', function ($list) {
                    return "";
                    // return '<a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    // <i class="text-primary ti ti-dots-vertical"></i></a>
                    // <ul class="dropdown-menu dropdown-menu-end m-0 p-0">
                    //     <span class="dropdown-item py-2 text-center">Details</span>
                    //     <div class="dropdown-divider m-0"></div>
                    //     <li><a onClick="editClient(this)" data-id="'.$list->id.'" class="dropdown-item py-2 text-primary"><i class="fas fa-pen pr-2"></i> Update</a></li>
                    //     <li><a onClick="deleteClient(this)" data-id="'.$list->id.'" class="dropdown-item py-2 text-danger"><i class="fas fa-trash pr-2"></i> Delete</a></li>
                    // </ul>
                    // </div>';
                })
                ->addIndexColumn()
                ->rawColumns(['status', 'title', 'action'])
                ->make(true);
        } catch (\Exception $e) {
            return Redirect::back();
        }
    }


    public function store(Request $request)
    {
        // return $request->all();
        // Validations
        $request->validate([
            'category_id'   => 'required',
            'title'         => 'required',
            'youtube_id'    => 'required|unique:vodcast_content',
            'thumbnail_url' => 'required',
            'is_public'     =>  'required',
            'status'        =>  'required|numeric|in:0,1',
        ]);


        try {

            // Store Data
            $content = new Content();
            $content->category_id = $request->category_id;
            $content->title = $request->title;
            $content->description = $request->description;
            $content->youtube_id = $request->youtube_id;
            $content->thumbnail_url = $request->thumbnail_url;
            $content->is_public = $request->is_public;
            $content->user_id = Auth()->user()->id;
            $content->status = $request->status;

            if($content->save()){
                return redirect()->route('users.content')->with('success','Content successfully uploaded.');
            }else{
                return redirect()->back()->with('error','Content is not uploaded.');
            }

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    /**
     * Update Status Of User
     * @param Integer $status
     * @return List Page With Success
     * @author Shani Singh
     */
    public function updateStatus($user_id, $status)
    {
        // Validation
        $validate = Validator::make([
            'user_id'   => $user_id,
            'status'    => $status
        ], [
            'user_id'   =>  'required|exists:users,id',
            'status'    =>  'required|in:0,1',
        ]);

        // If Validations Fails
        if($validate->fails()){
            return redirect()->route('admin.users.index')->with('error', $validate->errors()->first());
        }

        try {
            DB::beginTransaction();

            // Update Status
            User::whereId($user_id)->update(['status' => $status]);

            // Commit And Redirect on index with Success Message
            DB::commit();
            return redirect()->route('admin.users.index')->with('success','User Status Updated Successfully!');
        } catch (\Throwable $th) {

            // Rollback & Return Error Message
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Edit User
     * @param Integer $user
     * @return Collection $user
     * @author Shani Singh
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit')->with([
            'roles' => $roles,
            'user'  => $user
        ]);
    }

    /**
     * Update User
     * @param Request $request, User $user
     * @return View Users
     * @author Shani Singh
     */
    public function update(Request $request, User $user)
    {
        // Validations
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|unique:users,email,'.$user->id.',id',
            'mobile_number' => 'required|numeric|digits:10',
            'role_id'       =>  'required|exists:roles,id',
            'status'       =>  'required|numeric|in:0,1',
        ]);

        DB::beginTransaction();
        try {

            // Store Data
            $user_updated = User::whereId($user->id)->update([
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'email'         => $request->email,
                'mobile_number' => $request->mobile_number,
                'role_id'       => $request->role_id,
                'status'        => $request->status,
            ]);

            // Delete Any Existing Role
            DB::table('model_has_roles')->where('model_id',$user->id)->delete();

            // Assign Role To User
            $user->assignRole($user->role_id);

            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('admin.users.index')->with('success','User Updated Successfully.');

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    /**
     * Delete User
     * @param User $user
     * @return Index Users
     * @author Shani Singh
     */
    public function delete(User $user)
    {
        DB::beginTransaction();
        try {
            // Delete User
            User::whereId($user->id)->delete();

            DB::commit();
            return redirect()->route('admin.users.index')->with('success', 'User Deleted Successfully!.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Import Users
     * @param Null
     * @return View File
     */
    public function importUsers()
    {
        return view('admin.users.import');
    }

    public function uploadUsers(Request $request)
    {
        Excel::import(new UsersImport, $request->file);

        return redirect()->route('admin.users.index')->with('success', 'User Imported Successfully');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'admin.users.xlsx');
    }

}
