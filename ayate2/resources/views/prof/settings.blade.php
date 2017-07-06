@extends('layouts.app')

@section('content')
<div class="ontainer" style="width: 100%;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
           <div class="panel panel-default">
                <div class="panel-heading">
                  Settings
                </div>

                <div class="panel-body">
                    <p style="color:red;">{{Session::get('message')}}</p>
                  <ul class="nav flex-column nav-tabs">
                    <li role="presentation" class="active"><a href="#General" data-toggle="tab">General</a></li>
                    <li role="presentation"><a href="#Password" data-toggle="tab">Password</a></li>
                  </ul>

                  <div class="row">
                  <div class="tab-content">
                      <div class="tab-pane fade in active" id="General">

                      <div class="container" style="width:100%">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('generalEdit') }}">
                            {{ csrf_field() }}

                            <input type="hidden" >

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="Text" class="form-control" name="name" value="<?php echo Auth::user()->fName . " ".Auth::user()->mName . " " .Auth::user()->lName; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="Email" class="form-control" name="email" value="<?php echo Auth::user()->email; ?>">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="col-md-4 control-label">Phone</label>
                                <div class="col-md-6">
                                    <input id="phone" type="number" class="form-control" name="phone" value="<?php echo Auth::user()->phone; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="workAddress" class="col-md-4 control-label">Work Address</label>
                                <div class="col-md-6">
                                    <input id="workAddress" type="text" class="form-control" name="workAddress" value="<?php echo Auth::user()->workAddress; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="occupation" class="col-md-4 control-label">Occupation</label>
                                <div class="col-md-6">
                                    <input id="occupation" type="text" class="form-control" name="occupation" value="<?php echo Auth::user()->occupation; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="experience" class="col-md-4 control-label">Experience</label>
                                <div class="col-md-6">
                                    <textarea id="experience" type="text" class="form-control" name="experience" value="<?php echo Auth::user()->experience; ?>"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                            <p style="color: blue">
                                <?php
                                if($data ==1){
                                    echo "Password is set.";
                                }
                                  elseif($data == 2){
                                      echo "confirmation is wrong";
                                  }
                                ?>
                            </p>
                      </div>

                    </div>

                    <div class="tab-pane fade in" id="Password">
                      <div class="container" style="width: 100%;">
                        <form class="form-horizontal" role="form" method="POST" action="/pass_edit">
                            {{ csrf_field() }}

                            <input type="hidden" >

                            <br>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6 col-md-offset-">
                                    <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6  col-md-offset-">
                                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirm" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Reset Password
                                    </button>
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
@endsection
