<div class="row">
    <div class="form-group col-12">
        <label for="title" class="form-control-label">@lang('seo::attributes.seo-profile.title')</label>
        <input type="text" name="title" id="title" class="form-control {{ $errors->first('title', 'is-invalid') }}" value="{{ old('title', $seoProfile->title) }}">
        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
    </div>

    <div class="form-group col-12">
        <label for="description" class="form-control-label">@lang('seo::attributes.seo-profile.description')</label>
        <textarea name="description" id="description" class="form-control {{ $errors->first('description', 'is-invalid') }}">{{ old('description', $seoProfile->description) }}</textarea>
        <div class="invalid-feedback">{{ $errors->first('description') }}</div>
    </div>
</div>
