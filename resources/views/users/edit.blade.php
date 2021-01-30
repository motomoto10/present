@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>あなたの変更です</h1>
                
                <img class="w-25" src="{{ asset('img/present.png') }}">
                <div class="formarea container">
                {!! Form::open(['route' => ['users.update','user' => $user->id],'method'=>'put']) !!}
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">名前：</label>
                        {!! Form::textarea('name', old('name'), ['class' => 'form-control col-sm-9', 'rows' => '1']) !!}
                        <label for="day" class="col-sm-3 col-form-label">生年月日：</label>
                        {!! Form::date('day', old('day'), ['class' => 'form-control col-sm-9']) !!}
                        {!! Form::label('gender', '性別:', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-9">
                            @foreach($genders as $key => $value)
                                <label class="checkbox-inline">
                                    {!! Form::radio('gender', $value) !!}
                                    {{ $value }}
                                </label>
                            @endforeach
                        </div>
                        <label for="myself" class="col-sm-3 col-form-label">自己紹介：</label>
                        {!! Form::textarea('myself', old('myself'), ['class' => 'form-control col-sm-9', 'rows' => '2']) !!}
                    </div>
                        {!! Form::submit('登録', ['class' => 'btn btn-square-green btn-block']) !!}
                {!! Form::close() !!}
                </div>
            @else
            
            @endif
        </div>
    </div>
@endsection