<?php

namespace App\Exports;

use App\Models\Booking;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportTracking implements FromView
{

    protected $startDate;
    protected $endDate;

    public function __construct($startDate = null, $endDate = null)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    public function view(): View
    {
        if (auth()->guard('web-admin-center')->user()) {
            $booking = Booking::with(['vehicle.mine', 'driver', 'admin', 'approved'])
                ->whereBetween('start_usage_date', [$this->startDate, $this->endDate])
                ->orderBy('start_usage_date', 'desc')
                ->get();
        } else {
            $booking = Booking::with('vehicle', 'driver', 'admin', 'approved')
                ->where('created_by', auth()->guard('web-admin')->user()->id_admin)
                ->whereBetween('start_usage_date', [$this->startDate, $this->endDate])
                ->orderBy('start_usage_date', 'desc')
                ->get();
        }

        return view('admin.export.booking', compact('booking'));
    }
}
