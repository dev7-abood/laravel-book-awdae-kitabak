<?php

use Illuminate\Support\Facades\Route;

use Carbon\Carbon;
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

use App\Models\Library;
use App\Models\Categorie;
use App\Models\User;
use App\Models\Book;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/category' , ['as' => 'category.index' , 'uses' => 'CategoryController@index']);


Route::get('/confirm-student-data' , ['as' => 'confirm_student_data.index' , 'uses' => 'Web\ConfirmStudentDataController@index' , 'middleware' => 'is_not_confirmed']);


Route::group(['prefix' => '/confirm-student-data' , 'middleware' => 'auth'] , function (){
    Route::get('/' ,['middleware' => 'is_not_confirmed' , 'as' => 'confirm_student_data.index' , 'uses' => 'ConfirmStudentDataController@index']);
    Route::post('/',['middleware' => 'is_not_confirmed' , 'as' => 'confirm_student_data.store' , 'uses' => 'ConfirmStudentDataController@store']);
});


Route::get('/library/{id}' , ['as' => 'library.index'  , 'uses' => 'LibraryController@index'])->middleware('check_type_categories');


Route::get('/books/{id_lib}/{id_cta}' , ['as' => 'books.index' , 'uses' => 'API\BookController@index']);


Route::get('/home/{vue_capture?}' , 'VueAppController@index')->where('vue_capture', '[\/\w\.-]*');


