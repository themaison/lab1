<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;
use App\Models\CommentModel;

class MyBlogController extends Controller
{
    public function index(){
        $blogdata = BlogModel::with('comments')->orderBy('created_at', 'DESC')->paginate(3)->onEachSide(2);
        return view('my_blog', ['blogdata' => $blogdata]);
    }
    

    public function add_comment(Request $request)
    {
        $commentModel = new CommentModel;
        $commentModel->post_id = $request->input('post_id');
        $commentModel->author = session('user')->fullname;
        $commentModel->comment = $request->input('comment');
        $commentModel->created_at = date('Y-m-d H:i:s');
        $commentModel->save();

        return response()->json($commentModel);
    }

    public function edit_post(Request $request)
    {
        $post = BlogModel::find($request->post_id);
        $post->title = $request->title;
        $post->message = $request->message;
        $post->save();

        return response()->json($post);
    }
}
