<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Proposal;
use App\Models\ProposalSection;
use App\Models\ProposalSignature;
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

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index', 'getData']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'addSection']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'updateSection', 'updateData']]);
        $this->middleware('permission:category-delete', ['only' => ['delete', 'deleteSection']]);
    }

    public function index()
    {
        $categories = Category::with('relations')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function getData(Request $request)
    {
        if (!$request->ajax()) {
            return 'Sorry! this is a request without proper way.';
        }

        try {
            $list = Category::with('relations')->get();

            return DataTables::of($list)
                ->addColumn('description', function ($list) {
                    return \Illuminate\Support\Str::limit($list->description, 100);
                })
                ->addColumn('image', function ($list) {
                    return '<img src="'.asset($list->image).'" width="80">';
                })
                ->addColumn('action', function ($list) {
                    // return "";
                    if(auth()->user()->can('category-edit') || auth()->user()->can('category-delete')){
                        $ht = '<a href="javascript:;" class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="text-primary ti ti-dots-vertical"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end m-0 p-0">
                            <li><a href="javascript:;" class="dropdown-item py-2 text-center">Options</a></li>
                            <div class="dropdown-divider m-0"></div>
                            <li>';
                        if(auth()->user()->can('category-edit')){
                        $ht .= '<button class="dropdown-item btn py-2 text-primary" onclick="editCategory(this)" data-id="'. $list->id.'"><i class="fas fa-pen pr-2"></i> Edit</button>';
                        }
                        if(auth()->user()->can('category-delete')){
                        $ht .= '<button class="dropdown-item btn py-2 text-danger" onclick="deleteCategory(this)" data-id="'.$list->id.'"><i class="fas fa-trash pr-2"></i> Delete</button>';
                        }
                        $ht .= '</li>
                            </ul>
                            </div>';
                        return $ht;
                    }else{
                        return '<i class="fas fa-lock pr-2 text-warning"></i>';
                    }
                })
                ->addIndexColumn()
                ->rawColumns(['description', 'image', 'action'])
                ->make(true);
        } catch (\Exception $e) {
            // Session::flash('error', CommonFunction::showErrorPublic($e->getMessage()) . '[UC-1001]');
            return Redirect::back();
        }

    }

    public function create(Request $request)
    {
        // dd($request->all());

        if(Auth()->user()->role_id != 1){
            return redirect()->back()->with('error', 'No permission to create category.');
        }

        $this->validate($request, [
            'title' => 'required|max:500',
            'cat_image'    => 'required',
        ]);

        $category = new Category();

        $category->name = $request->title;
        $category->slug = Str::slug($request->title, '-');
        $category->description = $request->description;

        if ($request->cat_image_baseImage != null) {
            $baseImage = $request->cat_image_baseImage;
            $base64_str = substr($baseImage, strpos($baseImage, ",") + 1);
            $image = base64_decode($base64_str);
            $image_name = "category-" . time() . ".png";
            $location = 'uploads/category/';
            if (!file_exists($location)) {
                mkdir($location);
            }
            Image::make($image)->save($location . $image_name);
            $category->image = $location . $image_name;
        }

        $category->is_active = 1;

        if($category->save()){
            return redirect()->back()->with('success', 'New category create successful.');
        }else{
            return redirect()->back()->with('error', ' Category create failed.');
        }
    }

    public function getCategory(Request $request)
    {
        return Category::find($request->id);
    }

    public function updateCategory(Request $request)
    {
        if(Auth()->user()->role_id != 1){
            return redirect()->back()->with('error', 'No permission to update category.');
        }

        $this->validate($request, [
            'title' => 'required|max:500',
        ]);

        $category = Category::find($request->id);
        $category->name = $request->title;
        $category->slug = Str::slug($request->title, '-');
        if($request->description != "" && $request->description != null){
            $category->description = $request->description;
        }

        if ($request->cat_edit_image_baseImage != null) {
            if($category->image != ""){
                @unlink($category->image);
            }
            $baseImage = $request->cat_edit_image_baseImage;
            $base64_str = substr($baseImage, strpos($baseImage, ",") + 1);
            $image = base64_decode($base64_str);
            $image_name = "category-" . time() . ".png";
            $location = 'uploads/category/';
            if (!file_exists($location)) {
                mkdir($location);
            }
            Image::make($image)->save($location . $image_name);
            $category->image = $location . $image_name;
        }

        if($category->save()){
            return redirect()->back()->with('success', 'Update category successful.');
        }else{
            return redirect()->back()->with('error', 'Failed to update category.');
        }
    }

    public function deleteCategory(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $category = Category::find($request->id);
        if($category->image != ""){
            @unlink($category->image);
        }
        if($category->delete()) {
            return response()->json(['success' => true, 'message' => 'Category deleted successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to delete category.'], 500);
        }

    }

}
