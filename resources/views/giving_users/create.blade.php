@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>誰に送りますか？</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
                {!! Form::open(['route' => 'giving_users.store']) !!}
                    <div class="form-group">
        名前：{!! Form::textarea('name', old('name'), ['class' => 'form-control', 'rows' => '1']) !!}
        関係性：{!! Form::textarea('relation', old('relation'), ['class' => 'form-control', 'rows' => '1']) !!}
                    </div>
                        {!! Form::submit('登録', ['class' => 'btn btn-danger btn-block']) !!}
                {!! Form::close() !!}
            @else
            
            @endif
        </div>
    </div>
@endsection