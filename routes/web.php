<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {

//    if (Auth::check()) {
//        return "The user is logged in ";
//    }
    return view('welcome');

//    $username=; has to be authenticated
//    $password=; has to be authenticated
//    if (Auth::attempt(['username'=>$username ,'password'=>$password])) {
//        return redirect()->intended('whatever_the_page_user_wanted_to_visit');
//    }
//    Auth::login();

});
Route::get('contact',function (){
    return view('contact');
});

Route::get('logout',function (){
    Auth::logout();
    return redirect('/');   // It should stay on same page >> a modal to ask >> Did U mean to logout ?
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('admin/user/roles',['middleware'=>['role','auth','web'],function (){

    return "middleware role";
}]);


//Route::get('admin','AdminController@index');


//Route::get('password/reset', function () {

//})->name('password/reset');

Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostsController@post']);

Route::group(['middleware'=>'admin'], function(){

    Route::get('/admin', ['as'=>'admin.index', 'uses'=>'AdminController@index']);

    Route::resource('admin/users', 'AdminUsersController',['names'=>[

        'index'=>'admin.users.index',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'edit'=>'admin.users.edit'

    ]]);



    Route::resource('admin/posts', 'AdminPostsController',['names'=>[

        'index'=>'admin.posts.index',
        'create'=>'admin.posts.create',
        'store'=>'admin.posts.store',
        'edit'=>'admin.posts.edit'

    ]]);

    Route::resource('admin/categories', 'AdminCategoriesController',['names'=>[

        'index'=>'admin.categories.index',
        'create'=>'admin.categories.create',
        'store'=>'admin.categories.store',
        'edit'=>'admin.categories.edit'

    ]]);

    Route::resource('admin/media', 'AdminMediasController',['names'=>[

        'index'=>'admin.media.index',
        'create'=>'admin.media.create',
        'store'=>'admin.media.store',
        'edit'=>'admin.media.edit'

    ]]);

    Route::delete('admin/delete/media', 'AdminMediasController@deleteMedia');


    Route::resource('admin/comments', 'PostCommentsController',['names'=>[
        //These are views
        'index'=>'admin.comments.index',
        'create'=>'admin.comments.create',
        'store'=>'admin.comments.store',
        'edit'=>'admin.comments.edit',
        'show'=>'admin.comments.show'

    ]]);

    Route::resource('admin/comment/replies', 'CommentRepliesController',['names'=>[
        'index'=>'admin.replies.index',
        'create'=>'admin.replies.create',
        'store'=>'admin.replies.store',
        'edit' => 'admin.replies.edit',
        'show'=>'admin.replies.show'

    ]]);


});



Route::group(['middleware'=>'auth'], function(){

    Route::post('comment/reply', 'CommentRepliesController@createReply');

});

Route::get('/posts','PostController@index')->middleware('web');


