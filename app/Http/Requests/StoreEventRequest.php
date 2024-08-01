<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Set to false if you have authorization logic
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The event name is required',
            'date.required' => 'The event date is required',
            'date.date' => 'The event date must be a valid date',
            'location.required' => 'The event location is required',
        ];
    }
}
