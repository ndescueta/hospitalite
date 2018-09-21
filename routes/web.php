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
    //INDEX DAPAT

});


Route::get('/', 'HomeContentsController@index');

//DASHBOARD ROUTE
Route::get('admin/','AdminController@dashboard');


//TRAININGS AND SEMINARS ROUTE
Route::get('admin/trainings','TrainingsController@index');
Route::get('admin/getModalEditEvent/{intEventId}','TrainingsController@getModalEditEvent');
Route::post('admin/addEvent','TrainingsController@addEvent');
Route::get('admin/test','TrainingsController@test');


//ADMIN HOMEPAGE ROUTE
Route::get('admin/homepage','AdminController@homepage');


//ADMIN HOMEPAGE VIEW ROUTE
Route::get('admin/homepageView','HomeContentsController@index');
//Route::get('admin/homepageView','HomeContentsController@index');
//Route::resource('admin','HomeContentsController');
//Route::get('/', 'HomeContentsController@index');
Route::post('/update', 'HomeContentsController@update');
Route::post('/updateImage', 'HomeContentsController@updateImage');
//Route::post('HomeContentsController@update', ['contentid' => $id, 'description' => $inventory_id ]);
// Route::get('admin', function () {
//     return view('admin');
// });
