@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>{{ $anniversary->giving_user->name }}の{{$anniversary->anniversary}}に何を送りますか？</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
                <div class="formarea container">
                {!! Form::open(['route' => ['presents.update','id' => $present->anniversary->giving_user_id,'anniversary' => $anniversary->id,'present' => $present->id],'method'=>'put']) !!}
                    <div class="form-group row">
                        <label for="present" class="col-sm-3 col-form-label">プレゼント：</label>
                        {!! Form::textarea('present', old('present'), ['class' => 'form-control col-sm-9', 'rows' => '1']) !!}
                        <div class="col-sm-12">
                            <label for="year" class="col-sm-3 col-form-label">送った年：</label>
                            {!! Form::select('year',['21' => '2021','20' => '2020','19' => '2019','18'=>'2018',]) !!}
                        </div>
                        <label for="explain" class="col-sm-3 col-form-label">このプレゼントへの思い：</label>
                        {!! Form::textarea('explain', old('explain'), ['class' => 'form-control col-sm-9', 'rows' => '3']) !!}
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