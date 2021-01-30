
<div class="row justify-content-center">
                <div class="col-sm-5 m-1">
                    <div class="box-rose">
                        <div class="text-black row">
                            <div class="col-sm-4 d-flex align-items-center justify-content-center">{!!($giving_user->name) !!}</div>
                            <div class="col-sm-8">
                                <p>＜このお祝いの情報＞</p>
                                <p>関係性：{!! ($giving_user->relation) !!}</p>
                                <p>性別：{!! ($giving_user->gender) !!}</p>
                                <p>年齢：{!! ($giving_user->old) !!}</p>
                                <p>お祝い：{!! (e($anniversary->anniversary)) !!}</p>
                                <p>日程：{!! (e($anniversary->day->format('n月j日'))) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div>        
                        @if (Auth::id() == $giving_user->user_id)
                        <button class="btn col-sm">{!! link_to_route('presents.create', 'このお祝いのプレゼントを登録する', ['id' => $giving_user->id,'anniversary' => $anniversary->id], ['class' => 'btn-full-green']) !!}</button>
                        <button class="btn col-sm">{!! link_to_route('anniversaries.edit', 'このお祝いを修正する', ['id' => $giving_user->id,'anniversary' => $anniversary->id], ['class' => 'btn-full-pop']) !!}</button>
                        <button class="btn col-sm">
                        {!! Form::open(['route' => ['anniversaries.destroy','id' => $giving_user->id,'anniversary' => $anniversary->id], 'method' => 'delete']) !!}
                            {!! Form::submit('削除する', ['class' => 'btn col-sm btn-full-red']) !!}
                        {!! Form::close() !!}
                        </button>
                        @endif
                    </div>
                </div>
</div>