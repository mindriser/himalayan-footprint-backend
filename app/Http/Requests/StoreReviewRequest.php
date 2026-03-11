<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // allow anyone for now
        // return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [


            'package_id'     => ['required', 'exists:packages,id'],
            'reviewer_name'  => ['required', 'string', 'max:255'],
            'reviewer_image' => ['nullable', 'image', 'max:2048'],
            'title'          => ['nullable', 'string', 'max:255'],
            'description'    => ['nullable', 'string'],
            'rating'         => ['required', 'integer', 'min:1', 'max:5'],
        ];
    }
}
