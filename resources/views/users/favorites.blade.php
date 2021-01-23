@extends('layouts.app')

@section('content')
    <div class="row">
        @include('users.card')
        @include('users.navtab')
    </div>
    
    <div class="card-deck container" >
        <div class="row">
            @foreach ($presents as $present)
                    <div class="col-sm-4 mb-2">
                                <div class="card text-black bg-right" style="max-width: 18rem;">
                                  <div class="card-header">{!! (e($present->anniversary->giving_user->user->name)) !!}</div>
                                  <div class="card-body">
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