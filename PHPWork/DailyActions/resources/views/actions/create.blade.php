@php
  $index = ''
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
  <form action="{{ url('actions') }}" method="post">
  @csrf
  @method('POST')
    <div class="row">
      <div class="col-sm-4 mb-4">
      @component('components.select-date', [
        'days' => 30,
        'selected' => $date,
        ])
        @slot('name', 'date')
      @endcomponent
      </div>
    </div>
    <div class="row">
    @foreach ($actionitems as $actionitem)
    @if ($index !== $actionitem->index1text)
      @if ($index !== '')
          </div>
        </div>
      </div>
      @endif
      <div class="col-12 col-sm-6">
        <div class="card border-secondary mb-3">
          <h4 class="card-header text-white bg-success">{{ $actionitem->index1text }}</h4>
          <div class="card-body">
      @php
        $index = $actionitem->index1text
      @endphp
    @endif
            <div class="row mb-2">
              <input type="hidden" name="actions[{{ $actionitem->id }}][date]" value="{{ $date }}">
              <input type="hidden" name="actions[{{ $actionitem->id }}][actionitem_id]" value="{{ $actionitem->id }}">
              <input type="hidden" name="actions[{{ $actionitem->id }}][order]" value="{{ $actionitem->order }}">
              <div class="col-8 col-sm-8">
              @if ($actionitem->index3use || $actionitem->index2use)
                @if ($actionitem->index2use)
                <div class="float-left">
                  <label for="checkbox{{ $actionitem->id }}" class="ml-2 mb-0 align-middle">{{ $actionitem->index2text }}</label>
                </div>
                @endif
                @if ($actionitem->index3use)
                <div class="float-right">
                  <label for="checkbox{{ $actionitem->id }}" class="mr-4 mb-0 align-middle">{{ $actionitem->index3text }}</label>
                </div>
                @endif
              @else
                <div class="float-left">
                  <label for="checkbox{{ $actionitem->id }}" class="ml-2 mb-0 align-middle">{{ $actionitem->index1text }}</label>
                </div>
              @endif
              </div>
              <div class="col-4 col-sm-4 d-flex align-items-center px-0">
              @if ($actionitem->checkbox)
                <div class="custom-control custom-checkbox ml-4">
                  <input id="checkbox{{ $actionitem->id }}" type="checkbox" class="custom-control-input" value="1" name="actions[{{ $actionitem->id }}][checkbox]">
                  <label class="custom-control-label" style="position: absolute;" for="checkbox{{ $actionitem->id }}"></label>
                </div>
              @endif
              @if ($actionitem->value)
                <div class="mr-4">
                  <input id="value" type="text" class="form-control form-control-sm" name="actions[{{ $actionitem->id }}][value]">
                </div>
              @endif
              @if ($actionitem->to)
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-sm-12">
              @endif
                <div>
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
                  <label class="mt-2">：</label>
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
                  <label class="mx-2">〜</label>
                @component('components.select-number', [
                  'min' => '0',
                  'max' => '24',
                  'selected' => '',
                  ])
                  @slot('name')
                    actions[{{ $actionitem->id }}][to-hour]
                  @endslot
                @endcomponent
                  <label class="mt-2">：</label>
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
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-sm-12">
                <textarea id="text" type="text" class="form-control" name="actions[{{ $actionitem->id }}][text]" rows="{{ $actionitem->lines }}"></textarea>
              @endif
              </div>
            </div>
    @endforeach
          </div>
        </div>
      </div>
    </div>
    <button type="reset" name="reset" class="btn btn-outline-primary">{{ __('actions.Reset') }}</button>
    <button type="submit" name="submit" class="btn btn-primary">{{ __('actions.Submit') }}</button>
  </form>
</div>
@endsection
