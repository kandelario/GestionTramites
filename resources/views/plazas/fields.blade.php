<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Activa Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        {!! Form::hidden('activa', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('activa', '1', null, ['class' => 'form-check-input', 'checked']) !!}
        {!! Form::label('activa', 'Activa', ['class' => 'form-check-label']) !!}
    </div>
</div>