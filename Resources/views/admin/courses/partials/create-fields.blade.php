<div class="box-body">
   {!! Form::i18nInput("title", trans("course::courses.form.title"), $errors, $lang, null, ['data-slug'=>'source']) !!}

   {!! Form::i18nInput("slug", trans("course::courses.form.slug"), $errors, $lang, null, ['data-slug'=>'target']) !!}

    @editor('description', trans('course::courses.form.description'), old("{$lang}.description"), $lang)
</div>
