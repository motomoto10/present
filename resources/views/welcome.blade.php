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
                <div class="col-sm my-2">{!! link_to_route('giving_users.create', '送りたい相手を登録する', [], ['class' => 'btn-square-pop btn-hover']) !!}</div>
                <div class="col-sm my-2">{!! link_to_route('users.presentlist', '他のユーザーのプレゼントを確認する', [], ['class' => 'btn-square-green']) !!}</div>
                <div class="col-sm my-2">{!! link_to_route('presnts.favorite_present', 'あなたのいいねしたプレゼント', ['id' => $user->id], ['class' => 'btn-square-pink']) !!}</div>
            
            @else
            <div class="text-center">
                <h1>ようこそ！<br>
                Presentへ！！</h1>
            </div>    
                <img class="w-25" src="{{ asset('img/present.png') }}">
                <h2 class="mb-4">あなたの大切な人へプレゼントを送りましょう</h2>
                <div class="container my-3 row justify-content-center">
                    <div class="box25 col-md-6">
                            <h2 class="mb-4">Presentとは？？</h2>
                            <p>
                                恋人や家族の誕生日、結婚記念日など、<br>
                                人にプレゼントを贈る機会を登録してみてください。<br>
                                大切な人へプレゼントを送る日を忘れずに管理する機能と、<br>
                                他の人がどんなプレゼントを送っているかを見る事ができます。
                            </p>
                    </div>
                </div>
                    <div class='btn_wrapper mb-3'>
                        {{-- ユーザ登録ページへのリンク --}}
                        <button class="btn btn-default col-sm">{!! link_to_route('signup.get', '新規登録はこちらから！', [], ['class' => 'btn-square-pink']) !!}</button>
                        {{-- ログインページへのリンク --}}
                        <button class="btn btn-default col-sm">{!! link_to_route('login', 'ログインはこちらから！', [], ['class' => 'btn-square-green']) !!}</button>
                    </div>
            @endif
        </div>
    </div>
@endsection