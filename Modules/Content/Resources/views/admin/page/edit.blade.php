@extends('layouts.admin.main')
@section('title', "Edit Page: {$page->title}")

@section('actions')
    @component('components.admin.dropdown')
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
        @can('edit', \Modules\Seo\Entities\SeoProfile::class)
            <a href="{{ route('admin.pages.seo.edit', $page->id) }}" class="dropdown-item dropdown-info">
                <i class="fa fa-edit"></i> Edit Seo Profile
            </a>
        @endcan
    @endcomponent
@endsection

@section('content')

    <div class="row">
        <div class="col-xl-9">
            @component('components.admin.card')
                @slot('header')
                    <i class="fa fa-edit"></i> Content
                @endslot
                @slot('body')
                    <form method="POST" action="{{ route('admin.pages.update', $page->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        @include('content::admin.page.partials.content')
                        <div class="card-buttons">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check"></i> Update Content
                            </button>
                            <a class="btn btn-danger" href="{{ route('admin.pages.index') }}">
                                <i class="fa fa-ban"></i> Cancel
                            </a>
                        </div>
                    </form>
                @endslot
            @endcomponent
        </div>
        <div class="col-xl-3">
            @include('content::admin.page.partials.status')
        </div>
    </div>

@endsection
