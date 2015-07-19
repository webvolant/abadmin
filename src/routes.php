<?php



use webvolant\abadmin\Console;
use webvolant\abadmin\Http\Middleware;
use Illuminate\Support\Facades\View;




//login
\Route::post('administrator', array('as'=>'administrator','uses'=>'webvolant\abadmin\Http\Controllers\LoginController@login'));
\Route::get('administrator', array('as'=>'administrator','uses'=>'webvolant\abadmin\Http\Controllers\LoginController@login'));

//registration
\Route::post('admin_registration', array('as'=>'admin_registration','uses'=>'webvolant\abadmin\Http\Controllers\LoginController@register'));
\Route::get('admin_registration', array('as'=>'admin_registration','uses'=>'webvolant\abadmin\Http\Controllers\LoginController@register'));

//logout
\Route::get('logout', array('as'=>'logout','uses'=>'webvolant\abadmin\Http\Controllers\LoginController@logout'));
//Route::match(['get','post'],'/', array('as'=>'login','uses'=>'webvolant\abadmin\Http\Controllers\LoginController@login'));



//группа
\Route::group(['prefix'=>'admin','middleware' => 'webvolant\abadmin\Http\Middleware\CheckRoleManager'], function() {



//очистка кэша
\Route::get('cache/clear', array('as'=>'cache/clear','uses'=>'webvolant\abadmin\Http\Controllers\AdminController@clear'));

//копия бд artisan команда
\Route::get('db/backup', array('as'=>'db/backup','uses'=>'webvolant\abadmin\Http\Controllers\AdminController@dump'));
\Route::get('db/backup_app', array('as'=>'db/backup_app','uses'=>'webvolant\abadmin\Http\Controllers\AdminController@dump_app'));

//обзорная
\Route::get('/', array('as'=>'dashboard','uses'=>'webvolant\abadmin\Http\Controllers\AdminController@dashboard'));

//Пользователи
\Route::get('user/index', array('as'=>'user/index','uses'=>'webvolant\abadmin\Http\Controllers\UserController@index'));
\Route::get('user/add', array('as'=>'user/add','uses'=>'webvolant\abadmin\Http\Controllers\UserController@add'));
\Route::post('user/add', array('as'=>'user/add','uses'=>'webvolant\abadmin\Http\Controllers\UserController@add'));

\Route::get('user/edit/{link}', array('as'=>'user/edit','uses'=>'webvolant\abadmin\Http\Controllers\UserController@edit'))->where('link', '[A-Za-z-0-9]+');
\Route::post('user/edit/{link}', array('as'=>'user/edit','uses'=>'webvolant\abadmin\Http\Controllers\UserController@edit'))->where('link', '[A-Za-z-0-9]+');

\Route::get('user/delete/{link}', array('as'=>'user/delete','uses'=>'webvolant\abadmin\Http\Controllers\UserController@delete'))->where('link', '[A-Za-z-0-9]+');


//модуль html
    \Route::get('html/index', array('as'=>'html/index','uses'=>'webvolant\abadmin\Http\Controllers\HtmlController@index'));
    \Route::get('html/add', array('as'=>'html/add','uses'=>'webvolant\abadmin\Http\Controllers\HtmlController@add'));
    \Route::post('html/add', array('as'=>'html/add','uses'=>'webvolant\abadmin\Http\Controllers\HtmlController@add'));

    \Route::get('html/edit/{link}', array('as'=>'html/edit','uses'=>'webvolant\abadmin\Http\Controllers\HtmlController@edit'))->where('link', '[A-Za-z-0-9]+');
    \Route::post('html/edit/{link}', array('as'=>'html/edit','uses'=>'webvolant\abadmin\Http\Controllers\HtmlController@edit'))->where('link', '[A-Za-z-0-9]+');

    \Route::get('html/delete/{link}', array('as'=>'html/delete','uses'=>'webvolant\abadmin\Http\Controllers\HtmlController@delete'))->where('link', '[A-Za-z-0-9]+');



});