<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'site_name.*' => 'required|string|max:255',
            'site_description.*' => 'required|string',
            'about_us_image'=>'nullable',
            'site_logo' => 'nullable',
            'site_favicon' => 'nullable',
            'site_email' => 'required|email|max:255',
            'site_phone' => 'required|string|max:20',
            'site_whatsapp' => 'required|string|max:20',
            'site_fax' => 'nullable|string|max:20',
            'site_address.*' => 'required|string|max:255',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'site_vedio' => 'required|url',
            'after_sale_content.*' => 'required|string',
            'quality_policy.*'=>'required|string',
        ];
    }
}
