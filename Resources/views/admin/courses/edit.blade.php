@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('course::courses.title.edit course') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.course.course.index') }}">{{ trans('course::courses.title.courses') }}</a></li>
        <li class="active">{{ trans('course::courses.title.edit course') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.course.course.update', $course->id], 'method' => 'put']) !!}
    <div class="row">
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('course::admin.courses.partials.edit-fields', ['lang' => $locale])
                        </div>
                    @endforeach

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>
                        <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.course.course.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
        <div class="col-md-3">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::normalInput("age", trans("course::courses.form.age"), $errors, $course) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::normalInput("capacity", trans("course::courses.form.capacity"), $errors, $course) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has("start_at") ? ' has-error' : '' }}">
                                {!! Form::label("start_at", trans('course::courses.form.start_at').':') !!}
                                <div class='input-group date' id='start_at'>
                                    <input type="text" class="form-control" name="start_at" value="{{ old('start_at', $course->start_at->format('d.m.Y')) }}" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                {!! $errors->first("start_at", '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has("end_at") ? ' has-error' : '' }}">
                                {!! Form::label("end_at", trans('course::courses.form.end_at').':') !!}
                                <div class='input-group date' id='end_at'>
                                    <input type="text" class="form-control" name="end_at" value="{{ old('end_at', $course->end_at->format('d.m.Y')) }}" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                {!! $errors->first("end_at", '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has("start_hour") ? ' has-error' : '' }}">
                                {!! Form::label("start_hour", trans('course::courses.form.start_hour').':') !!}
                                <div class='input-group date' id='start_hour'>
                                    <input type="text" class="form-control" name="start_hour" value="{{ old('start_hour', $course->start_hour) }}" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                </div>
                                {!! $errors->first("start_hour", '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has("end_hour") ? ' has-error' : '' }}">
                                {!! Form::label("end_hour", trans('course::courses.form.end_hour').':') !!}
                                <div class='input-group date' id='end_hour'>
                                    <input type='text' class="form-control" name="end_hour" value="{{ old('end_hour', $course->end_hour) }}"/>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                </div>
                                {!! $errors->first("end_hour", '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label("day", trans('course::courses.form.day')) !!}
                        {!! Form::select('day[]', DaysOfWeek::lists(), old("days", json_decode($course->day)), ['class'=>'form-control select2', 'multiple'=>'multiple']) !!}
                        {!! $errors->first("day", '<span class="help-block">:message</span>') !!}
                    </div>

                    {!! Form::normalInput("price", trans("course::courses.form.price"), $errors, $course) !!}

                    <div class="form-group">
                        {!! Form::label("status", trans('course::courses.form.status').':') !!}
                        <select name="status" id="status" class="form-control">
                            <?php foreach ($statuses as $id => $status): ?>
                            <option value="{{ $id }}" {{ old('status', $course->status) == $id ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-body">
                    {!! Form::normalSelect('category_id', trans('course::categories.title.categories'), $errors, $selectCategories, null) !!}

                    {!! Form::normalSelect('location_id', trans('course::locations.title.locations'), $errors, $selectLocations, null) !!}

                    @mediaSingle('courseImage', $course, null, trans('course::courses.form.image'))
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.course.course.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
            $('#start_at').datetimepicker({
                locale: '<?= App::getLocale() ?>',
                allowInputToggle: true,
                format: 'DD.MM.YYYY'
            });
            $('#end_at').datetimepicker({
                locale: '<?= App::getLocale() ?>',
                allowInputToggle: true,
                format: 'DD.MM.YYYY'
            });
            $('#start_hour, #end_hour').datetimepicker({
                locale: '<?= App::getLocale() ?>',
                allowInputToggle: true,
                format: 'HH:mm'
            });
            $('#start_hour, #start_at').on('dp.change', function (e) {
//            var d = new Date(e.date);
//            d.setDate(d.getDate()+1);
                $('#end_hour, #end_at').data("DateTimePicker").minDate(e.date);
            });
            $('#end_hour, #end_at').on('dp.change', function (e) {
                $('#start_hour, #start_at').data("DateTimePicker").maxDate(e.date);
            });
            $('.select2').select2();
        });
    </script>
@endpush
