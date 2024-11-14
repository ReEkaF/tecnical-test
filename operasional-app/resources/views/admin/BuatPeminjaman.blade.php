<x-admin-layouts>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Peminjaman') }}
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
                    <a href="{{ route('admin.dashboard') }}" class="text-black-500 hover:underline">Dashboard</a> > Peminjaman > <b>Kelola Pengajuan Peminjaman</b>
                </nav>
                <h3 class="text-lg font-semibold mb-4">Kelola Pengajuan Peminjaman</h3>

                <div class="mb-4 flex justify-between items-center">
                    <div>
                        <a href="{{ route('admin.peminjaman.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Tambah Data</a>
                    </div>

                </div>

                <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 text-sm leading-normal">
                            <th class="py-3 px-4 text-left">Kendaraan</th>
                            <th class="py-3 px-4 text-left">Tipe Kendaraan</th>
                            <th class="py-3 px-4 text-left">Ownership </th>
                            <th class="py-3 px-4 text-left">Driver</th>
                            <th class="py-3 px-4 text-left">Mulai Peminjaman</th>
                            <th class="py-3 px-4 text-left">Akhir Peminjaman</th>
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

                    </tbody>
                    @endforeach
                </table>

                <!-- Pagination -->

            </div>
        </div>
    </div>

    <script>
        function confirmDelete(event) {
            event.preventDefault();
            const confirmation = confirm("Apakah Anda yakin ingin menghapus data ini?");
            if (confirmation) {
                event.target.submit();
            }
        }

        // Hide success message smoothly
        document.addEventListener("DOMContentLoaded", function() {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.opacity = '0';
                    setTimeout(() => successMessage.remove(), 500);
                }, 3000);
            }
        });
    </script>
    </x-admin-layout>