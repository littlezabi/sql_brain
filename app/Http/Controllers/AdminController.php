<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_new(Request $request): RedirectResponse
    {
        $request->validate([
            'fullname' => ['reqiured', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class]
        ]);
        dd(request());
        return 'hello';
    }
    public function register()
    {
        return view('admin.register');
    }
    public function login()
    {
        return view('admin.login');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function edit(Posts $post)
    {
        $cat = Categories::where('active', 1)->orderBy('created_at', 'desc')->get();
        return view('admin.posts.edit', ['post' => $post, 'categories' => $cat]);
    }
    public function patch(Posts $post)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'body' => ['required', 'min:5'],
            'category' => ['required', 'min:1']
        ]);

        $post->update([
            'title' => request('title'),
            'body' => request('body'),
            'default_sql' => request('default_sql'),
            'categories_id' => request('category'),
            'slug' => Posts::createSlug(request('slug'))
        ]);
        if ($post) {
            session(['message' => 'Post updated successfully!', 'variant' => 'success']);
            return redirect('/admin/posts/' . $post->id);
        } else {
            session(['message' => 'Error in saving post data!', 'variant' => 'danger']);
            return redirect('/admin/posts/' . $post->id);
        }
    }
    public function delete(Posts $post)
    {
        $post->delete();
        session(['message' => 'Post Delete successfully!', 'variant' => 'success']);
        return redirect('/admin/posts/');
    }
    public function all()
    {
        $posts = Posts::where('active', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view("admin.posts.all", ['posts' => $posts]);
    }
    public function new()
    {
        $cat = Categories::where('active', 1)->orderBy('created_at', 'desc')->get();
        return view("admin.posts.new", ['categories' => $cat]);
    }
    public function store()
    {
        request()->validate(
            [
                'title' => ['required', 'min:5'],
                'body' => ['required', 'min:10'],
                'category' => ['required', 'min:1']
            ]
        );
        $new = posts::create([
            'title' => request('title'),
            'body' => request('body'),
            'default_sql' => request('default_sql'),
            'categories_id' => request('category'),
            'slug' => Posts::createSlug(request('title'))
        ]);
        if (!$new) {
            session(['message' => 'Please try again error in saving new post!', 'variant' => 'danger']);
            redirect('admin/posts/new');
        }
        session(['message' => 'New post added!', 'variant' => 'success']);
        return redirect("admin/posts");
    }
    public function categories()
    {
        $all = Categories::where('active', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.categories.categories', ['categories' => $all]);
    }
    public function new_category()
    {
        return view('admin.categories.new_category');
    }
    public function edit_category(Categories $category)
    {
        return view('admin.categories.edit_category', ['category' => $category]);
    }
    public function store_category()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'slug' => ['required', 'min:3']
        ]);
        Categories::create([
            'title' => request('title'),
            'description' => request('description'),
            'slug' => Categories::createUniqueSlug(request('slug')),
        ]);
        session(['message' => 'New Category added!', 'variant' => 'success']);
        return redirect('/admin/categories');
    }
    public function update_category(Categories $category)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
        ]);
        $slug = request('old_slug') == request('slug') ? null : Categories::createUniqueSlug(request('slug'));;
        $data = [
            'title' => request('title'),
            'description' => request('description'),
        ];
        if ($slug) $data['slug'] = $slug;
        $category->update($data);
        session(['message' => 'Category updated!', 'variant' => 'success']);
        return redirect('/admin/categories/' . $category->id);
    }
}
