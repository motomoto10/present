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
        性別：{!! Form::select('gender',['男性'=>'男性','女性'=>'女性','その他'=>'その他']) !!}
        年齢：{!! Form::select('old',['不明'=>'不明','10歳以下'=>'10歳以下','10代'=>'10代','20代'=>'20代','30代'=>'30代','40代'=>'40代','50代'=>'50代','60代'=>'60代','70代'=>'70代','80代'=>'80代','90歳以上'=>'90歳以上']) !!}
                    </div>
                        {!! Form::submit('登録', ['class' => 'btn btn-danger btn-block']) !!}
                {!! Form::close() !!}
            @else
            
            @endif
        </div>
    </div>
@endsection