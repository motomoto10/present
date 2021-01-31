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
                        {!! Form::label('anniversary', 'お祝い:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10 mb-2">
                            @foreach($anniversaries as $key => $value)
                                <label class="checkbox-inline">
                                    {!! Form::radio('anniversary', $value) !!}
                                    {{ $value }}
                                </label>
                            @endforeach
                        </div>
                        <label for="day" class="col-sm-2 col-form-label">日付：</label>
                        <div class="col-sm-10">
                        {!! Form::date('day', old('day'), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                        <div class="col-12">
                        {!! Form::submit('修正する', ['class' => 'btn btn-square-red']) !!}
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