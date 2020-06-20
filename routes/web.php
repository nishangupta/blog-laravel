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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');


//blog controller route
Route::get('/blog', 'BlogController@index')->name('blog.index');
Route::get('/blog/create', 'BlogController@create')->name('blog.create');
Route::get('/blog/{blog}', 'BlogController@show')->name('blog.show');
Route::post('/blog', 'BlogController@store')->name('blog.store');
Route::get('/blog/{blog}/edit', 'BlogController@edit')->name('blog.edit');
Route::put('/blog/{blog}', 'BlogController@update')->name('blog.update');
Route::delete('/blog/{blog}', 'BlogController@destroy')->name('blog.destroy');
Route::post('/blog/{blog}/comment', 'BlogController@addComment')->name('blog.addComment');
Route::get('/MarkAllNotificationsAsRead', 'BlogController@markAllNotificationsAsRead')->name('markAsRead');
Route::get('/blog-finder', 'BlogController@blogFinder')->name('blogFinder');

Route::get('/profile', 'ProfileController@index')->name('profile');


//cart
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/cart/{cart}', 'CartController@show')->name('cart.show');
Route::post('/cart/addToCart', 'CartController@addToCart')->name('cart.addToCart');
Route::post('/cart/addToWishlist', 'CartController@addToWishlist')->name('cart.addToWishlist');
Route::get('/carts/my-cart', 'CartController@myCart')->name('cart.myCart');
Route::get('/carts/removeFromCart ', 'CartController@removeFromCart')->name('cart.removeFromCart');

//user
Route::get('/github', 'GithubController@index')->name('github.index');


//api route for chat application
Route::get('/chat', 'HomeController@chat')->name('chat');
Route::get('/contacts', 'ContactsController@get')->name('contacts.get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor')->name('contacts.getMessageFor');
Route::post('/conversation/send', 'ContactsController@send')->name('contacts.send');


//route for the image gallery
Route::resource('/gallery', 'ImageGalleryController');
