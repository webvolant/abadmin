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
                <h3 class="box-title">Редактирование записи</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">

                <?php //dd($item) ?>
                {!! Form::model($item, array('route' => array('html/edit', $item->id), 'method' => 'post', 'role' => 'form', 'files' => 'true', 'class' => 'form')) !!}

                <div class="box-header with-border admin-tools">
                    <button class="btn btn-primary btn-flat" type="submit"><i class="fa fa-save"></i> Сохранить</button>
                    <a href="{!! \URL::route('html/index') !!}" class="btn btn-warning btn-flat"><i class="fa fa-undo fa-fw"></i> Отменить</a>
                </div>


                <?php //echo Form::token(); ?>

                <div class="row">
                    <div class="col-xs-8">
                        <div class="form-group has-feedback">
                            {!! Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'Название')) !!}
                            <span class="glyphicon glyphicon-unchecked form-control-feedback"></span>
                            @if ($errors->first('title'))
                            <div class="alert alert-danger" role="alert"><?php echo $errors->first('title'); ?></div>
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
                            CKEDITOR.replace( 'description');
                            CKEDITOR.config.allowedContent = true;
                            CKEDITOR.config.filebrowserImageBrowseUrl= '/laravel-filemanager?type=Images';
                            CKEDITOR.config.filebrowserBrowseUrl= '/laravel-filemanager?type=Files';
                            var k = $('input#description').val();
                            CKEDITOR.instances.description.setData(k);
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
                                    {!! Form::label('Статус') !!}
                                    {!! Form::select('status', config('config.status'), null, array('class' => 'form-control')) !!}
                                    <span class="glyphicon glyphicon-off form-control-feedback"></span>
                                    @if ($errors->first('status'))
                                    <div class="alert alert-danger" role="alert"><?php echo $errors->first('status'); ?></div>
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
                        <a href="{!! \URL::route('html/index') !!}" class="btn btn-warning btn-flat"><i class="fa fa-undo fa-fw"></i> Отменить</a>
                    </div>
                </div>
                {!! \Form::close() !!}

            </div><!-- /.box-body -->
            <div class="box-footer">

            </div><!-- /.box-footer-->
        </div><!-- /.box -->

    </section><!-- /.content -->
@stop












