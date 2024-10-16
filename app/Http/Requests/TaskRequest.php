<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'bail|required|string|min:3',
            'description' => 'bail|required|string',
            'status'  => 'bail|required|integer',
            'priority'  => 'bail|required|integer',
            'start_date'  => 'bail|required|date',
            'end_date'  => 'bail|required|date',
        ];
    }
}
