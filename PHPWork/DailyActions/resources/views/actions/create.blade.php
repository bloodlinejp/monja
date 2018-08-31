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
    <div class="form-row mb-2">
      <input type="hidden" name="actions[{{ $actionitem->id }}][date]" value="{{ $date }}">
      <input type="hidden" name="actions[{{ $actionitem->id }}][actionitem_id]" value="{{ $actionitem->id }}">
      <input type="hidden" name="actions[{{ $actionitem->id }}][order]" value="{{ $actionitem->order }}">
    @if ($index !== $actionitem->index1text)
      @if (!($actionitem->index3use || $actionitem->index2use))
      <div class="col-sm-5">
        <label for="index1" class="h4">{{ $actionitem->index1text }}</label>
      </div>
      @else
      <div class="col-sm-12">
        <label for="index1" class="h4">{{ $actionitem->index1text }}</label>
      </div>
    </div>
    <div class="form-row mb-2">
      @endif
    @endif
    @php
      $index = $actionitem->index1text
    @endphp
    @if ($actionitem->index3use || $actionitem->index2use)
      <div class="col-sm-5">
        <div class="form-row">
        @if ($actionitem->index2use)
          <label for="index2" class="h5 col-sm-5 offset-sm-1">{{ $actionitem->index2text }}</label>
        @endif
        @if ($actionitem->index3use)
          <label for="index3" class="h5 col-sm-5">{{ $actionitem->index3text }}</label>
        @endif
        </div>
      </div>
    @endif
      <div class="col-sm-7">
        <div class="form-row">
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
            <label class="h5 mt-2">：</label>
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
            <label class="mt-2">〜</label>
          @component('components.select-number', [
            'min' => '0',
            'max' => '24',
            'selected' => '',
            ])
            @slot('name')
              actions[{{ $actionitem->id }}][to-hour]
            @endslot
          @endcomponent
            <label class="h5 mt-2">：</label>
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
        </div>
        @if ($actionitem->text)
          <textarea id="text" type="text" class="col-sm-6 form-control mt-1" name="actions[{{ $actionitem->id }}][text]" rows="{{ $actionitem->lines }}">
            {{ $actionitem->text1text }}
          </textarea>
        @endif
        @if ($actionitem->value)
          <input id="value" type="text" class="col-sm-1 form-control form-control-sm mt-1" name="actions[{{ $actionitem->id }}][value]">
        @endif
        @if ($actionitem->checkbox)
          <div class="custom-control custom-checkbox">
            <input id="checkbox{{ $actionitem->id }}" type="checkbox" class="custom-control-input" value="1" name="actions[{{ $actionitem->id }}][checkbox]">
            <label class="custom-control-label" for="checkbox{{ $actionitem->id }}"></label>
          </div>
        @endif
      </div>
    </div>
    @endforeach
    <button type="reset" name="reset" class="btn btn-primary">{{ __('actions.Reset') }}</button>
    <button type="submit" name="submit" class="btn btn-primary">{{ __('actions.Submit') }}</button>
  </form>
</div>
@endsection
