<?php

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
        Route::get('all-course','CourseController@getAllCourses')->middleware('auth:api');
        Route::post('/save-course','CourseController@savedCourse')->middleware('auth:api');
        Route::get('student-profile','StudentController@studentProfile');

    });


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// //saved_course
// Route::get('/saved-course','');
// //all_course

// //student_profile





