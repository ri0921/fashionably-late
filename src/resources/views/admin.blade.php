@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection

@section('button')
@if (Auth::check())
<form class="form" action="/logout" method="post">
    @csrf
    <div class="header__button">
    <button class="logout__button" type="submit">logout</button>
    </div>
</form>
@endif
@endsection

@section('content')
<div class="main">
    <div class="main__title">
        <h2>Admin</h2>
    </div>
    <form class="search-form" action="{{ route('admin.search') }}" method="get">
        @csrf
        <div class="search-form__item">
            <input class="search-form__input-keyword" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
            <select class="search-form__select-gender" name="gender">
                <option value="">性別</option>
                <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
                <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
                <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
            </select>
            <select class="search-form__select-category" name="category_id">
                <option value="">お問い合わせの種類</option>
                @foreach ($categories as $category)
                <option value="{{ $category['id'] }}" {{ request('category_id') == $category['id'] ? 'selected' : '' }}>{{ $category['content'] }}</option>
                @endforeach
            </select>
            <input class="search-form__input-calendar" type="date" name="calendar" value="{{ request('calendar') }}">
        </div>
        <div class="search-form__button">
            <button class="search-form__button-submit" type="submit">検索</button>
        </div>
        <div class="search-form__button">
            <button class="search-form__button-reset" type="button" onclick="location.href=location.href.split('?')[0]">リセット</button>
        </div>
    </form>
    <div class="row">
        <div class="button">
            <button class="export-button">エクスポート</button>
        </div>
        <div class="pagination">
            {{$contacts->appends(request()->query())->links()}}
        </div>
    </div>
    <table class="contact-table">
        <tr class="table__row">
            <th class="table__header">お名前</th>
            <th class="table__header">性別</th>
            <th class="table__header">メールアドレス</th>
            <th class="table__header">お問い合わせの種類</th>
            <th class="table__header"></th>
        </tr>
        @foreach ($contacts as $contact)
        <tr class="table__row">
            <td>{{ $contact['last_name'] }}　{{ $contact['first_name'] }}</td>
            <td>{{ $contact['gender'] }}</td>
            <td>{{ $contact['email'] }}</td>
            <td>{{ $contact['category']['content'] }}</td>
            <td>
                <button class="modal-open-button" type="button" data-toggle="modal" data-target="#modal{{ $contact['id'] }}">詳細</button>
                
                <div class="modal" id="modal{{ $contact['id'] }}" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
                    <div class="modal-wrapper" role="document">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <div class="modal-content">
                            <table class="modal-table">
                                <tr class="modal-table__row">
                                    <th class="modal-table__header">お名前</th>
                                    <td class="modal-table__text">{{ $contact['last_name'] }}　{{ $contact['first_name'] }}</td>
                                </tr>
                                <tr class="modal-table__row">
                                    <th class="modal-table__header">性別</th>
                                    <td class="modal-table__text">{{ $contact['gender'] }}</td>
                                </tr>
                                <tr class="modal-table__row">
                                    <th class="modal-table__header">メールアドレス</th>
                                    <td class="modal-table__text">{{ $contact['email'] }}</td>
                                </tr>
                                <tr class="modal-table__row">
                                    <th class="modal-table__header">電話番号</th>
                                    <td class="modal-table__text">{{ $contact['tell'] }}</td>
                                </tr>
                                <tr class="modal-table__row">
                                    <th class="modal-table__header">住所</th>
                                    <td class="modal-table__text">{{ $contact['address'] }}</td>
                                </tr>
                                <tr class="modal-table__row">
                                    <th class="modal-table__header">建物名</th>
                                    <td class="modal-table__text">{{ $contact['building'] }}</td>
                                </tr>
                                <tr class="modal-table__row">
                                    <th class="modal-table__header">お問い合わせの種類</th>
                                    <td class="modal-table__text">{{ $contact['category']['content'] }}</td>
                                </tr>
                                <tr class="modal-table__row">
                                    <th class="modal-table__header">お問い合わせ内容</th>
                                    <td class="modal-table__text">{{ $contact['detail'] }}</td>
                                </tr>
                            </table>
                            <form class="modal-button" action="/admin/contact/delete" method="post">
                                @method('DELETE')
                                @csrf
                                <div>
                                    <input type="hidden" name="id" value="{{ $contact['id'] }}">
                                    <button class="delete-button" type="submit">削除</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection