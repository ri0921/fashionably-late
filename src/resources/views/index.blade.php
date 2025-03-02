@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="main">
    <div class="main__title">
        <h2>Contact</h2>
    </div>
    <form class="form" action="/confirm" method="post">
    @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label-item">お名前</span>
                <span class="form__label-required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <div class="form__input-name">
                        <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}">
                        <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}">
                    </div>
                </div>
                <div class="form__error">
                    @error('last_name')
                    {{ $message }}
                    @enderror
                    @error('first_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label-item">性別</span>
                <span class="form__label-required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <input class="form__input-radio" type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }} checked><label>男性</label>
                    <input class="form__input-radio" type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}><label>女性</label>
                    <input class="form__input-radio" type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }}><label>その他</label>
                </div>
                <div class="form__error">
                    @error('gender')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label-item">メールアドレス</span>
                <span class="form__label-required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <input class="form__input-email" type="text" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
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
                <span class="form__label-item">電話番号</span>
                <span class="form__label-required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <div class="form__input-tell">
                        <input type="text" name="tell_1" placeholder="080" value="{{ old('tell_1') }}">
                        <span>-</span>
                        <input type="text" name="tell_2" placeholder="1234" value="{{ old('tell_2') }}">
                        <span>-</span>
                        <input type="text" name="tell_3" placeholder="5678" value="{{ old('tell_3') }}">
                    </div>
                </div>
                <div class="form__error">
                    @error('tell_1')
                    {{ $message }}
                    @enderror
                    @error('tell_2')
                    {{ $message }}
                    @enderror
                    @error('tell_3')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label-item">住所</span>
                <span class="form__label-required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <input class="form__input-address" type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                </div>
                <div class="form__error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label-item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <input class="form__input-building" type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label-item">お問い合わせの種類</span>
                <span class="form__label-required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__select">
                    <select name="category_id">
                        <option value="" selected>選択してください</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}" @if(old('category_id') == $category->id) selected @endif>{{ $category['content'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form__error">
                    @error('category_id')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label-item">お問い合わせ内容</span>
                <span class="form__label-required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__textarea">
                    <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                </div>
                <div class="form__error">
                    @error('detail')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection