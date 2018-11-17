@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', [
            'url' => config('app.url'),
            'imageUrl' => null
        ])
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    @slot('social')
        @component('mail::social', [
            'facebookUrl' => '',
            'twitterUrl' => '',
            'linkedInUrl' => ''
        ])
        @endcomponent
    @endslot

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        @endcomponent
    @endslot
@endcomponent
