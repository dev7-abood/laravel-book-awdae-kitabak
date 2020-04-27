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
Route::view('/', 'welcome');
use App\Models\Categorie;

Auth::routes(['verify' => true]);

Route::get('/category' , ['as' => 'category.index' , 'uses' => 'CategoryController@index']);

Route::group(['prefix' => '/api/'] , function (){
    Route::post('logout' , 'API\HelperFunctionsController@logout');
    Route::get('category' , ['as' => 'category' , 'uses' => 'API\CategoryController@getCategoryTypeStudent']);
    Route::get('all-category' , ['as' => 'all_category' , 'uses' => 'API\CategoryController@getAllCategory']);
    Route::get('library/{id}/{vue_capture?}' , ['as' => 'getLibraryTypeStudent.index'  , 'uses' => 'API\LibraryController@getLibraryTypeStudent']);
    Route::get('number-of-available-books-from-library' , ['as' => 'numberOfBooksAvailableFromLibrary.index'  , 'uses' => 'API\NumberOfBooksController@numberOfBooksAvailableFromLibrary']);
    Route::get('number-of-not-available-books-from-library' , ['as' => 'numberOfBooksNotAvailableFromLibrary.index'  , 'uses' => 'API\NumberOfBooksController@numberOfBooksNotAvailableFromLibrary']);
    Route::post('search-input-library/{id}' , 'API\SearchController@SearchInputLibrary');
    Route::post('search-type-library/{id}' , 'API\SearchController@SearchLibraryType');
    Route::get('total-number-of-category' , ['as' => 'totalNumberOfCategory.count' , 'uses' => 'API\NumberOfBooksController@totalNumberOfCategory']);
    Route::get('total-number-of-all-category' , ['as' => 'totalNumberOfAllCategory.count' , 'uses' => 'API\NumberOfBooksController@totalNumberOfAllCategory']);
});



Route::group(['prefix' => '/'] , function (){
    Route::get('/home/{vue_capture?}' , ['as' => 'home' , 'uses' => 'WEB\VueAppController@index'])->where('vue_capture', '[\/\w\.-]*');
    Route::get('/all-category/{vue_capture?}' , 'WEB\VueAppController@index')->where('vue_capture', '[\/\w\.-]*');
    Route::get('/library/{id}/{vue_capture?}' , 'WEB\VueAppController@index')->where('vue_capture', '[\/\w\.-]*');
});


Route::group(['prefix' => '/confirm-student-data'] , function (){
    Route::get('/' ,['middleware' => 'is_not_confirmed' , 'as' => 'confirm_student_data.index' , 'uses' => 'WEB\ConfirmStudentDataController@index']);
    Route::post('/',['middleware' => 'is_not_confirmed' , 'as' => 'confirm_student_data.store' , 'uses' => 'WEB\ConfirmStudentDataController@store']);
});


Route::get('/library/{id}' , ['as' => 'library.index' , 'uses' => 'LibraryController@index']);


Route::get('/books/{id_lib}/{id_cta}' , ['as' => 'books.index' , 'uses' => 'API\BookController@index']);

use App\Http\Resources\CategorysResource;

Route::get('/hell' , 'API\BookController@getBooks');


Route::get('oauth/{provider}',  ['as' => 'oAuth' , 'uses' => 'Auth\LoginController@redirectToProvider']);
Route::get('oauth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


