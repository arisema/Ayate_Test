<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ayate</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                background-image:url("/images/background1.jpg");
-moz-background-size:100% 100%;
-webkit-background-size:100% 100%;
background-size:100% 100%;

                color: #fff;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }



            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
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
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .links > p {
                color: #fff;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .profButton{
                color: #eb1e1b;
                background-color: #eb1e1b;

            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}" name="home">Home</a>
                        <a href="{{ url('/about') }}" name="about">About</a>
                        <a href="{{ url('/profile') }}" name="professional">Professional</a>
                    @else
                        <a href="{{ url('/home') }}" name="home">Home</a>
                        <a href="{{ url('/about') }}"  name="about">About</a>
                        <a href="{{ url('/login') }}" id="professional" name="professional">Professional</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Ayate
                </div>

                <div class="links">
                    <p>A site about common Ethiopian home remedies and more ...</p>
                </div>
            </div>
        </div>
    </body>
</html>
