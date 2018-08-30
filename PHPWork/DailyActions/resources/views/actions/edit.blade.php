@extends('layouts.app')
@section('content')
<div class="container">
  <h1>
    @component('components.select-date', [
      'days' => 30,
      'selected' => $date,
      ])
      @slot('name', 'date')
    @endcomponent
  </h1>
  <form action="{{ url('actions/'.$date) }}" method="post" >
    @csrf
    @method('PUT')
    @foreach ($actions as $action)
      <input type="hidden" name="actions[{{ $action->id }}][date]" value="{{ $date }}">
      <div class="form-group">
        <div class="row d-flex align-items-center">
          <div class="col-sm-4">
            <input type="hidden" name="actions[{{ $action->id }}][actionitem_id]" value="{{ $action->actionitem_id }}">
            <label for="index1" class="h3 control-label">{{ $action->actionitem->index1text }}</label>
            @if ($action->actionitem->index2use)
              <label for="index2" class="h5 control-label">{{ $action->actionitem->index2text }}</label>
            @endif
            @if ($action->actionitem->index3use)
              <label for="index3" class="h5 control-label">{{ $action->actionitem->index3text }}</label>
            @endif
          </div>
          <div class="col-sm-8">
            <div class="row">
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
                <div class="col-sm-1">
                  <label class="h5">:</label>
                </div>
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
                <div class="col-sm-1">
                  <label class="control-label">〜</label>
                </div>
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
                <div class="col-sm-1">
                  <label class="h5">:</label>
                </div>
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
              @if ($action->actionitem->text)
                <textarea id="text" type="text" class="col-sm-7 form-control" name="actions[{{ $action->id }}][text]" rows="{{ $action->actionitem->lines }}">{{ $action->text }}</textarea>
              @endif
              @if ($action->actionitem->value)
                <input id="value" type="text" class="col-sm-1 form-control" name="actions[{{ $action->id }}][value]" value="{{ $action->value }}">
              @endif
              @if ($action->actionitem->checkbox)
                <label>
                  <input type="hidden" name="actions[{{ $action->id }}][checkbox]" value="0">
                  <input id="checkbox" type="checkbox" name="actions[{{ $action->id }}][checkbox]" value="1"
                    @if ($action->checkbox)
                      checked="checked"
                    @endif
                  >
                </label>
              @endif
            </div>
          </div>
        </div>
      </div>
    @endforeach
    <button type="reset" name="reset" class="btn btn-primary">{{ __('actions.Reset') }}</button>
    <button type="submit" name="submit" class="btn btn-primary">{{ __('actions.Submit') }}</button>
  </form>
</div>
@endsection
