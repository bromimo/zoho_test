<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskCreate extends FormRequest
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
            'Subject' => 'string',
            'Due_Date' => 'string',
            'Who_Id' => 'string',
            'What_Id' => 'string',
            'Status' => 'string',
            'Priority' => 'string',
            'Description' => ''
        ];
    }
}
