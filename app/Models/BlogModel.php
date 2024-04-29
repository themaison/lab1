<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'post_id';
    public $timestamps = false;

    protected $fillable = ['title', 'message', 'image', 'author', 'created_at'];

    public function comments()
    {
        return $this->hasMany('App\Models\CommentModel', 'post_id', 'post_id')->orderBy('created_at', 'desc');;
    }
}
