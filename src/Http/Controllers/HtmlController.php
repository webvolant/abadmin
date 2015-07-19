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
use webvolant\abadmin\Models\AbHtml;


class HtmlController extends Controller {

    public function index()
    {
        $items = AbHtml::all();
        return view('abadmin::html.backend.index',array('htmls' => $items));
    }

    public function add()
    {
        if (\Request::all()){
            $validator = \Validator::make(\Request::all(), [
            ]);

            if ($validator->fails()) {
                return \Redirect::route('html/add')->withErrors($validator)->withInput();
            }
            else{
                //dd(\Request::all());
                $item = new AbHtml();

                $item->title = \Request::get('title');
                $item->description = \Request::get('description');

                $item->status = \Request::get('status');
                $item->save();

                return \Redirect::route('html/index');
            }
        }
        return view('abadmin::html.backend.add');
    }

    public function edit($link)
    {
        $item = AbHtml::find($link);

        if (\Request::all()){
            $validator = \Validator::make(\Request::all(), [
            ]);

            if ($validator->fails()) {
                return \Redirect::route('user/edit',array('item'=>$item))->withErrors($validator)->withInput();
            }
            else{
                $item->title = \Request::get('title');
                $item->description = \Request::get('description');

                $item->status = \Request::get('status');
                $item->save();

                return \Redirect::route('html/index');
            }
        }
        return view('abadmin::html.backend.edit', array('item'=>$item));
    }

    public function delete($id)
    {
        $item = AbHtml::find($id);
        $item->delete();
        return \Redirect::route("html/index");
    }


} 