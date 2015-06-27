@extends('admin.base')
@section('content')
    <div class="uk-grid">
        <div class="uk-width-2-1">
            <a href="/admin/tide/" class="uk-button">潮汐データ管理</a>
            <a href="/admin/spot/" class="uk-button">場所データ管理</a>
            <a href="/admin/weather/" class="uk-button">天気データ管理</a>
        </div>
    </div>
@endsection