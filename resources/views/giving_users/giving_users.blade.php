<div class="row justify-content-center">
                <div class="col-sm-5 m-1">
                    <div class="box-lavender">
                        <div class="text-black row">
                        <div class="col-sm-4 d-flex align-items-center justify-content-center">{!!($giving_user->name) !!}</div>
                        <div class="col-sm-8">
                            <p>＜この人の情報＞</p>
                            <p>関係性：{!! ($giving_user->relation) !!}</p>
                            <p>性別：{!! ($giving_user->gender) !!}</p>
                            <p>年齢：{!! ($giving_user->old) !!}</p>
                            <p>登録したお祝い数{{ $giving_user->anniversaries->count()}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div>        
                        @if (Auth::id() == $giving_user->user_id)
                        <button class="btn col-sm">{!! link_to_route('anniversaries.create', 'この人のお祝いを登録する', [$giving_user->id], ['class' => 'btn-full-green']) !!}</button>
                        <button class="btn col-sm">{!! link_to_route('giving_users.edit', 'この人を修正する', [$giving_user->id], ['class' => 'btn-full-pop']) !!}</button>
                        <button class="btn col-sm">
                        {!! Form::open(['route' => ['giving_users.destroy','giving_user' => $giving_user->id], 'method' => 'delete']) !!}
                            {!! Form::submit('削除する', ['class' => 'btn col-sm btn-full-red']) !!}
                        {!! Form::close() !!}
                        </button>
                        @endif
                    </div>
                </div>
</div>