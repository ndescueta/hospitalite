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

//DASHBOARD ROUTE
Route::get('admin','AdminController@index');

//TRAININGS AND SEMINARS ROUTE
Route::get('admin/trainings','AdminController@trainings');

//ADMIN HOMEPAGE ROUTE
Route::get('admin/homepage','AdminController@homepage');

//ADMIN HOMEPAGE VIEW ROUTE
Route::get('admin/homepageView','HomeContentsController@index');
//Route::get('admin/homepageView','HomeContentsController@index');
//Route::resource('admin','HomeContentsController');
//Route::get('/', 'HomeContentsController@index');
Route::post('/update', 'HomeContentsController@update');
//Route::post('HomeContentsController@update', ['contentid' => $id, 'description' => $inventory_id ]);
// Route::get('admin', function () {
//     return view('admin');
// });
