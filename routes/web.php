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


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'HomeContentsController@index2');

//DASHBOARD ROUTE
Route::get('admin/','AdminController@dashboard');


//TRAININGS AND SEMINARS ROUTE
Route::get('admin/trainings','TrainingsController@index');
Route::get('admin/viewEvent/{intEventId}','TrainingsController@viewEvent');
Route::post('admin/addEvent','TrainingsController@addEvent');
Route::post('admin/editEvent','TrainingsController@editEvent');
Route::post('admin/deleteEvent','TrainingsController@deleteEvent');
Route::get('admin/test','TrainingsController@test');

//DIRECTORS ROUTE
Route::get('admin/hospitaldirector','HospitalDirectorsController@index');
Route::get('admin/getModalEditDirector/{intDirectorId}','HospitalDirectorsController@getModalEditDirector');
Route::post('admin/addDirector','HospitalDirectorsController@addDirector');

//HOSPITALS ROUTE
Route::get('admin/hospital','HospitalsController@index');
Route::get('admin/getModalEditHospital/{intHospitalId}','HospitalsController@getModalEditHospital');
Route::post('admin/addHospital','HospitalsController@addHospital');

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


//NEWS ROUTES
Route::resource('news', 'NewsController');
