<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\SubCategory;
use App\Products;
use App\Comment;
use App\ReplyComments;

class GuestController extends Controller
{
    public function index(){
        $products_category_subcategory = Category::with(['subcategories', 'products'])->get();
        return response(['products_category_subcategory' => $products_category_subcategory]);
    }
    public function show_with_subcategory($id){
        $products_subcategory = SubCategory::with('news')->where('id', $id)->get();
        return response(['products_subcategory' => $products_subcategory]);
    }
    public function show($id){
        $post_comments_reply_comment = Products::with(['comments', 'reply_comments'])->where('id', $id)->get();
        return response(['post_comments_reply_comment' => $post_comments_reply_comment]);
    }
}
