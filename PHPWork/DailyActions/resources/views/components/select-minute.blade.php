<select name="{{ $name }}">
  @if ($selected == '')
  <option value="" selected="selected">
  @endif
    @for ($i = $min; $i < $max + 1; $i = $i + 15)
  <option value="{{ $i }}"
    @if ($i == $selected)
      selected="selected"
    @endif
  >{{ $i }}</option>
    @endfor
</select>
