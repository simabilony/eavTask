<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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
        $adminId = $this->route('admin'); // الحصول على ID المشرف من المسار

        return [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $adminId,
            'password' => 'nullable|min:6',
        ];
    }
}
