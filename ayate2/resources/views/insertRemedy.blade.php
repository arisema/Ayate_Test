<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
<div class="container" style="width: 100%;">
    <div class="row">
        <div class="col-md-6 col-md-offset-1">
            <div class="panel panel-default">
                
                <form class="form-horizontal" role="form" method="POST" action="InsertRemedy"> <!--AJAX-->
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <textarea id="content" type="text" placeholder="content of the remedy" class="form-control" name="comment" required></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input id="RemedyName" type="text" placeholder="Remedy Name" class="form-control" name="commentorName" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input id="DiseaseName" type="text" placeholder="Disease Name" class="form-control" name="commentorEmail" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Insert Remedy
                                        </button>
                                      </div>
                                    </div>
                                </form>
                        </div>
                        </div>
                        </div>
                        </div>
</body>
</html>