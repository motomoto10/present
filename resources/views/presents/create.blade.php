@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>誰に送りますか？</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
                {!! Form::open(['route' => ['presents.store','id' => $anniversary->id]]) !!}
                    <div class="form-group">
                        プレゼント：{!! Form::textarea('present', old('present'), ['class' => 'form-control', 'rows' => '1']) !!}
                        送った年：{!! Form::select('year',['21' => '2021','20' => '2020','19' => '2019','18'=>'2018',]) !!}
                    </div>
                        {!! Form::submit('登録', ['class' => 'btn btn-danger btn-block']) !!}
                {!! Form::close() !!}
            @else
            
            @endif
        </div>
    </div>
@endsection