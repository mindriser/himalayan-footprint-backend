<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreEnquiryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'          => ['required', 'string', 'min:2', 'max:100'],
            'email'         => ['required', 'email:rfc,dns', 'max:255'],
            'phone'         => ['nullable', 'string', 'max:30'],
            'country'       => ['nullable', 'string', 'max:100'],
            'message'       => ['required', 'string', 'min:10', 'max:2000'],
            'num_travelers' => ['nullable', 'integer', 'min:1', 'max:99'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'          => 'Please enter your full name.',
            'name.min'               => 'Name must be at least 2 characters.',
            'email.required'         => 'Please enter your email address.',
            'email.email'            => 'Please enter a valid email address.',
            'message.min'            => 'Message must be at least 10 characters.',
            'num_travelers.integer'  => 'Number of travelers must be a whole number.',
            'num_travelers.min'      => 'There must be at least 1 traveler.',
            'num_travelers.max'      => 'Please contact us directly for groups over 99.',
        ];
    }

    // Return JSON error response instead of redirect (API)
    // protected function failedValidation(Validator $validator): never
    // {
    //     throw new HttpResponseException(
    //         response()->json([
    //             'status'  => false,
    //             'message' => 'Validation failed.',
    //             'errors'  => $validator->errors(),
    //         ], 422)
    //     );
    // }
}
