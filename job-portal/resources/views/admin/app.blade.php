<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="uploads/favicon.png">

    <title>Admin Panel</title>

    @include('admin.layout.style')
    @include('admin.layout.script')

</head>

<body>
<div id="app">
    <div class="main-wrapper">

        <div class="navbar-bg"></div>
      

@include('admin.layout.nav')

@include('admin.layout.sidebar')

@include('admin.home')
    </div>
</div>

<script src="{{asset('dist/js/scripts.js')}}"></script>
<script src="{{asset('dist/js/custom.js')}}"></script>

</body>
</html>