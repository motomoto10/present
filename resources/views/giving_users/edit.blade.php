@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>どこを直しますか？</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
            <div class="formarea container">
                {!! Form::open(['route' => ['giving_users.update','giving_user' => $giving_user->id],'method'=>'put']) !!}
                    <div class="form-group row">
                        名前：{!! Form::textarea('name', old('name'), ['class' => 'form-control col-sm-10', 'rows' => '1']) !!}
                        {!! Form::label('gender', '関係性:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10 mb-2">
                            @foreach($relation as $key => $value)
                                <label class="checkbox-inline">
                                    {!! Form::radio('relation', $value) !!}
                                    {{ $value }}
                                </label>
                            @endforeach
                        </div>
                        {!! Form::label('gender', '性別:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10 mb-2">
                            @foreach($genders as $key => $value)
                                <label class="checkbox-inline">
                                    {!! Form::radio('gender', $value) !!}
                                    {{ $value }}
                                </label>
                            @endforeach
                        </div>
                        {!! Form::label('old', '年齢:', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10 mb-2">
                            @foreach($old as $key => $value)
                                <label class="checkbox-inline">
                                    {!! Form::radio('old', $value) !!}
                                    {{ $value }}
                                </label>
                            @endforeach
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
    </div>
@endsection