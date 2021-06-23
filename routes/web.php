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

Auth::routes();


 /**
 * Display a listing of the resource.
 *
 * @param 
 */

 //  Reel Good Pages  //

  Route::get('/discover','ShowController@index');
  Route::redirect('/','/discover');
 /**
  * @param sort => popular,outcomming,etc..
  * @param page => [1-9];
  */
  //show pages
  Route::get('/{show}/{sort?}/{page?}/{genre?}','ShowController@shows')->where(['page'=>'[0-9]+','show'=>'tv|movie'])->name('show');
  //display page 
  Route::get('/display/{type}/{id}','ShowController@display')->where(['type'=>'movie|tv','id'=>'[0-9]+'])->name('display');
  //search page
  /**
   * @param type => query,genre
   * @param keyword => query that search on
   */
  Route::get('/search/{keyword}/{type?}/{page?}/{show?}/{genre?}','ShowController@search')->where(['type'=>'query|genre','page'=>'[0-9]+']);
  //  Profile  //
 /**
  *@param drive => google , github
  */
  Route::get('/socialite/{drive}','userManagment@social');
  Route::get('/socialite/{drive}/redirect','userManagment@reSocial');
  Route::get('/profile','userManagment@profile')->middleware('auth')->name('profile');
  Route::put('/changeun','userManagment@changename')->name('updatename');
  Route::put('/changeps','userManagment@changepassword')->name('updatepassword');
  Route::delete('/delete','userManagment@delete')->name('accdelete');

  Route::post('/action/{type}/{show}/{shtype}','ActionController@create');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('migrate', function () {
  Artisan::call('migrate');

  return 'Database migration success.';
});