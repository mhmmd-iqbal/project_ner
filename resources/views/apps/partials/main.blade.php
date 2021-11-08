<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="{{{URL::asset('template/assets/images/logo.png') }}}"
        />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{{URL::asset('template/dist/css/style.min.css') }}}" rel="stylesheet" />

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 50vh;
            }

            .flex-center {
                /* align-items: center; */
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                width: 60vw
            }

            .title {
                font-size: 30px;
                font-weight: bold
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .links > a:hover {
                color: #e2a313;
                font-weight: bold
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            form.example input[type=text] {
                padding: 10px;
                font-size: 17px;
                border: 1px solid grey;
                float: left;
                width: 80%;
                background: #f1f1f1;
            }

            form.example button {
                float: left;
                width: 20%;
                padding: 10px;
                background: #2196F3;
                color: white;
                font-size: 17px;
                border: 1px solid grey;
                border-left: none;
                cursor: pointer;
            }

            form.example button:hover {
                background: #0b7dda;
            }

            form.example::after {
                content: "";
                clear: both;
                display: table;
            }

            .header {
                text-align: right;
                padding-top: 5vh;
                background: #0b6631;
                padding-bottom: 2em;
                align-items: center;
                font-weight: bold;
            }

            .primary-1 {
                color: #0b9444
            }

            .bg-primary-1 {
                background-color: #0b9444;
            }

            .primary-2 {
                color: #e2a313
            }

            .bg-primary-2 {
                background-color: #e2a313;
            }
        </style>
        @yield('css')
    </head>
    <body class="">
        @include('apps.partials.navbar')
        <div class="flex-center position-ref full-height mt-5">
            <div class="content">   
                @yield('content')
            </div>
        </div>
    </body>
    @yield('modal')
</html>

<script src="{{{URL::asset('template/assets/libs/jquery/dist/jquery.min.js') }}}"></script>
<script>
    //ajax 
    const ajaxRequest = (_method, _url, _data = {}) => {
        return $.ajax({
            type: _method,
            url: _url,
            data: _data,
            dataType: "JSON",
        });
    }
</script>

@yield('js')
