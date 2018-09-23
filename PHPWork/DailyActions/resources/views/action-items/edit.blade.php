@php
  $title = __('actionitems.EditActionitem') . ' ： ' . $actionitem->index1text;
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
  <div class="mb-4">
    <h1>{{ $title }}</h1>
  </div>
  <form action="{{ url('action-items/'.$actionitem->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label class="mr-4" for="order">{{__('actionitems.Order') }}</label>
      @component('components.select-number', [
        'min' => 1,
        'max' => $max,
        'selected' => $actionitem->order,
        ])
        @slot('name', 'order')
      @endcomponent
    </div>
    <div class="form-group">
      <label for="index1text">{{__('actionitems.Index1Text') }}</label>
      <span class="badge badge-danger ml-2">必須</span>
      <input class="form-control" id="index1text" type="text" class="form-control" name="index1text" value="{{ $actionitem->index1text }}" required autofocus>
    </div>
    <div class="form-group">
      <div class="custom-control custom-checkbox">
        <input class="custom-control-input" id="index2use" type="checkbox" name="index2use" value="1"
          @if ($actionitem->index2use == 1)
            checked="checked"
            @endif
        >
        <label class="custom-control-label" style="position: absolute;" for="index2use">{{__('actionitems.Index2Use').'（'.__('actionitems.Index2Text').'）' }}
          <span class="badge badge-success ml-2">任意</span>
        </label>
      </div>
      <div class="form-group">
        <input id="index2text" type="text" class="form-control" name="index2text" value="{{ $actionitem->index2text }}" {{ ($actionitem->index2use == 1) ? '' : 'disabled' }}>
      </div>
    </div>
    <div class="form-group">
      <div class="custom-control custom-checkbox">
        <input class="custom-control-input" id="index3use" type="checkbox" name="index3use" value="1"
          @if ($actionitem->index3use == 1)
            checked="checked"
          @endif
         > 
        <label class="custom-control-label" style="position: absolute;" for="index3use">{{__('actionitems.Index3Use').'（'.__('actionitems.Index3Text').'）' }}
          <span class="badge badge-success ml-2">任意</span>
        </label>
      </div>
      <div class="form-group">
        <input id="index3text" type="text" class="form-control" name="index3text" value="{{ $actionitem->index3text }}" {{ ($actionitem->index3use == 1) ? '' : 'disabled' }}>
      </div>
    </div>
    <div class="form-group">
      <div class="custom-control custom-checkbox">
        <input class="custom-control-input" id="from" type="checkbox" name="from" value="1"
          @if ($actionitem->from == 1)
            checked="checked"
          @endif
         > 
        <label class="custom-control-label" style="position: absolute;" for="from">{{__('actionitems.From') }}
          <span class="msg badge badge-danger ml-2"></span>
        </label>
      </div>
    </div>
    <div class="form-group">
      <div class="custom-control custom-checkbox">
        <input class="custom-control-input" id="to" type="checkbox" name="to" value="1"
          @if ($actionitem->to == 1)
            checked="checked"
          @endif
         > 
        <label class="custom-control-label" style="position: absolute;" for="to">{{__('actionitems.To') }}
          <span class="msg badge badge-danger ml-2"></span>
        </label>
      </div>
    </div>
    <div class="form-group">
      <div class="custom-control custom-checkbox">
        <input class="custom-control-input" id="text" type="checkbox" name="text" value="1"
          @if ($actionitem->text== 1)
            checked="checked"
          @endif
         > 
        <label class="custom-control-label" style="position: absolute;" for="text">{{__('actionitems.Text') . '（' . __('actionitems.Lines') . '）' }}
          <span class="msg badge badge-danger ml-2"></span>
        </label>
      </div>
      <div class="form-group">
        <input id="lines" type="text" class="form-control" name="lines" value="{{ $actionitem->lines }}" {{ ($actionitem->text == 1) ? '' : 'disabled' }}>
      </div>
    </div>
    <div class="form-group">
      <div class="custom-control custom-checkbox">
        <input class="custom-control-input" id="value" type="checkbox" name="value" value="1"
          @if ($actionitem->value== 1)
            checked="checked"
          @endif
         > 
        <label class="custom-control-label" style="position: absolute;" for="value">{{__('actionitems.Value') . '（' . __('actionitems.Unit') . '）' }}
          <span class="msg badge badge-danger ml-2"></span>
        </label>
      </div>
      <div class="form-group">
        <input id="unit" type="text" class="form-control" name="unit" value="{{ $actionitem->unit }}" {{ ($actionitem->value== 1) ? '' : 'disabled' }}>
      </div>
    </div>
    <div class="form-group">
      <div class="custom-control custom-checkbox">
        <input class="custom-control-input" id="checkbox" type="checkbox" name="checkbox" value="1"
          @if ($actionitem->checkbox== 1)
            checked="checked"
          @endif
         > 
        <label class="custom-control-label" style="position: absolute;" for="checkbox">{{__('actionitems.Checkbox') }}
          <span class="msg badge badge-danger ml-2"></span>
        </label>
      </div>
    </div>
    <div class="float-left">
      <button type="button" name="return" onclick="location.href='{{ url('action-items') }}'" class="btn btn-success">{{ __('actionitems.ReturnToList') }}</button>
      <button type="reset" name="reset" class="btn btn-outline-primary">{{ __('actionitems.Reset') }}</button>
      @component('components.btn-upd-confirm', ['btnid' => 'btn-action-items-create', 'text' => __('actionitems.Update')])
      @endcomponent
    </div>
  </form>
  <div class="float-right mb-4">
    @component('components.btn-del-confirm')
      @slot('table', 'action-items')
      @slot('id', $actionitem->id)
    @endcomponent
  </div>
</div>
@endsection
