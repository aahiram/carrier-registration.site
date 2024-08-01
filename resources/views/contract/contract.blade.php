<x-app-layout>
    @section('title')
        {{__('Contract')}}
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contract') }}
        </h2>
    </x-slot>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            @if(session('success'))
                <x-bladewind::alert
                    type="success" icon="cloud-arrow-down" shade="dark">
                    file was successfully uploaded.
                </x-bladewind::alert>
            @endif
            @if($errors->has('file'))
                    <x-bladewind::alert color="red" icon="exclamation-triangle" shade="dark">
                        file Not uploaded.
                    </x-bladewind::alert>
            @endif

            <div class="max-w-xl">
                <br>
                <h1>The first you need to customize and write
                    <br>
                    your information for the contract
                    <br>
                    and download it with your changes!</h1>
                <br>
                <div class="row justify-content-center">
                    <iframe src="{{'KUEHNE_&_NAGEL_INC_BROKER_CARRIER_AGREEMENT_240729_155712.pdf'}}" width="100%" height="600"></iframe>
                </div>
            <br>
            <br>
            <h1>If you finish the customize and download it
            <br>
            upload your contract and finish!
            </h1>
            <br>
            <form method="POST" action="{{route('contract.store')}}" enctype="multipart/form-data">
                @csrf
                <x-bladewind::filepicker
                    name="file"
                    id="file"
                    required="true"
                    accepted_file_types=".pdf"
                    placeholder="Upload your Contract"  />
                <br>
                <x-primary-button class="ml-4">
                        {{ __('Upload Contract') }}
                </x-primary-button>
            </form>
                <br>
                <br>
                <br>
        </div>
        </div>
</x-app-layout>
