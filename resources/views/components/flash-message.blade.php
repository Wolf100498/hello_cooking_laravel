@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 1500)" x-show="show" x-transition.duration.600ms
        class="fixed-top w-75 mx-auto my-2 alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
