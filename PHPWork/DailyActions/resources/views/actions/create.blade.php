@php
  $title = $today;
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
  <h1>{{ $title }}</h1>
  <form action="{{ url('actions') }}" method="post" >
    @csrf
    @method('POST')
    @foreach ($actionitems as $actionitem)
      <input type="hidden" name="actions[{{ $actionitem->id }}][date]" value="{{ $today }}">
      <div class="form-group">
        <div class="row">
          <input type="hidden" name="actions[{{ $actionitem->id }}][actionitem_id]" value="{{ $actionitem->id }}">
          <input type="hidden" name="actions[{{ $actionitem->id }}][order]" value="{{ $actionitem->order }}">
          <div class="col-sm-4">
            <label for="index1" class="h3 control-label">{{ $actionitem->index1text }}</label>
            @if ($actionitem->index2use)
              <label for="index2" class="h5 control-label">{{ $actionitem->index2text }}</label>
            @endif
            @if ($actionitem->index3use)
              <label for="index3" class="h5 control-label">{{ $actionitem->index3text }}</label>
            @endif
          </div>
          <div class="col-sm-8">
            <div class="row">
              @if ($actionitem->from)
                @component('components.select-number', [
                  'min' => '0',
                  'max' => '24',
                  'selected' => '',
                  ])
                  @slot('name')
                    actions[{{ $actionitem->id }}][from-hour]
                  @endslot
                @endcomponent
                <div class="col-sm-1">
                  <label class="h5">:</label>
                </div>
                @component('components.select-minute', [
                  'min' => '00',
                  'max' => '60',
                  'selected' => '',
                  ])
                  @slot('name')
                    actions[{{ $actionitem->id }}][from-minute]
                  @endslot
                @endcomponent
              @endif
              @if ($actionitem->to)
                <div class="col-sm-1">
                  <label class="control-label">〜</label>
                </div>
                @component('components.select-number', [
                  'min' => '0',
                  'max' => '24',
                  'selected' => '',
                  ])
                  @slot('name')
                    actions[{{ $actionitem->id }}][to-hour]
                  @endslot
                @endcomponent
                <div class="col-sm-1">
                  <label class="h5">:</label>
                </div>
                @component('components.select-minute', [
                  'min' => '00',
                  'max' => '60',
                  'selected' => '',
                  ])
                  @slot('name')
                    actions[{{ $actionitem->id }}][to-minute]
                  @endslot
                @endcomponent
              @endif
              @if ($actionitem->text)
                <textarea id="text" type="text" class="col-sm-7 form-control input-sm" name="actions[{{ $actionitem->id }}][text]" rows="{{ $actionitem->lines }}">
                  {{ $actionitem->text1text }}
                </textarea>
              @endif
              @if ($actionitem->value)
                <input id="value" type="text" class="col-sm-1 form-control input-sm" name="actions[{{ $actionitem->id }}][value]">
              @endif
              @if ($actionitem->checkbox)
                <label>
                  <input id="checkbox" type="checkbox" value="1" name="actions[{{ $actionitem->id }}][checkbox]">
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
