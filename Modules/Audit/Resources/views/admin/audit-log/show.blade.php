@extends('layouts.admin.main')
@section('title', "View Audit Log: {$auditLog->created_at}")

@push('styles')
    <script src="{{ asset('css/admin/audit.css') }}"></script>
@endpush

@section('content')

    <div class="audit-log-container">
        <div class="audit-timeline">
            <div class="timeline">
                @foreach($relatedAuditLogs as $relatedAuditLog)
                    @if($relatedAuditLog->id === $auditLog->id)
                        <div class="timeline-point active">
                            <h5>{{ $relatedAuditLog->created_at }}</h5>
                            <p>{{ $relatedAuditLog->present()->diffForHumans('created_at') }}</p>
                        </div>
                    @else
                        <div class="timeline-point">
                            <a href="{{ route('admin.audit-logs.show', $relatedAuditLog->id) }}">
                                <h5>{{ $relatedAuditLog->created_at }}</h5>
                                <p>{{ $relatedAuditLog->present()->diffForHumans('created_at') }}</p>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="audit-details">
            @include('audit::admin.audit-log.partials.summary')
            @include('audit::admin.audit-log.partials.auditable')
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/admin/audit.js') }}"></script>
@endpush
