<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}"></script>
    <style>
        .header-text{text-align: center;}
        td {text-align: center;}
        th {text-align: center;}
    </style>
</head>
<body>
    @include('components.header')
    <div class="containter">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                @yield('content')
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>

</html>
