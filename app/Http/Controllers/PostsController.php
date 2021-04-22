<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Posts::with(['comments' => function($query){
            $query->select('name', 'comment', 'created_at');
        }])->paginate(10);
        
        return view('admin.dashboard', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('admin.newpost');
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'title'       => 'bail|required',
            'description' => 'bail|required',
            'slug'        => 'bail|required',
            'content'     => 'bail|required',
        ]);

        Posts::create($validate);

        return redirect('/admin/dashboard')->with('status', 'Page has been created!');
    }

    public function edit(Posts $posts)
    {
        return view('admin.editpost', [
            'slug' => $posts,
        ]);
    }

    public function update(Request $request, Posts $posts)
    {
        $validate = $request->validate([
            'title'       => 'bail|required',
            'description' => 'bail|required',
            'slug'        => 'bail|required',
            'content'     => 'bail|required',
        ]);

        $posts->fill($validate);
        $posts->save();

        return redirect('/admin/dashboard')->with('status', 'Page has been updated!');
    }

    public function delete(Posts $posts)
    {
        $posts->delete();

        return redirect('/admin/dashboard')->with('status', 'Page has been deleted!');
    }
}