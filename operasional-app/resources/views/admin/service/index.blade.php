<x-admin-layouts>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        @if(session('success'))
        <div id="success-message" class="bg-green-500 text-white text-center py-2 px-4 rounded-md shadow-md mb-6">
            {{ session('success') }}
        </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <nav class="text-sm text-gray-500 mb-4">
                    <a href="{{ route('admin.dashboard') }}" class="text-black-500 hover:underline">Dashboard</a> > <b>Service</b>
                </nav>
                <h3 class="text-lg font-semibold mb-4">Service</h3>
                <div class="mb-4 flex justify-between items-center">
                    <div>
                        <a href="{{ route('admin.service.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Create Service</a>
                    </div>
                </div>
                <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 text-sm leading-normal">
                            <th class="py-3 px-4 text-left">Vehicle</th>
                            <th class="py-3 px-4 text-left">type Vehicle</th>
                            <th class="py-3 px-4 text-left">start_date</th>
                            <th class="py-3 px-4 text-left">end_date</th>
                            <th class="py-3 px-4 text-left">Status</th>
                            <th class="py-3 px-4 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($service as $s )

                        <td class="py-3 px-4">{{ $s->vehicle->vehicle_name }}</td>
                        <td class="py-3 px-4">{{ $s->vehicle->vehicle_type }}</td>
                        <td class="py-3 px-4">{{ $s->start_date }}</td>
                        <td class="py-3 px-4">{{ $s->end_date }}</td>
                        <td class="py-3 px-4">{{ $s->status}}</td>
                        @if ($s->status !== 'done')
                        <td>
                            <div class="flex space-x-2">
                                <a href="{{route('admin.service.inservice',$s->id_vehicle_service)}}" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">In Service</a>
                                <a href="{{route('admin.service.done',$s->id_vehicle_service)}}" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">Done</a>
                            </div>
                        </td>
                        @endif

                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        </x-admin-layout>