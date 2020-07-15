<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Entities\BlogPost;
use App\Models\BlogPostModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogPostController extends Controller
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

    public function input()
    {
        return view('blog_post.input');
    }

    public function show(Request $request, BlogPostModel $bp_model)
    {
        $id = $request->id;

        $blog_posts = $bp_model->getBlogPostbyId($id);

        return view('blog_post.show', [
            'blog_posts' => $blog_posts
        ]);
    }

    public function inputConfirm(Request $request, BlogPostModel $bp_model)
    {
        $validatedData = $request->validate($bp_model->rules());

        $user_id = Auth::id();
        
        //dd($request->title);
        
        $blog_post = $bp_model->createBlogPost($request, $user_id);

        $request->session()->put('blog_post', $blog_post);

        return view('blog_post.input_confirm', [
            'blog_post' => $blog_post
        ]);
    }

    public function inputComplete(Request $request, BlogPostModel $bp_model)
    {
        $blog_post = $request->session()->get('blog_post');

        if($request->action === 'back') {
            return redirect()->route('blog_post_input');
        }
        if($request->action === null) {
            return redirect()->route('blog_post_input');
        }

        DB::transaction(function () use ($blog_post, $bp_model) {
            $bp_model->saveBlogPost($blog_post);
        });

        $request->session()->forget('blog_post');

        return view('blog_post.input_complete', [
            'blog_post' => $blog_post
        ]);
    }
}