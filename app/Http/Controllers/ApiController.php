<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function checkSlug($slug)
    {
        $check = Categories::checkSlugIfExist($slug);
        return ['slug' => $check[0], 'exist' => $check[2]];
    }
    public static $search = '';
    public function search($search_query)
    {
        ApiController::$search = $search_query;
        // dd(ApiController::$search);
        $cats = Categories::select('id', 'title', 'slug', 'description')
            ->with(['posts' => function ($query) {
                $query->select('id', 'title', 'slug', 'categories_id')
                    ->where('title', 'LIKE', "%" . ApiController::$search . "%")
                    ->orderBy('created_at', 'desc');
            }])
            ->take(10)
            ->get();
        $results = [];
        $c = 0;
        foreach ($cats as $cat) {
            if (count($cat->posts) > 0) $results[] = $cat;
            $c++;
            if ($c > 5) break;
        }
        return $results;
    }
}
