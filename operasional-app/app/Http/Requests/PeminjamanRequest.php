<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeminjamanRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
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
