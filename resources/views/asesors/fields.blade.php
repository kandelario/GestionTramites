<!-- Nombre Field -->
<div class="form-group col-sm-4">
    {!! Form::label('nombre', 'Nombre del Asesor:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>



<!-- Image Field -->
<div class="form-group col-sm-4">
    {!! Form::label('image', 'Imagen:') !!}
    {!! Form::file('image', ['class' => 'form-control file', 'accept' => 'image/*']) !!}
</div>

<!-- Email Verified At Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    {!! Form::text('email_verified_at', null, ['class' => 'form-control','id'=>'email_verified_at']) !!}
</div> --}}

{{-- @push('page_scripts')
    <script type="text/javascript">
        $('#email_verified_at').datepicker()
    </script>
@endpush --}}

<!-- Plaza Id Field -->
<div class="form-group col-sm-4">
    {!! Form::label('plaza_id', 'Plaza:') !!}
    {{-- {!! Form::number('plaza_id', null, ['class' => 'form-control', 'required']) !!} --}}
    <select name="plaza_id" id="plaza_id" class="form-control">
        
        @if (isset($plazas))
            <option value="">Seleccione una plaza</option>
            @foreach ($plazas as $plaza)
                <option value="{{$plaza->id}}">{{$plaza->nombre}}</option>
            @endforeach
        @else
            <option value="">No existen plazas registradas</option>
        @endif
    </select>
</div>

<!-- Activo Field -->
<div class="form-group col-sm-4">
    <div class="form-check">
        {!! Form::hidden('activo', 0, ['class' => 'form-check-input']) !!}
        @if (isset($asesor))

            @if ($asesor->activo == 0)
                {!! Form::checkbox('activo', '1', null, ['class' => 'form-check-input']) !!}
            @endif
            
        @else
            {!! Form::checkbox('activo', '1', null, ['class' => 'form-check-input', 'checked']) !!}
        @endif
        {!! Form::label('activo', 'Activo', ['class' => 'form-check-label']) !!}
    </div>
</div>