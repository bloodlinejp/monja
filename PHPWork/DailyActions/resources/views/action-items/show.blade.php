@php
  $title = __('actionitems.Actionitem') . ': ' . $actionitem->index1text;
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
  <h1>{{ $title }}</h1>

  <!-- 項目１件の情報 -->
  <dl class="row">
    <dt class="col-md-2">{{ __('actionitems.ID') }}</dt>
    <dd class="col-md-10">{{ $actionitem->id }}</dd>
    <dt class="col-md-2">{{ __('actionitems.User_ID') }}</dt>
    <dd class="col-md-10">{{ $actionitem->user_id }}</dd>
    <dt class="col-md-2">{{ __('actionitems.Index1Text') }}</dt>
    <dd class="col-md-10">{{ $actionitem->index1text }}</dd>
    <dt class="col-md-2">{{ __('actionitems.Index2Text') }}</dt>
    <dd class="col-md-10">{{ $actionitem->index2text}}</dd>
    <dt class="col-md-2">{{ __('actionitems.Index2Use') }}</dt>
    <dd class="col-md-10">
      <input type="checkbox" disabled="disabled"
        @if ($actionitem->index2use == 1)
        checked="checked"
        @endif
      />
    </dd>
    <dt class="col-md-2">{{ __('actionitems.Index3Text') }}</dt>
    <dd class="col-md-10">{{ $actionitem->index3text}}</dd>
    <dt class="col-md-2">{{ __('actionitems.Index3Use') }}</dt>
    <dd class="col-md-10">
      <input type="checkbox" disabled="disabled"
        @if ($actionitem->index3use == 1)
        checked="checked"
        @endif
      />
    </dd>
    <dt class="col-md-2">{{ __('actionitems.From') }}</dt>
    <dd class="col-md-10">
      <input type="checkbox" disabled="disabled"
        @if ($actionitem->from == 1)
        checked="checked"
        @endif
      />
    </dd>
    <dt class="col-md-2">{{ __('actionitems.To') }}</dt>
    <dd class="col-md-10">
      <input type="checkbox" disabled="disabled"
        @if ($actionitem->to == 1)
        checked="checked"
        @endif
      />
    </dd>
    <dt class="col-md-2">{{ __('actionitems.Text') }}</dt>
    <dd class="col-md-10">
      <input type="checkbox" disabled="disabled"
        @if ($actionitem->text == 1)
        checked="checked"
        @endif
      />
    </dd>
    <dt class="col-md-2">{{ __('actionitems.Lines') }}</dt>
    <dd class="col-md-10">{{ $actionitem->lines }}</dd>
    <dt class="col-md-2">{{ __('actionitems.Value') }}</dt>
    <dd class="col-md-10">
      <input type="checkbox" disabled="disabled"
        @if ($actionitem->value == 1)
        checked="checked"
        @endif
      />
    </dd>
    <dt class="col-md-2">{{ __('actionitems.Checkbox') }}</dt>
    <dd class="col-md-10">
      <input type="checkbox" disabled="disabled"
        @if ($actionitem->checkbox == 1)
        checked="checked"
        @endif
      />
    </dd>
  </dl>
  <!-- 編集・削除ボタン -->
  <div>
    <a href="{{ url('action-items') }}" class="btn btn-success">
      {{ __('actionitems.ReturnToList') }}
    </a>
    <!-- 削除ボタンのコンポーネント -->
    @component('components.btn-del-confirm')
      @slot('table', 'action-items')
      @slot('id', $actionitem->id)
    @endcomponent
    <a href="{{ url('action-items/'.$actionitem->id.'/edit') }}" class="btn btn-primary">
      {{ __('actionitems.Edit') }}
    </a>
  </div>
</div>
@endsection
