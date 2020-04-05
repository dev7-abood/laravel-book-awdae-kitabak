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

use App\Models\User;
use App\Models\Categorie;
use App\Models\Library;
use App\Models\Book;
use Illuminate\Support\Facades\DB;


Route::get('/total-books-available',
    function () {
      $categorie = Categorie::findOrFail(1);
      $librarys_id = $categorie->librarys->map(function ($i) {
            return $i->pivot->library_id;
        });


     $count = 0;
     foreach ($librarys_id as $id)
     {
         $library =  Library::findOrFail($id);
         $count = $library->books->whereNull('user_id')->count() + $count;
     }
     return response(['total_number_of_books_available_for_categorie' => $count]);
    });






Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//
Route::get('/category' , ['as' => 'category.index' , 'uses' => 'CategoryController@index']);
//
Route::group(['prefix' => '/api/'] , function (){
    Route::post('/logout' , function (Request $request){
        if ($request->ajax()){
          auth()->logout();
        }
    });
    Route::get('/category' , ['as' => 'category' , 'uses' => 'API\CategoryController@getCategoryTypeStudent']);
    Route::get('/library/{id}/{vue_capture?}' , ['as' => 'getLibraryTypeStudent.index'  , 'uses' => 'API\LibraryController@getLibraryTypeStudent']);
    Route::get('/number-of-available-books-from-library' , ['as' => 'numberOfBooksAvailableFromLibrary.index'  , 'uses' => 'API\NumberOfBooksController@numberOfBooksAvailableFromLibrary']);
    Route::get('/number-of-not-available-books-from-library' , ['as' => 'numberOfBooksNotAvailableFromLibrary.index'  , 'uses' => 'API\NumberOfBooksController@numberOfBooksNotAvailableFromLibrary']);
    Route::post('/search-input-library/{id}' , 'API\SearchController@SearchInputLibrary');

});



Route::group(['prefix' => '/'] , function (){
    Route::get('/home/{vue_capture?}' , 'WEB\VueAppController@index')->where('vue_capture', '[\/\w\.-]*');
    Route::get('/library/{id}/{vue_capture?}' , 'WEB\VueAppController@index')->where('vue_capture', '[\/\w\.-]*');
});


Route::group(['prefix' => '/confirm-student-data'] , function (){
    Route::get('/' ,['middleware' => 'is_not_confirmed' , 'as' => 'confirm_student_data.index' , 'uses' => 'WEB\ConfirmStudentDataController@index']);
    Route::post('/',['middleware' => 'is_not_confirmed' , 'as' => 'confirm_student_data.store' , 'uses' => 'WEB\ConfirmStudentDataController@store']);
});


Route::get('/library/{id}' , ['as' => 'library.index' , 'uses' => 'LibraryController@index']);


Route::get('/books/{id_lib}/{id_cta}' , ['as' => 'books.index' , 'uses' => 'API\BookController@index']);


Route::get('/api/total-number-of-category' , ['as' => 'totalNumberOfCategory.count' , 'uses' => 'API\NumberOfBooksController@totalNumberOfCategory']);

Route::get('/test/' , function (){

    $job = (new \App\Jobs\TestJob(auth()->id()))->delay(Carbon\Carbon::now()->addSecond(60));

    dispatch($job);


});


