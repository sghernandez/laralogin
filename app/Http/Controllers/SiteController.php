<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class SiteController extends Controller
{
    public function getComments($post_id)
    {
        // Passing post id into find()
        return Post::find($post_id)->comments;
    }

    public function getPost($comment_id)
    {
        // Passing comment id into find()
        return Comment::find($comment_id)->post;
    }
}