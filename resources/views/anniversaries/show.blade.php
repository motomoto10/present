@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
            @if (Auth::check())
                <h1>{!! (e($giving_user->user->name)) !!}から{!! (e($giving_user->name)) !!}へ贈った{!! (e($anniversary->anniversary)) !!}のお祝いの詳細です</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
                
                <button class="btn btn-default col-sm">{!! link_to_route('presents.create', 'プレゼントを登録', ['id' => $giving_user->id,'anniversary' => $anniversary->id], ['class' => 'btn-square-green']) !!}</button>

            @endif
        </div>
    </div>
    <div class="container">
        <div class="row">
    @foreach ($giving_user->anniversaries as $anniversary)
                    @if(count($anniversary->presents) > 0)
                    @foreach($presents as $present)
                    <div class="col-sm-3 m-2 box25">
                                <div>
                                    <div>{!! (e($giving_user->name)) !!}</div>
                                    <div>
                                        <h5>{!! (e($giving_user->relation)) !!}の{!! (e($anniversary->anniversary)) !!}</h5>
                                        <p>{!! (e($present->year)) !!}</p>
                                        <p>{!! (e($present->present)) !!}</p>
                                        <p>{!! (e($present->explain)) !!}</p>
                                    </div>
                                </div>
                    </div>
                    @endforeach
                    @endif
                @endforeach 
   </div>
</div>
@endsection