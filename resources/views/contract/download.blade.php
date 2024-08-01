<x-app-layout>
    @section('title')
        {{__('Download Contract')}}
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Download Contract') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>First you need to download a contract and customize and upload</h1>
            <div class="relative overflow-x-auto">
                <x-primary-button class="ml-4">
                    {{ __('Download Contract') }}
                </x-primary-button>
            </div>
        </div>
    </div>
</x-app-layout>
