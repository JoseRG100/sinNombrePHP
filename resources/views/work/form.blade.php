<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('id clase:') }}
            {{ Form::text('id_class', $work->id_class, ['class' => 'form-control' . ($errors->has('id_class') ? ' is-invalid' : ''), 'placeholder' => 'Id Class']) }}
            {!! $errors->first('id_class', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id estudiante:') }}
            {{ Form::text('id_student', $work->id_student, ['class' => 'form-control' . ($errors->has('id_student') ? ' is-invalid' : ''), 'placeholder' => 'Id Student']) }}
            {!! $errors->first('id_student', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre:') }}
            {{ Form::text('name', $work->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nota:') }}
            {{ Form::text('mark', $work->mark, ['class' => 'form-control' . ($errors->has('mark') ? ' is-invalid' : ''), 'placeholder' => 'Mark']) }}
            {!! $errors->first('mark', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success">Aceptar</button>
    </div>
</div>
