@extends('layouts.app')
  <header class="shop__header">
    <div class="header__container flex-item">
@section('content')
</header>  
    <div class="login__Page">
        <div class="login__container">
        <h4 class="login__title">&emsp;Login</h4>
            <form class="new_user" id="new_user" action="{{ route('login') }}" accept-charset="UTF-8" method="post">
            {{ csrf_field() }}
                <div class="form-group">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus><br>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required><br>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group text-center">
                    <input type="submit" name="commit" value="ログイン" class="login__Btn" data-disable-with="ログイン">
                </div>
            </form>
        </div>
        <div class="text-center">
            <a href="{{ route('register') }}"><p class="acountPage_link">アカウントを作成</p></a>
        </div>
    </div>
@endsection