<?php

use Illuminate\Support\Facades\Route;
use App\Events\MassageEvent;

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

//\Illuminate\Support\Facades\Artisan::call('down');

Route::view('/', 'welcome');
use App\Models\Categorie;

Auth::routes(['verify' => true]);

Route::get('/category' , ['as' => 'category.index' , 'uses' => 'CategoryController@index']);

Route::group(['prefix' => '/api/' , 'namespace' => 'API'] , function (){
    Route::post('logout' , 'HelperFunctionsController@logout');
    Route::get('category' , ['as' => 'category' , 'uses' => 'CategoryController@getCategoryTypeStudent']);
    Route::get('all-category' , ['as' => 'all_category' , 'uses' => 'CategoryController@getAllCategory']);
    Route::get('library/{id}/{vue_capture?}' , ['as' => 'getLibraryTypeStudent.index'  , 'uses' => 'LibraryController@getLibraryTypeStudent']);
    Route::get('number-of-available-books-from-library' , ['as' => 'numberOfBooksAvailableFromLibrary.index'  , 'uses' => 'NumberOfBooksController@numberOfBooksAvailableFromLibrary']);
    Route::get('number-of-not-available-books-from-library' , ['as' => 'numberOfBooksNotAvailableFromLibrary.index'  , 'uses' => 'NumberOfBooksController@numberOfBooksNotAvailableFromLibrary']);
    Route::post('search-input-library/{id}' , 'SearchController@SearchInputLibrary');
    Route::post('search-type-library/{id}' , 'SearchController@SearchLibraryType');
    Route::get('total-number-of-category' , ['as' => 'totalNumberOfCategory.count' , 'uses' => 'NumberOfBooksController@totalNumberOfCategory']);
    Route::get('total-number-of-all-category' , ['as' => 'totalNumberOfAllCategory.count' , 'uses' => 'NumberOfBooksController@totalNumberOfAllCategory']);
    Route::get('getBooks/{id}' , 'BookController@getBooks');


    Route::post('/user-temporary-reservation' , ['as' => 'store.temporary_id' , 'uses' => 'BookController@userTemporaryReservation']);



});



Route::group(['prefix' => '/'] , function (){
    Route::get('/home/{vue_capture?}' , ['as' => 'home' , 'uses' => 'WEB\VueAppController@index'])->where('vue_capture', '[\/\w\.-]*');
    Route::get('/all-category/{vue_capture?}' , 'WEB\VueAppController@index')->where('vue_capture', '[\/\w\.-]*');
    Route::get('/library/{id}/{vue_capture?}' , 'WEB\VueAppController@index')->where('vue_capture', '[\/\w\.-]*');
    Route::get('/book/{vue_capture?}' , 'WEB\VueAppController@index')->where('vue_capture', '[\/\w\.-]*');
    Route::get('/my-profile' , 'API\MyProfileController@index');
    Route::patch('/update-account' , ['as' => 'update.my-account' , 'uses' =>'API\MyProfileController@update']);
});


Route::group(['prefix' => '/confirm-student-data'] , function (){
    Route::get('/' ,['middleware' => 'is_not_confirmed' , 'as' => 'confirm_student_data.index' , 'uses' => 'WEB\ConfirmStudentDataController@index']);
    Route::post('/',['middleware' => 'is_not_confirmed' , 'as' => 'confirm_student_data.store' , 'uses' => 'WEB\ConfirmStudentDataController@store']);
});


Route::get('/library/{id}' , ['as' => 'library.index' , 'uses' => 'LibraryController@index']);
Route::get('oauth/{provider}',  ['as' => 'oAuth' , 'uses' => 'Auth\LoginController@redirectToProvider']);
Route::get('oauth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');








