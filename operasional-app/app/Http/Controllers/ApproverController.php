<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class ApproverController extends Controller
{
    //
    public function index()
    {
        return view('approver.dashboard');
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
}
