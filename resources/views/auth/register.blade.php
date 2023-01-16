@extends('layouts.app')
  <header class="shop__header">
    <div class="header__container flex-item">
@section('content')
</header>  
    <div class="register__Page">
        <div class="register__container">
        <h4 class="register__title">&emsp;Register</h4>
            <form id="new_user" action="{{ route('register') }}" accept-charset="UTF-8" method="post">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <input class="form-control" placeholder="Username" type="text" name="name" value="{{ old('name') }}" required autofocus><br>
                    @if ($errors->has('name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input class="form-control" placeholder="Email" autocomplete="email" type="email" name="email" value="{{ old('email') }}" required><br>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input class="form-control" placeholder="Password" autocomplete="off" type="password" name="password" required><br>
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                
                <input type="submit" name="commit" value="登録" class="register__Btn">
            </form>
        </div>    
        <div>    
            <a href="{{ route('login') }}"><p class="acountPage_link">会員登録がお済みの方はこちら</p></a>
        </div>    
    </div>
@endsection