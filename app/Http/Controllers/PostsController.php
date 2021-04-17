<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')->get();
        
        return view('dashboard', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('layouts.newpost');
    }

    public function store(Request $request)
    {
        
        $validate = $request->validate([
            'title' => 'bail|required',
            'description' => 'bail|required',
            'slug' => 'bail|required',
            'content' => 'bail|required'
        ]);
        $post = new Posts($validate);

        $post->save();

        return redirect('/admin/dashboard')->with('status', 'Page has been created');
    }

    public function edit($slug)
    {
        $slug = DB::table('posts')->where('slug', $slug)->first();

        return view('editpost', [
            'slug' => $slug,
        ]);
    }

    public function update(Request $request, Posts $post)
    {
        $validate = $request->validate([
            'title' => 'bail|required',
            'description' => 'bail|required',
            'slug' => 'bail|required',
            'content' => 'bail|required'
        ]);
        
        $post->fill($validate);
        $post->save();
        
        return redirect('/admin/dashboard')->with('status', 'Page has been updated');
    }

    public function delete(Posts $post)
    {
        $post->delete();
        return redirect('/admin/dashboard');
    }
}
