 <div class="card-deck container" >
        <div class="row">
        @foreach ($giving_users as $giving_user)
                    <div class="col-sm-4 mb-2">
                      <div class="card text-black bg-right" style="max-width: 18rem;">
                        <div class="card-header">{!! (e($giving_user->name)) !!}</div>
                          <div class="card-body">
                            <p>{!! (e($giving_user->relation)) !!}</p>
                            <p>{!! (e($giving_user->gender)) !!}</p>
                            <p>{!! (e($giving_user->old)) !!}</p>
                            <p>登録したお祝い数{{ $giving_user->anniversaries->count()}}</p>
                            {!! link_to_route('giving_users.show', '詳細へ', ['giving_user' => $giving_user->id], []) !!}
                            <button class="btn btn-default col-sm">{!! link_to_route('anniversaries.create', 'お祝いを登録', ['id' => $giving_user->id], []) !!}</button>
                        </div>
                      </div>
                    </div>
            @endforeach
        </div>
    </div>