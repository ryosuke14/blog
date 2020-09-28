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
                <div class="card-header">ブログ投稿</div>
                    <div class="card-body">
                        <form action="{{ route('create') }}" method ="post" enctype="multipart/form-data">
                            @csrf
                            @if (count($errors) > 0)
                            <p style="color: red; text-align: center;">再入力してください</p>
                             @endif
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="date" class="col-md-6 col-form-label text-md-right">{{ _('タイトル') }}</label>
                                    <input class="form-control" type="text" name="title" >
                                </div>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="erea_code" class="col-md-6 col-form-label text-md-right">{{ _('本文') }}</label>
                                    <textarea class="form-control" name="text" rows="15"></textarea>
                                </div>
                                @if ($errors->has('text'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('text') }}</strong>
                                </span>
                            @endif
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="event_name" class="col-md-6 col-form-label text-md-right">{{ _('タグ') }}</label>
                                    @foreach($tags as $key=>$tag)
                                    <div class="form-check form-check-inline">
                                        <label for="{{ $key }}"><input type="checkbox" name="tag[]" value="{{ $tag }}" id="{{ $key }}">{{ $key }}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('写真') }}</label>

                                <div class="col-md-6">
                                    <input id="photo" type="file" name="photo" class="@error('photo') is-invalid @enderror">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" >
                                {{ __('内容確認') }}
                            </button>
                         </form>    
                    </div>
                </div>
            </div>          
        </div>
    </div>
</div>
@endsection
