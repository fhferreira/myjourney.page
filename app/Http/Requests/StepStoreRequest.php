<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StepStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:250',
            'user_id' => 'required|integer|exists:users,id',
            'journey_id' => 'required|integer|exists:journeys,id',
            'published_at' => '',
            'description' => 'string',
            'date' => 'required',
            'picture' => 'string',
        ];
    }
}