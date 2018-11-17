@extends('layouts.admin.main')
@section('title', "Edit Post: {$post->title}")

@section('actions')
    @component('components.admin.dropdown')
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
        @can('edit', \Modules\Seo\Entities\SeoProfile::class)
            <a href="{{ route('admin.posts.seo.edit', $post->id) }}" class="dropdown-item dropdown-info">
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
                    <form method="POST" action="{{ route('admin.posts.update', $post->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        @include('news::admin.post.partials.content')
                        <div class="card-buttons">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check"></i> Update
                            </button>
                            <a class="btn btn-danger" href="{{ route('admin.posts.index') }}">
                                <i class="fa fa-ban"></i> Cancel
                            </a>
                        </div>
                    </form>
                @endslot
            @endcomponent
        </div>
        <div class="col-xl-3">
            <div class="card-accordion">
                @include('news::admin.post.partials.status')
                @include('news::admin.post.partials.images')
            </div>
        </div>
    </div>

@endsection
