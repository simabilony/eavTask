<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntityRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'attributes' => 'required|array',
            'attributes.*.name' => 'required|string|max:255',
            'attributes.*.type' => 'required|string|max:255',
            'attributes.*.value' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_fr' => 'required|string|max:255',
            'description_en' => 'required|string|max:255',
            'description_fr' => 'required|string|max:255',
            'price' => 'required|numeric',
        ];
    }
}
