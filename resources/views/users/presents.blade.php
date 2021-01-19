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
        <div class="media-body">
    <div class="card-deck container" >
        <div class="row">
        @foreach ($giving_users as $giving_user)
            @foreach ($giving_user->anniversaries as $anniversary)
                    @if(count($anniversary->presents ) == 0)
                    <div class="col-sm-4 mb-2">
                                <div class="card text-black bg-right" style="max-width: 18rem;">
                                  <div class="card-header">{!! (e($giving_user->name)) !!}</div>
                                  <div class="card-body">
                                    <h5 class="card-title">{!! (e($giving_user->relation)) !!}の{!! (e($anniversary->anniversary)) !!}</h5>
                                    <p class="card-text">{!! (e($anniversary->day->format('n月j日') )) !!}</p>
                                    <button class="btn btn-default col-sm">{!! link_to_route('presents.create', 'プレゼントを登録', ['id' => $giving_user->id,'anniversary' => $anniversary->id], []) !!}</button>
                                </div>
                            </div>
                    </div>
                    @endif
                @endforeach  
            @endforeach
        </div>
    </div>
</div>
        </div>
    </div>
@endsection