@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <!--div class="panel-heading">Login</div-->
                <div class="panel-body">
                  <div class="col-md0 col-md-offs-1  card-panel">
                    <div class="col-md-4 col-md-offset-4 login-icon" >
                      <img src="/images/profile.png" alt="Login"/>
                    </div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <!--label for="email" class="col-md-4 control-label">E-Mail Address</label-->

                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="E-mail" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <!--label for="password" class="col-md-4 control-label">Password</label-->

                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                          <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-lg">
                                LOGIN
                            </button>
                          </div>
                        </div>

                        <div class="form-group">
                                <div class="col-md-4 col-md-offset-2">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                      Forgot Your Password?
                                    </a>
                                </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
