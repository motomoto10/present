@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <img class="rounded img-fluid" src="/storage/profile_images/{{ $user->id }}.jpg"width="100px" height="100px" alt="">
                </div>
                <button class="btn btn-default col-sm">{!! link_to_route('profile.index', 'プロフィール画像を変更する', [], ['class' => 'nav-link']) !!}</button>
            </div>
            <div>
                {!! link_to_route('users.edit', '編集', ['user' => $user->id]) !!}
            </div>
        </aside>
        <div class="col-sm-8">
        @include('users.navtab')
        </div>
    </div>
@endsection