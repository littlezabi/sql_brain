<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = ['fullname', 'email', 'password', 'as_admin'];
    use HasFactory;
}
