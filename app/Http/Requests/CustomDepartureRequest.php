<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomDepartureRequest extends FormRequest
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
    // public function rules(): array
    // {
    //     return [
    //         'package_id'     => ['required', 'exists:packages,id'],
    //         'reviewer_name'  => ['required', 'string', 'max:255'],
    //         'reviewer_image' => ['nullable', 'image', 'max:2048'],
    //         'title'          => ['nullable', 'string', 'max:255'],
    //         'description'    => ['nullable', 'string'],
    //         'rating'         => ['required', 'integer', 'min:1', 'max:5'],
    //     ];
    // }


    public function rules(): array
    {
        return [
            'package_id'  => ['required', 'integer', 'exists:packages,id'],
            'start_date'  => ['required', 'date', 'after:today'],
            'end_date'    => ['required', 'date', 'after:start_date'],
            // how many people the user is requesting for
            'pax'         => ['required', 'integer', 'min:1', 'max:9999'],

            // requester details
            'full_name'   => ['required', 'string', 'max:255'],
            'email'       => ['required', 'email', 'max:255'],
            'phone'       => ['nullable', 'string', 'max:50'],
            'country'     => ['nullable', 'string', 'max:100'],

            // additional notes
            'remarks'     => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'start_date.after' => 'The departure start date must be a future date.',
            'end_date.after'   => 'The end date must be after the start date.',
            'package_id.exists' => 'The selected package does not exist.',
        ];
    }
}
