<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\Category;
use App\SubCategory;
use App\Products;
use App\Comment;
use App\ReplyComments;

class UserController extends Controller
{
    public function register(Request $request){
        $validateData = $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|email|max:40|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);
        $validateData['password'] = bcrypt($request->password);
        $user = User::create($validateData);
        $accsessToken = $user->createToken('authToken')->accessToken;
        return response(['user' => $user, 'accessToken' => $accsessToken]);
    }
    public function login(Request $request){
        $validateData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(!Auth::attempt($validateData)){
            return response(['message' => 'ivlalid email or password']);
        }
        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        return response(['user' => Auth()->user(), 'accessToken' => $accessToken]);
    }
    public function index(){
        $products_category_subcategory = Category::with(['subcategories', 'products'])->get();
        return response(['products_category_subcategory' => $products_category_subcategory]);
    }
    public function show_with_subcategory($id){
        $subcategory_products = SubCategory::with(['news'])->where('id', $id)->get();
        return response(['subcategory_products' => $subcategory_products]);
    }
    public function show($id){
        $post_comments_reply_comment = Products::with(['comments', 'reply_comments'])->where('id', $id)->get();
        return response(['post_comments_reply_comment' => $post_comments_reply_comment]);
    }
    public function comment(Request $request){
        Comment::create([
            'comment' => $request->comment,
            'post_id' => $request->post_id
        ]);
        return response(['comment created']);
    }
    public function reply_comment(Request $request){
        ReplyComments::create([
            'comment' => $request->comment,
            'comment_id' => $request->comment_id,
            'post_id' => $request->post_id
        ]);
        return response(['reply comment created']);
    }
}
