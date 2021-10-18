<?php

namespace App\Services;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdvertRequest extends FormRequest
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
            'advert_name' => 'required|string',
            'date_from' => 'required',
            'date_to' => 'required',
            'total_budget' => 'required',
            'daily_budget' => 'required',
            'files' => 'required'
        ];
    }
}
