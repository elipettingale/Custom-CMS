<div class="dashboard-chart">
    @component('components.admin.card')
        @slot('header')
            Published Posts by Month
        @endslot
        @slot('body')
            <canvas id="published-posts-by-month"></canvas>
        @endslot
    @endcomponent
</div>
