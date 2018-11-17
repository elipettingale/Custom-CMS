@if(session()->has('error'))
    <div class="swal-alert alert-danger" data-message="{{ session('error') }}"></div>
@endif

@if(session()->has('success'))
    <div class="swal-alert alert-success" data-message="{{ session('success') }}"></div>
@endif

@if(session()->has('info'))
    <div class="swal-alert alert-info" data-message="{{ session('info') }}"></div>
@endif
