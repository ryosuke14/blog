@extends('layouts.base')

@section('title', '投稿完了')

@section('content')
<style>
    .complete {
        text-align: center;
    }
</style>
<div class="complete">
    <h2 class="">投稿完了</h2>
    <p><a href="{{ route('index') }}">トップへ</a></p>
</div>
@endsection