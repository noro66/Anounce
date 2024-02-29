<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnounceRequest extends FormRequest
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
            'title' => 'required|min:5|max:125',
            'description' => 'required|min:20',
            'type' => ['required', 'in:room,house,villa,farm'], // Validate 'type' enum
            'reservation_type' => ['required', 'in:rent,sell'],
            'image' => 'image|mimes:png,jpg,jpeg,svg|max:10240'
        ];
    }
}
