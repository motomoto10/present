    <div class="card-deck container">
        <div class="row">
        @foreach ($giving_users as $giving_user)
            @foreach ($giving_user->anniversaries as $anniversary)
                    @if(count($anniversary->presents ) == 0)
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
                    @endif
                @endforeach  
            @endforeach
        </div>
    </div>