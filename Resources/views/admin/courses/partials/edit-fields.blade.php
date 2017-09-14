<div class="box-body">
    {!! Form::i18nInput("title", trans("course::courses.form.title"), $errors, $lang, $course, ['data-slug'=>'source']) !!}

    {!! Form::i18nInput("slug", trans("course::courses.form.slug"), $errors, $lang, $course, ['data-slug'=>'target']) !!}

    <?php $oldContent = isset($course->translate($lang)->description) ? $course->translate($lang)->description : ''; ?>
    @editor('description', trans('course::courses.form.description'), old("{$lang}.description", $oldContent), $lang)
</div>
