<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Products;
use App\Comment;
use App\ReplyComments;

class GuestController extends Controller
{
    public function index(){
        $caterogies = Category::get();
        $news = Products::get();
        return view('welcome', ['caterogies' => $caterogies, 'newses' => $news]);
    }
    public function show($id){
        $news_and_comments = Products::with(['comments', 'reply_comments'])->where('id', $id)->firstOrFail();
        return view('guestShow', ['news_and_comments' => $news_and_comments]);
    }
    public function show_with_category($id){
        $subcategory_news = Category::with(['subcategories', 'products'])->where('id', $id)->get();
        return view('guest_show_with_category', ['subcategory_news' => $subcategory_news]);
    }
    public function show_with_subcategory($id){
        $news_with_subcategory = SubCategory::with(['news'])->where('id', $id)->get();
        return view('guest_news_with_subcategory', ['news_with_subcategory' => $news_with_subcategory]);
    }
}
