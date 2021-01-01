@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>さあ！<br>
                プレゼントを送りましょう</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
                
                <!--プレゼントもらう人の登録フォームへ-->
                <button class="btn btn-default col-sm">{!! link_to_route('giving_user.get', '送りたい相手を登録する', [], ['class' => 'nav-link']) !!}</button>
@include('giving_users.giving_users')
            
            @else
                <h1>ようこそ！<br>
                Presentへ！！</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
                <h2 class="mb-4">あなたの大切な人へプレゼントを送りましょう</h2>
                    <div class='btn_wrapper mb-3'>
                        {{-- ユーザ登録ページへのリンク --}}
                        <button class="btn btn-default col-sm">{!! link_to_route('signup.get', '新規登録はこちらから！', [], ['class' => 'nav-link']) !!}</button>
                        {{-- ログインページへのリンク --}}
                        <button class="btn btn-default col-sm">{!! link_to_route('login', 'ログインはこちらから！', [], ['class' => 'nav-link']) !!}</button>
                    </div>
                    <section>
                        <div class="about_wrapper">
                            <h2 class="display-4 mb-4">Presentとは？？</h2>
                            <p>
                                贈り物をもらうと心が温まりますよね。<br>
                                Present!は人へプレゼントを贈って心温まる機会を増やすため作られました。<br>
                                大切な人へプレゼントを送る日を忘れずに管理する機能と、<br>
                                他の人がどんなプレゼントを送っているかを見る事ができます。<br>
                                恋人や家族の誕生日、結婚記念日など人に物を贈る機会に利用してみてください。
                            </p>
                            
                        </div>
                    </section>
            @endif
        </div>
    </div>
@endsection