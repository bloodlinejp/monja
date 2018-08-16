@php
  $title = __('actionitems.CreateActionitem');
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
  <h1>{{ $title }}</h1>
  <form action="{{ url('action-items') }}" method="post">
    @csrf
    @method('POST')
    <div class="form-group">
      <label for="index1text">{{__('actionitems.Index1Text') }}</label>
      <input id="index1text" type="text" class="form-control" name="index1text" required autofocus>
    </div>
    <div class="form-group">
      <label for="index2text">{{__('actionitems.Index2Text') }}</label>
      <input id="index2use" type="checkbox" class="" name="index2use" value="1" autofocus>
      <input id="index2text" type="text" class="form-control" name="index2text" autofocus>
    </div>
    <div class="form-group">
      <label for="index3text">{{__('actionitems.Index3Text') }}</label>
      <input id="index3use" type="checkbox" class="" name="index3use" value="1" autofocus>
      <input id="index3text" type="text" class="form-control" name="index3text" autofocus>
    </div>
    <div class="form-group">
      <label for="from">{{__('actionitems.From') }}</label>
      <input id="from" type="checkbox" class="" name="from" value="1" autofocus>
    </div>
    <div class="form-group">
      <label for="to">{{__('actionitems.To') }}</label>
      <input id="to" type="checkbox" class="" name="to" value="1" autofocus>
    </div>
    <div class="form-group">
      <label for="text">{{__('actionitems.Text') }}</label>
      <input id="text" type="checkbox" class="" name="text" value="1" autofocus>
    </div>
    <div class="form-group">
      <label for="lines">{{__('actionitems.Lines') }}</label>
      <input id="lines" type="text" class="form-control" name="lines" autofocus>
    </div>
    <div class="form-group">
      <label for="value">{{__('actionitems.Value') }}</label>
      <input id="value" type="checkbox" class="" name="value" value="1" autofocus>
    </div>
    <div class="form-group">
      <label for="checkbox">{{__('actionitems.Checkbox') }}</label>
      <input id="checkbox" type="checkbox" class="" name="checkbox" value="1" autofocus>
    </div>
    <button type="button" name="return" onclick="location.href='{{ url('action-items') }}'" class="btn btn-success">{{ __('actionitems.ReturnToList') }}</button>
    <button type="reset" name="reset" class="btn btn-primary">{{ __('actionitems.Reset') }}</button>
    <button type="submit" name="submit" class="btn btn-primary">{{ __('actionitems.Submit') }}</button>
  </form>
</div>
@endsection
