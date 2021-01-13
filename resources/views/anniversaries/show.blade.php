@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>このお祝いの詳細です</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
            
            @else
            
            @endif
        </div>
    </div>
@endsection