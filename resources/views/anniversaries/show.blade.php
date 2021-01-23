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
    <div class="card-deck container" >
        <div class="row">
            @foreach ($giving_user->anniversaries as $anniversary)
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
            @endforeach
        </div>
    </div>
@endsection