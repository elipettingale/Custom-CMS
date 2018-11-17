<div class="card mb-3">
    @if(isset($header))
    <div class="card-header">
        {{ $header }}
    </div>
    @endif
    <div class="card-body">
        {{ $body }}
    </div>
</div>