@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>誰に送りますか？</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
                {!! Form::open(['route' => 'anniversaries.store']) !!}
                    <div class="form-group">
        お祝い：{!! Form::textarea('anniversary', old('anniversary'), ['class' => 'form-control', 'rows' => '1']) !!}
        日付：{!! Form::textarea('day', old('day'), ['class' => 'form-control', 'rows' => '1']) !!}
                    </div>
                        {!! Form::submit('登録', ['class' => 'btn btn-danger btn-block']) !!}
                {!! Form::close() !!}
            @else
            
            @endif
        </div>
    </div>
@endsection