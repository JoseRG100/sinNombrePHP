<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Id Curso:') }}
            {{ Form::text('id_course', $percentage->id_course, ['class' => 'form-control' . ($errors->has('id_course') ? ' is-invalid' : ''), 'placeholder' => 'Id Course']) }}
            {!! $errors->first('id_course', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Id Clase:') }}
            {{ Form::text('id_class', $percentage->id_class, ['class' => 'form-control' . ($errors->has('id_class') ? ' is-invalid' : ''), 'placeholder' => 'Id Class']) }}
            {!! $errors->first('id_class', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Evaluación continua:') }}
            {{ Form::text('continuous_assessment', $percentage->continuous_assessment, ['class' => 'form-control' . ($errors->has('continuous_assessment') ? ' is-invalid' : ''), 'placeholder' => 'Continuous Assessment']) }}
            {!! $errors->first('continuous_assessment', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Exámenes:') }}
            {{ Form::text('exams', $percentage->exams, ['class' => 'form-control' . ($errors->has('exams') ? ' is-invalid' : ''), 'placeholder' => 'Exams']) }}
            {!! $errors->first('exams', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success">Aceptar</button>
    </div>
</div>
