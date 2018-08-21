@php
  $title = __('actions.EditAction');
@endphp
@extends('layouts.app')
@section('content')
<table>
<thead>
<tr>
<th>id</th>
<th>user_id</th>
<th>users.name</th>
<th>date</th>
<th>actionitem_id</th>
<th>actionitems.index1text</th>
<th>from</th>
<th>to</th>
<th>text</th>
<th>value</th>
<th>created_at</th>
<th>updated_at</th>
</tr>
</thead>
<tbody>
@foreach($actions as $action)
<tr>
<td>{{ $action->id }}</td>
<td>{{ $action->user_id }}</td>
<td>{{ $action->user->name }}</td>
<td>{{ $action->date }}</td>
<td>{{ $action->actionitem_id }}</td>
<td>{{ $action->actionitem->index1text }}</td>
<td>{{ $action->from }}</td>
<td>{{ $action->to }}</td>
<td>{{ $action->text }}</td>
<td>{{ $action->value }}</td>
<td>{{ $action->created_at }}</td>
<td>{{ $action->updated_at }}</td>
</tr>
</tbody>
@endforeach
@endsection
