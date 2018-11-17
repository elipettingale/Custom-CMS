<div class="card collapsible-card" data-ref="{{ $ref }}">
    <div class="card-header collapsed" data-toggle="collapse" data-target="#collapsible-card-{{ $ref }}" aria-expanded="true">
        {{ $header }}
    </div>
    <div class="card-body collapse" id="collapsible-card-{{ $ref }}">
        <div class="card-content">
            {{ $body }}
        </div>
    </div>
</div>