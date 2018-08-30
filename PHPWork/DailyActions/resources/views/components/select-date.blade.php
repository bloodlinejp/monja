<select class="custom-select custom-select-lg" name="{{ $name }}">
  @if ($selected == '')
  <option value="" selected="selected">
  @endif
    @for ($i = 0; $i < $days + 1; $i++)
    @php
      $value = date('Y-m-d', strtotime('-' . $i . ' day', time()))
    @endphp
  <option value="{{ $value }}"
    @if ($value == $selected)
      selected="selected"
    @endif
  >{{ $value }}</option>
    @endfor
</select>
