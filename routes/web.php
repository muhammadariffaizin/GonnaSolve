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

Auth::routes();


Route::get('/', function() {
    if(Auth::check()) {
        return redirect()->route('home');
    } else {
        return view('welcome');
    }
})->name('index');

Route::get('/dashboard', 'ProfileController@index')->name('dashboard');
Route::get('/home', 'QuestionController@index')->name('home');
Route::prefix('question')->group(function() {
    Route::get('/{id}', 'QuestionController@show_detail_question')->name('question.show_detail');
    Route::post('/create', 'QuestionController@create')->name('question.create');
    Route::get('/edit/{id}', 'QuestionController@edit')->name('question.edit');
    Route::post('/update', 'QuestionController@update')->name('question.update');
    Route::get('/delete/{id}', 'QuestionController@delete')->name('question.delete');
});
Route::get('/search', 'QuestionController@search')->name('search');

Route::prefix('answer')->group(function() {
    Route::get('/show_all', 'AnswerController@index')->name('answer.show_all');
    Route::post('/create', 'AnswerController@create')->name('answer.create');
    Route::get('/edit/{id}', 'AnswerController@edit')->name('answer.edit');
    Route::post('/update', 'AnswerController@update')->name('answer.update');
    Route::get('/delete/{id}', 'AnswerController@delete')->name('answer.delete');
});

Route::prefix('profile')->group(function() {
    Route::get('/edit', 'ProfileController@edit')->name('profile.edit');
    Route::post('/update', 'ProfileController@update')->name('profile.update');
});
