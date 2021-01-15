<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>{{ config('app.name', 'Laravel') }}<</title>

    </head>

    <body id="page-top">

        @include('admin.common.header')
        @include('admin.common.sidebar')
        @yield('content')
        @include('admin.common.footer')
    </body>
</html>
