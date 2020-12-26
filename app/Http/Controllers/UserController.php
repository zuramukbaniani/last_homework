<?php

namespace App\Http\Controllers;
use App\Category;
use App\SubCategory;
use App\Products;
use App\Comment;
use App\ReplyComments;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $caterogies = Category::get();
        $news = Products::get();
        return view('home', ['caterogies' => $caterogies, 'newses' => $news]);
    }
    public function show($id){
        $news_and_comments = Products::with(['comments', 'reply_comments'])->where('id', $id)->firstOrFail();
        return view('show', ['news_and_comments' => $news_and_comments]);
    }
    public function comment(Request $request){
        Comment::create([
            'comment' => $request->input('comment'),
            'post_id' => $request->input('id')
        ]);
        return redirect()->back();
    }
    public function comment_reply(Request $request){
        ReplyComments::create([
            'comment' => $request->input('reply_comment'),
            'comment_id' => $request->input('comment_id'),
            'post_id' => $request->input('post_id')
        ]);
        return redirect()->back();
    }
    public function show_with_category($id){
        $subcategory_news = Category::with(['subcategories', 'products'])->where('id', $id)->get();
        return view('show_with_category', ['subcategory_news' => $subcategory_news]);
    }
    public function show_with_subcategory($id){
        $news_with_subcategory = SubCategory::with(['news'])->where('id', $id)->get();
        return view('news_with_subcategory', ['news_with_subcategory' => $news_with_subcategory]);
    }
}
