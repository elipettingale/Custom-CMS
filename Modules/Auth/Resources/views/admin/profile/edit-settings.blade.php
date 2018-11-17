@extends('layouts.admin.main')
@section('title', 'My Settings')

@section('content')

    <form method="POST" action="{{ route('admin.profile.settings.update') }}">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <div class="row">
            <div class="col-xl-9 mb-3">
                @component('components.admin.table')
                    @slot('options', ['pagination' => false])
                    @slot('header')
                        <tr>
                            <th>Name</th>
                            <th class="no-sort">Description</th>
                            <th class="no-sort no-search"></th>
                        </tr>
                    @endslot
                    @slot('body')
                        @foreach($settings as $setting)
                            <tr>
                                <td>{{ $setting->name }}</td>
                                <td>{{ $setting->description }}</td>
                                <td class="text-right">
                                    {!! $setting->renderInput(user_setting($setting->key)) !!}
                                </td>
                            </tr>
                        @endforeach
                    @endslot
                @endcomponent
            </div>
            <div class="col-xl-3">
                @component('components.admin.card')
                    @slot('header')
                        Content
                    @endslot
                    @slot('body')
                        <div class="form-group">
                            <label for="data-table-search" class="form-control-label">Search</label>
                            <input type="text" id="data-table-search" data-table-ref="main" class="form-control">
                        </div>

                        <div class="card-buttons">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check"></i> Update
                            </button>

                            <a class="btn btn-danger" href="{{ route('admin.profile.edit') }}">
                                <i class="fa fa-ban"></i> Cancel
                            </a>
                        </div>
                    @endslot
                @endcomponent
            </div>
        </div>
    </form>

@endsection
