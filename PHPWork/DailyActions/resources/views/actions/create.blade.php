@php
  $index = ''
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
  <form action="{{ url('actions') }}" method="post">
    @csrf
    @method('POST')
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
    @foreach ($actionitems as $actionitem)
      <div class="form-group">
        <input type="hidden" name="actions[{{ $actionitem->id }}][date]" value="{{ $date }}">
        <input type="hidden" name="actions[{{ $actionitem->id }}][actionitem_id]" value="{{ $actionitem->id }}">
        <input type="hidden" name="actions[{{ $actionitem->id }}][order]" value="{{ $actionitem->order }}">
        @if ($index !== $actionitem->index1text)
          <div class="row">
            <div class="col-sm-5">
              <label for="index1" class="h4">{{ $actionitem->index1text }}</label>
            </div>
          @if ($actionitem->index3use || $actionitem->index2use)
          </div>
          @endif
          @php
            $index = $actionitem->index1text
          @endphp
        @endif
        @if ($actionitem->index3use || $actionitem->index2use)
        <div class="row">
          <div class="col-sm-4 offset-sm-1">
            @if ($actionitem->index2use)
              <label for="index2" class="h5">{{ $actionitem->index2text }}</label>
            @endif
            @if ($actionitem->index3use)
              <label for="index3" class="h5">{{ $actionitem->index3text }}</label>
            @endif
          </div>
          @endif
          <div class="col-sm-7">
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
                <div class="ml-1 mr-1">
                  <label class="h5 mb-0" style="vertical-align: middle;">：</label>
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
                <div class="col-sm-1" style="text-align: center;">
                  <label class="control-label mb-0" style="vertical-align: middle;">〜</label>
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
                <div class="ml-1 mr-1">
                  <label class="h5 mb-0" style="vertical-align: middle;">：</label>
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
                <textarea id="text" type="text" class="col-sm-6 form-control form-control-sm" name="actions[{{ $actionitem->id }}][text]" rows="{{ $actionitem->lines }}">
                  {{ $actionitem->text1text }}
                </textarea>
              @endif
              @if ($actionitem->value)
                <input id="value" type="text" class="col-sm-1 form-control form-control-sm" name="actions[{{ $actionitem->id }}][value]">
              @endif
              @if ($actionitem->checkbox)
                <div class="custom-control custom-checkbox">
                  <input id="checkbox{{ $actionitem->id }}" type="checkbox"  class="custom-control-input" value="1" name="actions[{{ $actionitem->id }}][checkbox]">
                  <label class="custom-control-label" for="checkbox{{ $actionitem->id }}"></label>
                </div>
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
