@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>コメントする</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
                {!! Form::open(['route' => ['comment.store','id' => $present->id]]) !!}
                    <div class="form-group">
                        コメント：{!! Form::textarea('comment', old('comment'), ['class' => 'form-control', 'rows' => '3']) !!}
                    </div>
                        {!! Form::submit('登録', ['class' => 'btn btn-danger btn-block']) !!}
                {!! Form::close() !!}
            @else
            
            @endif
        </div>
    </div>
@endsection