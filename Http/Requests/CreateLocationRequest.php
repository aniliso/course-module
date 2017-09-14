<?php

namespace Modules\Course\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateLocationRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name'    => 'required',
            'address' => 'required'
        ];
    }

    public function attributes()
    {
        return trans('course::locations.form');
    }

    public function translationRules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }

    public function translationMessages()
    {
        return [];
    }
}
