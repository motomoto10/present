@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>{!! (e($giving_user->user->name)) !!}から{!! (e($giving_user->name)) !!}へ贈った{!! (e($anniversary->anniversary)) !!}のお祝いの詳細です</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
            @endif
        </div>
    </div>
    @foreach ($giving_user->anniversaries as $anniversary)
                    @if(count($anniversary->presents) > 0)
                    <div class="col-sm-3 m-2 box25">
                                <div>
                                    <div>{!! (e($giving_user->name)) !!}</div>
                                    <div>
                                        <h5>{!! (e($giving_user->relation)) !!}の{!! (e($anniversary->anniversary)) !!}</h5>
                                        <p>{!! (e($anniversary->presents)) !!}</p>
                                        <p>{!! (e($anniversary->presents)) !!}</p>
                                        <button class="btn btn-default col-sm">{!! link_to_route('presents.create', 'プレゼントを登録', ['id' => $giving_user->id,'anniversary' => $anniversary->id], ['class' => 'btn-flat-dashed-border']) !!}</button>
                                    </div>
                                </div>
                    </div>
                    @endif
                @endforeach 
@endsection