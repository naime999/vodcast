<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Content;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;

class SearchController extends Controller
{
    public function index()
    {
        $contents = Content::orderBy('created_at', 'desc')->get();
        foreach($contents as $content){
            if($content->c_type == 1){
                $youtubeController = new \App\Http\Controllers\YoutubeController();
                try {
                    $orgDataList = $youtubeController->insidePlaylistData($content->youtube_id);
                    $new_items = new \stdClass();
                    $new_items->items = [];
                    foreach($orgDataList->items as $item){
                        if($item->status->privacyStatus != 'private'){
                            $new_items->items[] = $item;
                        }
                    }
                    $orgDataList->items = $new_items->items;
                    $content->playlist_data = $orgDataList;
                } catch (\Exception $e) {
                    $content->playlist_data = null;
                }
            }
        }
        return view('frontend.search.index', compact('contents'));
    }

    public function getSearch(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }
        if($request->text != ''){
            $contents = Content::when($request->text, function ($query, $text) {
                $query->where(DB::raw('LOWER(title)'), 'like', '%' . strtolower($text) . '%');
            })->orderBy('created_at', 'desc')->get();
        }else{
            $contents = Content::orderBy('created_at', 'desc')->get();
        }

        if($contents->count() > 0){
            foreach($contents as $content){
                if($content->c_type == 1){
                    $youtubeController = new \App\Http\Controllers\YoutubeController();
                    try {
                        $orgDataList = $youtubeController->insidePlaylistData($content->youtube_id);
                        $new_items = new \stdClass();
                        $new_items->items = [];
                        foreach($orgDataList->items as $item){
                            if($item->status->privacyStatus != 'private'){
                                $new_items->items[] = $item;
                            }
                        }
                        $orgDataList->items = $new_items->items;
                        $content->playlist_data = $orgDataList;
                    } catch (\Exception $e) {
                        $content->playlist_data = null;
                    }
                }
            }
            return view('frontend.search.search-template', compact('contents'));
        }else{
            return view('frontend.search.search-empty-template');
        }
    }
}
