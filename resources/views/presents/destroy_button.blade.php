@if (Auth::id() == $anniversary->user_id)
{!! Form::open(['route' => ['presents.destroy','present' => $present->id,'anniversary' => $anniversary->id,'id' => $anniversary->user_id], 'method' => 'delete']) !!}
    {!! Form::submit('削除する', ['class' => 'btn btn-danger btn-sm']) !!}
{!! Form::close() !!}
@endif