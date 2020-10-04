@extends('layouts.base')

@section('title', 'ブログ詳細')

@section('content')

<style>
    .content {
        padding-top: 40px;
        padding-bottom: 40px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 content">
            <div class="card">
                <form action="{{ route('created') }}" method ="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                    <div class="form-group col-md-6 row">
                        <label>タイトル:</label>
                        {{ $inputs['title'] }}
                         <input class="form-control" type="hidden" name="title" value="{{ $inputs['title'] }}" >
                    </div>
                    <div class="form-group col-md-6 row">
                        <label>本文:</label>
                        {{ $inputs['text'] }}
                        <input class="form-control" type="hidden" name="text" value="{{ $inputs['text'] }}" >
                    </div>
                    <div class="form-group col-md-6 row">
                        <label>タグ:</label>
                        {{ implode(',', $tags) }}
                        @foreach ($tags as $tag_id => $tag)
                        <input class="form-control" type="hidden" name="tag[]" value="{{ $tag_id }}">
                        @endforeach
                    </div>
                    <div class="form-group col-md-6 row">
                        <label>写真:</label>
                        <img src=" {{ url($uploadedFile) }}" alt="" width="100px" height="100px">
                        <input class="form-control" type="hidden" name="photo" value="{{ $uploadedFile }}">
                    </div>
                    <button type="submit" class="btn btn-primary" >
                        {{ __('投稿する') }}
                    </button>
                </form>  
            </div>       
        </div>
    </div>
</div>
@endsection
