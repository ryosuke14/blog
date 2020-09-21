
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header">ブログ投稿</div>
                @if(count($errors)>0)
                <div>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                    <form action="/board/create" method ="post">
                        @csrf
                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">タイトル</label>
                            <div class="col-md-6">
                            <input class="form-control" type="text" name="title" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="erea_code" class="col-md-8 col-form-label text-md-right">本文</label>
                            <div class="col-md-6">
                            <textarea class="form-control" name="text" rows="10"></textarea>
                        </div>
                        <div class="form-group row">
                            <label for="event_name" class="col-md-4 col-form-label text-md-right">{{ __('タグ') }}</label>

                            <div class="col-md-6">
                            @foreach($tags as $key=>$tag)
                            <div class="form-check form-check-inline">

                                <input type="checkbox" name="tag" value="{{$tag}}" id="tag{{$key}}">{{$key}}</input>
                            </div>
                            @endforeach
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4 mt:10">
                                <button type="submit" class="btn btn-primary" >
                                    {{ __('イベント作成') }}
                                </button>

                            </div>
                        </div>
                    </form>
               
            </div>
        </div>
    </div>
</div>

