<?php

use App\Http\Controllers\Api\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(
    [
        'namespace' =>'Api',
    ],function () {
        Route::post('/register', 'AuthController@register');
        Route::post('/login', 'AuthController@login');
        
        Route::get('/books', 'BooksController@index');
        Route::get('/book/{slug}', 'BooksController@getBookBySlug');

        Route::get('/videos', 'VideoController@index');
        Route::get('/video/{slug}', 'VideoController@getVideoBySlug');
        
        Route::get('/packages', 'PackageController@index');
        Route::get('/package/{slug}', 'PackageController@getPackageBySlug');
        Route::group(
        [
            'middleware'=>'auth:api'
        ],function(){
            Route::get('all-course','CourseController@getAllCourses');
            Route::post('/save-course','CourseController@savedCourse');
            Route::get('/delete-course','CourseController@deleteCourse');
            Route::get('student-profile','StudentController@studentProfile');
            Route::put('student-profile/update','StudentController@studentProfileUpdate');
            Route::get('activate/user','StudentController@activateUser');
            Route::get('myOrders','OrderController@myOrder');
            Route::post('orderStore','OrderController@orderStore');
        });
      
    }); 


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// //saved_course
// Route::get('/saved-course','');
// //all_course

// //student_profile





