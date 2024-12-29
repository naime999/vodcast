<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Content;
use App\Models\Category;
use App\Models\Playlist;
use App\Models\ViewPlaylist;
use App\Models\ContentPlaylist;
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
use Intervention\Image\Facades\Image;


class ContentPlaylistController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:content-playlist-list|content-playlist-create|content-playlist-edit|content-playlist-delete', ['only' => ['index', 'getData']]);
        $this->middleware('permission:content-playlist-create', ['only' => ['create','store', 'updateStatus']]);
        $this->middleware('permission:content-playlist-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:content-playlist-delete', ['only' => ['delete']]);
    }

    public function index()
    {
        $viewPlaylists = ViewPlaylist::where('user_id', Auth()->user()->id)->with('listItems')->get();
        // return $viewPlaylists;
        return view('users.content.playlist.index', compact('viewPlaylists'));
    }

    public function getData(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {
            $list = Playlist::where('user_id', Auth()->user()->id)->with('listItems')->get();
            // dd($list);
            return DataTables::of($list)
                ->editColumn('title', function ($list) {
                    return $list->name;
                })
                ->editColumn('count', function ($list) {
                    return $list->listItems->count();
                })
                ->editColumn('thumbnail', function ($list) {
                    return '<img src="'.asset($list->thumbnail).'" width="80" />';
                })
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
                        <li><button onClick="editPlaylist(this)" data-id="'.Crypt::encrypt($list->id).'" class="dropdown-item py-2 text-primary"><i class="fas fa-pen pr-2"></i> Edit</button></li>
                        <li><button onClick="changeStatus(this)" data-id="'.Crypt::encrypt($list->id).'" data-selected="'.$list->is_public.'" class="dropdown-item py-2 text-success"><i class="fas fa-rotate pr-2"></i> Change Status</button></li>
                        <li><button onClick="deletePlaylist(this)" data-id="'.Crypt::encrypt($list->id).'" class="dropdown-item py-2 text-danger"><i class="fas fa-trash pr-2"></i> Delete</button></li>
                    </ul>
                    </div>';
                })
                ->addIndexColumn()
                ->rawColumns(['title', 'thumbnail', 'is_public', 'action'])
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
            'name'          => 'required',
            'description'   => 'required',
            'thumbnail'    => 'required',
            'is_public'     =>  'required',
        ]);


        try {

            // Store Data
            $playlist = new Playlist();

            $playlist->name = $request->name;
            $playlist->description = $request->description;

            if ($request->thumbnail_baseImage != null) {
                $baseImage = $request->thumbnail_baseImage;
                $base64_str = substr($baseImage, strpos($baseImage, ",") + 1);
                $image = base64_decode($base64_str);
                $image_name = "thumbnail-" . time() . ".png";
                $location = 'uploads/contents/thumbnail/';
                if (!file_exists($location)) {
                    mkdir($location);
                }
                Image::make($image)->save($location . $image_name);
                $playlist->thumbnail = $location . $image_name;
            }

            $playlist->user_id = Auth()->user()->id;
            $playlist->is_public = $request->is_public;
            // dd($playlist);
            if($playlist->save()){
                return redirect()->route('users.content.playlist')->with('success','Playlist successfully created.');
            }else{
                return redirect()->back()->with('error','Playlist is not created.');
            }

        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    public function edit(Request $request)
    {
        $decrypt_id = Crypt::decrypt($request->id);
        return Playlist::find($decrypt_id);
    }

    public function update(Request $request)
    {
        // return $request->all();
        // Validations
        $request->validate([
            'name'          => 'required',
            'description'   => 'required',
            'is_public'     =>  'required',
        ]);

        try {
            // Store Data
            $playlist = Playlist::find($request->id);

            $playlist->name = $request->name;
            $playlist->description = $request->description;

            if ($request->thumbnail_baseImage != null) {
                @unlink($playlist->thumbnail);
                $baseImage = $request->thumbnail_baseImage;
                $base64_str = substr($baseImage, strpos($baseImage, ",") + 1);
                $image = base64_decode($base64_str);
                $image_name = "thumbnail-" . time() . ".png";
                $location = 'uploads/contents/thumbnail/';
                if (!file_exists($location)) {
                    mkdir($location);
                }
                Image::make($image)->save($location . $image_name);
                $playlist->thumbnail = $location . $image_name;
            }

            $playlist->is_public = $request->is_public;

            if($playlist->save()){
                return redirect()->route('users.content.playlist')->with('success','Playlist successfully updated.');
            }else{
                return redirect()->back()->with('error','Playlist is not updated.');
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
            $playlist = Playlist::find(Crypt::decrypt($request->id));
            if(isset($request->is_public)){
                $playlist->is_public = $request->is_public;
            }
            if(isset($request->status)){
                $playlist->status = $request->status;
            }

            if($playlist->save()){
                return response()->json(['status' => 'success', 'message' => 'Playlist successfully updated.',]);
            }else{
                return response()->json(['status' => 'error', 'message' => 'Playlist is not updated.',]);
            }

        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => $th->getMessage(),]);
        }
    }

    public function delete(Request $request)
    {
        $decrypt_id = Crypt::decrypt($request->id);
        $playlist = Playlist::with('listItems')->find($decrypt_id);
        // return $playlist;
        if ($playlist) {
            if($playlist->listItems()->delete()){
                if ($playlist->delete()) {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Playlist and its items successfully deleted.'
                    ]);
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Playlist could not be deleted.'
                    ]);
                }
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'Playlist could not be deleted.'
                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Playlist not found.'
            ]);
        }
    }

    public function addVideo(Request $request)
    {
        // return $request->all();

        $addTotal = 0;
        $addSuccess = 0;
        $addFail = 0;
        foreach($request->video_ids as $video_id){
            $contentPlaylist = new ContentPlaylist();
            $contentPlaylist->content_id = $video_id;
            $contentPlaylist->playlist_id = $request->playlist_id;

            $addTotal++;
            if($contentPlaylist->save()){
                $addSuccess++;
            }else{
                $addFail++;
            }
        }
        if($addSuccess > 0){
            return redirect()->back()->with('success','Playlist item add '.$addTotal.' of '.$addSuccess.' successful and fail '.$addFail);
        }else{
            return redirect()->back()->with('error','Playlist all item add fail.');
        }

    }

    public function deleteVideo(Request $request)
    {
        $contentPlaylist = ContentPlaylist::find($request->id);
        if ($contentPlaylist->delete()) {
            return response()->json([
                'status' => 'success',
                'message' => 'This item is delete successfully.'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'This item could not be deleted.'
            ]);
        }
    }

}
