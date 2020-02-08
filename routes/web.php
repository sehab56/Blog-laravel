<?php

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
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//front-end route

route::get('/404','ErrorHandleController@error404');
route::post('/405','ErrorHandleController@error405');


    Route::get('/',[
        'uses'=>'ProjectController@index',
        'as'  =>'/'
    ]);

    Route::get('/category-blog/{id}',[
        'uses'      =>'ProjectController@categoryBlog',
        'as'        =>'category-blog',
        'middleware'=>'fontEnd'
    ]);

    Route::get('/blog-details/{id}',[
        'uses'=>'ProjectController@blogDetails',
        'as'  =>'blog-details'
    ]);
    Route::get('/sign-up',[
        'uses'=>'SignUpController@signUp',
        'as'  =>'sign-up'
    ]);
    Route::post('/new-sign-up',[
        'uses'=>'SignUpController@newSIgnUp',
        'as'  =>'new-sign-up'
    ]);
    Route::post('/visitor-logout',[
        'uses'=>'SignUpController@visitorLogout',
        'as'  =>'visitor-logout'
    ]);
    Route::get('/visitor-login',[
        'uses'=>'SignUpController@visitorLogin',
        'as'  =>'visitor-login'
    ]);

    Route::post('/new-sign-in',[
        'uses'=>'SignUpController@newSignIn',
        'as'  =>'new-sign-in'
    ]);

    Route::post('/new-comment',[
        'uses'=>'CommentController@newComment',
        'as'  =>'new-comment'
    ]);



//admin route
Route::group(['middleware'=>'superAdmin'], function () {

    Route::get('/add-slider', [
        'uses'=>'SliderController@addSlider',
        'as'=>'add-slider'
    ]);
    Route::post('/new-slider', [
        'uses'=>'SliderController@newSlider',
        'as'=>'new-slider'
    ]);
    Route::get('/manage-slider', [
        'uses'=>'SliderController@manageSlider',
        'as'=>'manage-slider'
    ]);
    Route::get('/edit-slider/{id}', [
        'uses'=>'SliderController@editSlider',
        'as'=>'edit-slider'
    ]);
    Route::post('/update-slider', [
        'uses'=>'SliderController@updateSlider',
        'as'=>'update-slider'
    ]);

    Route::post('/delete-slider', [
        'uses'=>'SliderController@deleteSlider',
        'as'=>'delete-slider'
    ]);

    Route::get('/add-category', [
        'uses'=>'CategoryController@addCategory',
        'as'=>'add-category'
    ]);
    Route::post('/new-category', [
        'uses'=>'CategoryController@newCategory',
        'as'=>'new-category'
    ]);
    Route::get('/manage-category', [
        'uses'=>'CategoryController@manageCategory',
        'as'=>'manage-category'
    ]);

    Route::get('/edit-category/{id}', [
        'uses'=>'CategoryController@editCategory',
        'as'=>'edit-category'
    ]);
    Route::post('/update-category', [
        'uses'=>'CategoryController@updateCategory',
        'as'=>'update-category'
    ]);
    Route::post('/delete-category', [
        'uses'=>'CategoryController@deleteCategory',
        'as'=>'delete-category'
    ]);
    Route::get('/add-blog', [
        'uses'=>'blogController@addBlog',
        'as'=>'add-blog'
    ]);
    Route::post('/new-blog', [
        'uses'=>'blogController@newBlog',
        'as'=>'new-blog'
    ]);
    Route::get('/blog/manage-blog', [
        'uses'=>'blogController@manageBlog',
        'as'=>'manage-blog'
    ]);
    Route::get('/blog/edit-blog/{id}', [
        'uses'=>'blogController@editBlog',
        'as'=>'edit-blog'
    ]);
    Route::post('/blog/update-blog', [
        'uses'=>'blogController@updateBlog',
        'as'=>'update-blog'
    ]);

    Route::post('/blog/delete-blog', [
        'uses'=>'blogController@deleteBlog',
        'as'=>'delete-blog'
    ]);
    Route::get('/manage-comment', [
        'uses'=>'CommentController@manageComment',
        'as'=>'manage-comment'
    ]);
    Route::get('/unpublished-comment/{id}', [
        'uses'=>'CommentController@unpublishedComment',
        'as'=>'unpublished-comment'
    ]);
    Route::get('/published-comment/{id}', [
        'uses'=>'CommentController@publishedComment',
        'as'=>'published-comment'
    ]);
    Route::post('/delete-comment', [
        'uses'=>'CommentController@deleteComment',
        'as'=>'delete-comment'
    ]);
});

