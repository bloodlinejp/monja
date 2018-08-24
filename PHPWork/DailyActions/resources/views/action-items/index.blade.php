@php
  $title = __('actionitems.Actionitems');
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
  <h1>{{ $title }}</h1>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>{{ __('actionitems.Order') }}</th>
          <th>{{ __('actionitems.Index1Text') }}</th>
          <th>{{ __('actionitems.Index2Text') }}</th>
          <th>{{ __('actionitems.Index2Use') }}</th>
          <th>{{ __('actionitems.Index3Text') }}</th>
          <th>{{ __('actionitems.Index3Use') }}</th>
          <th>{{ __('actionitems.From') }}</th>
          <th>{{ __('actionitems.To') }}</th>
          <th>{{ __('actionitems.Text') }}</th>
          <th>{{ __('actionitems.Lines') }}</th>
          <th>{{ __('actionitems.Value') }}</th>
          <th>{{ __('actionitems.Checkbox') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($actionitems as $actionitem)
          <tr>
            <td><a href="{{ url('action-items/'.$actionitem->id) }}">{{ $actionitem->order }}</a></td>
            <td><a href="{{ url('action-items/'.$actionitem->id) }}">{{ $actionitem->index1text }}</a></td>
            <td><a href="{{ url('action-items/'.$actionitem->id) }}">{{ $actionitem->index2text }}</a></td>
            <td><input type="checkbox"
              @if ($actionitem->index2use == 1)
                checked="checked"
              @endif
              >
            </td>
            <td><a href="{{ url('action-items/'.$actionitem->id) }}">{{ $actionitem->index3text }}</a></td>
            <td><input type="checkbox"
              @if ($actionitem->index3use == 1)
                checked="checked"
              @endif
              >
            </td>
            <td><input type="checkbox"
              @if ($actionitem->from == 1)
                checked="checked"
              @endif
              >
            </td>
            <td><input type="checkbox"
              @if ($actionitem->to == 1)
                checked="checked"
              @endif
              >
            </td>
            <td><input type="checkbox"
              @if ($actionitem->text == 1)
                checked="checked"
              @endif
              >
            </td>
            <td><a href="{{ url('action-items/'.$actionitem->id) }}">{{ $actionitem->lines }}</a></td>
            <td><input type="checkbox"
              @if ($actionitem->value == 1)
                checked="checked"
              @endif
              >
            </td>
            <td><input type="checkbox"
              @if ($actionitem->checkbox == 1)
                checked="checked"
              @endif
              >
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
