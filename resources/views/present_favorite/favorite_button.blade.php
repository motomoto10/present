<div class="row">
    <div class="col-12">
    @if (Auth::user()->is_favorites($present->id))
        {{-- 取り消しボタンのフォーム --}}
        {!! Form::open(['route' => ['preesnts.unfavorite', $present->id], 'method' => 'delete']) !!}
            {!! Form::submit('いいねを取り消す', ['class' => "btn btn-full-green btn-sm"]) !!}
        {!! Form::close() !!}
    @else
        {{-- お気に入りボタンのフォーム --}}
        {!! Form::open(['route' => ['presents.favorite', $present->id]]) !!}
            {!! Form::submit('いいね！', ['class' => "btn btn-square-white btn-sm"]) !!}
        {!! Form::close() !!}
    @endif
    </div>
</div>