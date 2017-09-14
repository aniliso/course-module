<div class="box-body">
    {!! Form::i18nInput("title", trans("course::categories.form.title"), $errors, $lang, null, ['data-slug'=>'source']) !!}

    {!! Form::i18nInput("slug", trans("course::categories.form.slug"), $errors, $lang, null, ['data-slug'=>'target']) !!}
</div>
