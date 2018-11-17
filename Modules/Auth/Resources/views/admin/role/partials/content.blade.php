<div class="row">
    <div class="form-group col-12">
        <label for="name" class="form-control-label">@lang('auth::attributes.role.name')</label>
        <input type="text" name="name" id="name" class="form-control {{ $errors->first('name', 'is-invalid') }}" value="{{ old('name', $role->name) }}">
        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
    </div>
</div>