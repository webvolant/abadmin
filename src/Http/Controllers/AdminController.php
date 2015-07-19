<?php
/**
 * Created by PhpStorm.
 * User: barkalovlab
 * Date: 24.06.15
 * Time: 14:17
 */

namespace webvolant\abadmin\Http\Controllers;

use App\Http\Controllers\Controller;
use \View;
use \Request;
use webvolant\abadmin\Models\User;

class AdminController extends Controller {

    public function dashboard()
    {
        return view('abadmin::admin');
    }

    public function clear()
    {
        \Artisan::call('cache:clear');//, ['--option' => 'foo']);
        //return \Redirect::intended();
        return view('abadmin::admin',array('alert_success'=>'Вы только что успешно очистили кэш!'));
    }

    public function dump()
    {
        //\Artisan::call('db:backup');//, ['--option' => 'foo']);
        //return \Redirect::intended();
        return view('abadmin::admin',array('alert_success'=>'Вы создали файл резервной копии вашей Базы Данных!'));
    }

    public function dump_app()
    {
        \Artisan::call('backup:run');//, ['--option' => 'foo']);
        return view('abadmin::admin',array('alert_success'=>'Вы только что создали резервную копию приложения!'));
    }




} 