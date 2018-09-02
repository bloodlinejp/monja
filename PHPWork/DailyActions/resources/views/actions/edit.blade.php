@php
  $index=''
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
  <form action="{{ url('actions/'.$date) }}" method="post" >
    @csrf
    @method('PUT')
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
    @foreach ($actions as $action)
    @if ($index !== $action->actionitem->index1text)
      @if ($index !== '')
          </div>
        </div>
      </div>
      @endif
      <div class="col-12 col-sm-6">
        <div class="card border-secondary mb-3">
          <h4 class="card-header text-white bg-success">{{ $action->actionitem->index1text }}</h4>
          <div class="card-body">
      @php
        $index = $action->actionitem->index1text
      @endphp
    @endif
            <div class="row mb-2">
              <input type="hidden" name="actions[{{ $action->id }}][date]" value="{{ $date }}">
              <input type="hidden" name="actions[{{ $action->id }}][actionitem_id]" value="{{ $action->actionitem_id }}">
              <input type="hidden" name="actions[{{ $action->id }}][order]" value="{{ $action->order }}">
              <div class="col-8 col-sm-8">
              @if ($action->actionitem->index2use || $action->actionitem->index3use)
                @if ($action->actionitem->index2use)
                <div class="float-left">
                  <label for="checkbox{{ $action->id }}" class="ml-2 mb-0 align-middle">{{ $action->actionitem->index2text }}</label>
                </div>
                @endif
                @if ($action->actionitem->index3use)
                <div class="float-right">
                  <label for="checkbox{{ $action->id }}" class="mr-4 mb-0 align-middle">{{ $action->actionitem->index3text }}</label>
                </div>
                @endif
              @else
                <div class="float-left">
                  <label for="checkbox{{ $action->id }}" class="ml-2 mb-0 align-middle">{{ $action->actionitem->index1text }}</label>
                </div>
              @endif
              </div>
              <div class="col-4 col-sm-4 d-flex align-items-center px-0">
                @if ($action->actionitem->checkbox)
                <div class="custom-control custom-checkbox ml-4">
                  <input type="hidden" name="actions[{{ $action->id }}][checkbox]" value="0">
                  <input id="checkbox{{ $action->id }}" type="checkbox" class="custom-control-input" name="actions[{{ $action->id }}][checkbox]" value="1"
                    @if ($action->checkbox)
                      checked="checked"
                    @endif
                  >
                  <label class="custom-control-label" style="position: absolute;" for="checkbox{{ $action->id }}"></label>
                </div>
                @endif
                @if ($action->actionitem->value)
                <div class="mr-4">
                  <input id="value" type="text" class="form-control form-control-sm" name="actions[{{ $action->id }}][value]" value="{{ $action->value }}">
                </div>
                @endif
                @if ($action->actionitem->to)
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-sm-12">
                @endif
                  <div>
                @if ($action->actionitem->from)
                  @php
                    $fromhour = date('H', strtotime($action->from));
                    $fromminute = date('i', strtotime($action->from));
                  @endphp
                  @component('components.select-number', [
                    'min' => '0',
                    'max' => '24',
                    'selected' => $fromhour,
                    ])
                    @slot('name')
                      actions[{{ $action->id }}][from-hour]
                    @endslot
                  @endcomponent
                    <label class="mt-2">：</label>
                  @component('components.select-minute', [
                    'min' => '00',
                    'max' => '60',
                    'selected' => $fromminute,
                    ])
                    @slot('name')
                      actions[{{ $action->id }}][from-minute]
                    @endslot
                  @endcomponent
                @endif
                @if ($action->actionitem->to)
                    <label class="mx-2">〜</label>
                  @php
                    $tohour = date('H', strtotime($action->to));
                    $tominute = date('i', strtotime($action->to));
                  @endphp
                  @component('components.select-number', [
                    'min' => '0',
                    'max' => '24',
                    'selected' => $tohour,
                    ])
                    @slot('name')
                      actions[{{ $action->id }}][to-hour]
                    @endslot
                  @endcomponent
                    <label class="mt-2">：</label>
                  @component('components.select-minute', [
                    'min' => '00',
                    'max' => '60',
                    'selected' => $tominute,
                    ])
                    @slot('name')
                      actions[{{ $action->id }}][to-minute]
                    @endslot
                  @endcomponent
                @endif
                  </div>
                @if ($action->actionitem->text)
               </div>
             </div>
             <div class="row">
               <div class="col-12 col-sm-12">
                <textarea id="text" type="text" class="form-control" name="actions[{{ $action->id }}][text]" rows="{{ $action->actionitem->lines }}">{{ $action->text }}</textarea>
                @endif
              </div>
            </div>
    @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="float-left">
      <button type="reset" name="reset" class="btn btn-outline-primary">{{ __('actions.Reset') }}</button>
      <button type="submit" name="submit" class="btn btn-primary">{{ __('actions.Submit') }}</button>
    </div>
  </form>
  <div class="float-right mb-4">
    @component('components.btn-del-confirm')
      @slot('table', 'actions')
      @slot('id', $date)
    @endcomponent
  </div>
</div>
@endsection
