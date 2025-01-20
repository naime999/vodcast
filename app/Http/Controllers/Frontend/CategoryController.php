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

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::where('is_active', 1)->with('relations')->get();
        // return $categories;
        return view('frontend.categories.index', compact('categories'));
    }
}
