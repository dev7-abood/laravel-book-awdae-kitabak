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
Route::get('/library-type' , ['as' => 'library_type.index' , 'uses' => 'LibraryTypeController@index']);


Route::get('/confirm-student-data' , ['as' => 'confirm_student_data.index' , 'uses' => 'ConfirmStudentDataController@index' , 'middleware' => 'is_not_confirmed']);


Route::group(['prefix' => '/confirm-student-data' , 'middleware' => 'auth'] , function (){
    Route::get('/' ,['middleware' => 'is_not_confirmed' , 'as' => 'confirm_student_data.index' , 'uses' => 'ConfirmStudentDataController@index']);
    Route::post('/',['middleware' => 'is_not_confirmed' , 'as' => 'confirm_student_data.store' , 'uses' => 'ConfirmStudentDataController@store']);
});


Route::get('/categories/{id}' , ['as' => 'library.index'  , 'uses' => 'CategoriesController@index'])->middleware('check_type_categories');


Route::get('/library/{id_cta}/{id_lib}' , function ($id_cta,$id_lib){

    $categories = Categorie::findOrFail($id_cta);
    $library = $categories->librarys;


    $data = $library->map(function ($data){
        return $data->pivot->library_id;
    });


    if (!in_array($id_lib , $data->toArray())){
        return redirect('/');
    }

});
