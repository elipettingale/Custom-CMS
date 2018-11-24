<div id="{{ $ref }}" class="carousel slide hero-slider" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($slides as $index => $slide)
            <li data-target="#{{ $ref }}" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
        @endforeach
    </ol>
    <div class="carousel-inner" role="listbox">
        @foreach($slides as $index => $slide)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" style="background-image: url({{ $slide }})">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="display-4"></h3>
                    <p class="lead"></p>
                </div>
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#{{ $ref }}" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#{{ $ref }}" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
