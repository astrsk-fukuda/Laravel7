<?php

namespace App\Http\Controllers;

use App\Entities\BlogPost;
use App\Models\BlogPostModel;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(BlogPostModel $bp_model)
    {
        $blog_posts = $bp_model->getBlogPosts();

        return view('home', [
            'blog_posts' => $blog_posts
        ]);
    }
}
