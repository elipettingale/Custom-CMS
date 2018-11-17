@extends('layouts.admin.main')
@section('title', 'Categories')

@section('actions')
    @include('news::admin.post-category.partials.global-actions')
@endsection

@section('content')

    <div class="row">
        <div class="col-xl-9 mb-3">
            @component('components.admin.table')
                @slot('header')
                    <tr>
                        <th>@lang('news::attributes.post-category.name')</th>
                        <th>@lang('news::attributes.post-category.posts_count')</th>
                        <th class="no-sort no-search">Actions</th>
                    </tr>
                @endslot
                @slot('body')
                    @foreach($postCategories as $postCategory)
                        <tr>
                            <td>{{ $postCategory->name }}</td>
                            <td>
                                <a href="{{ route('admin.posts.index', ['category_id' => $postCategory->id]) }}">
                                    {{ $postCategory->present()->postsCount }}
                                </a>
                            </td>
                            <td class="text-right">
                                @include('news::admin.post-category.partials.entity-actions')
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
                    @include('news::admin.post-category.partials.filters')
                @endslot
            @endcomponent
        </div>
    </div>

@endsection
