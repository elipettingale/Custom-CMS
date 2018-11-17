<div class="btn-group-toggle" data-toggle="buttons">
    <label class="btn btn-success btn-sm {{ $value ? 'active' : '' }}">
        <input type="radio" name="settings[{{ $key }}]" value="1" {{ $value ? 'checked' : '' }}>
        <span>True</span>
    </label>
    <label class="btn btn-danger btn-sm {{ $value ? '' : 'active' }}">
        <input type="radio" name="settings[{{ $key }}]" value="0" {{ $value ? '' : 'checked' }}>
        <span>False</span>
    </label>
</div>
