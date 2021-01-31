@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>{{ $giving_user->relation }}の{{$giving_user->name}}にどんなお祝いがありますか？</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
                <div class="formarea container">
                {!! Form::open(['route' => ['anniversaries.store','id' => $giving_user->id]]) !!}
                    <div class="form-group row">
                        <label for="anniversary" class="col-sm-2 col-form-label">お祝い：</label>
                        <div class="col-sm-10">
                        {!! Form::textarea('anniversary', old('anniversary'), ['class' => 'form-control', 'rows' => '1']) !!}
                        </div>
                        <label for="day" class="col-sm-2 col-form-label">日付：</label>
                        <div class="col-sm-10">
                        {!! Form::date('day', old('day'), ['class' => 'form-control']) !!}
                        </div>
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