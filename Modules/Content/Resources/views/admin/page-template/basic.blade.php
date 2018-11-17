<div class="form-group col-12 {{ $errors->first('data.content', 'is-invalid') }}">
    <label for="data-content" class="form-control-label">@lang('content::attributes.page-template.basic.content')</label>
    <textarea name="data[content]" id="data-content" class="form-control wysiwyg {{ $errors->first('data.content', 'is-invalid') }}" data-entity-type="{{ get_class($page) }}" data-entity-id="{{ $page->id }}">{{ old('data.content', $page->content) }}</textarea>
    <div class="invalid-feedback">{{ $errors->first('data.content') }}</div>
</div>
