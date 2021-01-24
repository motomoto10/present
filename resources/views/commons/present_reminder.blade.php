    <div class="container">
        <div class="row justify-content-center">
        @foreach ($giving_users as $giving_user)
            @foreach ($giving_user->anniversaries as $anniversary)
                    @if(count($anniversary->presents ) == 0)
                    <div class="col-sm-3 m-2 box25">
                                <div class="text-black text-center">
                                  <div>{!! (e($giving_user->name)) !!}</div>
                                  <div>
                                    <h5>{!! (e($giving_user->relation)) !!}の{!! (e($anniversary->anniversary)) !!}</h5>
                                    <p>{!! (e($anniversary->day->format('n月j日') )) !!}</p>
                                    <button class="btn btn-default col-sm">{!! link_to_route('presents.create', 'プレゼントを登録', ['id' => $giving_user->id,'anniversary' => $anniversary->id], []) !!}</button>
                                </div>
                            </div>
                    </div>
                    @endif
                @endforeach  
            @endforeach
        </div>
    </div>