<?php

return [

    'domain'=> 'http://portfolio',
    'path' => base_path().'/vendor/webvolant/abadmin/public',

    'status' => array('0'=>'Не опубликованный','1'=>'Опубликованный'),
    'roles' => array('0'=>'user','1'=>'manager','2'=>'administrator'),
    'phone_mask'=>'"mask": "0(999) 999-999"',
    'phone_placeholder'=>'0(999) 999-999'
    //'storagePath'  => Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix()



/*
    'providers' => [

    Collective\Html\HtmlServiceProvider::class

],


    'aliases' => [
    'Form' => Collective\Html\FormFacade::class,
    'Html' => Collective\Html\HtmlFacade::class,

],
*/
    ];


