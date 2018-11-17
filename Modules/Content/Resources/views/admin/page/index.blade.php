@extends('layouts.admin.main')
@section('title', 'Pages')

@section('actions')
    @component('components.admin.dropdown')
        @can('create', \Modules\Content\Entities\Page::class)
            <a class="dropdown-item dropdown-success" href="{{ route('admin.pages.create') }}">
                <i class="fa fa-plus"></i> Create New Page
            </a>
        @endcan
    @endcomponent
@endsection

@section('content')

    <div class="row">
        <div class="col-xl-9 mb-3">
            @component('components.admin.table')
                @slot('header')
                    <tr>
                        <th>@lang('content::attributes.page.title')</th>
                        <th>@lang('content::attributes.page.template')</th>
                        <th>@lang('content::attributes.page.status')</th>
                        <th class="no-sort no-search">Actions</th>
                    </tr>
                @endslot
                @slot('body')
                    @foreach($pages as $page)
                        <tr>
                            <td>{{ $page->title }}</td>
                            <td>{{ $page->template->value }}</td>
                            <td>{!! $page->present()->statusBadge !!}</td>
                            <td class="text-right">
                                @component('components.admin.cog-dropdown')
                                    @can('preview', $page)
                                        <a href="{{ route('frontend.pages.show', [$page->slug, 'preview' => 'true']) }}" class="dropdown-item dropdown-warning" target="_blank">
                                            <i class="fa fa-eye"></i> Preview
                                        </a>
                                    @endcan
                                    @can('show', $page)
                                        <a href="{{ route('frontend.pages.show', $page->slug) }}" class="dropdown-item dropdown-warning" target="_blank">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                    @endcan
                                    @can('edit', $page)
                                        <a href="{{ route('admin.pages.edit', $page->id) }}" class="dropdown-item dropdown-info">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                    @endcan
                                    @can('delete', $page)
                                        <form method="POST" action="{{ route('admin.pages.destroy', $page->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="dropdown-item dropdown-danger" data-alert="confirm-delete">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    @endcan
                                @endcomponent
                            </td>
                        </tr>
                    @endforeach
                @endslot
            @endcomponent
        </div>
        <div class="col-xl-3">
            @component('components.admin.card')
                @slot('header')
                    Filters
                @endslot
                @slot('body')
                    @component('components.admin.filters')
                        <div class="form-group">
                            <label for="status" class="form-control-label">@lang('news::attributes.post.status')</label>
                            <select name="status" id="status" class="form-control selectpicker" data-live-search="true">
                                <option></option>
                                @foreach($statuses as $status)
                                    <option value="{{ $status->key }}" {{ request('status') === $status->key ? 'selected' : '' }}>{{ $status->label }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endcomponent
                @endslot
            @endcomponent
        </div>
    </div>

@endsection
