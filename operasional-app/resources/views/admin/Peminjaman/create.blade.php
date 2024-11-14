<x-admin-layouts>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-center min-h-screen bg-gray-50 py-8">
        <div class="max-w-6xl w-full p-8 bg-white rounded-lg shadow-md border-2 border-black">
            <nav class="text-sm text-gray-500 mb-4">
                <a href="{{ route('admin.dashboard') }}" class="text-black-500 hover:underline">Dashboard</a> > <a href="{{ route('admin.buat_peminjaman') }}" class="text-black-500 hover:underline">Peminjaman</a> > <b>Tambah Peminjaman</b>
            </nav>
            <h2 class="text-lg font-semibold text-gray-800">Tambah Data Peminjaman</h2>
            <p class="text-sm text-gray-600 mb-6">Ini adalah halaman untuk menambah Peminjaman</p>
            <form action="{{ route('admin.peminjaman.store') }}" method="POST">
                @csrf
                    <label for="kendaraan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kendaraan</label>
                    <select id="kendaraan" name="vehicle_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="handleVehicleChange(this)">
                        <option value="{{null}}" selected>pilih Kendaraan</option>
                        @foreach ($vehicle as $v )
                        <option value="{{$v->id_vehicle}}">{{'nama:'.$v->vehicle_name .' tipe:'.$v->vehicle_type. ' plat:'.$v->vehicle_license}}</option>
                        @endforeach
                        
                    </select>
                    <x-input-error :messages="$errors->get('vehicle_id')" class="text-xs text-red-500 mt-0.5" />
                    <label for="Driver" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Driver</label>
                    <select id="Driver" name="driver_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="{{null}}" selected>Pilih Driver</option>
                        @foreach ($driver as $d )
                        <option value="{{$d->id_driver}}">{{$d->driver_name}}</option>
                        @endforeach
                       
                    </select>
                    <x-input-error :messages="$errors->get('driver_id')" class="text-xs text-red-500 mt-0.5" />

                <label for="default-datepicker" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Peminjaman</label>
                <div id="date-range-picker" date-rangepicker class="flex items-center">
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input id="datepicker-range-start" name="start_usage_date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                        <x-input-error :messages="$errors->get('start_usage_date')" class="text-xs text-red-500 mt-0.5" />
                    </div>
                    <span class="mx-4 text-gray-500">to</span>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input id="datepicker-range-end" name="end_usage_date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
                        <x-input-error :messages="$errors->get('end_usage_date')" class="text-xs text-red-500 mt-0.5" />
                    </div>
                </div>
                <!-- Submit -->
                <div class="flex justify-center">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-full mt-4">
                        Tambahkan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
    </x-admin-layout>