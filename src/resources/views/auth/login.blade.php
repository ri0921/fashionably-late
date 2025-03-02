@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('button')
<div class="header__button">
    <button class="register__button" type="button" onclick="location.href='/register'">register</button>
</div>
@endsection

@section('content')
<div class="main">
    <div class="main__title">
        <h2>Login</h2>
    </div>
    <form class="form" action="/login" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label">メールアドレス</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label">パスワード</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <input type="password" name="password" placeholder="例: coachtech1106" value="{{ old('password') }}">
                </div>
                <div class="form__error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">ログイン</button>
        </div>
</form>
</div>
@endsection