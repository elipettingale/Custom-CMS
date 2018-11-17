<select name="settings[{{ $key }}]" class="form-control selectpicker" data-live-search="true">
    @foreach($options as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ $value === $optionKey ? 'selected' : '' }}>{{ $optionValue }}</option>
    @endforeach
</select>
