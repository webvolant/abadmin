@extends('abadmin::admin')
<!--
@section('title', 'Page Title')

@section('sidebar')
@parent

<p>This is appended to the master sidebar.</p>
@stop
-->

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Обзорное
            <small>окно</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Добавление новой записи</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">

                {!! Form::open(array('route' => 'user/add', 'method' => 'post', 'role' => 'form','enctype'=>'multipart/form-data', 'class' => 'form')) !!}

                <div class="box-header with-border admin-tools">
                    <button class="btn btn-primary btn-flat" type="submit"><i class="fa fa-save"></i> Сохранить</button>
                    <a href="{!! \URL::route('user/index') !!}" class="btn btn-warning btn-flat"><i class="fa fa-undo fa-fw"></i> Отменить</a>
                </div>


                <?php //echo Form::token(); ?>

                <div class="row">
                    <div class="col-xs-8">
                        <div class="form-group has-feedback">
                            {!! Form::text('name','', array('class'=>'form-control', 'placeholder'=>'John Walker')) !!}
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            @if ($errors->first('name'))
                            <div class="alert alert-danger" role="alert"><?php echo $errors->first('name'); ?></div>
                            @else
                            @endif
                        </div>

                        <div class="form-group has-feedback">
                            {!! Form::text('email', '', array('class'=>'form-control', 'placeholder'=>'email@email.com')) !!}
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            @if ($errors->first('email'))
                            <div class="alert alert-danger" role="alert"><?php echo $errors->first('email'); ?></div>
                            @else
                            @endif
                        </div>

                        <div class="form-group has-feedback">
                            {!! Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) !!}

                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @if ($errors->first('password'))
                            <div class="alert alert-danger" role="alert"><?php echo $errors->first('password'); ?></div>
                            @else
                            @endif
                        </div>

                        <div class="form-group has-feedback">
                            {!! Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Password')) !!}
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @if ($errors->first('password_confirmation'))
                            <div class="alert alert-danger" role="alert"><?php echo $errors->first('password_confirmation'); ?></div>
                            @else
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                {!! Form::text('phone', null, array('data-inputmask'=>config('config.phone_mask'), 'data-mask', 'class'=>'form-control', 'placeholder'=>config('config.phone_placeholder'))) !!}
                            </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <div class="form-group">
                            {!! Form::label('Изображение') !!}
                            {!! Form::file('logo', array('class' => 'form-control')) !!}
                            @if ($errors->first('logo'))
                            <div class="alert alert-danger" role="alert"><?php echo $errors->first('logo'); ?></div>
                            @else
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('Описание') !!}
                            {!! Form::text('description', null, array('id'=>'description', 'class'=>'form-control', 'placeholder'=>'Описание')) !!}
                            @if ($errors->first('description'))
                            <div class="alert alert-danger" role="alert"><?php echo $errors->first('description'); ?></div>
                            @else
                            @endif
                        </div>

                        <!-- CK Editor -->
                        <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
                        <script type="text/javascript">
                            CKEDITOR.replace( 'description' );
                            CKEDITOR.instances.description.setData($('input#description').val());
                            timer = setInterval(updateDiv,100);
                            function updateDiv(){
                                var editorText = CKEDITOR.instances.description.getData();
                                $( "[name='description']" ).val(editorText);
                            }
                        </script>


                    </div><!-- /.col -->



                    <div class="col-xs-4">
                        <div class="box">
                            <div class="box-header with-border">
                                <h5>Системные поля</h5>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="box-body">

                                <div class="form-group has-feedback block">
                                    {!! Form::label('Роль') !!}
                                    {!! Form::select('role', config('config.roles'), null, array('class' => 'form-control')) !!}
                                    <span class="glyphicon glyphicon-tower form-control-feedback"></span>
                                    @if ($errors->first('status'))
                                    <div class="alert alert-danger" role="alert"><?php echo $errors->first('role'); ?></div>
                                    @else
                                    @endif
                                </div>

                                <div class="form-group has-feedback block">
                                    {!! Form::label('Статус') !!}
                                    {!! Form::select('status', config('config.status'), null, array('class' => 'form-control')) !!}
                                    <span class="glyphicon glyphicon-off form-control-feedback"></span>
                                    @if ($errors->first('status'))
                                    <div class="alert alert-danger" role="alert"><?php echo $errors->first('status'); ?></div>
                                    @else
                                    @endif
                                </div>

                                <div class="form-group has-feedback">
                                    {!! Form::label('SEO теги') !!}
                                    {!! Form::textarea('keywords', '', array('class'=>'form-control', 'placeholder'=>'админ, пользователь, оператор, директор, менеджер')) !!}
                                    <span class="glyphicon glyphicon-tags form-control-feedback"></span>
                                    @if ($errors->first('keywords'))
                                    <div class="alert alert-danger" role="alert"><?php echo $errors->first('keywords'); ?></div>
                                    @else
                                    @endif
                                </div>

                            </div><!-- /.box-body -->
                            <div class="box-footer">

                            </div><!-- /.box-footer-->
                        </div><!-- /.box -->
                    </div><!-- /.col -->

                </div><!-- /.row -->


                <div class="form-group">
                    <div class="box-header with-border admin-tools">
                        <button class="btn btn-primary btn-flat" type="submit"><i class="fa fa-save"></i> Сохранить</button>
                        <a href="{!! \URL::route('user/index') !!}" class="btn btn-warning btn-flat"><i class="fa fa-undo fa-fw"></i> Отменить</a>
                    </div>
                </div>
                {!! \Form::close() !!}

            </div><!-- /.box-body -->
            <div class="box-footer">

            </div><!-- /.box-footer-->
        </div><!-- /.box -->

    </section><!-- /.content -->
@stop












