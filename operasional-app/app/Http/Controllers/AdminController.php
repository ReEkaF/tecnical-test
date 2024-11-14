<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateServiceRequest;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Http\Requests\PeminjamanRequest;
use App\Http\Requests\UsedVehicleRequest;
use App\Models\Booking;
use App\Models\HistoryVehicle;
use App\Models\VehicleService;
use Carbon\Carbon;

class AdminController extends Controller
{

    public function index()
    {
        $history = HistoryVehicle::with('booking')->whereHas('booking.vehicle', function ($query) {
            $query->where('mine_id', auth()->guard('web-admin')->user()->mine_id);
        })->get()->groupBy(function ($history) {
            return Carbon::parse($history->booking->end_usage_date)->format('m'); // Group by month
        })->map(function ($items) {
            // Calculate average fuel and distance per month
            $averageFuelUsed = $items->avg('fuel_used');
            $averageDistance = $items->avg('distance');
        
            return [
                'average_fuel_used' => $averageFuelUsed,
                'average_distance' => $averageDistance,
            ];
        })->sortKeys();

        $bookings = Booking::with('vehicle')
            ->whereHas('vehicle')
            ->where('created_by', auth()->guard('web-admin')->user()->id_admin)
            ->get()
            ->groupBy(function ($booking) {
                return $booking->vehicle->vehicle_type;
            });
        $chartData = [];
        foreach ($bookings as $type => $bookings) {
            $chartData[] = [
                'label' => $type,
                'data' => $bookings->count(),
                'color' => $this->getVehicleColor($type),
            ];
        }

        $date = Booking::where('created_by', auth()->guard('web-admin')->user()->id_admin)
            ->get()
            ->groupBy(function ($booking) {
                return Carbon::parse($booking->start_usage_date)->format('m'); // Pengelompokan per bulan
            })
            ->sortKeys(); // Mengurutkan dari yang terlama ke terbaru

        // Daftar bulan dalam bahasa Indonesia
        $month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        // Array untuk menampung hasil akhir dengan nama bulan
        $label2 = [];

        // Ambil kunci dari $date dan konversi ke nama bulan
        foreach ($date->keys() as $monthNumber) {
            $monthIndex = intval($monthNumber) - 1;
            $label2[] = $month[$monthIndex];
        }
        $data= [];
        $label = [];
        $color = [];
        $data2 = [];
        $fuel = [];
        $distance = [];
        foreach ($chartData as $d){
        $data[] = $d['data'];
        $label[] = $d['label'];
        $color[] = $d['color'];
        }
        foreach ($date as $d){
            $date2[] = $d->count();
        }
        foreach ($history as $d){
            $fuel[] = $d['average_fuel_used'];
            $distance[] = $d['average_distance'];
        }
        $allMounth=count($label2);
        $data = json_encode($data);
        $label = json_encode($label);
        $color = json_encode($color);
        $data2 = json_encode($date2);
        $label2 = json_encode($label2);
        $fuel = json_encode($fuel);
        $distance = json_encode($distance);
        return view('admin.dashboard', compact( 'data', 'label', 'color', 'data2', 'label2','allMounth','fuel','distance'));
    }

    private function getVehicleColor($type)
    {
        // Define colors for each vehicle type
        $colors = [
            'angkutan' => '#1A56DB',
            'barang' => '#7E3BF2',
        ];
        return $colors[$type] ?? '#000000'; // Default color if type not found
    }


    public function service()
    {
        $service = VehicleService::with('vehicle')->whereHas('vehicle', function ($query) {
            $query->where('mine_id', auth()->guard('web-admin')->user()->mine_id);
        })->get();
        return view('admin.service.index', compact('service'));
    }
    public function service_create()
    {
        $vehicle = Vehicle::where('mine_id', auth()->guard('web-admin')->user()->mine_id)->get();
        return view('admin.service.create', compact('vehicle'));
    }
    public function service_store(CreateServiceRequest $request)
    {
        // Validasi data yang masuk
        $validatedData = $request->validated();

        $validatedData['start_date'] = Carbon::createFromFormat('m/d/Y', $validatedData['start_date'])->format('Y-m-d');
        $validatedData['end_date'] = Carbon::createFromFormat('m/d/Y', $validatedData['end_date'])->format('Y-m-d');
        $validatedData['status'] = 'schedule';
        // Menyimpan data ke dalam database
        VehicleService::create($validatedData);
        // Redirect setelah data berhasil disimpan
        return redirect()->route('admin.service')->with('success', 'Peminjaman berhasil dibuat');
    }
    public function inservice($id)
    {
        VehicleService::where('id_vehicle_service', $id)->update(['status' => 'in service']);
        return redirect()->route('admin.service');
    }
    public function done($id)
    {
        VehicleService::where('id_vehicle_service', $id)->update(['status' => 'done']);
        return redirect()->route('admin.service');
    }
}
