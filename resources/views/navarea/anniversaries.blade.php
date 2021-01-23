 <div class="card-deck container" >
        <div class="row">
        @foreach ($giving_users as $giving_user)
            @foreach ($giving_user->anniversaries as $anniversary)
                    <div class="col-sm-4 mb-2">
                                <div class="card text-black bg-right" style="max-width: 18rem;">
                                  <div class="card-header">{!! (e($giving_user->name)) !!}</div>
                                  <div class="card-body">
                                    <p>{!! (e($giving_user->relation)) !!}</p>
                                    <p>{!! (e($giving_user->gender)) !!}</p>
                                    <p>{!! (e($giving_user->old)) !!}</p>
                                    <p>{!! (e($anniversary->anniversary)) !!}</p>
                                    <p>{!! (e($anniversary->day->format('n月j日'))) !!}</p>
                                    <button class="btn btn-default col-sm">{!! link_to_route('anniversaries.show', 'お祝いの詳細', ['id' => $giving_user->id,'anniversary' =>$anniversary->id], []) !!}</button>
                                </div>
                            </div>
                    </div>
                @endforeach  
            @endforeach
        </div>
    </div>