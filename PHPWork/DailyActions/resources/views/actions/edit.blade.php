@php
  $title = $today;
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
  <h1>{{ $title }}</h1>
  <form action="{{ url('actions') }}/{{ $today }}" method="post" >
    @csrf
    @method('PUT')
    @foreach ($actions as $action)
      <input type="hidden" name="actions[{{ $action->id }}][date]" value="{{ $today }}">
      <div class="form-group">
        <div class="row">
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
                <input id="from" type="text" class="col-sm-2 form-control" name="actions[{{ $action->id }}][from]" value="{{ $action->from }}" autofocus>
              @endif
              @if ($action->actionitem->to)
                <div class="col-sm-1">
                  <label class="control-label">〜</label>
                </div>
                <input id="to" type="text" class="col-sm-2 form-control" name="actions[{{ $action->id }}][to]" value="{{ $action->to }}" autofocus>
              @endif
              @if ($action->actionitem->text)
                <textarea id="text" type="text" class="col-sm-7 form-control" name="actions[{{ $action->id }}][text]" rows="{{ $action->actionitem->lines }}" autofocus>{{ $action->text }}</textarea>
              @endif
              @if ($action->actionitem->value)
                <input id="value" type="text" class="col-sm-1 form-control" name="actions[{{ $action->id }}][value]" value="{{ $action->value }}" autofocus>
              @endif
              @if ($action->actionitem->checkbox)
                <label>
                  <input type="hidden" name="actions[{{ $action->id }}][checkbox]" value="0">
                  <input id="checkbox" type="checkbox" class="form-control" name="actions[{{ $action->id }}][checkbox]" value="1"
                    @if ($action->checkbox)
                      checked="checked"
                    @endif
                   autofocus>
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
