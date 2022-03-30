<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DealCreate extends FormRequest
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
            'Owner' => 'string',
            'Deal_Name' => 'string',
            'Account_Name' => 'string',
            'Type' => 'string',
            'Amount' => 'numeric',
            'Closing_Date' => 'string',
            'Stage' => 'string',
            'Probability' => 'string',
            'Description' => ''
        ];
    }
}
