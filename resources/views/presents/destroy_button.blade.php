@if (Auth::id() == $anniversary->user_id)
{!! Form::open(['route' => ['presents.destroy','present' => $present->id,'anniversary' => $anniversary->id,'id' => $anniversary->user_id], 'method' => 'delete']) !!}
    {!! Form::submit('削除する', ['class' => 'btn btn-square-red btn-sm my-2']) !!}
{!! Form::close() !!}
@endif