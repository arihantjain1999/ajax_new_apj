<?php

use App\Family;
use App\Http\Controllers\StudentController;
    use App\Http\Controllers\SubjectController;
    use App\Http\Controllers\FamilyController;
use App\Student;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/query', function () {
//    $students =  DB::table('students')->where('name' , '=' , "arihant jain")->get();
//     return $students;
// });


Auth::routes();
Route::post('students/deleteall', 'StudentController@deleteall');
Route::post('students/updateall', 'StudentController@updateall');
// Route::get('students/list', ['StudentController@getstudents'])->name('students.list');
Route::get('queries', function(){
    // dd(DB::table('students')->pluck('name' , 'username'));
    // dd(DB::table('students')->select('email' , 'username' , 'dob')->where('email' , 'like' , '%yahoo.com%')->whereYear('dob' , '1973')->get());
    // dd(DB::table('students')->select('email' , 'username' , 'dob')->whereYear('dob' , '1973')->get());
    // dd(DB::table('students')->select('dob' , 'email' , 'name')->where('email' , 'like' , '%yahoo.com')->get());
    // dd(DB::table('student_subject')->selectRaw('count(*) as count , student_id')->groupBy('student_id')->get());
    $students=Student::find(200);
    $family=Family::find(9);
    dd( $students, $students->family , $family , $family->student);
});
Route::resource('students', 'StudentController');
Route::resource('family', 'FamilyController');
Route::resource('subject', 'SubjectController');
Route::get('/home', 'HomeController@index')->name('home');
// Route::get('students', [StudentController::class, 'index'])->name('students.index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
