<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Products;
use File;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function index(){
        $caterogies = Category::get();
        $news = Products::get();
        return view('home', ['caterogies' => $caterogies, 'newses' => $news]);
    }
    public function create_category(){
        return view('category');
    }
    public function append_category(Request $request){
        category::create([
            'category' => $request -> input('category')
        ]);
        return redirect()->back();
    }
    public function create_subcategory($id){
        $category_id = Category::select('id')->where('id', $id)->firstOrFail();
        $subcategories = SubCategory::get();
        return view('subcategory', ['subcategories' => $subcategories, 'category_id' => $category_id]); 
    }
    public function append_subcategory(Request $request){
        SubCategory::create([
            'subcategory' => $request->input('subcategory'),
            'category_id' => $request->input('id')
        ]);
        return redirect()->back();
    }
    public function choice_category(){
        $categories = Category::get();
        return view('choice_category', ['categories' => $categories]);
    }
    public function Choice_subcategory($id){
        $subcategories = Subcategory::where('id', $id)->get();
        return view('Choice_subcategory', ['subcategories' => $subcategories]);
    }
    public function create_post($id){
        $subcategories = Subcategory::select('id', 'category_id')->where('id', $id)->firstOrFail();
        return view('create_post', ['category_id' => $subcategories]);
    }
    public function save_post(Request $request){
        if (Input::file("image")){
            $dp = public_path("image");
            $image_filename = uniqid().".jpg";
            $img = Input::file("image")->move($dp, $image_filename);
        }
        Products::create([
            'title' => $request->input('title'),
            'desc' => $request->input('desc'),
            'photo' => $image_filename,
            'category_id' => $request->input('category_id'),
            'subcategory_id' => $request->input('id')
        ]);
        return redirect()->route('home');
    }
}
