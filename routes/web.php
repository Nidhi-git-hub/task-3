<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::match(['get','post'],'/admin','AdminController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']],function(){
	Route::match(['get','post'],'/admin/dashboard','AdminController@dashboard');

	//Blog Route
	Route::match(['get','post'],'/admin/add-blog','BlogController@addBlog');
	Route::match(['get','post'],'/admin/view-blogs','BlogController@viewBlogs');
	Route::match(['get','post'],'/admin/edit-blog/{BlogID}','BlogController@editBlog');
	Route::match(['get','post'],'/admin/delete-blog/{BlogID}','BlogController@deleteBlog');
	Route::post('/admin/update-blog-status','BlogController@updateStatus');

	//Keyword Route
	Route::match(['get','post'],'/admin/add-keyword/{BlogID}','BlogController@addKeyword');
	Route::get('/admin/delete-keyword/{KeywordID}','BlogController@deleteKeyword');
	Route::match(['get','post'],'/admin/edit-keyword/{KeywordID}','BlogController@editKeyword');
	Route::post('/admin/update-keyword-status','BlogController@updateKeywordStatus');

	//BlogSEO Route
	Route::match(['get','post'],'/admin/add-blogSeo','BlogSeoController@addSeo');
	Route::match(['get','post'],'/admin/view-blogSeos','BlogSeoController@viewSeos');
	Route::match(['get','post'],'/admin/edit-blogSeo/{SeoID}','BlogSeoController@editSeo');
	Route::match(['get','post'],'/admin/delete-blogSeo/{SeoID}','BlogSeoController@deleteSeo');

});
Route::get('/logout','AdminController@logout');
