<x-approver-layouts>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
   
  <!-- Tracking per month Section -->
  <div class="py-12">
        @if(session('success'))
            <div id="success-message" class="bg-green-500 text-white text-center py-2 px-4 rounded-md shadow-md mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Page Header and Breadcrumb -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 mb-6">
                <nav class="text-sm text-gray-500 mb-4">
                    <a href="{{ route('admin-center.dashboard') }}" class="text-black hover:underline">Dashboard</a>
                    <span class="mx-1">></span>
                    <b class="text-gray-800">Report</b>
                </nav>
                <h3 class="text-lg font-semibold text-gray-800">Report</h3>
            </div>

            <!-- Form Section -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Tracking per month</h2>
                <form action="{{ route('admin-center.excel.booking') }}" method="POST" class="space-y-4">
                    @csrf
                    <!-- Start Date Selection -->
                    <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start date</label>
                    <select id="start_date" name="start_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="handleChange(this)">
                        <option value="{{null}}" selected>Choose Month</option>
                        @foreach ($date as $d)
                            <option value="{{ $d }}">{{ $d }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('start_date')" class="text-xs text-red-500 mt-0.5" />

                    <!-- End Date Selection -->
                    <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End date</label>
                    <select id="end_date" name="end_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="handleChange(this)">
                        <option value="{{null}}" selected>Choose Month</option>
                        @foreach ($date as $d)
                            <option value="{{ $d }}">{{ $d }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('end_date')" class="text-xs text-red-500 mt-0.5" />

                    <!-- Submit Button -->
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md shadow-md hover:bg-blue-600 transition duration-150">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-approver-layout>