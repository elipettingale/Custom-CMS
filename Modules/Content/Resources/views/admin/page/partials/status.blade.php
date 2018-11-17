@component('components.admin.card')
    @slot('header')
        <i class="fa fa-edit"></i> @lang('content::attributes.page.status')
    @endslot
    @slot('body')
        {!! $page->present()->statusBadge !!}
        @if(user_setting('live_validation') && gate()->check('mark-as-live', $page))
            <hr>
            <ul class="checklist">
                @foreach($markAsLiveValidator->results() as $result)
                    <li class="checklist-item {{ $result->valid ? 'success' : '' }}">{{ $result->label }}</li>
                @endforeach
            </ul>
        @endcan
        <div class="card-buttons">
            @can('mark-as-live', $page)
                <form method="POST" action="{{ route('admin.pages.mark-as-live', $page->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <button type="submit" class="btn btn-success" data-alert="confirm">Mark As Live</button>
                </form>
            @endcan
            @can('mark-as-draft', $page)
                <form method="POST" action="{{ route('admin.pages.mark-as-draft', $page->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <button type="submit" class="btn btn-warning" data-alert="confirm">Mark As Draft</button>
                </form>
            @endcan
        </div>
    @endslot
@endcomponent
