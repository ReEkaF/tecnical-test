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
                    <a href="{{ route('admin.dashboard') }}" class="text-black-500 hover:underline">Dashboard</a> > Peminjaman > <b>Record</b>
                </nav>
                <h3 class="text-lg font-semibold mb-4">Record</h3>

                <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 text-sm leading-normal">
                            <th class="py-3 px-4 text-left">Vehicle</th>
                            <th class="py-3 px-4 text-left">type Vehicle</th>
                            <th class="py-3 px-4 text-left">Ownership </th>
                            <th class="py-3 px-4 text-left">Driver</th>
                            <th class="py-3 px-4 text-left">Start Rent</th>
                            <th class="py-3 px-4 text-left">End Rent</th>
                            <th class="py-3 px-4 text-left">Status</th>
                            <th class="py-3 px-4 text-left">Action</th>
                        </tr>
                    </thead>
                    @foreach ($booking as $b )
                    <tbody class="text-gray-600 text-sm font-light">
                        
                        <td class="py-3 px-4">{{ $b->vehicle->vehicle_name }}</td>
                        <td class="py-3 px-4">{{ $b->vehicle->vehicle_type }}</td>
                        <td class="py-3 px-4">{{ $b->vehicle->company_id  === 1 ? 'company' : 'rental'}}</td>
                        <td class="py-3 px-4">{{ $b->driver->driver_name}}</td>
                        <td class="py-3 px-4">{{ $b->start_usage_date }}</td>
                        <td class="py-3 px-4">{{ $b->end_usage_date }}</td>
                        <td class="py-3 px-4">{{ $b->status }}</td>
                        @if ($b->status !== 'done')
                        <td>
                            <div class="flex space-x-2">
                                <a href="{{route('admin.record.inuse',$b->id_booking)}}" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">In use</a>
                                <a href="{{route('admin.record.used',$b->id_booking)}}" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">Done</a>
                            </div>
                        </td>
                        @endif

                    </tbody>
                    @endforeach
                </table>

                <!-- Pagination -->

            </div>
        </div>
    </div>
    </x-admin-layout>