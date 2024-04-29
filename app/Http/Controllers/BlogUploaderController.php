<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;

class BlogUploaderController extends Controller
{
    public function index(){
        return view('blog_uploader');
    }

    public function upload(Request $request)
    {
        if($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->storeAs('uploads', 'blogdata.csv', 'public');

            // Открываем файл для чтения
            if (($handle = fopen(storage_path('app/public/' . $path), 'r')) !== false) {
                while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                    $blog = new BlogModel();
                    $blog->title = $data[0];
                    $blog->message = $data[1];
                    $blog->author = $data[2];
                    $blog->created_at = $data[3];
                    $blog->save();
                }
                fclose($handle);
            }

            return view('blog_uploader', ['is_file' => true]);
        }

        return view('blog_uploader', ['is_file' => false]);
    }

}
