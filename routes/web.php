<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\InterestsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestStatisticsController;
use App\Http\Controllers\GuestBookController;
use App\Http\Controllers\MyBlogController;
use App\Http\Controllers\BlogUploaderController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\Admin\GuestBookUploaderController;
use App\Http\Controllers\Admin\BlogEditorController;
use App\Http\Controllers\Admin\VisitStatisticsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminBlogController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'user'], function() {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    Route::get('/album', [AlbumController::class, 'index'])->name('album.index');

    Route::get('/interests', [InterestsController::class, 'index'])->name('interests.index');

    Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');
    Route::post('/contacts/validate', [ContactsController::class, 'validate_form'])->name('contacts.validate');

    Route::get('/test', [TestController::class, 'index'])->name('test.index');
    Route::post('/test/validate', [TestController::class, 'validate_form'])->name('test.validate');

    Route::get('/gb', [GuestBookController::class, 'index'])->name('gb.index');
    Route::post('/gb/store', [GuestBookController::class, 'store'])->name('gb.store');

    Route::get('/my_blog', [MyBlogController::class, 'index'])->name('my_blog.index');

    Route::get('/blog_uploader', [BlogUploaderController::class, 'index'])->name('blog_uploader.index');
    Route::post('/blog_uploader/upload', [BlogUploaderController::class, 'upload'])->name('blog_uploader.upload');

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
        // Route::get('/login', [AdminController::class, 'get_login_form'])->name('login.get_login_form');
        // Route::post('/login/store', [AdminController::class, 'store'])->name('login.store');

        Route::group(['middleware' => 'role'], function() {
            // Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
            Route::get('/panel', [AdminController::class, 'get_panel'])->name('panel.get_panel');

            Route::get('/teststat', [TestStatisticsController::class, 'index'])->name('teststat.index');
            Route::post('/teststat/store', [TestStatisticsController::class, 'store'])->name('teststat.store');

            Route::get('/my_blog', [MyBlogController::class, 'index'])->name('my_blog.index');
            Route::post('/edit_post', [MyBlogController::class, 'edit_post'])->name('my_blog.edit_post');

            Route::get('/blog_editor', [BlogEditorController::class, 'index'])->name('blog_editor.index');
            Route::post('/blog_editor/store', [BlogEditorController::class, 'store'])->name('blog_editor.store');

            Route::get('/gb_uploader', [GuestBookUploaderController::class, 'index'])->name('gb_uploader.index');
            Route::post('/gb_uploader/upload', [GuestBookUploaderController::class, 'upload'])->name('gb_uploader.upload'); 

            Route::get('/visit_stat', [VisitStatisticsController::class, 'index'])->name('visit_stat.index');
        });
    });

    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');

    Route::get('/login', [UserController::class, 'get_login_form'])->name('user.get_login_form');
    Route::post('/login/confirm', [UserController::class, 'login_confirm'])->name('user.login_confirm');

    Route::get('/register', [UserController::class, 'get_register_form'])->name('user.get_register_form');
    Route::post('/register/confirm', [UserController::class, 'register_confirm'])->name('user.register_confirm');

    Route::get('/checkLogin', [UserController::class, 'checkLogin'])->name('user.checkLogin');

    Route::post('/add_comment', [MyBlogController::class, 'add_comment'])->name('user.add_comment');
});

// Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Route::get('/album', [AlbumController::class, 'index'])->name('album.index');

// Route::get('/interests', [InterestsController::class, 'index'])->name('interests.index');

// Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');
// Route::post('/contacts/validate', [ContactsController::class, 'validate_form'])->name('contacts.validate');

// Route::get('/test', [TestController::class, 'index'])->name('test.index');
// Route::post('/test/validate', [TestController::class, 'validate_form'])->name('test.validate');

// Route::get('/gb', [GuestBookController::class, 'index'])->name('gb.index');
// Route::post('/gb/store', [GuestBookController::class, 'store'])->name('gb.store');

// Route::get('/my_blog', [MyBlogController::class, 'index'])->name('my_blog.index');

// Route::get('/blog_uploader', [BlogUploaderController::class, 'index'])->name('blog_uploader.index');
// Route::post('/blog_uploader/upload', [BlogUploaderController::class, 'upload'])->name('blog_uploader.upload');

// Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
//     // Route::get('/login', [AdminController::class, 'get_login_form'])->name('login.get_login_form');
//     // Route::post('/login/store', [AdminController::class, 'store'])->name('login.store');

//     Route::group(['middleware' => 'role'], function() {
//         // Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
//         Route::get('/panel', [AdminController::class, 'get_panel'])->name('panel.get_panel');

//         Route::get('/teststat', [TestStatisticsController::class, 'index'])->name('teststat.index');
//         Route::post('/teststat/store', [TestStatisticsController::class, 'store'])->name('teststat.store');

//         Route::get('/my_blog', [MyBlogController::class, 'index'])->name('my_blog.index');
//         Route::post('/edit_post', [MyBlogController::class, 'edit_post'])->name('my_blog.edit_post');

//         Route::get('/blog_editor', [BlogEditorController::class, 'index'])->name('blog_editor.index');
//         Route::post('/blog_editor/store', [BlogEditorController::class, 'store'])->name('blog_editor.store');

//         Route::get('/gb_uploader', [GuestBookUploaderController::class, 'index'])->name('gb_uploader.index');
//         Route::post('/gb_uploader/upload', [GuestBookUploaderController::class, 'upload'])->name('gb_uploader.upload'); 

//         Route::get('/visit_stat', [VisitStatisticsController::class, 'index'])->name('visit_stat.index');
//     });
// });

// Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');

// Route::get('/login', [UserController::class, 'get_login_form'])->name('user.get_login_form');
// Route::post('/login/confirm', [UserController::class, 'login_confirm'])->name('user.login_confirm');

// Route::get('/register', [UserController::class, 'get_register_form'])->name('user.get_register_form');
// Route::post('/register/confirm', [UserController::class, 'register_confirm'])->name('user.register_confirm');

// Route::get('/checkLogin', [UserController::class, 'checkLogin'])->name('user.checkLogin');

// Route::post('/add_comment', [MyBlogController::class, 'add_comment'])->name('user.add_comment');