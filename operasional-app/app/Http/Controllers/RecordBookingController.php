<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsedVehicleRequest;
use App\Models\Booking;
use App\Models\HistoryVehicle;
use Illuminate\Http\Request;

class RecordBookingController extends Controller
{
    //
    public function index()
    {
        $booking = Booking::with('vehicle', 'driver', 'admin')
            ->where('created_by', auth()->guard('web-admin')->user()->id_admin)
            ->whereIn('status', ['approved', 'in use', 'done'])->get();
        return view('admin.record.index', compact('booking'));
    }

    public function inuse($id)
    {
        Booking::where('id_booking', $id)->update(['status' => 'in use']);
        return redirect()->route('admin.record');
    }
    public function used($id)
    {
        $used = Booking::where('id_booking', $id)->get();
        return view('admin.record.used', compact('used'));
    }
    public function store(UsedVehicleRequest $request)
    {
    
        $validatedData = $request->validated();
        $booking = Booking::where('id_booking', $validatedData['booking_id'])->first();
        $validatedData['driver_id'] = $booking->driver_id;
        $validatedData['vehicle_id'] = $booking->vehicle_id;
        HistoryVehicle::create($validatedData);
        Booking::where('id_booking', $validatedData['booking_id'])->update(['status' => 'done']);
        // Redirect setelah data berhasil disimpan
        return redirect()->route('admin.record')->with('success', 'Record Saved');
    }
}
