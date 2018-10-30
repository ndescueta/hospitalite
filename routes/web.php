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
/* REGISTRATION */
Route::post('/register', 'HospitalController@register');
Route::post('/login', 'HospitalController@login');

//DASHBOARD ROUTE
Route::get('admin/','AdminController@dashboard');

// SERVICES ROUTE
Route::get('admin/services', 'ServicesController@index');
Route::get('admin/getModalEditService/{intServiceId}','ServicesController@getModalEditService');
Route::post('admin/addService','ServicesController@addService');
Route::post('admin/editService','ServicesController@editService');
Route::post('admin/deleteService','ServicesController@deleteService');

//TRAININGS AND SEMINARS ROUTE
Route::get('admin/trainings','TrainingsController@index');
Route::get('admin/trainings/add','TrainingsController@addEventView');
Route::get('admin/trainings/edit/{intEventId}','TrainingsController@editEventView');
Route::get('admin/viewEvent/{intEventId}','TrainingsController@viewEvent');
Route::post('admin/addEvent','TrainingsController@addEvent');
Route::post('admin/editEvent','TrainingsController@editEvent');
Route::post('admin/deleteEvent','TrainingsController@deleteEvent');
Route::get('admin/test','TrainingsController@test');

//REQUESTS Route
/*Route::get('admin/hospitalrequest','RequestsController@index');
Route::get('admin/hospitalrequestShow/{intEventId}','RequestsController@show');*/
Route::resource('admin/hospitalrequest','RequestsController');
//PARTICIPANTS ROUTE
Route::resource('admin/hospitalrequestShow','ParticipantsController');
Route::post('admin/hospitalrequestShow/storeParticipants','ParticipantsController@store2');
Route::post('/updateRequest','ParticipantsController@updateRequest');

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

/* HOSPITAL SIDE */
// Main page route
Route::get('hosp/home','HospitalController@index');
Route::get('hosp/settings','HospitalController@index');
Route::get('hosp/services','HospitalController@index');
Route::get('hosp/seminars','HospitalController@seminars');


Route::resource('hospital_side', 'HospitalController');


//LOGIN CONTROLLER
Route::get('admin/login', 'LoginController@index');
Route::post('admin/login/checkLogin', 'LoginController@checkLogin');
Route::get('admin/logout', 'LoginController@logout');

//Pass Variable from View to Controller
Route::get('create/{intEventId}', [
    "uses" => 'HospitalController@create',
    "as" => 'create'
]);

//Admin Account Routes
Route::get('adminAccount/edit', 'AdminAccountController@edit');
Route::resource('adminAccount', 'AdminAccountController');
