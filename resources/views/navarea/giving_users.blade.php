 <div class="container" >
        <div class="row justify-content-center">
        @foreach ($giving_users as $giving_user)
                    <div class="col-sm-3 m-2 box25">
                      <div class="text-black text-center">
                        <div>
                          <h3>{!! (e($giving_user->name)) !!}</h3>
                          </div>
                          <div>
                            <p>関係性：{!! (e($giving_user->relation)) !!}</p>
                            <p>性別：{!! (e($giving_user->gender)) !!}</p>
                            <p>年齢：{!! (e($giving_user->old)) !!}</p>
                            <p>登録したお祝い数{{ $giving_user->anniversaries->count()}}</p>
                            <button class="btn btn-default col-sm">{!! link_to_route('giving_users.show', '詳細へ', ['giving_user' => $giving_user->id], []) !!}</button>
                            <button class="btn btn-default col-sm">{!! link_to_route('anniversaries.create', 'お祝いを登録', ['id' => $giving_user->id], []) !!}</button>
                        </div>
                      </div>
                    </div>
            @endforeach
        </div>
    </div>