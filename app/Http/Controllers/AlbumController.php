<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index(){
        $photos = \App\Models\Photo::PHOTOS;
        return view('album', ['photos' => $photos]);
    }
}
