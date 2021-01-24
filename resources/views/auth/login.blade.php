@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>まずはログインしてください</h1>
        <img class="w-25" src="{{ asset('img/present.png') }}">
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'メール') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('ログインする', ['class' => 'btn btn-flat-border btn-block']) !!}
            {!! Form::close() !!}

            {{-- ユーザ登録ページへのリンク --}}
            <p class="mt-2">初めてですか? {!! link_to_route('signup.get', '新規登録はこちら') !!}</p>
        </div>
    </div>
@endsection