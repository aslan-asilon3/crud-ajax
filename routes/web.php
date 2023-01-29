<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AllotmentController;
use App\Models\RoomRatePlan;
use App\Models\RatePlan;


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


Route::controller(EmployeeController::class)->group(function () {
    Route::get('/employee', 'index');
    Route::post('/employee/store', 'store');
    // Route::get('/employees/{id}', 'show');
    // Route::post('/orders', 'store');
});


Route::get('product-list', [ProductController::class, 'index']);
Route::get('product-list/{id}/edit', [ProductController::class, 'edit']);
Route::post('product-list/store', [ProductController::class, 'store']);
Route::get('product-list/delete/{id}', [ProductController::class, 'destroy']);



Route::get('allotments', [AllotmentController::class, 'index']);


Route::get('getRateplan/{id}', function ($id) {
    // $course = Course::where('category_id',$id)->get();
    // return response()->json($course);
    $rateplan = RatePlan::where('id',$id)->get();
    return response()->json($rateplan);
});

// Route::get('students', [StudentController::class, 'index']);
// Route::get('fetch-students',[StudentController::class, 'store']);
// Route::post('students', [StudentController::class , 'store']);
// Route::get('edit-student/{id}', [StudentController::class, 'edit']);
// Route::put('update-student/{id}', [StudentController::class, 'update']);
// Route::delete('delete-student/{id}', [StudentController::class, 'destroy']);





