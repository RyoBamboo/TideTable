@extends('admin.base')
@section('content')
    <p>登録されている都道府県 <b>{{ count($prefectures) }}件</b></p>
    <p>登録されている釣り場 <b>{{ count($spots) }}件</b></p>
    <a href="/admin/spot/get">再登録</a>
    <a href="/admin/spot/delete">全削除</a>
@endsection