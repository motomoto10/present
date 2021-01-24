 <div class="container" >
        <div class="row justify-content-center">
        @foreach ($giving_users as $giving_user)
            @foreach ($giving_user->anniversaries as $anniversary)
                    <div class="col-sm-3 m-2">
                                <div class="box25">
                                  <div class="text-black text-center">
                                  <div>{!! (e($giving_user->name)) !!}</div>
                                  <div>
                                    <p>関係性：{!! (e($giving_user->relation)) !!}</p>
                                    <p>性別：{!! (e($giving_user->gender)) !!}</p>
                                    <p>年齢：{!! (e($giving_user->old)) !!}</p>
                                    <p>お祝い：{!! (e($anniversary->anniversary)) !!}</p>
                                    <p>日程：{!! (e($anniversary->day->format('n月j日'))) !!}</p>
                                    <button class="btn col-sm">{!! link_to_route('anniversaries.show', 'お祝いの詳細', ['id' => $giving_user->id,'anniversary' =>$anniversary->id], ['class' => 'btn-flat-dashed-border']) !!}</button>
                                    @if (Auth::id() == $user->id)
                                    <button class="btn col-sm">{!! link_to_route('presents.create', 'プレゼントを登録', ['id' => $giving_user->id,'anniversary' => $anniversary->id], ['class' => 'btn-flat-dashed-border']) !!}</button>
                                    @endif
                                </div>
                              </div>
                            </div>
                    </div>
                @endforeach  
            @endforeach
        </div>
    </div>