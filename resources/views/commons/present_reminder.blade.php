    <div class="container">
        <div class="row justify-content-center">
            @foreach ($anniversaries as $anniversary)
                    <div class="col-sm-3 m-2 ">
                        <div class="box-rose">
                                <div class="text-black text-center">
                                <div>
                                    <h5>{!! (e($anniversary->giving_user->name)) !!}の{!! (e($anniversary->anniversary)) !!}</h5>
                                    <p>{!! (e($anniversary->day->format('n月j日') )) !!}</p>
                                    <div class="">{!! link_to_route('anniversaries.show', 'お祝いの詳細', ['id' => $anniversary->giving_user_id,'anniversary' => $anniversary->id], ['class' => 'btn-flat-dashed-border']) !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach  
        </div>
    </div>