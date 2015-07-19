<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AB solutions Control Panel | Registration</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    {!! \Html::style('webvolant/abadmin/AdminLTE/bootstrap/css/bootstrap.min.css') !!}

    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />

    {!! \Html::style('webvolant/abadmin/AdminLTE/dist/css/AdminLTE.min.css') !!}
    {!! \Html::style('webvolant/abadmin/AdminLTE/dist/css/skins/_all-skins.min.css') !!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="register-page">
<div class="register-box">
    <div class="register-logo">
        <a href=""><b>AB Solutions</b> <br/>Control Panel</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Регистрация нового пользователя</p>
        {!! Form::open(array('route' => 'admin_registration', 'method' => 'post', 'role' => 'form','enctype'=>'multipart/form-data', 'class' => 'form')) !!}
        <?php //echo Form::token(); ?>

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

        <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            {!! Form::checkbox('term', 'true', true) !!} Я согласен с <a href="#">условиями.</a>
                            @if ($errors->first('password_confirmation'))
                            <div class="alert alert-danger" role="alert"><?php echo $errors->first('password_confirmation'); ?></div>
                            @else
                            @endif
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    {!! Form::submit('Отправить',array('class'=>'form-control btn btn-primary btn-block btn-flat')) !!}
                </div><!-- /.col -->
        </div>
        {!! \Form::close() !!}
        <a href="{!! \URL::route('administrator') !!}" class="text-center">Я уже зарегестрирован!</a>
    </div><!-- /.form-box -->
</div><!-- /.register-box -->

{!! \Html::script('webvolant/abadmin/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js') !!}
{!! \Html::script('webvolant/abadmin/AdminLTE/bootstrap/js/bootstrap.min.js') !!}
{!! \Html::script('webvolant/abadmin/AdminLTE/plugins/iCheck/icheck.min.js') !!}

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>