<?php
use App\Notifications\InvoicePaid;
use App\Task;
use App\User;
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
route::resource('tasks','TasksController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index', 'TasksController@index')->name('index');

Route::get('service/show{id}', 'AvatarController@index')->name('show');

Route::get('service/create', 'TasksController@create');

Route::get('service/delete', 'TasksController@delete');