<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeSubscriptionRequest extends FormRequest
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
            'email' => 'required|email|unique:subscriptions',
            'token' => 'required|string',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([

            'token' => $this->exists('_token') ? $this->_token : "",

        ]);
    }
}
