<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title??''}}</title>
    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/sass/auth/index.scss', 'resources/js/app.js'])
    <!-- /Styles -->
</head>
<body dir="rtl">
<div class="container register">
    <div class="row">
        <!-- Right Side Title -->

        <!-- /Right Side Title -->
        <!-- Left Side Forms -->
        @yield('content')
    </div>
</div>

<!-- Scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- /Scripts -->

</body>
</html>
