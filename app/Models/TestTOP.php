<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestTOP extends Model
{
    protected $table = 'test_top';
    public $timestamps = false;

    protected $fillable = ['tid', 'datetime', 'fullname', 'answers', 'results'];
}
