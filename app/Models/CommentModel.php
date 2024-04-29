<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    protected $table = 'comments';
    public $timestamps = false;

    protected $fillable = ['post_id', 'author', 'comment', 'created_at'];
}