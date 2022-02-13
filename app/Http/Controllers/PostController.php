<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('index')
            ->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    }
}
