<div class="thumbnails">
    @if($media instanceof \Modules\Media\ValueObjects\Media)
        <img class="thumbnail" src="{{ $media->getUrl('thumb', true) }}">
    @endif
    @if($media instanceof \Illuminate\Support\Collection)
        @foreach($media as $image)
            <img class="thumbnail" src="{{ $image->getUrl('thumb', true) }}">
        @endforeach
    @endif
</div>