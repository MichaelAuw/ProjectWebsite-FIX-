<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMyPortfolioRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'about' => 'required',
            'profile' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'image_file' => 'required',
            'image_home' => 'required',
        ];
    }
}
