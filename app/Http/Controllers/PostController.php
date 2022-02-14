<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        return view('index')
            ->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    }

    public function myRecipePosts()
    {
        // $myrecipe = Post::where('user_id', '=', \Auth::user()->id)->get(); 
        // dd($myrecipe);
        return view('my_recipe_post')
            ->with('posts', Post::where('user_id', '=', \Auth::user()->id)->get());   
    }
    public function submitRecipePosts(Request $request)
    {
        $image_name = uniqid() . '-' . $request->title . $request->image->extension();
        $request->image->move(public_path('images'), $image_name);

        dd($image_name);
    }
}
