@if (count($giving_users) > 0)
    
    <section>
        <div class="d-flex justify-content-center align-items-center mb-6">
            <div>
                <ul class="list-unstyled">
                    <li class="media mb-3">
                        <div class="media-body">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="2">投稿者</th>
                                        <th scope="col">名前</th>
                                        <th scope="col">関係性</th>
                                        <th scope="col">お祝い</th>
                                        <th scope="col">日程</th>
                                        <th scope="col">プレゼント</th>
                                        <th scope="col">あげた年</th>
                                        <th scope="col">アクション</th>
                                    </tr>
                                </thead>
                                <tbody>
                                            @foreach ($giving_users as $giving_user)
                                                @if (count($giving_users) > 1)
                                                <tr>
                                                    <th>{!! (e($giving_user->user->name)) !!}</th>
                                                    <td>{!! link_to_route('giving_user.show', '詳細', [$giving_user->id]) !!}</td>
                                                    <td>{!! (e($giving_user->name)) !!}</td>
                                                    <td>{!! (e($giving_user->relation)) !!}</td>
                                                    
                                                    @foreach ($giving_user->anniversaries as $anniversary)
                                                    @if (count($giving_user->anniversaries) > 1)
                                                    <tr>
                                                        <th colspan="2">{!! (e($giving_user->user->name)) !!}</th>
                                                        <td>{!! (e($giving_user->name)) !!}</td>
                                                        <td>{!! (e($giving_user->relation)) !!}</td>
                                                                <td>{!! (e($anniversary->anniversary)) !!}</td>
                                                                <td>{!! (e($anniversary->day->format('n月j日') )) !!}</td>
                                                            @foreach ($anniversary->presents as $present)
                                                                @if (count($anniversary->presents) > 1)
                                                                <tr>
                                                                    <th colspan="2">{!! (e($giving_user->user->name)) !!}</th>
                                                                    <td>{!! (e($giving_user->name)) !!}</td>
                                                                    <td>{!! (e($giving_user->relation)) !!}</td>
                                                                    <td>{!! (e($anniversary->anniversary)) !!}</td>
                                                                    <td>{!! (e($anniversary->day->format('n月j日') )) !!}</td>
                                                                    <td>{!! (e($present->present)) !!}</td>
                                                                    <td>{!! (e($present->year)) !!}</td>
                                                                    @if (Auth::id() == $giving_user->user_id)
                                                                    <td>{!! link_to_route('anniversaries.create', 'edit', [$anniversary->id]) !!}</td>
                                                                @else
                                                                    <td>いいね</td>
                                                                @endif
                                                                @else
                                                                    <td>{!! (e($present->present)) !!}</td>
                                                                    <td>{!! (e($present->year)) !!}</td>
                                                                    @if (Auth::id() == $giving_user->user_id)
                                                                    <td>{!! link_to_route('anniversaries.show', 'edit', [$anniversary->id]) !!}</td>
                                                                @else
                                                                    <td>いいね</td>
                                                                @endif
                                                                @endif          
                                                                
                                                                
                                                            @endforeach
                                                    @else
                                                                <td>{!! (e($anniversary->anniversary)) !!}</td>
                                                                <td>{!! (e($anniversary->day->format('n月j日') )) !!}</td>
                                                            @foreach ($anniversary->presents as $present)
                                                                @if (count($anniversary->presents) > 1)
                                                                <tr>
                                                                    <th colspan="2">{!! (e($giving_user->user->name)) !!}</th>
                                                                    <td>{!! (e($giving_user->name)) !!}</td>
                                                                    <td>{!! (e($giving_user->relation)) !!}</td>
                                                                    <td>{!! (e($anniversary->anniversary)) !!}</td>
                                                                    <td>{!! (e($anniversary->day->format('n月j日') )) !!}</td>
                                                                    <td>{!! (e($present->present)) !!}</td>
                                                                    <td>{!! (e($present->year)) !!}</td>
                                                                    @if (Auth::id() == $giving_user->user_id)
                                                                    <td>{!! link_to_route('anniversaries.show', 'edit', [$anniversary->id]) !!}</td>
                                                                @else
                                                                    <td>いいね</td>
                                                                @endif
                                                                @else
                                                                    <td>{!! (e($present->present)) !!}</td>
                                                                    <td>{!! (e($present->year)) !!}</td>
                                                                    @if (Auth::id() == $giving_user->user_id)
                                                                    <td>{!! link_to_route('anniversaries.show', 'edit', [$anniversary->id]) !!}</td>
                                                                @else
                                                                    <td>いいね</td>
                                                                @endif
                                                                @endif          
                                                                
                                                                
                                                            @endforeach
                                                
                                                    @endif
                                                    
                                                    @endforeach
                                                    </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <img class="mr-2 rounded" src="{{ Gravatar::get($giving_user->user->email, ['size' => 50]) }}" alt="">
                                                    </td>
                                                    @if (Auth::id() == $giving_user->user_id)
                                                    @foreach ($giving_user->anniversaries as $anniversary)
                                                        @foreach ($anniversary->presents as $present)
                                                        <td colspan="2">
                                                            {{-- 削除ボタンのフォーム --}}
                                                            {!! Form::open(['route' => ['giving_users.destroy', $giving_user->id], 'method' => 'delete']) !!}
                                                                {!! Form::submit('送りたい相手を消す', ['class' => 'btn btn-danger btn-sm']) !!}
                                                            {!! Form::close() !!}
                                                        </td>
                                                            <td colspan="2">
                                                                {!! Form::open(['route' => ['anniversaries.destroy', $anniversary->id], 'method' => 'delete']) !!}
                                                                {!! Form::submit('お祝いを消す', ['class' => 'btn btn-danger btn-sm']) !!}
                                                                {!! Form::close() !!}
                                                            </td>
                                                                <td colspan="2">
                                                                    {!! Form::open(['route' => ['presents.destroy', $present->id], 'method' => 'delete']) !!}
                                                                    {!! Form::submit('プレゼントを消す', ['class' => 'btn btn-danger btn-sm']) !!}
                                                                    {!! Form::close() !!}
                                                                </td>
                                                        @endforeach
                                                    @endforeach
                                                    @endif
                                                </tr>
                                                @else
                                                <tr>
                                                    <th colspan="2">{!! (e($giving_user->user->name)) !!}</th>
                                                        <td>{!! (e($giving_user->name)) !!}</td>
                                                        <td>{!! (e($giving_user->relation)) !!}</td>
                                                        @foreach ($giving_user->anniversaries as $anniversary)
                                                    @if (count($giving_user->anniversaries) > 1)
                                                    <tr>
                                                        <th colspan="2">{!! (e($giving_user->user->name)) !!}</th>
                                                        <td>{!! (e($giving_user->name)) !!}</td>
                                                        <td>{!! (e($giving_user->relation)) !!}</td>
                                                                <td>{!! (e($anniversary->anniversary)) !!}</td>
                                                                <td>{!! (e($anniversary->day->format('n月j日') )) !!}</td>
                                                            @foreach ($anniversary->presents as $present)
                                                                @if (count($anniversary->presents) > 1)
                                                                <tr>
                                                                    <th colspan="2">{!! (e($giving_user->user->name)) !!}</th>
                                                                    <td>{!! (e($giving_user->name)) !!}</td>
                                                                    <td>{!! (e($giving_user->relation)) !!}</td>
                                                                    <td>{!! (e($anniversary->anniversary)) !!}</td>
                                                                    <td>{!! (e($anniversary->day->format('n月j日') )) !!}</td>
                                                                    <td>{!! (e($present->present)) !!}</td>
                                                                    <td>{!! (e($present->year)) !!}</td>
                                                                @else
                                                                    <td>{!! (e($present->present)) !!}</td>
                                                                    <td>{!! (e($present->year)) !!}</td>
                                                                
                                                                @endif
                                                                
                                                            @endforeach
                                                    @else
                                                                <td>{!! (e($anniversary->anniversary)) !!}</td>
                                                                <td>{!! (e($anniversary->day->format('n月j日') )) !!}</td>
                                                            @foreach ($anniversary->presents as $present)
                                                                @if (count($anniversary->presents) > 1)
                                                                <tr>
                                                                    <th colspan="2">{!! (e($giving_user->user->name)) !!}</th>
                                                                    <td>{!! (e($giving_user->name)) !!}</td>
                                                                    <td>{!! (e($giving_user->relation)) !!}</td>
                                                                    <td>{!! (e($anniversary->anniversary)) !!}</td>
                                                                    <td>{!! (e($anniversary->day->format('n月j日') )) !!}</td>
                                                                    <td>{!! (e($present->present)) !!}</td>
                                                                    <td>{!! (e($present->year)) !!}</td>
                                                                @else
                                                                    <td>{!! (e($present->present)) !!}</td>
                                                                    <td>{!! (e($present->year)) !!}</td>
                                                                @endif
                                                               
                                                            @endforeach
                                                
                                                    @endif
                                                    @if (Auth::id() == $giving_user->user_id)
                                                                    <td>修正</td>
                                                                @else
                                                                    <td>いいね</td>
                                                                @endif
                                                    @endforeach
                                                    </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <img class="mr-2 rounded" src="{{ Gravatar::get($giving_user->user->email, ['size' => 50]) }}" alt="">
                                                    </td>
                                                    @if (Auth::id() == $giving_user->user_id)
                                                    @foreach ($giving_user->anniversaries as $anniversary)
                                                        @foreach ($anniversary->presents as $present)
                                                        <td colspan="2">
                                                            {{-- 削除ボタンのフォーム --}}
                                                            {!! Form::open(['route' => ['giving_users.destroy', $giving_user->id], 'method' => 'delete']) !!}
                                                                {!! Form::submit('送りたい相手を消す', ['class' => 'btn btn-danger btn-sm']) !!}
                                                            {!! Form::close() !!}
                                                        </td>
                                                            <td colspan="2">
                                                                {!! Form::open(['route' => ['anniversaries.destroy', $anniversary->id], 'method' => 'delete']) !!}
                                                                {!! Form::submit('お祝いを消す', ['class' => 'btn btn-danger btn-sm']) !!}
                                                                {!! Form::close() !!}
                                                            </td>
                                                                <td colspan="2">
                                                                    {!! Form::open(['route' => ['presents.destroy', $present->id], 'method' => 'delete']) !!}
                                                                    {!! Form::submit('プレゼントを消す', ['class' => 'btn btn-danger btn-sm']) !!}
                                                                    {!! Form::close() !!}
                                                                </td>
                                                        @endforeach
                                                    @endforeach
                                                    @endif
                                                </tr>
                                                @endif
                                
                                @endforeach   
                                </tbody>
                            </table>
                        </div>
                    </li>
           
                </ul>
            </div>
        </div>
    </section>

    
    {{-- ページネーションのリンク --}}
    {{ $giving_users->links() }}
@endif