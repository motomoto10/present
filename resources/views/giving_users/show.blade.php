@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>{!! ($giving_user->user->name) !!}の登録した{!! ($giving_user->name) !!}さんの詳細です。</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
            @endif
        </div>
        <div class="container" >
        @include('giving_users.giving_users')
            <div class="row justify-content-center">
            @foreach ($giving_user->anniversaries as $anniversary)
                <div class="col-sm-3 m-2">
                            <div class="box-rose">
                              <div class="text-black text-center">
                              <div>
                                <p>お祝い：{!! (e($anniversary->anniversary)) !!}</p>
                                <p>日程：{!! (e($anniversary->day->format('n月j日'))) !!}</p>
                                <button class="btn col-sm">{!! link_to_route('anniversaries.show', 'お祝いの詳細', ['id' => $giving_user->id,'anniversary' =>$anniversary->id], ['class' => 'btn-flat-dashed-border']) !!}</button>
                                @if (Auth::id() == $giving_user->user_id)
                                <button class="btn col-sm">{!! link_to_route('presents.create', 'プレゼントを登録', ['id' => $giving_user->id,'anniversary' => $anniversary->id], ['class' => 'btn-flat-dashed-border']) !!}</button>
                                @endif
                            </div>
                          </div>
                        </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection