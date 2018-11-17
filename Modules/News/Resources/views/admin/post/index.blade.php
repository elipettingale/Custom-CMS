@extends('layouts.admin.main')
@section('title', 'Posts')

@section('actions')
    @component('components.admin.dropdown')
        @can('create', \Modules\News\Entities\Post::class)
            <a class="dropdown-item dropdown-success" href="{{ route('admin.posts.create') }}">
                <i class="fa fa-plus"></i> Create New Post
            </a>
        @endcan
    @endcomponent
@endsection

@section('content')

    <div class="row">
        <div class="col-xl-9 mb-3">
            @component('components.admin.table')
                @slot('options', ['sort_column' => 1, 'sort_direction' => 'desc'])
                @slot('header')
                    <tr>
                        <th>@lang('news::attributes.post.title')</th>
                        <th>@lang('news::attributes.post.created_at')</th>
                        <th>@lang('news::attributes.post.status')</th>
                        <th class="no-sort no-search">Actions</th>
                    </tr>
                @endslot
                @slot('body')
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->present()->timestamp('created_at') }}</td>
                            <td>{!! $post->present()->statusBadge !!}</td>
                            <td class="text-right">
                                @component('components.admin.cog-dropdown')
                                    @can('preview', $post)
                                        <a href="{{ route('frontend.posts.show', [$post->slug, 'preview' => 'true']) }}" class="dropdown-item dropdown-warning" target="_blank">
                                            <i class="fa fa-eye"></i> Preview
                                        </a>
                                    @endcan
                                    @can('show', $post)
                                        <a href="{{ route('frontend.posts.show', $post->slug) }}" class="dropdown-item dropdown-warning" target="_blank">
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                    @endcan
                                    @can('edit', $post)
                                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="dropdown-item dropdown-info">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                    @endcan
                                    @can('delete', $post)
                                        <form method="POST" action="{{ route('admin.posts.destroy', $post->id) }}">
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

                        <div class="form-group">
                            <label for="category_id" class="form-control-label">@lang('news::attributes.post.category_id')</label>
                            <select name="category_id" id="category_id" class="form-control selectpicker" data-live-search="true">
                                <option></option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ (int) request('category_id') === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endcomponent
                @endslot
            @endcomponent
        </div>
    </div>

@endsection
