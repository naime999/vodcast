<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Alaouy\Youtube\Youtube;
use App\Models\Content;

class YoutubeController extends Controller
{

    public $youtube;

    public function __construct()
    {
        $this->youtube = new Youtube(config('app.y_key'));
    }


    public function get(Request $request)
    {
        $request->validate([
            'id'   => 'required',
        ]);

        $id = Crypt::decrypt($request->id);
        $content = Content::find($id);
        $content->youtube = $this->youtube->getVideoInfo($content->youtube_id);
        return $content;
    }

    public function data(Request $request)
    {
        $request->validate([
            'id'   => 'required',
        ]);
        return $this->youtube->getVideoInfo($request->id);
    }

    public function playlistData(Request $request)
    {
        $request->validate([
            'id'   => 'required',
        ]);
        $playlist = $this->youtube->getPlaylistById($request->id);
        $orgDataList = $this->youtube->getPlaylistItemsByPlaylistId($request->id)['results'];
        $new_items = new \stdClass();
        $new_items->items = [];
        foreach($orgDataList as $item){
            if($item->status->privacyStatus == 'public'){
                $new_items->items[] = $item;
            }
        }
        $playlist->items = $new_items->items;
        return $playlist;
    }

    public function insidePlaylistData($ytId)
    {
        $playlist = $this->youtube->getPlaylistById($ytId);
        $playlist->items = $this->youtube->getPlaylistItemsByPlaylistId($ytId)['results'];
        return $playlist;
    }

    public function playerData(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        $request->validate([
            'vid'   => 'required',
        ]);

        $videoData = $this->youtube->getLocalizedVideoInfo($request->vid, 'pl');
        return response()->json($videoData);
    }

}
