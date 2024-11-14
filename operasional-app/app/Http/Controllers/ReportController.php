<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function index()
    {

        $date = Booking::where('created_by', auth()->guard('web-admin')->user()->id_admin)
            ->get()
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
        return view('admin.report.index',compact('date'));
    }
    public function fuel()
    {
        
        $date = Booking::where('created_by', auth()->guard('web-admin')->user()->id_admin)
        ->get()
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
    return view('admin.report.fuel',compact('date'));
    }
    public function service()
    {
        return view('admin.report.service');
    }
}
