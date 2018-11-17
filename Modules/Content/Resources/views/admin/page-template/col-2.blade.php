<div class="form-group col-12 {{ $errors->first('data.content_left', 'is-invalid') }}">
    <label for="data-content-left" class="form-control-label">@lang('content::attributes.page-template.col-2.content_left')</label>
    <textarea name="data[content_left]" id="data-content-left" class="form-control wysiwyg {{ $errors->first('data.content_left', 'is-invalid') }}" data-entity-type="{{ get_class($page) }}" data-entity-id="{{ $page->id }}">{{ old('data.content_left', $page->content_left) }}</textarea>
    <div class="invalid-feedback">{{ $errors->first('data.content_left') }}</div>
</div>

<div class="form-group col-12 {{ $errors->first('data.content_right', 'is-invalid') }}">
    <label for="data-content-right" class="form-control-label">@lang('content::attributes.page-template.col-2.content_right')</label>
    <textarea name="data[content_right]" id="data-content-right" class="form-control wysiwyg {{ $errors->first('data.content_right', 'is-invalid') }}" data-entity-type="{{ get_class($page) }}" data-entity-id="{{ $page->id }}">{{ old('data.content_right', $page->content_right) }}</textarea>
    <div class="invalid-feedback">{{ $errors->first('data.content_right') }}</div>
</div>
