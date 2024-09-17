<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Posts;
use Illuminate\Http\Request;
use Parsedown;

class ClientController extends Controller
{
    public function convertMarkdownToHtml($text)
    {
        $parsedown = new Parsedown();
        $html = $parsedown->text($text);
        return view('markdown', compact('html'));
    }
    public function getCatsAndPosts()
    {
        $cats = Categories::select('id', 'title', 'slug')
            ->with(['posts' => function ($query) {
                $query->select('id', 'title', 'slug', 'categories_id')
                    ->where('active', 1)
                    ->orderBy('created_at', 'desc');
            }])
            ->get();
        return $cats;
    }

    public function home()
    {
        $cats = Categories::select('id', 'title', 'slug', 'description')
            ->with(['posts' => function ($query) {
                $query->select('id', 'title', 'slug', 'categories_id')
                    ->where('active', 1)
                    ->orderBy('created_at', 'desc');
            }])
            ->get();
        return view("home", ['categories' => $cats]);
    }
    public function getPost(Categories $category, Posts $post)
    {
        $relatedPosts = Posts::select('title', 'categories_id', 'slug', 'id')
            ->where('categories_id', $post->categories_id)
            ->where('id', '!=', $post->id)
            ->take(10)
            ->get();
        return view("post", ['related' => $relatedPosts, 'item' => $post, 'category' => $category, 'categories' => ClientController::getCatsAndPosts()]);
    }
}
