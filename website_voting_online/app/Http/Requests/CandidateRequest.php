<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Set to true jika autentikasi tidak diperlukan.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ketua' => 'required|string|min:3',
            'calon_ketua' => 'nullable|string|min:3',
            'latar_belakang_ketua' => 'nullable|string|min:3', // Menambahkan validasi untuk latar belakang ketua
            'visi_ketua' => 'nullable|string|min:3', // Menambahkan validasi untuk visi ketua
            'misi_ketua' => 'nullable|string|min:3', // Menambahkan validasi untuk misi ketua
            'profile_image_ketua' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'wakil_ketua' => 'required|string|min:3',
            'calon_wakil_ketua' => 'nullable|string|min:3',
            'latar_belakang_wakil_ketua' => 'nullable|string|min:3', // Menambahkan validasi untuk latar belakang wakil ketua
            'visi_wakil_ketua' => 'nullable|string|min:3', // Menambahkan validasi untuk visi wakil ketua
            'misi_wakil_ketua' => 'nullable|string|min:3', // Menambahkan validasi untuk misi wakil ketua
            'profile_image_wakil_ketua' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
