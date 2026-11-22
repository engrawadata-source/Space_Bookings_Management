<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\WebAuthController;
use App\Models\Center;
use App\Models\Employee;
use App\Models\Space;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

##public routes
Route::post('login',[WebAuthController::class,'login'])->name("login");
Route::get('login',[WebAuthController::class,'loginForm'])->name("login.form");


Route::post('logout',[WebAuthController::class,'logout'])
->middleware('auth')
->name("logout");

Route::middleware('auth')->group(function () {

     Route::middleware('admin.employee')->group(function () {
##dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');





##CENTERS

##store  center helper fun
Route::post('centers/create' , [CenterController::class , 'store'])
->name('centers.create');


#store form center
Route::get('centers/create' , function(){
    return view ('centers.create');

})->name('centers.createForm');


##get all centers
Route::get('/centers' , [CenterController::class , 'index'])
->name('centers.index');


#edit form center
Route::get('/centers/{id}/update' , function ($id) {
    $center = Center::query()->find($id);

    return view ('centers.edit' , compact('center'));

})->name('centers.editForm');

##update center helper fun
Route::put('/centers/{id}/update' , [CenterController::class , 'update'])
->name('centers.edit');

##get specific center's details
Route::get('centers/{id}/details' , [CenterController::class , 'getCenterDetails'])->name('centers.details');

##delete center
Route::delete('/centers/{id}/delete' , [CenterController::class , 'destroy'])
->name('centers.destroy');





##SPACES

##get all spaces in sys
Route::get('spaces', [SpaceController::class , 'index'])->name('spaces.index');

##get all spaces in specific center
Route::get('center/spaces' , [SpaceController::class , 'getAllSpacesByCenter'])->name('spaces.in.center');

##get space's details
Route::Get('spaces/{id}/details', [SpaceController::class , 'getAllSpaceDetails'])->name('spaces.details');

##helper fun store space
Route::post('spaces/create', [SpaceController::class , 'store'])->name('spaces.create');

#store form space
Route::get('spaces/create' , function(){
    return view ('spaces.create');

})->name('spaces.createForm');



#edit form space
Route::get('/spaces/{id}/update' , function ($id) {
    $space = Space::query()->find($id);

    return view ('spaces.edit' , compact('space'));

})->name('spaces.editForm');

##update sapce helper fun
Route::put('/spaces/{id}/update' , [SpaceController::class , 'update'])
->name('spaces.edit');

##delete sapce
Route::delete('/spaces/{id}/delete' , [SpaceController::class , 'destroy'])
->name('spaces.destroy');







##bookings

#get all booking in sys
Route::get('bookings/', [BookingController::class , 'index'])->name('bookings.index');

##get booking by status
Route::get('/bookings/status/{status}', [BookingController::class, 'getBookingsByStatus'])
    ->name('bookings.byStatus');


##get booking details
Route::get('bookings/{id}/details' , [BookingController::class , 'getBookingDetails'])->name('bookings.details');

##confirm booking
Route::put('/bookings/{id}/confirm',[BookingController::class, 'confirmBooking'])
    ->name('bookings.confirm');

##reject booking
Route::put('/bookings/{id}/reject',[BookingController::class, 'rejectBooking'])
    ->name('bookings.reject');

   });



  // ADMIN ONLY

    Route::middleware('admin')->group(function () {

//EMPLOYEE
##store  employee helper fun
Route::post('employees/create' , [EmployeeController::class , 'store'])
->name('employees.create');


#store form employee
Route::get('employees/create' , function(){
    return view ('employees.create');

})->name('employees.createForm');


##get all employees
Route::get('/employees' , [EmployeeController::class , 'index'])
->name('employees.index');


#edit form employee
Route::get('/employees/{id}/update' , function ($id) {
    $employee = Employee::query()->find($id);

    return view ('employees.edit' , compact('employee'));

})->name('employees.editForm');

##update employee helper fun
Route::put('/employees/{id}/update' , [EmployeeController::class , 'update'])
->name('employees.edit');


##delete emp  & user at same time
Route::delete('/employees/{id}/delete' , [EmployeeController::class , 'destroy'])
->name('employees.destroy');



 });

});

