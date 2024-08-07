<x-app-layout>
    @section('title')
        {{__('Dashboard')}}
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        @if(session('success'))
            <x-bladewind::alert
                type="success" icon="cloud-arrow-down" shade="dark">
                {{session('success')}}
            </x-bladewind::alert>
        @endif
        @if(session('error'))
            <x-bladewind::alert color="red" icon="exclamation-triangle" shade="dark">
                {{session('error')}}
            </x-bladewind::alert>
        @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto">
                <x-bladewind::table has_border="true">
                    <x-slot name="header">
                            <th>
                                Email
                            </th>
                            <th>
                                Password
                            </th>
                            <th>
                                Contracts
                            </th>
                            <th>
                                Created At
                            </th>
                            <th>
                                Contract Link
                            </th>
                    </x-slot>
                    @foreach($users as $user)
                        <tr>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4">{{ $user->password }}</td>
                            <td class="px-6 py-4">{{$user->contracts->count()}}</td>
                            <td class="px-6 py-4">{{ $user->created_at }}</td>
                            <td class="px-6 py-4">
                                <form method="POST" action="{{route('sendLoginLink',['user'=>$user->id])}}">
                                    @csrf
                                    <x-primary-button class="ml-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                            <path d="M3.105 2.288a.75.75 0 0 0-.826.95l1.414 4.926A1.5 1.5 0 0 0 5.135 9.25h6.115a.75.75 0 0 1 0 1.5H5.135a1.5 1.5 0 0 0-1.442 1.086l-1.414 4.926a.75.75 0 0 0 .826.95 28.897 28.897 0 0 0 15.293-7.155.75.75 0 0 0 0-1.114A28.897 28.897 0 0 0 3.105 2.288Z" />
                                        </svg>
                                    </x-primary-button>
                                </form>
                                </td>
                        </tr>
                    @endforeach
                </x-bladewind::table>
            </div>
        </div>
    </div>
</x-app-layout>
