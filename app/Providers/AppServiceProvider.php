<?php

namespace App\Providers;

use App\Models\Categories;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // $cats = Categories::select('id', 'title', 'slug')
        //     ->with(['posts' => function ($query) {
        //         $query->select('title', 'slug', 'categories_id')
        //             ->where('active', 1)
        //             ->orderBy('created_at', 'desc');
        //     }])
        //     ->get();
        // view()->share('cats_all', $cats);
    }
}
