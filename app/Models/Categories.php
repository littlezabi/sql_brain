<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Categories extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'slug', 'active'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($category) {
            $category->slug = Categories::createUniqueSlug($category->title);
        });
    }
    public function posts()
    {
        return $this->hasMany(Posts::class, 'categories_id');
    }
    public static function checkSlugIfExist($slug)
    {
        $slug = Str::slug($slug);
        $count = Categories::where('slug', $slug)->count();
        return [$slug, $count, $count > 0 ? true : false];
    }
    public static function createUniqueSlug($title)
    {
        $check = Categories::checkSlugIfExist($title);
        $slug = $check[0];
        if ($check[2]) {
            $slug = "{$slug}-{$check[1]}";
        }
        return $slug;
    }
}
