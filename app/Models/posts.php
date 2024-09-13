<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Posts extends Model
{
    public $fillable = ['title', 'categories_id', 'body', 'default_sql', 'active', 'slug'];
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Categories::class, 'categories_id');
    }
    public static function checkIfExist($text)
    {
        $count = Posts::where('slug', $text)->count();
        return [$text, $count];
    }
    public static function createSlug($text)
    {
        $slug = Str::slug($text);
        $check = Posts::checkIfExist($slug);
        $slug = $check[0];
        if ($check[1] > 0) {
            $slug = "{$slug}-{$check[1]}";
        }
        return $slug;
    }
}
