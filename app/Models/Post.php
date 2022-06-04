<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['customer', 'location', 'product', 'start', 'end', 'action', 'transportation', 'fee', 'content', 'comment'];
}
