@extends('app')

@section('content')
<div class="login-form" style="width: 300px; margin:50px auto; padding:10px;">
    <form method="POST" action="{{ url('auth/register') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h1 class="text-light">Register</h1>
        <hr class="thin"/>
        <br />
        <div class="input-control text full-size" data-role="input">
            <label for="user_login">Email</label>
            <input type="text" name="email" id="user_login">
            <button class="button helper-button clear" tabindex="-1"><span class="mif-cross"></span></button>
        </div>
        <br>
        <br>
        <div class="input-control password full-size" data-role="input">
            <label for="user_password">Password</label>
            <input type="password" name="password" id="user_password">
            <button class="button helper-button reveal" tabindex="-1"><span class="mif-looks"></span></button>
        </div>
        <br>
        <br>
        <div class="form-actions">
            <button type="submit" class="button primary">Sign Up</button>
        </div>
    </form>
</div>
@endsection
