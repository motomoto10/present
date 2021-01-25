@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>{!! ($giving_user->user->name) !!}から{!! ($giving_user->name) !!}へ贈ったプレゼントの詳細です</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
                
                <button class="btn btn-default col-sm">{!! link_to_route('anniversaries.create', 'この人のお祝いを登録する', [$giving_user->id], ['class' => 'btn-square-green']) !!}</button>
            @endif
        </div>
          <div class="container" >
        <div class="row justify-content-center">
            @foreach ($giving_user->anniversaries as $anniversary)
                    <div class="col-sm-3 m-2">
                                <div class="box25">
                                  <div class="text-black text-center">
                                  <div>{!! (e($giving_user->name)) !!}</div>
                                  <div>
                                    <p>関係性：{!! (e($giving_user->relation)) !!}</p>
                                    <p>性別：{!! (e($giving_user->gender)) !!}</p>
                                    <p>年齢：{!! (e($giving_user->old)) !!}</p>
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