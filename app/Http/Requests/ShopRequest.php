<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
            "open_from" => "required",
            "open_to" => "required|after:start_time",
        ];
    }

    public function messages()
    {
        return [
        "open_from.required" => 'Wymagany czas otwarcia',
        "open_to.required" => 'Wymagany czas zamkniecia',
        "open_to.after" => 'Czas zamkniecia musi być później niż czas otwarcia'];
    }
}
