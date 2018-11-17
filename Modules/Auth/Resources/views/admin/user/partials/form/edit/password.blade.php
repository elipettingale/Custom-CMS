<div class="row">
    <div class="form-group col-12">
        <label for="password" class="form-control-label">@lang('auth::attributes.user.password')</label>
        <input type="password" name="password" id="password" class="form-control {{ $errors->first('password', 'is-invalid') }}">
        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
    </div>
    <div class="form-group col-12">
        <label for="password_confirmation" class="form-control-label">@lang('auth::attributes.user.password_confirmation')</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control {{ $errors->first('password', 'is-invalid') }}">
        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
    </div>
</div>
