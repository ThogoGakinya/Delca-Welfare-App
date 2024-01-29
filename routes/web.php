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
    return view('welcome_delca');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Admin rotes
Route::get('/members', 'Admin\AdminController@fetchMembers')->name('members');
Route::get('/add-member', 'Admin\AdminController@addMember')->name('add_member');
Route::get('/member/{id}', 'Admin\AdminController@editMember')->name('edit_member');
Route::get('/edit/member_contribution/{id}', 'Admin\AdminController@editMemberContribution')->name('edit_member_contribution');
Route::post('/submit-member', 'Admin\AdminController@submitMember')->name('submit_member');
Route::put('/update-member/{id}', 'Admin\AdminController@updateMember')->name('update_member');
Route::delete('/delete-member/{id}', 'Admin\AdminController@destroyMember')->name('delete_member');
Route::put('/update-contribution/{id}', 'Admin\AdminController@updateContribution')->name('update_contribution');
Route::post('/submit-member-contribution', 'Admin\AdminController@submitMemberContribution')->name('submit_member_contribution');
Route::get('/members/contribution', 'Admin\AdminController@fetchContribution')->name('members_contribution');

//Members routes
Route::get('/delca/members', 'Admin\AdminController@showMembers')->name('delca_members');
Route::get('/my_savings', 'Admin\AdminController@fetchmySavings')->name('my_contribution');
Route::get('/view_statement/{id}', 'Admin\AdminController@viewStatement')->name('view_statement');
