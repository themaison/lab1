<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\FormValidation;
use App\Models\BlogModel;
use Illuminate\Routing\Controller;


class BlogEditorController extends Controller
{
    public function index(){
        return view('admin/blog_editor');
    }

    public function store(Request $request){
        $validator = new FormValidation();

        // Установка правил валидации
        $validator->setRule('title', 'isNotEmpty');
        $validator->setRule('message', 'isNotEmpty');
        $validator->setRule('author', 'isNotEmpty');

        // Выполнение валидации
        $validator->validate($request->all());

        // Проверка наличия ошибок
        if (!empty($validator->getErrors())) {
            return view('admin/blog_editor', ['errors_data' => $validator->getErrors(), 'is_post' => false]);
        }

        $post_data = $request->all();
    
        // Создание нового объекта BlogModel
        $blog = new BlogModel();

        // Загрузка изображения
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
            $blog->image = $path;
        }

        // Сохранение данных в модели
        $blog->title = $request->get('title');
        $blog->message = $request->get('message');
        $blog->author = $request->get('author');
        $blog->created_at = date('Y-m-d H:i:s');

        // Сохранение модели
        $blog->save();

        return view('admin/blog_editor', ['is_post' => true]);
    }
}
