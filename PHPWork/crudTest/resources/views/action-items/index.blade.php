@php
  $title = __('Actionitems');
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
  <h1>{{ $title }}</h1>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>{{ __('ID') }}</th>
          <th>{{ __('User_ID') }}</th>
          <th>{{ __('Index1Text') }}</th>
          <th>{{ __('Index2Text') }}</th>
          <th>{{ __('Index2Use') }}</th>
          <th>{{ __('Index3Text') }}</th>
          <th>{{ __('Index3Use') }}</th>
          <th>{{ __('From') }}</th>
          <th>{{ __('To') }}</th>
          <th>{{ __('Text') }}</th>
          <th>{{ __('value') }}</th>
          <th>{{ __('Checkbox') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($actionitems as $actionitem)
          <tr>
            <td>{{ $actionitem->id }}</td>
            <td><a href="{{ url('action-items/'.$actionitem->id) }}">{{ $actionitem->user_id }}</a></td>
            <td><a href="{{ url('action-items/'.$actionitem->id) }}">{{ $actionitem->index1text }}</a></td>
            <td><a href="{{ url('action-items/'.$actionitem->id) }}">{{ $actionitem->index2text }}</a></td>
            <td><a href="{{ url('action-items/'.$actionitem->id) }}">{{ $actionitem->index2use }}</a></td>
            <td><a href="{{ url('action-items/'.$actionitem->id) }}">{{ $actionitem->index3text }}</a></td>
            <td><a href="{{ url('action-items/'.$actionitem->id) }}">{{ $actionitem->index3use }}</a></td>
            <td><a href="{{ url('action-items/'.$actionitem->id) }}">{{ $actionitem->from }}</a></td>
            <td><a href="{{ url('action-items/'.$actionitem->id) }}">{{ $actionitem->to }}</a></td>
            <td><a href="{{ url('action-items/'.$actionitem->id) }}">{{ $actionitem->text }}</a></td>
            <td><a href="{{ url('action-items/'.$actionitem->id) }}">{{ $actionitem->value }}</a></td>
            <td><a href="{{ url('action-items/'.$actionitem->id) }}">{{ $actionitem->checkbox }}</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
