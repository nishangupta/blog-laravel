<?php

use Illuminate\Support\Facades\Route;

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

//real-estate app
Route::get('/real-estate', 'PropertyController@index')->name('property.index');
Route::get('/real-estate/search', 'PropertyController@search')->name('property.search');
Route::get('/real-estate/list', 'PropertyController@list')->name('property.list');
Route::get('/real-estate/{property}', 'PropertyController@show')->name('property.show');
Route::get('/real-estate/rent', 'PropertyController@rent')->name('property.rent');
Route::get('/real-estate/buy', 'PropertyController@buy')->name('property.buy');
Route::get('/real-estate/mortage', 'PropertyController@mortage')->name('property.mortage');

Route::get('/real-estate/account/user_profile', 'PropertyController@accountIndex')->name('property.account');
Route::get('/real-estate/account/saved-homes', 'PropertyController@savedHomes')->name('property.savedHomes');
Route::get('/real-estate/account/rental_resume', 'PropertyController@accountRentalResume')->name('property.rentalResume');
Route::get('/real-estate/account/login', 'PropertyController@accountLogin')->name('property.login');
