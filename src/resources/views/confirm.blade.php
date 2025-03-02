@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="main">
    <div class="main__title">
        <h2>Confirm</h2>
    </div>
    <div class="confirm-table">
            <table class="table__inner">
                <tr class="table__row">
                    <th class="table__label">お名前</th>
                    <td class="table__text">
                        <input type="text" name="name" value="{{ $contact['last_name']. '　'. $contact['first_name'] }}" readonly />
                    </td>
                </tr>
                <tr class="table__row">
                    <th class="table__label">性別</th>
                    <td class="table__text">
                        <input type="text" name="gender" value="{{ $gender }}" readonly />
                    </td>
                </tr>
                <tr class="table__row">
                    <th class="table__label">メールアドレス</th>
                    <td class="table__text">
                        <input type="text" name="email" value="{{ $contact['email'] }}" readonly />
                    </td>
                </tr>
                <tr class="table__row">
                    <th class="table__label">電話番号</th>
                    <td class="table__text">
                        <input type="text" name="tell" value="{{ $contact['tell_1'].$contact['tell_2'].$contact['tell_3'] }}" readonly />
                    </td>
                </tr>
                <tr class="table__row">
                    <th class="table__label">住所</th>
                    <td class="table__text">
                        <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
                    </td>
                </tr>
                <tr class="table__row">
                    <th class="table__label">建物名</th>
                    <td class="table__text">
                        <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
                    </td>
                </tr>
                <tr class="table__row">
                    <th class="table__label">お問い合わせの種類</th>
                    <td class="table__text">
                        <input type="text" name="category_id" value="{{ $category['content'] }}" readonly />
                    </td>
                </tr>
                <tr class="table__row">
                    <th class="table__label">お問い合わせ内容</th>
                    <td class="table__text">
                        <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly />
                    </td>
                </tr>
            </table>
    </div>
    <div class="form__button">
        <form class="form-submit" action="/thanks" method="post">
            @csrf
            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
            <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
            <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
            <input type="hidden" name="email" value="{{ $contact['email'] }}">
            <input type="hidden" name="tell_1" value="{{ $contact['tell_1'] }}">
            <input type="hidden" name="tell_2" value="{{ $contact['tell_2'] }}">
            <input type="hidden" name="tell_3" value="{{ $contact['tell_3'] }}">
            <input type="hidden" name="address" value="{{ $contact['address'] }}">
            <input type="hidden" name="building" value="{{ $contact['building'] }}">
            <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
            <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
            <button class="form__button-submit" type="submit">送信</button>
        </form>
        <form class="form-modify" action="/" method="post">
            @csrf
            <input type="hidden" name="last_name" value="{{ old('last_name', $contact['last_name']) }}">
            <input type="hidden" name="first_name" value="{{ old('first_name', $contact['first_name']) }}">
            <input type="hidden" name="gender" value="{{ old('gender', $contact['gender']) }}">
            <input type="hidden" name="email" value="{{ old('email', $contact['email']) }}">
            <input type="hidden" name="tell_1" value="{{ old('tell_1', $contact['tell_1']) }}">
            <input type="hidden" name="tell_2" value="{{ old('tell_2', $contact['tell_2']) }}">
            <input type="hidden" name="tell_3" value="{{ old('tell_3', $contact['tell_3']) }}">
            <input type="hidden" name="address" value="{{ old('address', $contact['address']) }}">
            <input type="hidden" name="building" value="{{ old('building', $contact['building']) }}">
            <input type="hidden" name="category_id" value="{{ old('category_id', $contact['category_id']) }}">
            <input type="hidden" name="detail" value="{{ old('detail', $contact['detail']) }}">
            <button class="form__button-modify" type="submit" name='back' value='back'>修正</button>
        </form>
    </div>
</div>
@endsection