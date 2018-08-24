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
          <div class="col-sm-4">
            <input type="hidden" name="actions[{{ $actionitem->id }}][actionitem_id]" value="{{ $actionitem->id }}">
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
                <input id="from" type="text" class="col-sm-2 form-control inpt-sm" name="actions[{{ $actionitem->id }}][from]" autofocus>
              @endif
              @if ($actionitem->to)
                <div class="col-sm-1">
                  <label class="control-label">〜</label>
                </div>
                <input id="to" type="text" class="col-sm-2 form-control input-sm" name="actions[{{ $actionitem->id }}][to]" autofocus>
              @endif
              @if ($actionitem->text)
                <textarea id="text" type="text" class="col-sm-7 form-control input-sm" name="actions[{{ $actionitem->id }}][text]" rows="{{ $actionitem->lines }}" autofocus>
                  {{ $actionitem->text1text }}
                </textarea>
              @endif
              @if ($actionitem->value)
                <input id="value" type="text" class="col-sm-1 form-control input-sm" name="actions[{{ $actionitem->id }}][value]" autofocus>
              @endif
              @if ($actionitem->checkbox)
                <label>
                  <input id="checkbox" type="checkbox" value="1" class="form-control" name="actions[{{ $actionitem->id }}][checkbox]" autofocus>
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
