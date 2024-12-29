<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Content;
use App\Models\Category;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Libraries\CommonFunction;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Crypt;


class ContentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:content-list|content-create|content-edit|content-delete', ['only' => ['index', 'getData']]);
        $this->middleware('permission:content-create', ['only' => ['create','store', 'updateStatus']]);
        $this->middleware('permission:content-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:content-delete', ['only' => ['delete']]);
    }

    public function index()
    {
        // $video = $this->youtube->getVideoInfo('EPeDTRNKAVo')->snippet;
        // dd($video);
        $page_title = "Video Content";
        return view('users.content.index', compact('page_title'));
    }

    public function create()
    {
        $categories = Category::where('is_active', 1)->get();
        return view('users.content.add', compact('categories'));
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
                // ->editColumn('description', function ($list) {
                //     return Str::limit($list->description, 100);
                // })
                ->editColumn('is_public', function ($list) {
                    return CommonFunction::getPublicStatus($list->is_public);
                })
                ->addColumn('action', function ($list) {
                    // return "";
                    return '<a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-toggle="dropdown">
                    <i class="text-primary ti ti-dots-vertical"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end m-0 p-0">
                        <span class="dropdown-item py-2 text-center">Options</span>
                        <div class="dropdown-divider m-0"></div>
                        <li><button onClick="viewContent(this)" data-id="'.Crypt::encrypt($list->id).'" class="dropdown-item py-2 text-primary"><i class="fas fa-eye pr-2"></i> View</button></li>
                        <li><button onClick="editContent(this)" data-id="'.Crypt::encrypt($list->id).'" class="dropdown-item py-2 text-primary"><i class="fas fa-pen pr-2"></i> Update</button></li>
                        <li><button onClick="changeStatus(this)" data-id="'.Crypt::encrypt($list->id).'" data-selected="'.$list->is_public.'" class="dropdown-item py-2 text-success"><i class="fas fa-rotate pr-2"></i> Change Status</button></li>
                        <li><button onClick="deleteContent(this)" data-id="'.Crypt::encrypt($list->id).'" class="dropdown-item py-2 text-danger"><i class="fas fa-trash pr-2"></i> Delete</button></li>
                    </ul>
                    </div>';
                })
                ->addIndexColumn()
                ->rawColumns(['status', 'title', 'is_public', 'action'])
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

    public function edit($id)
    {
        $decrypt_id = Crypt::decrypt($id);
        $content = Content::find($decrypt_id);
        $categories = Category::where('is_active', 1)->get();

        return view('users.content.edit', compact('categories', 'content'));
    }

    public function update(Request $request)
    {
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
            $content = Content::find($request->id);

            $content->category_id = $request->category_id;
            $content->title = $request->title;
            $content->description = $request->description;
            $content->youtube_id = $request->youtube_id;
            $content->thumbnail_url = $request->thumbnail_url;
            $content->is_public = $request->is_public;
            $content->status = $request->status;

            if($content->save()){
                return redirect()->route('users.content')->with('success','Content successfully updated.');
            }else{
                return redirect()->back()->with('error','Content is not updated.');
            }

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function updateIndividual(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        // Validations
        $request->validate([
            'id' => 'required',
            'is_public' => 'required_without_all:status',
            'status' =>  'required_without_all:is_public|numeric|in:0,1',
        ],[
            'is_public.required_without_all' => 'The Is visibility field is required',
            'status.required_without_all' => 'The Is status field is required',
        ]);

        try {
            // Store Data
            $content = Content::find(Crypt::decrypt($request->id));
            if(isset($request->is_public)){
                $content->is_public = $request->is_public;
            }
            if(isset($request->status)){
                $content->status = $request->status;
            }

            if($content->save()){
                return response()->json(['status' => 'success', 'message' => 'Content successfully updated.',]);
            }else{
                return response()->json(['status' => 'error', 'message' => 'Content is not updated.',]);
            }

        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => $th->getMessage(),]);
        }
    }

    public function delete($id)
    {
        try {
            $decrypt_id = Crypt::decrypt($id);
            $content = Content::find($decrypt_id);

            if($content->delete()){
                return redirect()->route('users.content')->with('success','Content successfully deleted.');
            }else{
                return redirect()->back()->with('error','Content is not deleted.');
            }

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }
}
