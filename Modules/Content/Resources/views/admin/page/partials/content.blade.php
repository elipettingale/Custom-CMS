<div class="row">
    <div class="form-group col-12 col-xl-8">
        <label for="title" class="form-control-label">@lang('content::attributes.page.title')</label>
        <input type="text" name="title" id="title" class="form-control {{ $errors->first('title', 'is-invalid') }}" value="{{ old('title', $page->title) }}">
        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
    </div>

    <div class="form-group col-12 col-xl-4">
        <label for="template" class="form-control-label">@lang('content::attributes.page.template')</label>
        <select name="template" id="template" class="form-control selectpicker {{ $errors->first('template', 'is-invalid') }}" data-live-search="true" {{ $page->id ? 'disabled' : '' }}>
            @foreach($templates as $template)
                <option value="{{ $template->key }}" {{ old('template', $page->template->key) === $template->key ? 'selected' : '' }}>{{ $template->value }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">{{ $errors->first('template') }}</div>
    </div>

    @if(view()->exists("content::admin.page-template.{$page->template->key}"))
        @include("content::admin.page-template.{$page->template->key}")
    @endif
</div>
