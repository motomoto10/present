@extends('layouts.app')

@section('content')
    <div class="row">
        @include('users.card')
        @include('users.navtab')
    </div>
    
    <div class="container" >
        <div class="row justify-content-center">
            @foreach ($presents as $present)
                    <div class="col-sm-3 m-2 box25">
                                <div class="text-center">
                                    <p>{!! (e($present->anniversary->giving_user->user->name)) !!}から</p>
                                    <p>{!! (e($present->anniversary->giving_user->name)) !!}へのプレゼント</p>
                                    <p>関係性：{!! (e($present->anniversary->giving_user->relation)) !!}</p>
                                    <p>性別：{!! (e($present->anniversary->giving_user->gender)) !!}</p>
                                    <p>年齢：{!! (e($present->anniversary->giving_user->old)) !!}</p>
                                    <p>お祝い：{!! (e($present->anniversary->anniversary)) !!}</p>
                                    <p>日程：{!! (e($present->anniversary->day->format('n月j日') )) !!}</p>
                                    <p>プレゼント：{!! (e($present->present)) !!}</p>
                                    <p>あげた年：{!! (e($present->year)) !!}</p> 
                                    <p>いいねの数{{ $present->favorite->count()}}</p>
                                    <p>コメントの数{{ $present->comment->count()}}</p>
                                    @include('present_favorite.favorite_button')
                                </div>
                            </div>
                    </div>
            @endforeach
        </div>
    </div>
<div>{{ $presents->links() }}</div>
@endsection