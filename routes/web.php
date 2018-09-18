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

<<<<<<< HEAD
Route::get('/', function () {
    return view('welcome');
=======
<<<<<<< HEAD
Route::get('/', function () {
    //INDEX DAPAT
>>>>>>> a8bfc4ccac48bacc183d1ade2521ca7a9754cf75
});


=======
Route::get('/', 'HomeContentsController@index');

//DASHBOARD ROUTE
Route::get('admin/','AdminController@dashboard');
>>>>>>> 1cd5744fc11a4f36eadcaafc4d8b264868f0ed12

//TRAININGS AND SEMINARS ROUTE
Route::get('admin/trainings','TrainingsController@index');
Route::get('admin/getModalEditEvent/{intEventId}','TrainingsController@getModalEditEvent');
Route::post('admin/addEvent','TrainingsController@addEvent');
Route::get('admin/test','TrainingsController@test');


//ADMIN HOMEPAGE ROUTE
Route::get('admin/homepage','AdminController@homepage');

<<<<<<< HEAD
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
=======

>>>>>>> a8bfc4ccac48bacc183d1ade2521ca7a9754cf75
