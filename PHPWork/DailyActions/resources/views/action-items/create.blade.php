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
      <span class="badge badge-danger ml-2">必須</span>
      <input class="form-control" id="index1text" type="text" name="index1text" required autofocus>
    </div>
    <div class="form-group">
      <div class="custom-control custom-checkbox">
        <input id="index2use" type="checkbox" class="custom-control-input" name="index2use" value="1">
        <label class="custom-control-label" style="position: absolute;" for="index2use">{{__('actionitems.Index2Use') . '（' . __('actionitems.Index2Text') . '）' }}
          <span class="badge badge-success ml-2">任意</span>
        </label>
      </div>
      <div class="form-group">
        <input class="form-control" id="index2text" type="text" name="index2text" placeholder="{{__('actionitems.Index2Text')}}" disabled>
      </div>
    </div>
    <div class="form-group">
      <div class="custom-control custom-checkbox">
        <input class="custom-control-input" id="index3use" type="checkbox" name="index3use" value="1">
        <label class="custom-control-label" style="position: absolute;" for="index3use">{{__('actionitems.Index3Use') . '（' . __('actionitems.Index3Text') . '）' }}
          <span class="badge badge-success ml-2">任意</span>
        </label>
      </div>
      <div class="form-group">
        <input class="form-control" id="index3text" type="text" name="index3text" placeholder="{{__('actionitems.Index3Text')}}" disabled>
      </div>
    </div>
    <div class="form-group">
      <div class="custom-control custom-checkbox">
        <input class="custom-control-input" id="from" type="checkbox" name="from" value="1">
        <label class="custom-control-label" style="position: absolute;" for="from">{{__('actionitems.From') }}
          <span class="msg badge badge-danger ml-2"></span>
        </label>
      </div>
    </div>
    <div class="form-group">
      <div class="custom-control custom-checkbox">
        <input class="custom-control-input" id="to" type="checkbox" name="to" value="1">
        <label class="custom-control-label" style="position: absolute;" for="to">{{__('actionitems.To') }}
          <span class="msg badge badge-danger ml-2"></span>
        </label>
      </div>
    </div>
    <div class="form-group">
      <div class="custom-control custom-checkbox">
        <input class="custom-control-input" id="text" type="checkbox" name="text" value="1">
        <label class="custom-control-label" style="position: absolute;" for="text">{{__('actionitems.Text') . '（' . __('actionitems.Lines') . '）' }}
          <span class="msg badge badge-danger ml-2"></span>
        </label>
      </div>
      <div class="form-group">
        <input class="form-control" id="lines" type="number" class="form-control" name="lines" placeholder="{{__('actionitems.Lines') }}" disabled>
      </div>
    </div>
    <div class="form-group">
      <div class="custom-control custom-checkbox">
        <input class="custom-control-input" id="value" type="checkbox" name="value" value="1">
        <label class="custom-control-label" style="position: absolute;" for="value">{{__('actionitems.Value') . '（' . __('actionitems.Unit') . '）' }}
          <span class="msg badge badge-danger ml-2"></span>
        </label>
      </div>
      <div class="form-group">
        <input class="form-control" id="unit" type="text" class="form-control" name="unit" placeholder="{{__('actionitems.Unit') }}" disabled>
      </div>
    </div>
    <div class="form-group">
      <div class="custom-control custom-checkbox">
        <input class="custom-control-input" id="checkbox" type="checkbox" name="checkbox" value="1">
        <label class="custom-control-label" style="position: absolute;" for="checkbox">{{__('actionitems.Checkbox') }}
          <span class="msg badge badge-danger ml-2"></span>
        </label>
      </div>
    </div>
    <button type="button" name="return" onclick="location.href='{{ url('action-items') }}'" class="btn btn-success">{{ __('actionitems.ReturnToList') }}</button>
    <button type="reset" name="reset" class="btn btn-outline-primary">{{ __('actionitems.Reset') }}</button>
    @component('components.btn-upd-confirm', ['btnid' => 'btn-action-items-create', 'text' => __('actionitems.Create')])
    @endcomponent
  </form>
</div>
@endsection
