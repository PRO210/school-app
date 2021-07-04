<?php

namespace App\Http\Requests;

use App\Tenant\Rules\UniqueTenant;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePermission extends FormRequest
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
        $id = $this->segment(3);

        return [
            //'name' => "required|min:3|max:255|unique:permissions,name,{$id},id",
            'name' => [
                'required',
                'min:3',
                'max:255',
                new UniqueTenant('permissions', $id),
            ],
            'description' => 'nullable|min:3|max:255',
        ];
    }
}
