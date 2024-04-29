<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class GuestBookUploaderController extends Controller
{
    public function index(){
        return view('admin/gb_uploader');
    }

    public function upload(Request $request)
    {
        if($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->storeAs('uploads', 'messages.inc', 'public');
            return view('admin/gb_uploader', ['gb_file' => true]);
        }

        return view('admin/gb_uploader', ['gb_file' => false]);
    }
}
