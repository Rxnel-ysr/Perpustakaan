<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PerpustakaanRequest extends FormRequest
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
            'nama' => ['required', Rule::unique('perpustakaans')->ignore($this->id)],
            'alamat' => 'required',
            'buku' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Input nama perlu diisi.',
            'nama.unique' => 'Nama tersebut sudah ada',
            'alamat.required' => 'Tolong masukan lokasi alamat mu',
            'buku.required' => 'Sebutkan buku yang akan dipinjam'
        ];
    }
}
