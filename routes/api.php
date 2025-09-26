<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/signup', 'CustomerController@signup');
Route::post('/signupbysocial', 'CustomerController@signupbysocial');
Route::post('/login', 'CustomerController@login');
Route::post('/otpVerification', 'CustomerController@otpVerification');
Route::post('/forgotPassword', 'CustomerController@forgotPassword');
Route::post('/ForgotPassVerification', 'CustomerController@ForgotPassVerification');
Route::post('/CreateNewPassword', 'CustomerController@CreateNewPassword');
Route::post('/logout', 'CustomerController@logout');

// New API 24-02-2021
Route::post('/profileUpdate', 'CustomerController@profileUpdate');

// Product Add in Favourite lis
Route::post('/addFavProduct', 'ProductsController@addFavProduct');
Route::post('/removeFavProduct', 'ProductsController@removeFavProduct');
Route::post('/listFavProduct', 'ProductsController@listFavProduct');

// Trending Drinks
Route::get('/trendingDrink', 'ProductsController@trendingDrink');
// Event list  
Route::get('/eventList', 'ProductsController@eventList');
// Drnk list by ID
Route::post('/drinkByCategory', 'ProductsController@drinkByCategory');
// Category list by ID
Route::get('/categoryList', 'ProductsController@categoryList');

// Post Feed 
Route::post('/postFeed', 'ProductsController@postFeed');
Route::post('/listFeed', 'ProductsController@listFeed');
Route::get('/listFeedAll', 'ProductsController@listFeedAll');

// New API 4-03-2021
Route::get('/trendingDrinkList', 'ProductsController@trendingDrinkList');

// New API 5-03-2021
Route::get('/AllRestaurant', 'ProductsController@AllRestaurant');
Route::post('/drinkByRestaurant', 'ProductsController@drinkByRestaurant');


