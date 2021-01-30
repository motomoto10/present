@extends('layouts.app')

@section('content')
    <div class="row">
        @include('users.card')
        @include('users.navtab')
    </div>
    <div class="container" >
        <div class="row justify-content-center">
        @foreach ($giving_users as $giving_user)
            @foreach ($giving_user->anniversaries as $anniversary)
                    @if(count($anniversary->presents) > 0)
                        @foreach ($anniversary->presents as $present)
                    <div class="col-sm-3 m-2 ">
                        <div class="box-yellow">
                            <div class="text-black text-center">
                                <div>
                                  <div>{!! (e($giving_user->name)) !!}</div>
                                  <div>
                                    <h5>{!! (e($giving_user->relation)) !!}の{!! (e($anniversary->anniversary)) !!}</h5>
                                    <p>送った年：{!! (e($present->year)) !!}</p>
                                    <p>プレゼント：{!! (e($present->present)) !!}</p>
                                    <p>ーこのプレゼントへの思いー</p>
                                    <p>{!! (e($present->explain)) !!}</p>
                                    <button class="btn btn-default col-sm">{!! link_to_route('presents.show', 'プレゼントの詳細', ['present' => $present->id,'anniversary' => $anniversary->id,'id' => $giving_user->id], ['class' => 'btn-flat-dashed-border']) !!}</button>
                                    @include('present_favorite.favorite_button')
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                @endforeach  
            @endforeach
        </div>
    </div>
@endsection