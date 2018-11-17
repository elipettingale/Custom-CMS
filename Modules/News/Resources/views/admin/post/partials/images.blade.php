@component('components.admin.collapsible-card')
    @slot('ref', 'featured_image')
    @slot('header')
        <i class="fa fa-image"></i> @lang('news::attributes.post.featured_image')
    @endslot
    @slot('body')
        @component('components.admin.image-upload')
            @slot('entity', $post)
            @slot('mediaCollection', 'featured_image')
        @endcomponent
        <div class="thumbnails">
            <img class="thumbnail" src="{{ $post->featured_image->getUrl('thumb', true) }}">
        </div>
    @endslot
@endcomponent
