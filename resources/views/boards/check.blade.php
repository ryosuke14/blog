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
                <form action="/board/create" method ="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-6 row">
                        <label>タイトル:</label>
                        {{ $inputs['title'] }}
                        <input class="form-control" type="hidden" name="title" >
                    </div>
                    <div class="form-group col-md-6 row">
                        <label>本文:</label>
                        {{ $inputs['text'] }}
                        <input class="form-control" type="hidden" name="text" >
                    </div>
                    <div class="form-group col-md-6 row">
                        <label>タグ:</label>
                        {{ implode(',', $inputs['tag']) }}
                        @foreach ($inputs['tag'] as $tag_id => $tg)
                        <input class="form-control" type="hidden" name="tg[]" value="{{ $tag_id }}">
                        @endforeach
                    </div>
                    <div class="form-group col-md-6 row">
                        <label>写真:</label>
                        <img src=" {{ url($uploadedFile) }}" alt="" width="100px" height="100px">
                        <input class="form-control" type="hidden" name="photo" value="{{ $uploadedFile }}">
                    </div>
                    <button type="submit" class="btn btn-primary" >
                        {{ __('内容確認') }}
                    </button>
                </form>  
            </div>       
        </div>
    </div>
</div>
@endsection
