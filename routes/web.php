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


Route::get('/library-type' , 'LibraryTypeController@index');


Route::get('/confirm-student-data' , ['as' => 'confirm_student_data.index' , 'uses' => 'ConfirmStudentDataController@index' , 'middleware' => 'is_not_confirmed']);


Route::group(['prefix' => '/confirm-student-data' , 'middleware' => 'auth'] , function (){
    Route::get('/' ,['middleware' => 'is_not_confirmed' , 'as' => 'confirm_student_data.index' , 'uses' => 'ConfirmStudentDataController@index']);
    Route::post('/',['middleware' => 'is_not_confirmed' , 'as' => 'confirm_student_data.store' , 'uses' => 'ConfirmStudentDataController@store']);
});


Route::get('/categories/{cat}' , ['as' => 'library.index' , 'uses' => 'CategoriesController@index'])->middleware('check_type_categories');

Route::get('/hell' , function (){
    $user = User::findOrFail(auth()->id());
    $library_type = $user->categories;

//    foreach ($library_type as  $index=>$lab){
//        echo $lab->pivot->categorie_id;
//    }

    $array = ['blue', 'red','green','red'];

    $key = in_array('gree', $array); // $key = 2;

    if ($key == true){
        echo "true";
    }else {
        echo "false";
    }


//    echo "<br/>";
//  echo  $key = array_search('red', $array);   // $key = 1;


//    $library = Library::find(3);
//    return $library->books;
});
