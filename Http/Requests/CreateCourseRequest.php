<?php

namespace Modules\Course\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateCourseRequest extends BaseFormRequest
{
    protected $translationsAttributesKey = 'course::courses.form';

    public function rules()
    {
        return [
            'start_at'    => 'required|date_format:d.m.Y',
            'end_at'      => 'required|date_format:d.m.Y',
            'start_hour'  => 'required|date_format:H:i',
            'end_hour'    => 'required|date_format:H:i',
            'category_id' => 'required|int',
            'location_id' => 'required|int'
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => trans('course::categories.title.categories'),
            'location_id' => trans('course::locations.title.locations')
        ];
    }

    public function translationRules()
    {
        return [
            'title'       => 'required|max:200',
            'slug'        => "required|max:200|unique:course__course_translations,slug,null,course_id,locale,$this->localeKey",
            'description' => 'required|min:10'
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
