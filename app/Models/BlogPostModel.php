<?php

namespace App\Models;

use App\Entities\BlogPost;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BlogPostModel
{
    public function rules(): array
    {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'contents' => ['required', 'string', 'max:1024']
        ];

        return $rules;
    }

    public function getBlogPostById($id)
    {
        $blog_post = DB::table('blog_posts')->where('id', $id)->get();

        return $blog_post;
    }

    public function getBlogPosts()
    {
        $blog_posts = DB::table('blog_posts')->get();

        return $blog_posts;
    }

    public function createBlogPost(Request $request, int $user_id): BlogPost
    {
        $blog_post = new BlogPost();
        $blog_post->user_id = $user_id;
        $blog_post->title = $request->title;
        $blog_post->contents = $request->contents;

        return $blog_post;
    }

    public function saveBlogPost(BlogPost $blog_post)
    {
        $blog_post->save();
    }
}