<x-app-layout>
    @section('title')
        {{__('Dashboard')}}
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto">
                <x-bladewind::table has_border="true">
                    <x-slot name="header">
                        <th>
                             Contract Name
                        </th>
                        <th>
                             Download File
                        </th>
                        <th>
                             Created At
                        </th>
                    </x-slot>
                    @foreach($users as $user)
                    @foreach($user->contracts as $contract)
                        <tr>
                            <td class="px-6 py-4">{{ $contract->contract_name}}</td>
                            <td class="px-6 py-4">
                                <a href="storage/{{$contract->file_path}}" download="{{$contract->file_path}}">
                                <x-primary-button class="ml-4">
                                    Download
                                </x-primary-button>
                                </a>
                            </td>
                            <td class="px-6 py-4">{{ $contract->created_at }}</td>
                        </tr>
                    @endforeach
                    @endforeach
                </x-bladewind::table>
            </div>
        </div>
    </div>
</x-app-layout>
