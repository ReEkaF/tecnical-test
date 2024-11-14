<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\HistoryVehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApproverController extends Controller
{
    //
    public function index()
    {
        $history = HistoryVehicle::with('booking')->whereHas('booking.vehicle')->get()->groupBy(function ($history) {
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

        $date = Booking::get()
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
        return view('approver.dashboard',compact( 'data', 'label', 'color', 'data2', 'label2','allMounth','fuel','distance'));
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
    public function booking()
    {
        $booking = Booking::with('vehicle', 'driver', 'admin')->get();
        return view('approver.approval.index', compact('booking'));
    }
    public function approved($id)
    {
        Booking::where('id_booking', $id)->update(['status' => 'approved']);
        return redirect()->route('admin-center.booking');
    }
    public function reject($id)
    {
        Booking::where('id_booking', $id)->update(['status' => 'reject']);
        return redirect()->route('admin-center.booking');
    }
    public function report()
    {
        $date = Booking::get()
        ->map(function ($booking) {
            // Menyimpan nama dan angka bulan untuk pengurutan
            return [
                'month_name' => Carbon::parse($booking->start_usage_date)->format('F'),
                'month_number' => Carbon::parse($booking->start_usage_date)->format('m'),
            ];
        })
        ->unique('month_number') // Menghilangkan bulan yang sama berdasarkan angka bulan
        ->sortBy('month_number') // Mengurutkan berdasarkan angka bulan
        ->pluck('month_name'); // Hanya mengambil nama bulan
        return view('approver.report.index',compact('date'));
    }
    
}
