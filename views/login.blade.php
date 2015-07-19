<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AB solutions Control Panel | Log in</title>
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
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href=""><b>AB Solutions</b> <br/>Control Panel</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Авторизоваться в системе</p>
        {!! Form::open(array('route' => 'administrator', 'method' => 'post', 'role' => 'form','enctype'=>'multipart/form-data', 'class' => 'form')) !!}
            @if (!empty($errors->first('alert_danger')))
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Ошибка!</h4>
                {!! $errors->first('alert_danger') !!}
            </div>
            @elseif (!empty($errors->first('alert_warning')))
            <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>	<i class="icon fa fa-check"></i> Уведомление!</h4>
                {!! $errors->first('alert_warning') !!}
            </div>
            @else
            @endif

            <div class="form-group has-feedback">
                {!! Form::text('email', 'demo@demo.com', array('class'=>'form-control', 'placeholder'=>'email@email.com')) !!}
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

            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Запомнить меня
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    {!! Form::submit('Войти',array('class'=>'form-control btn btn-primary btn-block btn-flat')) !!}
                </div><!-- /.col -->
            </div>
            {!! \Form::close() !!}

        <!--<div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div><!-- /.social-auth-links -->

        <a href="#">Я забыл пароль!</a><br>
        <a href="{!! \URL::route('admin_registration') !!}" class="text-center">Зарегестрироваться в системе</a>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

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