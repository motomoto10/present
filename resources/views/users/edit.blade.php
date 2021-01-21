@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>あなたの変更です</h1>
                
                <img class="w-25" src="{{ asset('img/present.png') }}">
                {!! Form::open(['route' => ['users.update','user' => $user->id],'method'=>'put']) !!}
                    <div class="form-group">
                        名前：{!! Form::textarea('name', old('name'), ['class' => 'form-control', 'rows' => '1']) !!}
                        生年月日：{!! Form::date('day', old('day'), ['class' => 'form-control']) !!}
                        {!! Form::label('gender', '性別:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            @foreach($genders as $key => $value)
                                <label class="checkbox-inline">
                                    {!! Form::radio('gender', $value) !!}
                                    {{ $value }}
                                </label>
                            @endforeach
                        </div>
                        自己紹介：{!! Form::textarea('myself', old('myself'), ['class' => 'form-control', 'rows' => '2']) !!}
                    </div>
                        {!! Form::submit('登録', ['class' => 'btn btn-danger btn-block']) !!}
                {!! Form::close() !!}
            @else
            
            @endif
        </div>
    </div>
@endsection