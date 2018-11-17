@component('components.admin.collapsible-card')
    @slot('ref', 'status')
    @slot('header')
        <i class="fa fa-edit"></i> @lang('news::attributes.post.status')
    @endslot
    @slot('body')
        {!! $post->present()->statusBadge !!}
        @if(user_setting('live_validation') && gate()->check('mark-as-live', $post))
            <hr>
            <ul class="checklist">
                @foreach($markAsLiveValidator->results() as $result)
                    <li class="checklist-item {{ $result->valid ? 'success' : '' }}">{{ $result->label }}</li>
                @endforeach
            </ul>
        @endcan
        @can('mark-as-live', $post)
            <form method="POST" action="{{ route('admin.posts.mark-as-live', $post->id) }}">
                {{ csrf_field() }}
                {{ method_field('put') }}
                @if(user_setting('publish_mode') === 'advanced')
                    <hr>
                    <div class="form-group datetime-group">
                        <input title="" type="text" name="published_at[date]" class="form-control datepicker" autocomplete="off" value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}"/>
                        <input title="" type="time" name="published_at[time]" class="form-control timepicker" value="{{ \Carbon\Carbon::now()->format('H:i') }}"/>
                    </div>
                @endif
                <div class="card-buttons">
                    <button type="submit" class="btn btn-success" data-alert="confirm">Mark As Live</button>
                </div>
            </form>
        @endcan
        @can('mark-as-draft', $post)
            <hr>
            <p><em><strong>Published:</strong> {{ $post->present()->datetime('published_at') }}</em></p>
            <div class="card-buttons">
                <form method="POST" action="{{ route('admin.posts.mark-as-draft', $post->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <button type="submit" class="btn btn-warning" data-alert="confirm">Mark As Draft</button>
                </form>
            </div>
        @endcan
    @endslot
@endcomponent
