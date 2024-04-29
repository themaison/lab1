<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterestsController extends Controller
{
    public function index(){
        $interests = \App\Models\Interest::INTERESTS;
        return view('interests', ['interests' => $interests]);
    }
}
