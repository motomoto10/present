@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>さあ！<br>
                プレゼントを送りましょう</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
            <h2 class="">もうすぐ記念日の人がいます！</h2>
            @include('commons.present_reminder')
                <!--プレゼントもらう人の登録フォームへ-->
                <div class="btn col-sm">{!! link_to_route('giving_users.create', '送りたい相手を登録する', [], ['class' => 'btn-square-pop btn-hover']) !!}</div>
                <div class="btn col-sm">{!! link_to_route('users.presentlist', '他のユーザーのプレゼントを確認する', [], ['class' => 'btn-square-green']) !!}</div>
                <div class="btn col-sm">{!! link_to_route('presnts.favorite_present', 'あなたのいいねしたプレゼント', ['id' => $user->id], ['class' => 'btn-square-pink']) !!}</div>
            
            @else
                <h1>ようこそ！<br>
                Presentへ！！</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
                <h2 class="mb-4">あなたの大切な人へプレゼントを送りましょう</h2>
                    <div class='btn_wrapper mb-3'>
                        {{-- ユーザ登録ページへのリンク --}}
                        <button class="btn btn-default col-sm">{!! link_to_route('signup.get', '新規登録はこちらから！', [], ['class' => 'btn-flat-logo']) !!}</button>
                        {{-- ログインページへのリンク --}}
                        <button class="btn btn-default col-sm">{!! link_to_route('login', 'ログインはこちらから！', [], ['class' => 'nav-link']) !!}</button>
                    </div>
                    <section>
                        <div class="box15">
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