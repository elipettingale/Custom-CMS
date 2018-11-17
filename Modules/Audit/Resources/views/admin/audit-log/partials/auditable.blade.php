@component('components.admin.card')
@slot('header')
    <i class="fa fa-list"></i> @lang('audit::attributes.audit-log.auditable_id') ({{ $auditLog->auditable_type }})
@endslot
@slot('body')

    <div class="row">
        @foreach($auditLog->auditable_data as $key => $value)
            <div class="form-group col-lg-6">
                <label for="{{ $key }}" class="form-control-label">{{ $key }}</label>
                <input type="text" id="{{ $key }}" class="form-control audit-log-field @if($previousAuditLog){{ $value !== $previousAuditLog->auditable_data[$key] ? 'is-valid' : '' }}@endif" value="{{ $value }}" readonly>
            </div>
        @endforeach
    </div>

@endslot
@endcomponent
