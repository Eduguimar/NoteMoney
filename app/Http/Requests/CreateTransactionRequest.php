<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateTransactionRequest extends Request {

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
            'title' => 'required|max:180',
            'description' => 'max:180',
            'amount' => 'required',
            'type' => 'required'
        ];
    }

}