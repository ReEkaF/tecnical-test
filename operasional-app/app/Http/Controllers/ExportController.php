<?php

namespace App\Http\Controllers;

use App\Exports\ExportTracking;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportBooking(Request $request)
    {
        $request->validate([
            'start_date' => 'required|', // Expecting YYYY-MM format
            'end_date' => 'required|', // Expecting YYYY-MM format
        ]);

        $startDate = Carbon::parse($request->start_date)->startOfMonth();
        $endDate = Carbon::parse($request->end_date)->endOfMonth();

        return Excel::download(new ExportTracking($startDate, $endDate), 'exportBooking.xlsx');
    }

}
