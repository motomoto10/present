@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            <h1>{{ $anniversary->giving_user->name }}の{{$anniversary->anniversary}}へのプレゼント</h1>
            <img class="w-25" src="{{ asset('img/present.png') }}">
        </div>
    </div>
    <div class="row justify-content-center">
                <div class="col-sm-6">
                        <div class="box25">
                            <div class="row no-gutters">
                                <div class="col-3 col-img">
                                    <img class="rounded img-fluid" src="/storage/profile_images/{{ $present->anniversary->giving_user->user->id }}.jpg"width="150px" height="150px" alt="">
                                </div>
                                <div class="col-9">
                                    <div>
                                        <h3>{{ $present->anniversary->giving_user->user->name }}</h3>

                                        <p>{{ $present->anniversary->giving_user->user->gender}}/{{ $present->anniversary->giving_user->user->born}}</p>
                                        <p>自己紹介:{{ $present->anniversary->giving_user->user->myself}}</p>
                                        <p>これまでに登録した人数{{ $present->anniversary->giving_user->user->giving_users->count() }}</p>
                                        <p>これまでに登録したお祝い数{{ $present->anniversary->giving_user->user->anniversaries->count()}}</p>
                                        <p>これまでに登録したプレゼント数</p>
                                        <p>獲得したいいね数{{ $present->anniversary->giving_user->user->favorite_users->count()}}</p>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div> 
                        <button class="btn col-sm">{!! link_to_route('users.show', 'ユーザーの詳細', ['user' => $present->anniversary->giving_user_id], ['class' => 'btn-full-green']) !!}</button>
                        @if (Auth::id() == $present->anniversary->user_id)
                        <button class="btn col-sm">{!! link_to_route('presents.edit', 'このプレゼントを修正する', ['id' => $present->anniversary->giving_user_id,'anniversary' => $anniversary->id,'present' => $present->id], ['class' => 'btn-full-pop']) !!}</button>
                        <button class="btn col-sm">
                        @if (Auth::id() == $anniversary->user_id)
                            {!! Form::open(['route' => ['presents.destroy','present' => $present->id,'anniversary' => $anniversary->id,'id' => $anniversary->user_id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除する', ['class' => 'btn btn-full-red btn-sm my-2']) !!}
                            {!! Form::close() !!}
                        @endif
                        </button>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="box-yellow">
                        <div class="text-black row">
                            <div class="col-sm-12">
                            <p>{!! (e($anniversary->giving_user->name)) !!}へのプレゼント</p>
                            <p>関係性：{!! (e($anniversary->giving_user->relation)) !!}</p>
                            <p>性別：{!! (e($anniversary->giving_user->gender)) !!}</p>
                            <p>年齢：{!! (e($anniversary->giving_user->old)) !!}</p>
                            <p>お祝い：{!! (e($anniversary->anniversary)) !!}</p>
                            <p>日程：{!! (e($anniversary->day->format('n月j日') )) !!}</p>
                            <p>プレゼント：{!! (e($present->present)) !!}</p>
                            <p>あげた年：{!! (e($present->year)) !!}</p>
                            <p>ーこのプレゼントへの思いー</p>
                            <p>{!! (e($present->explain)) !!}</p>
                            <p>いいねの数{{ $present->favorite->count()}}</p>
                            <p>コメントの数{{ $present->comment->count()}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    
                </div>
    </div>
    <div class="container mt-3" >
        <div class="row justify-content-center">
                    <div class="col-sm-6">
                        <h3 class="text-center">いいねをくれた人</h3>
                        @foreach($favorites as $favorite)
                        <div class="box25 my-3">
                        <div class="row no-gutters">
                                <div class="col-3 col-img">
                                    <img class="rounded img-fluid" src="/storage/profile_images/{{ $present->anniversary->giving_user->user->id }}.jpg"width="150px" height="150px" alt="">
                                </div>
                                <div class="col-9">
                                    <div>
                                        <h3>{{ $favorite->name }}</h3>

                                        <p>{{ $favorite->gender}}/{{$favorite->born}}</p>
                                        <p>自己紹介:{{ $favorite->myself}}</p>
                                        <button class="btn col-sm">{!! link_to_route('users.show', 'ユーザーの詳細', ['user' => $favorite->id], ['class' => 'btn-full-green']) !!}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-sm-6">
                        <h3 class="text-center">コメント</h3>
                        @foreach($comments as $comment)
                        <div class="box-yellow my-3">
                            <p>{{$comment->user}}</p>
                            <p>{{$comment->comment}}</p>
                            <p>{{$comment->created_at}}</p>
                        @endforeach
                        </div>
                        
                    </div>
        </div>
    </div>    
@endsection