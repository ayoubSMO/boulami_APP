<?php
use Illuminate\Support\Facades\Route;

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
// tbddel 
//Route::get('/', 'App\Http\Controllers\pageController@index');
Route::get('/about', 'App\Http\Controllers\pageController@about');

//-------------------doctors Routes---------------
// Route::get('/doctors', 'App\Http\Controllers\DoctorController@index');
// Route::get('/doctors/create', 'App\Http\Controllers\DoctorController@create');
// Route::post('/doctors', 'App\Http\Controllers\DoctorController@store');
// Route::get('/doctors/{doctor}', 'App\Http\Controllers\DoctorController@show');
// Route::get('/doctors/{doctor}/edit', 'App\Http\Controllers\DoctorController@edit');
// Route::patch('/doctors/{doctor}', 'App\Http\Controllers\DoctorController@update');
// Route::delete('/doctors/{doctor}', 'App\Http\Controllers\DoctorController@destroy');

Route::resource('doctors', 'App\Http\Controllers\DoctorController');
	//----------------Rest for doctors Table-----------------------
Route::get('/api/doctors/limit/{limit?}', 'App\Http\Controllers\DoctorController@restIndex');
Route::get('/api/doctors/{doctor}', 'App\Http\Controllers\DoctorController@restShow');
Route::post('/api/doctors', 'App\Http\Controllers\DoctorController@restStore');
Route::patch('/api/doctors/{doctor}', 'App\Http\Controllers\DoctorController@restUpdate');
Route::delete('/api/doctors/{doctor}', 'App\Http\Controllers\DoctorController@restDestroy');
//-------------------End doctors Routes------------

//-------------------ords Routes---------------
Route::get('/ords', 'App\Http\Controllers\OrdController@index');
Route::get('/ords/create', 'App\Http\Controllers\OrdController@create');
Route::post('/ords', 'App\Http\Controllers\OrdController@store');
Route::get('/ords/{ord}', 'App\Http\Controllers\OrdController@show');
Route::get('/ords/{ord}/edit', 'App\Http\Controllers\OrdController@edit');
Route::patch('/ords/{ord}', 'App\Http\Controllers\OrdController@update');
Route::delete('/ords/{ord}', 'App\Http\Controllers\OrdController@destroy');
	//----------------Rest for ords Table-----------------------
Route::get('/api/ords/limit/{limit?}', 'App\Http\Controllers\OrdController@restIndex');
Route::get('/api/ords/{ord}', 'App\Http\Controllers\OrdController@restShow');
Route::post('/api/ords', 'App\Http\Controllers\OrdController@restStore');
Route::patch('/api/ords/{ord}', 'App\Http\Controllers\OrdController@restUpdate');
Route::delete('/api/ords/{ord}', 'App\Http\Controllers\OrdController@restDestroy');



//-------------------patients Routes---------------
// Route::get('/patients', 'App\Http\Controllers\PatientController@index');
// Route::get('/patients/create', 'App\Http\Controllers\PatientController@create');
// Route::post('/patients', 'App\Http\Controllers\PatientController@store');
// Route::get('/patients/{patient}', 'App\Http\Controllers\PatientController@show');
// Route::get('/patients/{patient}/edit', 'App\Http\Controllers\PatientController@edit');
// Route::patch('/patients/{patient}', 'App\Http\Controllers\PatientController@update');
// Route::delete('/patients/{patient}', 'App\Http\Controllers\PatientController@destroy');

Route::resource('patients', 'App\Http\Controllers\PatientController');
	//----------------Rest for patients Table-----------------------
Route::get('/api/patients/limit/{limit?}', 'App\Http\Controllers\PatientController@restIndex');
Route::get('/api/patients/{patient}', 'App\Http\Controllers\PatientController@restShow');
Route::post('/api/patients', 'App\Http\Controllers\PatientController@restStore');
Route::patch('/api/patients/{patient}', 'App\Http\Controllers\PatientController@restUpdate');
Route::delete('/api/patients/{patient}', 'App\Http\Controllers\PatientController@restDestroy');
//-------------------End patients Routes------------

Route::resource('rdv', 'App\Http\Controllers\R_d_v_Controller');
//-------------------r_d_v_s Routes---------------
// Route::get('/r_d_v_s', 'App\Http\Controllers\R_d_v_Controller@index');
// Route::get('/r_d_v_s/create', 'App\Http\Controllers\R_d_v_Controller@create');
// Route::post('/r_d_v_s', 'App\Http\Controllers\R_d_v_Controller@store');
// Route::get('/r_d_v_s/{r_d_v_}', 'App\Http\Controllers\R_d_v_Controller@show');
// Route::get('/r_d_v_s/{r_d_v_}/edit', 'App\Http\Controllers\R_d_v_Controller@edit');
// Route::patch('/r_d_v_s/{r_d_v_}', 'App\Http\Controllers\R_d_v_Controller@update');
// Route::delete('/r_d_v_s/{r_d_v_}', 'App\Http\Controllers\R_d_v_Controller@destroy');
	//----------------Rest for r_d_v_s Table-----------------------
Route::get('/api/r_d_v_s/limit/{limit?}', 'App\Http\Controllers\R_d_v_Controller@restIndex');
Route::get('/api/r_d_v_s/{r_d_v_}', 'App\Http\Controllers\R_d_v_Controller@restShow');
Route::post('/api/r_d_v_s', 'App\Http\Controllers\R_d_v_Controller@restStore');
Route::patch('/api/r_d_v_s/{r_d_v_}', 'App\Http\Controllers\R_d_v_Controller@restUpdate');
Route::delete('/api/r_d_v_s/{r_d_v_}', 'App\Http\Controllers\R_d_v_Controller@restDestroy');
//-------------------End r_d_v_s Routes------------


//-------------------timeslots Routes---------------
// Route::get('/timeslots', 'App\Http\Controllers\TimeslotController@index');
// Route::get('/timeslots/create', 'App\Http\Controllers\TimeslotController@create');
// Route::post('/timeslots', 'App\Http\Controllers\TimeslotController@store');
// Route::get('/timeslots/{timeslot}', 'App\Http\Controllers\TimeslotController@show');
// Route::get('/timeslots/{timeslot}/edit', 'App\Http\Controllers\TimeslotController@edit');
// Route::patch('/timeslots/{timeslot}', 'App\Http\Controllers\TimeslotController@update');
// Route::delete('/timeslots/{timeslot}', 'App\Http\Controllers\TimeslotController@destroy');
Route::resource('timeslots', 'App\Http\Controllers\TimeslotController');
	//----------------Rest for timeslots Table-----------------------
Route::get('/api/timeslots/limit/{limit?}', 'App\Http\Controllers\TimeslotController@restIndex');
Route::get('/api/timeslots/{timeslot}', 'App\Http\Controllers\TimeslotController@restShow');
Route::post('/api/timeslots', 'App\Http\Controllers\TimeslotController@restStore');
Route::patch('/api/timeslots/{timeslot}', 'App\Http\Controllers\TimeslotController@restUpdate');
Route::delete('/api/timeslots/{timeslot}', 'App\Http\Controllers\TimeslotController@restDestroy');
//-------------------End timeslots Routes------------


//-------------------users Routes---------------
Route::get('/users', 'App\Http\Controllers\UserController@index');
Route::get('/users/create', 'App\Http\Controllers\UserController@create');
Route::post('/users', 'App\Http\Controllers\UserController@store');
Route::get('/users/{user}', 'App\Http\Controllers\UserController@show');
Route::get('/users/{user}/edit', 'App\Http\Controllers\UserController@edit');
Route::patch('/users/{user}', 'App\Http\Controllers\UserController@update');
Route::delete('/users/{user}', 'App\Http\Controllers\UserController@destroy');
	//----------------Rest for users Table-----------------------
Route::get('/api/users/limit/{limit?}', 'App\Http\Controllers\UserController@restIndex');
Route::get('/api/users/{user}', 'App\Http\Controllers\UserController@restShow');
Route::post('/api/users', 'App\Http\Controllers\UserController@restStore');
Route::patch('/api/users/{user}', 'App\Http\Controllers\UserController@restUpdate');
Route::delete('/api/users/{user}', 'App\Http\Controllers\UserController@restDestroy');
//-------------------End users Routes------------
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
