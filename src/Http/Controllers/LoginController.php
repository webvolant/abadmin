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


class LoginController extends Controller {

    public function index()
    {
        //$users = User::all();

        //return view('simpleAdmin::admin')->with('users', $users);
        return "Admin index";
    }

    public function register()
    {
        if (\Request::all()){
            $validator = \Validator::make(\Request::all(), [
                'email' => array('required','unique:users,email'),
                'name' => 'required',
                'password' => array('required','confirmed'),
                'password_confirmation' => array('required'),
                'term' => 'required'
            ]);

            if ($validator->fails()) {
                return \Redirect::route('admin_registration')->withErrors($validator)->withInput();
            }
            else{
                $user = new User();
                $user->email = \Request::get('email');
                $user->name = \Request::get('name');
                $user->password = \Hash::make(\Request::get('password'));
                $user->status = 1;
                $user->role = 0;
                $user->link = Helper::alias(\Request::get('name'));
                $user->save();
                return \Redirect::route('administrator');
            }
        }
        return view('abadmin::registration');
    }


    public function login()
    {
        if (\Request::all()){
            $validator = \Validator::make(\Request::all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return \Redirect::to('/administrator')->withErrors($validator)->withInput();
            }
            else{
                $email = \Request::get('email');
                $password = \Request::get('password');
                $user = \User::whereEmail($email)->first();
                    if ($user)
                        if (\Hash::check($password, $user->password)) {

                            //Если нужна еще роль то тут добавить условие с ролью
                            if (\Auth::attempt(['email' => $email, 'password' => $password, 'role' => '1'])
                                or (\Auth::attempt(['email' => $email, 'password' => $password, 'role' => '2'])))
                                {
                                    return \Redirect::route('dashboard');
                                }
                            else{
                                return \Redirect::route('administrator');
                            }

                        }
                        else{
                            $errors['password'] = "Неверный пароль";
                            return \Redirect::route('administrator')->withInput()->withErrors($errors);
                        }
                    else{
                        $errors['email'] = "Данный адрес не зарегестрирован";
                        return \Redirect::route('administrator')->withInput()->withErrors($errors);
                    }
                return view('abadmin::login');
            }
        }
        return view('abadmin::login');
    }


    public function logout(){
        \Auth::logout();
        return \Redirect::to('/administrator');
    }


} 