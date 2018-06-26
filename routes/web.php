<?php

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

Route::resource('/students', 'StudentController')->middleware('auth');
Route::resource('/guardians', 'GuardianController')->middleware('auth');
Route::resource('/levels', 'LevelController')->middleware('auth');
Route::resource('/yeargroups', 'YearGroupController')->middleware('auth');
Route::resource('/terms', 'TermController')->middleware('auth');
Route::resource('/teachers', 'TeacherController')->middleware('auth');
Route::resource('/subjects', 'SubjectController')->middleware('auth');
Route::resource('/subjectTeachers', 'SubjectTeacherController')->middleware('auth');
Route::resource('/formTeachers', 'FormTeacherController')->middleware('auth');
Route::resource('/fees', 'FeeController')->middleware('auth');
Route::resource('/feetypes', 'FeeTypeController')->middleware('auth');
Route::resource('/payments', 'PaymentController')->middleware('auth');
Route::resource('/results', 'ResultController')->except('show')->middleware('auth');
Route::resource('/termResults', 'TermResultController')->middleware('auth');
Route::get('/results/{year_group_id}/{term_id}/{subject_id}', 'ResultController@show')->middleware('auth')->name('results.show');
Route::post('/promotions', 'PromotionController@store')->middleware('auth')->name('promotions.store');
Route::post('/promotions/bulkPromote', 'PromotionController@bulkPromote')->middleware('auth')->name('promotions.bulkPromote');
Route::put('/promotions/{promotion}', 'PromotionController@update')->middleware('auth')->name('promotions.update');
Route::get('/promotions/{id}', 'PromotionController@show')->middleware('auth')->name('promotions.show');
Route::get('/promotions/{level?}/{yeargroup?}', 'PromotionController@getPromotion')->middleware('auth')->name('promotions.get');
Route::get('/allStudent/{level?}', 'PdfController@allStudent')->middleware('auth')->name('pdf.allStudent');
Route::get('/classStudents/{level_id}/{sesion_id}/', 'PdfController@classStudents')->middleware('auth');
Route::post('/paymentDetails', 'PdfController@paymentDetails')->middleware('auth')->name('pdf.paymentDetails');
Route::post('/bulkImport', 'StudentController@uploadStudents')->middleware('auth')->name('import.students');
Route::get('/importStudents', 'StudentController@importStudents')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
