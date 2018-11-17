@component('components.admin.card')
@slot('header')
    <i class="fa fa-list"></i> Summary
@endslot
@slot('body')

    <div class="row">
        <div class="form-group col-lg-4">
            <label for="created_at" class="form-control-label">@lang('audit::attributes.audit-log.created_at')</label>
            <input type="text" id="created_at" class="form-control" value="{{ $auditLog->created_at }}" readonly>
        </div>

        @if($auditLog->impersonator()->exists())
            <div class="form-group col-lg-4">
                <label for="user_name" class="form-control-label">@lang('audit::attributes.audit-log.actioned_by')</label>
                <input type="text" id="user_name" class="form-control" value="{{ $auditLog->present()->impersonatorName }}" readonly>
            </div>
            <div class="form-group col-lg-4">
                <label for="user_email" class="form-control-label">@lang('audit::attributes.audit-log.actioned_as')</label>
                <input type="text" id="user_email" class="form-control" value="{{ $auditLog->present()->userName }}" readonly>
            </div>
        @else
            <div class="form-group col-lg-8">
                <label for="user_name" class="form-control-label">@lang('audit::attributes.audit-log.actioned_by')</label>
                <input type="text" id="user_name" class="form-control" value="{{ $auditLog->present()->userName }}" readonly>
            </div>
        @endif
    </div>

    <div class="row">
        <div class="form-group col-lg-12">
            <label for="message" class="form-control-label">@lang('audit::attributes.audit-log.message')</label>
            <input type="text" id="message" class="form-control" value="{{ $auditLog->present()->message }}" readonly>
        </div>
    </div>

@endslot
@endcomponent
