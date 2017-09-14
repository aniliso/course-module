<?php

namespace Modules\Course\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateCategoryRequest extends BaseFormRequest
{
    protected $translationsAttributesKey = 'course::categories.form';

    public function rules()
    {
        return [];
    }

    public function translationRules()
    {
        $id = $this->route()->parameter('courseCategory')->id;

        return [
            'title' => 'required|max:200',
            'slug'  => "required|max:200|unique:course__category_translations,slug,$id,category_id,locale,$this->localeKey",
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return trans('validation');
    }

    public function translationMessages()
    {
        return trans('validation');
    }
}
