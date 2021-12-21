@if (Auth::user()->role == 1)    
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profile') }}
            </h2>
        </x-slot>

        @include('profile.real')
    </x-app-layout>
@else
<x-general-layout>
    @include('profile.real')
</x-general-layout>
@endif