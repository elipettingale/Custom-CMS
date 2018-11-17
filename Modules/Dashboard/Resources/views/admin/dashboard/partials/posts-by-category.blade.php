<div class="dashboard-chart">
    @component('components.admin.card')
        @slot('header')
            Posts by Category
        @endslot
        @slot('body')
            <canvas id="posts-by-category" height="125px"></canvas>
        @endslot
    @endcomponent
</div>
