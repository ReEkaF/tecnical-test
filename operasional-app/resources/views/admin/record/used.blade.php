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
            <form action="{{ route('admin.record.store') }}" method="POST">
                @csrf
                <input type="hidden" value="{{$used[0]->id_booking}}" name="id_booking">
                <x-input-label for="fuel_used" :value="__('Fuel Used')" />

                <x-text-input id="fuel_used" class="block mt-1 w-full" type="text" name="fuel_used" :value="old('fuel_used')" required autofocus />
                <x-input-label for="distance" :value="__('Long Ride in KM')" />
                <x-text-input id="distance" class="block mt-1 w-full" type="text" name="distance" :value="old('distance')" required autofocus />
                    
                <div class="flex justify-center">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-full mt-4">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
    </x-admin-layout>