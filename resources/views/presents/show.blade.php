@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            <h1>{{ $anniversary->giving_user->name }}の{{$anniversary->anniversary}}へのプレゼント</h1>
            <img class="w-25" src="{{ asset('img/present.png') }}">
        </div>
    </div>
    <div class="container" >
        <div class="row justify-content-center">
                    <div class="col-sm-3 m-2">
                        <div class="box-yellow">
                        <div class="text-center">
                            <p>{!! (e($anniversary->giving_user->user->name)) !!}から</p>
                            <p>{!! (e($anniversary->giving_user->name)) !!}へのプレゼント</p>
                            <p>関係性：{!! (e($anniversary->giving_user->relation)) !!}</p>
                            <p>性別：{!! (e($anniversary->giving_user->gender)) !!}</p>
                            <p>年齢：{!! (e($anniversary->giving_user->old)) !!}</p>
                            <p>お祝い：{!! (e($anniversary->anniversary)) !!}</p>
                            <p>日程：{!! (e($anniversary->day->format('n月j日') )) !!}</p>
                            <p>プレゼント：{!! (e($present->present)) !!}</p>
                            <p>あげた年：{!! (e($present->year)) !!}</p> 
                            <p>いいねの数{{ $present->favorite->count()}}</p>
                            <p>コメントの数{{ $present->comment->count()}}</p>
                            @include('present_favorite.favorite_button')
                            @include('presents.destroy_button')
                        </div>
                        </div>
                    </div>
        </div>
    </div>    
@endsection