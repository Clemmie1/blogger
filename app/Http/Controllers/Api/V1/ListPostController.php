<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentCollection;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class ListPostController extends Controller
{
    public function getList()
    {
        return new PostCollection(Post::all());
    }

    public function getComment(Request $request)
    {
        $id = $request->header('from_post');
        return new CommentCollection(Comment::where('post_id', $id)->get());
    }
}
