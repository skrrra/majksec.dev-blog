<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Comment;

class ArticleController extends Controller
{
    public function index()
    {

        $posts = Posts::paginate(10);

        $comment = Comment::paginate();

        return view('index',[
            'posts' => $posts,
            'comment' => $comment
        ]);
    }

    public function show(Posts $posts)
    {
        return view('post', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'name'     => 'bail|required',
            'email'    => 'bail|required',
            'comment'  => 'bail|required',
            'postid'    => 'required'
        ]);

        Comment::create($validate);

        return redirect($request->path())->with('status', 'Comment has been submitted');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect('/admin/dashboard')->with('status', 'Comment has been deleted');
    }
}
