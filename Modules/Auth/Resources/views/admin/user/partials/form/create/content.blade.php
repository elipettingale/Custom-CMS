<div class="row">
    <div class="form-group col-lg-6 col-xl-4">
        <label for="first_name" class="form-control-label">@lang('auth::attributes.user.first_name')</label>
        <input type="text" name="first_name" id="first_name" class="form-control {{ $errors->first('first_name', 'is-invalid') }}" value="{{ old('first_name', $user->first_name) }}">
        <div class="invalid-feedback">{{ $errors->first('first_name') }}</div>
    </div>
    <div class="form-group col-lg-6 col-xl-4">
        <label for="last_name" class="form-control-label">@lang('auth::attributes.user.last_name')</label>
        <input type="text" name="last_name" id="last_name" class="form-control {{ $errors->first('last_name', 'is-invalid') }}" value="{{ old('last_name', $user->last_name) }}">
        <div class="invalid-feedback">{{ $errors->first('last_name') }}</div>
    </div>
    <div class="form-group col-lg-12 col-xl-4">
        <label for="email" class="form-control-label">@lang('auth::attributes.user.email')</label>
        <input type="text" name="email" id="email" class="form-control {{ $errors->first('email', 'is-invalid') }}" value="{{ old('email', $user->email) }}">
        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
    </div>
</div>

<div class="row">
    <div class="form-group col-lg-6">
        <label for="password" class="form-control-label">@lang('auth::attributes.user.password')</label>
        <input type="password" name="password" id="password" class="form-control {{ $errors->first('password', 'is-invalid') }}">
        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
    </div>
    <div class="form-group col-lg-6">
        <label for="password_confirmation" class="form-control-label">@lang('auth::attributes.user.password_confirmation')</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control {{ $errors->first('password', 'is-invalid') }}">
        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
    </div>
</div>

<div class="row">
    <div class="form-group col-12">
        <label for="roles" class="form-control-label">@lang('auth::attributes.user.roles')</label>
        <select name="roles[]" id="roles" class="form-control selectpicker {{ $errors->first('roles', 'is-invalid') }}" multiple data-live-search="true">
            @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ $user->roles->contains($role) ? 'selected' : '' }}>{{ $role->name }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">{{ $errors->first('roles') }}</div>
    </div>
</div>
