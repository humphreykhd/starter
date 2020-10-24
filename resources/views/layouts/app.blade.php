<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Zipit Smart Portal') }} | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('dist/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="{{ asset('dist/Ionicons/css/ionicons.min.css') }}">
    <!-- Checkboxstyling -->
    <link rel="stylesheet" href="{{ asset('css/styleadmin.css') }}">
    <!-- Datatables -->
    <link rel="stylesheet" href="{{ asset('dist/plugins/datatables/jquery.dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/plugins/datatables/jquery.dataTables_themeroller.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-switch.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="{{ url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700') }}" rel="stylesheet">
</head>
<body class="login-page">
@yield('content')
        <!-- jQuery -->
<script src="{{ asset('dist/plugins/jQuery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('dist/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- iCheck -->
<script src="{{ asset('dist/plugins/iCheck/icheck.min.js') }}"></script>
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