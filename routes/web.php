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

Route::get('/', function(){

return redirect('/login');
	// if(session('login_status') != "loggedIn")
	// {
	// 	return redirect('/login');
	// }
	// else{
	// 	return redirect('/home');
	// }
});
Route::get('login', 'LoginController@index');
Route::post('login', 'LoginController@verify');

Route::get('logout', 'LogoutController@index')->name('logout');

Route::group(['middleware' => ['sess']], function () {
    Route::get('helper', 'HelperController@index');
    Route::get('home', 'HomeController@index');

    Route::get('member', 'MemberController@index')->name('member');

    Route::get('member/new', 'MemberController@create')->name('member.new');
    Route::post('/member/new', 'MemberController@store')->name('member.save');
    Route::get('/member/{id}/delete', 'MemberController@delete')->name('member.delete');
    Route::delete('/member/{id}/delete', 'MemberController@destroy');
    Route::get('/member/{id}', 'MemberController@show');
    Route::put('/member/{id}', 'MemberController@action');
    // Route::post('/member/{id}', 'MemberController@upload_image');
    Route::get('/member/{id}/edit', 'MemberController@edit');
    Route::put('/member/{id}/edit', 'MemberController@update');
    Route::get('/member/{id}/message', 'MemberController@message');
 
});