<div class="row">
    <div class="form-group col-12 col-xl-8">
        <label for="title" class="form-control-label">@lang('news::attributes.post.title')</label>
        <input type="text" name="title" id="title" class="form-control {{ $errors->first('title', 'is-invalid') }}" value="{{ old('title', $post->title) }}">
        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
    </div>

    <div class="form-group col-12 col-xl-4">
        <label for="category_id" class="form-control-label">@lang('news::attributes.post.category_id')</label>
        <select name="category_id" id="category_id" class="form-control selectpicker {{ $errors->first('category_id', 'is-invalid') }}" data-live-search="true">
            <option></option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ (int) old('category_id', $post->category_id) === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">{{ $errors->first('category_id') }}</div>
    </div>

    <div class="form-group col-12 {{ $errors->first('content', 'is-invalid') }}">
        <label for="content" class="form-control-label">@lang('news::attributes.post.content')</label>
        <textarea name="content" id="content" class="form-control wysiwyg {{ $errors->first('content', 'is-invalid') }}" data-entity-type="{{ get_class($post) }}" data-entity-id="{{ $post->id }}">{{ old('content', $post->content) }}</textarea>
        <div class="invalid-feedback">{{ $errors->first('content') }}</div>
    </div>
</div>
