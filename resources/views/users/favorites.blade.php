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
                                  <div>{!! (e($present->anniversary->giving_user->user->name)) !!}</div>
                                  <div>
                                    <p>{!! (e($present->anniversary->giving_user->name)) !!}</p>
                                    <p>{!! (e($present->anniversary->giving_user->relation)) !!}</p>
                                    <p>{!! (e($present->anniversary->anniversary)) !!}</p>
                                    <p>{!! (e($present->anniversary->day->format('n月j日') )) !!}</p>
                                    <p>{!! (e($present->present)) !!}</p>
                                    <p>{!! (e($present->year)) !!}</p> 
                                    <p>いいねの数{{ $present->comment->count()}}</p>
                                </div>
                            </div>
                    </div>
            @endforeach
        </div>
    </div>
<div>{{ $presents->links() }}</div>
@endsection