<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'vehicle_id'=>[
                'required',
            ],
            'start_date' => [
                'required',
            ],
            'end_date' => [
                'required',
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'vehicle_id.required' => 'vehicle was required.',
            'start_date.required' => 'Start Date was required.',
            'end_date.required' => 'End Date was required.',
        ];
    }
}
