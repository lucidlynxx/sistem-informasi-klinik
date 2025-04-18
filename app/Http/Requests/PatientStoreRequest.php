<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientStoreRequest extends FormRequest
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
            'name' => 'required|max:255',
            'slug' => 'required|unique:patients,slug',
            'nik' => 'required|numeric|digits:16|unique:patients,nik',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|max:255',
            'region_id' => 'required|exists:regions,id',
            'no_hp' => 'required|string|min:10|max:15',
        ];
    }
}
