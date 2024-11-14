<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Driver;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    public function index()
    {
        $booking = Booking::with('vehicle', 'driver', 'admin')->where('created_by', auth()->guard('web-admin')->user()->id_admin)->get();
        return view('admin.booking.index', compact('booking'));
    }
    public function Create()
    {

        $vehicle = Vehicle::where('mine_id', auth()->guard('web-admin')->user()->mine_id)->get();
        $driver = Driver::where('mine_id', auth()->guard('web-admin')->user()->mine_id)->get();
        return view('admin.booking.create', compact('vehicle', 'driver'));
    }
    public function store(BookingRequest $request)
    {
        // Validasi data yang masuk
        $validatedData = $request->validated();

        // Convert dates to the correct format (YYYY-MM-DD)
        $validatedData['start_usage_date'] = Carbon::createFromFormat('m/d/Y', $validatedData['start_usage_date'])->format('Y-m-d');
        $validatedData['end_usage_date'] = Carbon::createFromFormat('m/d/Y', $validatedData['end_usage_date'])->format('Y-m-d');
        // Tambahkan data tambahan menggunakan Carbon
        $validatedData['created_by'] = auth()->guard('web-admin')->user()->id_admin;
        $validatedData['status'] = 'pending';
        // Menyimpan data ke dalam database
        Booking::create($validatedData);
        // Redirect setelah data berhasil disimpan
        return redirect()->route('admin.booking')->with('success', 'Peminjaman berhasil dibuat');
    }
}
