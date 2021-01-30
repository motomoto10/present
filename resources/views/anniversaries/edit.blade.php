@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>{{ $giving_user->relation }}の{{$giving_user->name}}のお祝いの訂正</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
                <div class="formarea container">
                {!! Form::open(['route' => ['anniversaries.update','id' => $giving_user->id,'anniversary' => $anniversary->id],'method'=>'put']) !!}
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
                        {!! Form::submit('登録', ['class' => 'btn btn-flat-border']) !!}
                {!! Form::close() !!}
                </div>
            @else
            
            @endif
        </div>
    </div>
@endsection