@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
                <h1>こんなプレゼントが送られています。</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
        </div>
    </div>
    <div class="container" >
        <div class="row justify-content-center">
            @foreach($anniversaries as $anniversary)
            @foreach($anniversary->presents as $present)
            <div class="col-sm-4 my-2">
                <div class="box-yellow">
                    <div class="text-black text-center">
                        <div>{!! (e($anniversary->giving_user->user->name)) !!}から{!! (e($anniversary->giving_user->name)) !!}へのプレゼント</div>
                        <div>
                            <h5>{!! (e($anniversary->giving_user->relation)) !!}の{!! (e($anniversary->anniversary)) !!}</h5>
                            <p>記念日：{!! (e($anniversary->day->format('n月j日') )) !!}</p>
                            <p>送った年：{!! (e($present->year)) !!}</p>
                            <p>プレゼント：{!! (e($present->present)) !!}</p>
                            <p>ーこのプレゼントへの思いー</p>
                            <p>{!! (e($present->explain)) !!}</p>
                            <p>いいねの数{{ $present->favorite->count()}}</p>
                            <p>コメントの数{{ $present->comment->count()}}</p>
                            <div>
                            @include('present_favorite.favorite_button')
                            @include('comments.comment_button')
                            <div class="btn btn-default col-sm">{!! link_to_route('presents.show', 'プレゼントの詳細', ['present' => $present->id,'anniversary' => $anniversary->id,'id' => $anniversary->user_id], ['class' => 'btn-flat-dashed-border']) !!}</div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
            @endforeach
            </div>
        </div>
    </div>
@endsection