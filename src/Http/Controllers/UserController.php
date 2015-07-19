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


class UserController extends Controller {

    public function index()
    {
        $items = User::all();
        return view('abadmin::user.index',array('users' => $items));
    }

    public function add()
    {
        if (\Request::all()){
            $validator = \Validator::make(\Request::all(), [
                'email' => array('required','unique:users,email'),
                'name' => 'required',
                'password' => array('required','confirmed'),
                'password_confirmation' => array('required'),
                'role' => 'required',
                'status' => 'required',
            ]);

            if ($validator->fails()) {
                return \Redirect::route('user/add')->withErrors($validator)->withInput();
            }
            else{
                //dd(\Request::all());
                $item = new User();
                if (\Request::hasFile('logo')) {
                    $dir = '/uploads/users'.date('/Y/'.$item->id.'/');
                    $filename = 'logo'.'.jpg';
                    //var_dump($dir);
                    //die();

                    $image = \Request::file('logo');
                    $image->move(public_path().$dir, $filename);
                    //$img = Image::make(storage_path().$dir.$filename);
                    //$img->resize(140, 180);
                    //$img->insert(public_path().'/template_image/watermark.png');
                    //$img->save(public_path().$dir.'thumb_'.$filename);

                    //$item->logo = $dir.'thumb_'.$filename;

                    $item->logo = $dir.$filename;
                    //$item->save();
                }

                $item->name = \Request::get('name');
                $item->email = \Request::get('email');
                $item->password = \Crypt::encrypt(\Request::get('password'));
                $item->phone = \Request::get('phone');
                $item->description = \Request::get('description');

                $item->status = \Request::get('status');
                $item->role = \Request::get('role');
                $item->link = Helper::alias(\Request::get('name'));
                $item->keywords = \Request::get('keywords');
                $item->save();

                return \Redirect::route('user/index');
            }
        }
        return view('abadmin::user.add');
    }

    public function edit($link)
    {
        $item = User::find($link);

        if (\Request::all()){
            $validator = \Validator::make(\Request::all(), [
                'email' => array('required'),
                'name' => 'required',
                'password' => array('required','confirmed'),
                'password_confirmation' => array('required'),
                'role' => 'required',
                'status' => 'required',
            ]);

            if ($validator->fails()) {
                return \Redirect::route('user/edit',array('item'=>$item))->withErrors($validator)->withInput();
            }
            else{
                //dd(\Request::all());
                if (\Request::hasFile('logo')) {
                    $dir = '/uploads/users'.date('/Y/'.$item->id.'/');
                    $filename = 'logo'.'.jpg';
                    //var_dump($dir);
                    //die();

                    $image = \Request::file('logo');
                    $image->move(public_path().$dir, $filename);
                    //$img = Image::make(storage_path().$dir.$filename);
                    //$img->resize(140, 180);
                    //$img->insert(public_path().'/template_image/watermark.png');
                    //$img->save(public_path().$dir.'thumb_'.$filename);
                    //$item->logo = $dir.'thumb_'.$filename;
                    $item->logo = $dir.$filename;
                    //$item->save();
                }

                $item->name = \Request::get('name');
                $item->email = \Request::get('email');
                $item->password = \Crypt::encrypt(\Request::get('password'));
                $item->phone = \Request::get('phone');
                $item->description = \Request::get('description');

                $item->status = \Request::get('status');
                $item->role = \Request::get('role');
                $item->link = Helper::alias(\Request::get('name'));
                $item->keywords = \Request::get('keywords');
                $item->save();

                return \Redirect::route('user/index');
            }
        }
        return view('abadmin::user.edit', array('item'=>$item));
    }

    public function delete($id)
    {
        $item = User::find($id);
        $item->delete();
        return \Redirect::route("user/index");
    }


} 