@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>さあ！<br>
                プレゼントを送りましょう</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
                
                <!--プレゼントもらう人の登録フォームへ-->
                <button class="btn btn-default col-sm">{!! link_to_route('giving_users.create', '送りたい相手を登録する', [], ['class' => 'nav-link']) !!}</button>
@include('giving_users.giving_users')
            @endif
        </div>
    </div>
@endsection