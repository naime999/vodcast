<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Content;
use App\Models\Category;
use App\Models\ViewPlaylist;
use App\Models\VideoPlaylist;
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
use Illuminate\Validation\Rule;

use App\Http\Controllers\YoutubeController;


class ViewPlaylistController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view-playlist|view-playlist-create|view-playlist-edit|view-playlist-delete', ['only' => ['index', 'getItems']]);
        $this->middleware('permission:view-playlist-create', ['only' => ['addLabel']]);
        $this->middleware('permission:view-playlist-edit', ['only' => ['selectLabel','updateLabel']]);
        $this->middleware('permission:view-playlist-delete', ['only' => ['deleteLabel']]);
    }

    public function index()
    {
        $viewPlaylists = ViewPlaylist::where('user_id', Auth()->user()->id)->with('listItems')->get();
        return view('users.view.playlist.index', compact('viewPlaylists'));
    }

    public function getItems(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }
        if($request->playlist_id > 0){
            $viewPlaylists = ViewPlaylist::where('user_id', Auth()->user()->id)->with('listItems')->find($request->playlist_id);
        }else{
            $viewPlaylists = ViewPlaylist::where('user_id', Auth()->user()->id)->with('listItems')->get();
        }
        return response()->json($viewPlaylists, 200);
    }

    public function addLabel(Request $request)
    {
        $request->validate([
            'name'    => 'required|unique:view_playlists',
        ]);

        $viewPlaylist = new ViewPlaylist();
        $viewPlaylist->name = $request->name;
        $viewPlaylist->description = $request->description;
        $viewPlaylist->user_id = Auth()->user()->id;
        if($viewPlaylist->save()){
            return redirect()->back()->with('success','Playlist label is successfully create.');
        }else{
            return redirect()->back()->with('error','Playlist label creating failed.');
        }

    }

    public function selectLabel(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }
        return ViewPlaylist::find($request->id);
    }

    public function updateLabel(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ],[
            'name.required' => 'Title field is required',
        ]);
        $viewPlaylist = ViewPlaylist::find($request->id);
        $viewPlaylist->name = $request->name;
        $viewPlaylist->description = $request->description;
        if($viewPlaylist->save()){
            return redirect()->back()->with('success','Playlist label is successfully updated.');
        }else{
            return redirect()->back()->with('error','Playlist label update failed.');
        }
    }

    public function deleteLabel(Request $request)
    {
        $viewPlaylist = ViewPlaylist::find($request->id);
        if($viewPlaylist->delete()){
            return response()->json(['status' => 'success', 'message' => 'Playlist label successfully deleted.']);
        }else{
            return response()->json(['status' => 'error', 'message' => 'Playlist label is not deleted.']);
        }
    }
}
