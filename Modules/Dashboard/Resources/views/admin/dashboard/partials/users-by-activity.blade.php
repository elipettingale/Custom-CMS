<div class="dashboard-chart">
    @component('components.admin.card')
        @slot('header')
            Users by Activity
        @endslot
        @slot('body')
            <canvas id="users-by-activity" height="110px"></canvas>
        @endslot
    @endcomponent
</div>
