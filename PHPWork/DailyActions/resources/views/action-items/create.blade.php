@php
  $title = __('actionitems.CreateActionitem');
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
  <div class="mb-4">
    <h1>{{ $title }}</h1>
  </div>
  <form action="{{ url('action-items') }}" method="post">
    @csrf
    @method('POST')
    <div class="form-group">
      <label class="mr-4" for="order">{{__('actionitems.Order') }}</label>
      @component('components.select-number', [
        'min' => 1,
        'max' => ($max > 9) ? $max + 1 : 10,
        'selected' => '',
        ])
        @slot('name', 'order')
      @endcomponent
    </div>
    <div class="form-group">
        <label for="index1text">{{__('actionitems.Index1Text') }}</label>
        <input class="form-control" id="index1text" type="text" name="index1text" required autofocus>
    </div>
    <div class="form-group form-check">
        <input id="index2use" type="checkbox" class="form-check-input" name="index2use" value="1">
        <label class="form-check-label" for="index2use">{{__('actionitems.Index2Use') . '（' . __('actionitems.Index2Text') . '）' }}</label>
        <input class="form-control" id="index2text" type="text" name="index2text">
    </div>
    <div class="form-group form-check">
        <input class="form-check-input" id="index3use" type="checkbox" name="index3use" value="1">
        <label class="form-check-label" for="index3use">{{__('actionitems.Index3Use') . '（' . __('actionitems.Index3Text') . '）' }}</label>
        <input class="form-control" id="index3text" type="text" name="index3text">
    </div>
    <div class="form-group form-check">
        <input class="form-check-input" id="from" type="checkbox" name="from" value="1">
        <label class="form-check-label" for="from">{{__('actionitems.From') }}</label>
    </div>
    <div class="form-group form-check">
        <input class="form-check-input" id="to" type="checkbox" name="to" value="1">
        <label class="form-check-label" for="to">{{__('actionitems.To') }}</label>
    </div>
    <div class="form-group form-check">
        <input class="form-check-input" id="text" type="checkbox" name="text" value="1">
        <label class="form-check-label" for="text">{{__('actionitems.Text') }}</label>
        <div class="form-group mt-2">
            <label for="lines">{{__('actionitems.Lines') }}</label>
            <input class="form-control" id="lines" type="text" class="form-control" name="lines">
        </div>
    </div>
    <div class="form-group form-check">
        <input class="form-check-input" class="form-check-input" id="value" type="checkbox" name="value" value="1">
        <label class="form-check-label" for="value">{{__('actionitems.Value') }}</label>
    </div>
    <div class="form-group form-check">
        <input class="form-check-input" id="checkbox" type="checkbox" name="checkbox" value="1">
        <label class="form-check-label" for="checkbox">{{__('actionitems.Checkbox') }}</label>
    </div>
    <button type="button" name="return" onclick="location.href='{{ url('action-items') }}'" class="btn btn-success">{{ __('actionitems.ReturnToList') }}</button>
    <button type="reset" name="reset" class="btn btn-primary">{{ __('actionitems.Reset') }}</button>
    <button type="submit" name="submit" class="btn btn-primary">{{ __('actionitems.Submit') }}</button>
  </form>
</div>
@endsection
