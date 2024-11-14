<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsedVehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'id_booking'=>[
                'required',
            ],
            'fuel_used' => [
                'required',
            ],
            'distance' => [
                'required',
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'id_booking.required' => 'Booking ID was required.',
            'fuel_used.required' => 'Fuel was required.',
            'distance.required' => 'Distance was required.',
        ];
    }
}
