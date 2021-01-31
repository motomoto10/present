@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>コメントする</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-sm-3 m-2 ">
                    <div class="box-yellow">
                        <div class="text-black text-center">
                        <div>{!! (e($present->anniversary->giving_user->user->name)) !!}から{!! (e($present->anniversary->giving_user->name)) !!}へのプレゼント</div>
                            <h5>{!! (e($present->anniversary->giving_user->relation)) !!}の{!! (e($present->anniversary->anniversary)) !!}</h5>
                                <p>送った年：{!! (e($present->year)) !!}</p>
                                <p>プレゼント：{!! (e($present->present)) !!}</p>
                                <p>ーこのプレゼントへの思いー</p>
                                <p>{!! (e($present->explain)) !!}</p>
                                <p>いいねの数{{ $present->favorite->count()}}</p>
                                <p>コメントの数{{ $present->comment->count()}}</p>
                            @include('present_favorite.favorite_button')
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <div class="formarea container">
                {!! Form::open(['route' => ['comment.store','id' => $present->id]]) !!}
                    <div class="form-group row">
                        <label for="comment" class="col-sm-3 col-form-label">コメント：</label>
                        {!! Form::textarea('comment', old('comment'), ['class' => 'form-controlcol-sm-9', 'rows' => '1']) !!}
                        <label for="name" class="col-sm-3 col-form-label">名前：</label>
                        {!! Form::textarea('name', old('name'), ['class' => 'form-controlcol-sm-9', 'rows' => '1']) !!}
                    </div>
                        <div class="col-12">
                        {!! Form::submit('登録', ['class' => 'btn btn-square-red']) !!}
                    </div>
                        <div class="col-12">
                        <div class="btn btn-square-white mt-3 " type="button" onclick="history.back()">戻る</div>
                    </div>
                {!! Form::close() !!}
                </div>
            @else
            
            @endif
        </div>
    </div>
@endsection