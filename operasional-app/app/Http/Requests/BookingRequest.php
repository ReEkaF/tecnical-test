<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'vehicle_id' => [
                'required',
            ],
            'driver_id' => [
                'required',
            ],
            'start_usage_date' => [
                'required',
            ],
            'end_usage_date' => [
                'required',
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'vehicle_id.required' => 'Kendaraan wajib diisi.',
            'driver_id.required' => 'Driver wajib diisi.',
            'start_usage_date.required' => 'Tanggal mulai wajib diisi.',
            'end_usage_date.required' => 'Tanggal selesai wajib diisi.',
        ];
    }
}
