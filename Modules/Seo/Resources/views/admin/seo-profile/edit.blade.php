@extends('layouts.admin.main')
@section('title', "Edit {$config['entity']} Seo: {$config['identifier']}")

@section('content')

    <div class="row">
        <div class="col-12">
            @component('components.admin.card')
                @slot('header')
                    <i class="fa fa-edit"></i> Seo
                @endslot
                @slot('body')
                    <form method="POST" action="{{ route('admin.seo.update', [lower_hyphen_case($config['entity_plural']), $entity->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        @include('seo::admin.seo-profile.partials.content')
                        <div class="card-buttons">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check"></i> Update
                            </button>
                            <a class="btn btn-danger" href="{{ route('admin.' . lower_hyphen_case($config['entity_plural']) . '.edit', $entity->id) }}">
                                <i class="fa fa-ban"></i> Cancel
                            </a>
                        </div>
                    </form>
                @endslot
            @endcomponent
        </div>
    </div>

@endsection
