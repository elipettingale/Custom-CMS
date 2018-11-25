<form id="image-upload-form" method="POST" action="{{ route('admin.media.replace') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <input type="hidden" name="entity_type" value="{{ get_class($entity) }}">
    <input type="hidden" name="entity_id" value="{{ $entity->id }}">
    <input type="hidden" name="media_collection" value="{{ $mediaCollection }}">
    <div class="form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="media_files" name="media_files[]" {{ $entity->mediaDefinitions()[$mediaCollection]['multiple'] === true ? 'multiple' : '' }}>
            <label class="custom-file-label" for="media_files">Upload Image{{ $entity->mediaDefinitions()[$mediaCollection]['multiple'] === true ? '(s)' : '' }}</label>
        </div>
    </div>
</form>
