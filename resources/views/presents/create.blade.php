@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>{{ $anniversary->giving_user->name }}の{{$anniversary->anniversary}}に何を送りますか？</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
                {!! Form::open(['route' => ['presents.store','anniversary' => $anniversary->id,'id' => $anniversary->giving_user_id]]) !!}
                    <div class="form-group">
                        プレゼント：{!! Form::textarea('present', old('present'), ['class' => 'form-control', 'rows' => '1']) !!}
                        送った年：{!! Form::select('year',['21' => '2021','20' => '2020','19' => '2019','18'=>'2018',]) !!}
                        このプレゼントへの思い：{!! Form::textarea('explain', old('explain'), ['class' => 'form-control', 'rows' => '3']) !!}
                    </div>
                        {!! Form::submit('登録', ['class' => 'btn btn-danger btn-block']) !!}
                {!! Form::close() !!}
            @else
            
            @endif
        </div>
    </div>
@endsection