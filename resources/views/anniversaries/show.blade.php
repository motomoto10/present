@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center">
                <h1>{!! (e($giving_user->user->name)) !!}から{!! (e($giving_user->name)) !!}への{!! (e($anniversary->anniversary)) !!}のお祝いの詳細です。</h1>
                <img class="w-25" src="{{ asset('img/present.png') }}">
        </div>
    </div>
            @include('anniversaries.anniversaries')
    <div class="container">
        <div class="row">
    @foreach ($giving_user->anniversaries as $anniversary)
                    @if(count($anniversary->presents) > 0)
                    @foreach($presents as $present)
                    <div class="col-sm-3 m-2">
                        <div class="box-yellow">
                            <div class="text-black text-center">
                                <div>
                                    <div>
                                        <p>送った年：{!! (e($present->year)) !!}</p>
                                        <p>プレゼント：{!! (e($present->present)) !!}</p>
                                        <p>ーこのプレゼントへの思いー</p>
                                        <p>{!! (e($present->explain)) !!}</p>
                                        <button class="btn btn-default col-sm">{!! link_to_route('presents.show', 'プレゼントの詳細', ['present' => $present->id,'anniversary' => $anniversary->id,'id' => $giving_user->id], ['class' => 'btn-flat-dashed-border']) !!}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                @endforeach 
   </div>
</div>
@endsection