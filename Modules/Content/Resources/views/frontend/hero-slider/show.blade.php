<div id="hero-slider" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#hero-slider" data-slide-to="0" class="active"></li>
        <li data-target="#hero-slider" data-slide-to="1"></li>
        <li data-target="#hero-slider" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active" style="background-image: url({{ stock_image_path(7) }})">
            <div class="carousel-caption d-none d-md-block">
                <h3 class="display-4">First Slide</h3>
                <p class="lead">This is a description for the first slide.</p>
            </div>
        </div>

        <div class="carousel-item" style="background-image: url({{ stock_image_path(8) }})">
            <div class="carousel-caption d-none d-md-block">
                <h3 class="display-4">Second Slide</h3>
                <p class="lead">This is a description for the second slide.</p>
            </div>
        </div>

        <div class="carousel-item" style="background-image: url({{ stock_image_path(9) }})">
            <div class="carousel-caption d-none d-md-block">
                <h3 class="display-4">Third Slide</h3>
                <p class="lead">This is a description for the third slide.</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#hero-slider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#hero-slider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>