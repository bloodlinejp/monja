@php
  $title = __('actionitems.Actionitems');
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
  <h1>{{ $title }}</h1>
  <div class="table-responsive text-nowrap">
  <form action="{{ url('action-items') }}/listupdate" method="post" >
    @csrf
    @method('POST')
      <table class="table table-striped table-hover">
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
              <td>
                @component('components.select-number',[
                  'min' => 1,
                  'max' => $max,
                  'selected' => $actionitem->order,
                  ])
                  @slot('name')
                    actionitems[{{ $actionitem->id }}][order]
                  @endslot
                @endcomponent
              </td>
              <td><a href="{{ url('action-items/'.$actionitem->id).'/edit' }}">{{ $actionitem->index1text }}</a></td>
              <td><a href="{{ url('action-items/'.$actionitem->id).'/edit' }}">{{ $actionitem->index2text }}</a></td>
              <td>
                <input type="hidden" name="actionitems[{{ $actionitem->id }}][index2use]" value="0">
                <input type="checkbox" name="actionitems[{{ $actionitem->id }}][index2use]" value="1"
                @if ($actionitem->index2use == 1)
                  checked="checked"
                @endif
                >
              </td>
              <td><a href="{{ url('action-items/'.$actionitem->id).'/edit' }}">{{ $actionitem->index3text }}</a></td>
              <td>
                <input type="hidden" name="actionitems[{{ $actionitem->id }}][index3use]" value="0">
                <input type="checkbox" name="actionitems[{{ $actionitem->id }}][index3use]" value="1"
                  @if ($actionitem->index3use == 1)
                    checked="checked"
                  @endif
                >
              </td>
              <td>
                <input type="hidden" name="actionitems[{{ $actionitem->id }}][from]" value="0">
                <input type="checkbox" name="actionitems[{{ $actionitem->id }}][from]" value="1"
                  @if ($actionitem->from == 1)
                    checked="checked"
                  @endif
                >
              </td>
              <td>
                <input type="hidden" name="actionitems[{{ $actionitem->id }}][to]" value="0">
                <input type="checkbox" name="actionitems[{{ $actionitem->id }}][to]" value="1"
                  @if ($actionitem->to == 1)
                    checked="checked"
                  @endif
                >
              </td>
              <td>
                <input type="hidden" name="actionitems[{{ $actionitem->id }}][text]" value="0">
                <input type="checkbox" name="actionitems[{{ $actionitem->id }}][text]" value="1"
                  @if ($actionitem->text == 1)
                    checked="checked"
                  @endif
                >
              </td>
              <td><a href="{{ url('action-items/'.$actionitem->id).'/edit' }}">{{ $actionitem->lines }}</a></td>
              <td>
                <input type="hidden" name="actionitems[{{ $actionitem->id }}][value]" value="0">
                <input type="checkbox" name="actionitems[{{ $actionitem->id }}][value]" value="1"
                 @if ($actionitem->value == 1)
                    checked="checked"
                  @endif
                >
              </td>
              <td>
                <input type="hidden" name="actionitems[{{ $actionitem->id }}][checkbox]" value="0">
                <input type="checkbox" name="actionitems[{{ $actionitem->id }}][checkbox]" value="1"
                 @if ($actionitem->checkbox == 1)
                    checked="checked"
                  @endif
                >
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <button type="submit" name="submit" class="btn btn-success">{{ __('actionitems.Update') }}</button>
      <a class="btn btn-primary" href="{{ url('action-items/create') }}">{{ __('actionitems.CreateActionitem') }}</a>
    </form>
  </div>
</div>
@endsection
