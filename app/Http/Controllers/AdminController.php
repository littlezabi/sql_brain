<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function all()
    {
        $posts = Posts::all();
        $posts = Posts::where('active', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view("admin.posts.all", ['posts' => $posts]);
    }
    public function new()
    {
        return view("admin.posts.new");
    }
    public function store()
    {
        request()->validate(
            [
                'title' => ['required', 'min:5'],
                'body' => ['required', 'min:10'],
            ]
        );
        $new = posts::create([
            'title' => request('title'),
            'body' => request('body'),
            'default_sql' => request('default_sql')
        ]);
        if (!$new) {
            redirect('admin/posts/new');
        }
        return redirect("admin/posts");
    }
}
