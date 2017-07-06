@extends('layouts.app')

@section('content')
    <div class="ontainer" style="width: 100%;">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="navbar-brand" href="#">Submissions {{Session::get('message')}}  </div>


                        <form class="form-inline col-md-offset-8" role="form" method="GET" action="/submissions/1" >

                            <input class="form-control" type="text" placeholder="Remedy/Disease/Category" width="100" name="search" style="-webkit-border-radius:50px; -moz-border-radius:50px; border-radius:50px;" >
                            <!--<button  type="submit" style="background-color:white; border-radius=0;"> <img  src="/images/search.png" class="img-responsive" width="50" height="50"></button>-->

                            <button  type="submit"  style="-webkit-border-radius:50px; -moz-border-radius:50px; border-radius:50px;" >Search</button>
                        </form>
                    </div>

                    <div class="panel-body">
                        <?php $found=0;?>

                        @if(Session::get('message')=="You have submitted successfully!")
                            <p style="color:green;">{{Session::get('message')}}</p>
                        @elseif(strpos('over 50 characters',Session::get('message'))!== false)
                            <p style="color:red;">{{Session::get('message')}}</p>







                        @endif

                        @if(Session::get('message')=="" |Session::get('message')=="You have submitted successfully!")
                                    <?php   $submissions=App\Submission::orderBy('created_at','desc')->get();?>
                            @foreach($submissions as $submission)
                                <?php $id=$submission->id;
                                $rname=$submission->remedyName;?>
                                <div class="col-md-8 submission-block">
                                    <h4 class="card-title">
                                        <a href="/submissionViewPage?name={{$rname}}">{{$rname}}</a>
                                    </h4>
                                    <div class="col-md-7">
                                        <p><b>{{$submission->category}}: {{$submission->diseaseName}}</b><br>
                                            {{$submission->description}}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <?php   $submissions=App\Submission::orderBy('created_at','desc')->get();
                            $search=Session::get('message');?>
                            @foreach($submissions as $submission)
                                <?php   $rname=$submission->remedyName;?>
                                @if($submission->diseaseName==$search | $submission->remedyName==$search |  $submission->category==$search)
                                    <div class="col-md-8 submission-block">
                                        <h4 class="card-title">
                                            <a href="/submissionViewPage?name={{$rname}}">{{$rname}}</a>
                                        </h4>
                                        <div class="col-md-7">
                                            <p><b>{{$submission->category}}: {{$submission->diseaseName}}</b><br>
                                                {{$submission->description}}</p>
                                        </div>
                                    </div>
                                @endif

                            @endforeach
                        @endif



                        <div class="col-md-12 submission-block">




                            <div class="pull-right">
                                <div class="row"><a type="button" name="modal" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" data-whatever="@mdo">Submit Remedy</a></div>
                            </div>
                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <button type="button" class="close" data-dismiss="modal">&times</button>
                                        </div>
                                        <div class="container" style="width:100%">
                                            <div class="row">
                                                <div class="col-md-11 col-md-offset-1 submissionLook">

                                                    <h4>Submit Remedy

                                                    </h4>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <form class="form-horizontal" role="form" method="POST" action="/submissions" name="submit_form" >
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label for="detailedExplanation" class="col-md-4 control-label">Remedy Name</label>

                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" name="remedyName" required>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="rating" class="col-md-4 control-label">Disease Name</label>

                                                        <div class="col-md-6">
                                                            <input type="textdomain" class="form-control" name="diseaseName" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="rating" class="col-md-4 control-label">Category</label>

                                                        <div class="col-md-6">
                                                            <select class="form-control"  id="select" name="category" width="100">
                                                                <?php $cats=App\Category::all(); ?>
                                                                @foreach($cats as $cat)
                                                                    <option>{{$cat->name}}</option><br>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="rating" class="col-md-4 control-label">E-mail</label>

                                                        <div class="col-md-6">
                                                            <input type="email" class="form-control" name="email" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="rating" class="col-md-4 control-label">Description</label>

                                                        <div class="col-md-6">
                                                            <textarea class="form-control" name="description" placeholder="Enter description " width="100" required></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-6 col-md-offset-5">
                                                            <div class="pull-right">
                                                                <button name="submit_form" type="submit" class="btn btn-primary">
                                                                    Submit
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>

                </div>

            </div>

        </div>

    </div>
    </div>
@endsection
