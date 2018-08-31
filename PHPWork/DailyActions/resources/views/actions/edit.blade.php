@php
  $index=''
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
  <form action="{{ url('actions/'.$date) }}" method="post" >
    @csrf
    @method('PUT')
    <div class="form-row">
      <div class="col-sm-4 mb-4">
        @component('components.select-date', [
          'days' => 30,
          'selected' => $date,
          ])
          @slot('name', 'date')
        @endcomponent
      </div>
    </div>
    @foreach ($actions as $action)
      <div class="form-row mb-2">
        <input type="hidden" name="actions[{{ $action->id }}][date]" value="{{ $date }}">
        <input type="hidden" name="actions[{{ $action->id }}][actionitem_id]" value="{{ $action->actionitem_id }}">
        <input type="hidden" name="actions[{{ $action->id }}][order]" value="{{ $action->order }}">
        @if ($action->actionitem->index2use || $action->actionitem->index3use)
          @if ($index !== $action->actionitem->index1text)
        <div class="col-sm-12">
          <h3><span class="badge badge-success">{{ $action->actionitem->index1text }}</span></h3>
        </div>
      </div>
      <div class="form-row mb-2">
           @endif
        <div class="col-sm-5">
          <div class="form-row">
          @if ($action->actionitem->index2use)
            <label for="index2" class="h5 control-label col-sm-5 offset-sm-1">{{ $action->actionitem->index2text }}</label>
          @endif
          @if ($action->actionitem->index3use)
            <label for="index3" class="h5 control-label col-sm-5">{{ $action->actionitem->index3text }}</label>
          @endif
          </div>
        </div>
        @else
        <div class="col-sm-5">
          <h3><span class="badge badge-success">{{ $action->actionitem->index1text }}</span></h3>
        </div>
        @endif
        @php
          $index = $action->actionitem->index1text
        @endphp
        <div class="col-sm-7">
          <div class="form-row">
          @if ($action->actionitem->from)
            @php
              $fromhour = date('H', strtotime($action->from));
              $fromminute = date('i', strtotime($action->from));
            @endphp
            @component('components.select-number', [
              'min' => '0',
              'max' => '24',
              'selected' => $fromhour,
              ])
              @slot('name')
                actions[{{ $action->id }}][from-hour]
              @endslot
            @endcomponent
              <label class="h5 mt-2">：</label>
            @component('components.select-minute', [
              'min' => '00',
              'max' => '60',
              'selected' => $fromminute,
              ])
              @slot('name')
                actions[{{ $action->id }}][from-minute]
              @endslot
            @endcomponent
          @endif
          @if ($action->actionitem->to)
              <label class="mt-2">〜</label>
            @php
              $tohour = date('H', strtotime($action->to));
              $tominute = date('i', strtotime($action->to));
            @endphp
            @component('components.select-number', [
              'min' => '0',
              'max' => '24',
              'selected' => $tohour,
              ])
              @slot('name')
                actions[{{ $action->id }}][to-hour]
              @endslot
            @endcomponent
              <label class="h5 mt-2">：</label>
            @component('components.select-minute', [
              'min' => '00',
              'max' => '60',
              'selected' => $tominute,
              ])
              @slot('name')
                actions[{{ $action->id }}][to-minute]
              @endslot
            @endcomponent
          @endif
          </div>
          @if ($action->actionitem->text)
          <textarea id="text" type="text" class="col-sm-6 form-control mt-1" name="actions[{{ $action->id }}][text]" rows="{{ $action->actionitem->lines }}">{{ $action->text }}</textarea>
          @endif
          @if ($action->actionitem->value)
          <input id="value" type="text" class="col-sm-1 form-control form-control-sm mt-1" name="actions[{{ $action->id }}][value]" value="{{ $action->value }}">
          @endif
          @if ($action->actionitem->checkbox)
          <div class="custom-control custom-checkbox">
            <input type="hidden" name="actions[{{ $action->id }}][checkbox]" value="0">
            <input id="checkbox{{ $action->id }}" type="checkbox" class="custom-control-input" name="actions[{{ $action->id }}][checkbox]" value="1"
              @if ($action->checkbox)
                checked="checked"
              @endif
            >
            <label class="custom-control-label" for="checkbox{{ $action->id }}"></label>
          </div>
          @endif
        </div>
      </div>
    @endforeach
    <button type="reset" name="reset" class="btn btn-outline-primary">{{ __('actions.Reset') }}</button>
    <button type="submit" name="submit" class="btn btn-primary">{{ __('actions.Submit') }}</button>
  </form>
</div>
@endsection
