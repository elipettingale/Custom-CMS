@extends('layouts.admin.main')
@section('title', "Edit Category: {$postCategory->name}")

@section('content')

    @component('components.admin.card')
        @slot('header')
            <i class="fa fa-edit"></i> Content
        @endslot
        @slot('body')
            <form method="POST" action="{{ route('admin.post-categories.update', $postCategory->id) }}">
                {{ csrf_field() }}
                {{ method_field('put') }}
                @include('news::admin.post-category.partials.form.content')
                <div class="card-buttons">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Update
                    </button>
                    <a class="btn btn-danger" href="{{ route('admin.post-categories.index') }}">
                        <i class="fa fa-ban"></i> Cancel
                    </a>
                </div>
            </form>
        @endslot
    @endcomponent

@endsection
