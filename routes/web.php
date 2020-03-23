<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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

Auth::routes();

Route::get('/category' , ['as' => 'category.index' , 'uses' => 'CategoryController@index']);


Route::group(['prefix' => '/api/'] , function (){
    Route::post('/logout' , function (Request $request){
        if ($request->ajax()){
            auth()->logout();
        }
    });
    Route::get('category' , ['as' => 'category' , 'uses' => 'API\CategoryController@getCategoryTypeStudent']);
    Route::get('/library/{id}' , ['as' => 'getLibraryTypeStudent.index'  , 'uses' => 'API\LibraryController@getLibraryTypeStudent'])
        ->middleware('check_type_categories');
    Route::get('/book-number-available' , ['as' => 'numberOfBooksAvailable.index'  , 'uses' => 'API\LibraryController@numberOfBooksAvailable']);
});


Route::group(['prefix' => '/confirm-student-data' , 'middleware' => 'auth'] , function (){
    Route::get('/' ,['middleware' => 'is_not_confirmed' , 'as' => 'confirm_student_data.index' , 'uses' => 'WEB\ConfirmStudentDataController@index']);
    Route::post('/',['middleware' => 'is_not_confirmed' , 'as' => 'confirm_student_data.store' , 'uses' => 'WEB\ConfirmStudentDataController@store']);
});


Route::get('/library/{id}' , ['as' => 'library.index'  , 'uses' => 'LibraryController@index'])->middleware('check_type_categories');


Route::get('/books/{id_lib}/{id_cta}' , ['as' => 'books.index' , 'uses' => 'API\BookController@index']);


Route::get('/home/{vue_capture?}' , 'VueAppController@index')->where('vue_capture', '[\/\w\.-]*');


