<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'amz_link' => ['string', 'nullable'],
            'tap_interval' => ['numeric'],
            'auto_stop_after_crash' => ['boolean'],
            'auto_resume_search' => ['boolean'],
            'offer_lead_time' => ['numeric'],
            'minimum_base_paytype' => ['string'],
            'minimum_base_payvalue' => ['numeric'],
            'offer_duration_start' => ['string'],
            'offer_duration_end' => ['string'],
            'working' => ['boolean'],
            'timezone' => ['string'],
        ];
    }
}
