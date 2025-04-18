<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicalRecordStoreRequest extends FormRequest
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
            'registration_id' => 'required|exists:registrations,id',
            'action_id' => 'required|exists:actions,id',
            'medicine_id' => 'required|exists:medicines,id',
            'diagnosa' => 'required|max:255',
            'slug' => 'required|unique:medicalrecords,slug',
            'catatan' => 'nullable|string'
        ];
    }
}
