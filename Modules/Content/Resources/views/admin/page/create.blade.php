@extends('layouts.admin.main')
@section('title', 'Create New Page')

@section('content')

    @component('components.admin.card')
        @slot('header')
            <i class="fa fa-edit"></i> Content
        @endslot
        @slot('body')
            <form method="POST" action="{{ route('admin.pages.store') }}">
                {{ csrf_field() }}
                @include('content::admin.page.partials.content')
                <div class="card-buttons">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> Create
                    </button>
                    <a class="btn btn-danger" href="{{ route('admin.pages.index') }}">
                        <i class="fa fa-ban"></i> Cancel
                    </a>
                </div>
            </form>
        @endslot
    @endcomponent

@endsection
