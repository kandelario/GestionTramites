<div class="card col-sm-12">
    <div class="card-header bg-gradient-gray" id="headingOne">
        <h5 class="mb-0">
            <div class="text-warning">Datos del Cliente</div>
        </h5>
    </div>
    <div class="card-body row">

        <!-- Nombre Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('c_nombre', 'Nombre:') !!}
            {!! Form::text('c_nombre', null, ['class' => 'form-control text-uppercase', 'maxlength' => 255, 'maxlength' => 255]) !!}
            @error('c_nombre')
                <i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i>
                <span class="text-danger"><em>El nombre del cliente es necesario.</em></span>
            @enderror
        </div>

        <!-- N Contacto Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('c_contacto', 'N° Contacto:') !!}
            {!! Form::text('c_contacto', null, ['class' => 'form-control', 'maxlength' => 0, 'maxlength' => 10]) !!}
        </div>

        <!-- Nss Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('c_nss', 'NSS:') !!}
            {!! Form::text('c_nss', null, ['class' => 'form-control', 'minlength' => 0, 'maxlength' => 11]) !!}
            @error('c_nss')
                <i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i>
                <span class="text-danger"><em>El número de seguro social del cliente es necesario y debe contener solo números.</em></span>
            @enderror
        </div>

        <!-- Curp Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('c_curp', 'CURP:') !!}
            {!! Form::text('c_curp', null, ['class' => 'form-control text-uppercase', 'maxlength' => 0, 'maxlength' => 18]) !!}
            @error('c_curp')
                <i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i>
                <span class="text-danger"><em>La curp del cliente es necesaria.</em></span>
            @enderror
        </div>

        <!-- Fecha Baja Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('c_afore_fecha_baja', 'Fecha Baja:') !!}
            @if (isset($tramite->c_afore_fecha_baja))
                {!! Form::date('c_afore_fecha_baja', substr($tramite->c_afore_fecha_baja, 0, 10), ['class' => 'form-control','id'=>'fecha_baja']) !!}
            @else
                {!! Form::date('c_afore_fecha_baja', null, ['class' => 'form-control','id'=>'fecha_baja']) !!}
            @endif
            
        </div>

        <!-- Afore Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('c_afore', 'Afore:') !!}
            {!! Form::text('c_afore', null, ['class' => 'form-control text-uppercase', 'maxlength' => 255, 'maxlength' => 255]) !!}
        </div>

        <!-- Monto Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('c_monto', 'Monto:') !!}
            {!! Form::number('c_monto', null, ['class' => 'form-control', 'minlength' => 0, 'maxlength' => 7]) !!}
            @error('c_monto')
                <i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i>
                <span class="text-danger"><em>El monto a solicitar es requerido, si no se cuenta con el, ingrese un 0.</em></span>
            @enderror
        </div>

        <!-- Estatus Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('t_estatus', 'Estatus:') !!}
            <select name="t_estatus" id="t_estatus" class="form-control">
                <option value="">Seleccione un estatus</option>
            @php
                $_estatus = 'selected';
            @endphp
            @if (isset($cliente))
                @if ($cliente->estatus == 'Pendiente')
                    <option class="bg-danger" value="Pendiente" selected>Pendiente</option>
                    <option class="bg-warning" value="Completo">Completo</option>
                    <option class="bg-success" value="Pagado">Pagado</option>
                @elseif($cliente->estatus == 'Completo')
                    <option class="bg-danger" value="Pendiente">Pendiente</option>
                    <option class="bg-warning" value="Completo" selected>Completo</option>
                    <option class="bg-success" value="Pagado">Pagado</option>
                @elseif($cliente->estatus == 'Pagado')
                    <option class="bg-danger" value="Pendiente">Pendiente</option>
                    <option class="bg-warning" value="Completo">Completo</option>
                    <option class="bg-success" value="Pagado" selected>Pagado</option>
                @endif
            @else
                <option class="bg-danger" value="Pendiente">Pendiente</option>
                <option class="bg-warning" value="Completo">Completo</option>
                <option class="bg-success" value="Pagado">Pagado</option>
            @endif
            </select>
        </div>
    </div>
</div>

<div class="card col-sm-12">
    <div class="card-header bg-gradient-gray" id="headingOne">
        <h5 class="mb-0">
            <div class="text-warning">Datos del Trámite</div>
        </h5>
    </div>
    <div class="card-body row">
        <!-- Asesor Id Field -->
        <div class="form-group col-sm-4">
            @if (isset($asesores->id))
                {!! Form::label('asesor_i   d', 'Asesor:') !!}    
                {{$asesores->nombre}}
                {!! Form::hidden('asesor_id', $asesores->id, ['class' => 'form-control', 'maxlength' => 255, 'required']) !!}
            @else
                {!! Form::label('asesor_id', 'Asesor:') !!}
                <select name="asesor_id" id="asesor_id" class="form-control disabled">
                    <option value="">SELECCIONE UN ASESOR</option>
                    @if (isset($asesores))
                        @foreach ($asesores as $asesor)
                            @if ($asesor->id == old('asesor_id'))
                                <option value="{{$asesor->id}}" selected>{{$asesor->nombre}}</option>
                            @else
                                <option value="{{$asesor->id}}">{{$asesor->nombre}}</option>
                            @endif
                            
                        @endforeach
                    @else
                        <option value="">No existen Asesores Registrados</option>
                    @endif
                </select>    
            @endif
            @error('asesor_id')
                <i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i>
                <span class="text-danger"><em>Es necesario asignar un asesor al trámite.</em></span>
            @enderror
        </div>

        <!-- Tramite Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('tramite', 'Tramite (nombre o tipo):') !!}
            {!! Form::text('tramite', null, ['class' => 'form-control text-uppercase', 'maxlength' => 255]) !!}
            @error('tramite')
                <i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i>
                <span class="text-danger"><em>El nombre del trámite es necesario.</em></span>
            @enderror
        </div>

        <!-- Estatus Afore Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('estatus_afore', 'Estatus Afore:') !!}
            {!! Form::text('estatus_afore', null, ['class' => 'form-control text-uppercase', 'maxlength' => 255, 'maxlength' => 255]) !!}
        </div>

        <!-- Fecha Solicitud Recurso Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('t_fecha_solicitud_recurso', 'Fecha Solicitud Recurso:') !!}
            @if (isset($tramite->t_fecha_solicitud_recurso))
                {!! Form::date('t_fecha_solicitud_recurso', $tramite->t_fecha_solicitud_recurso, ['class' => 'form-control','id'=>'fecha_solicitud_recurso']) !!}    
            @else
                {!! Form::date('t_fecha_solicitud_recurso', null, ['class' => 'form-control','id'=>'fecha_solicitud_recurso']) !!}
            @endif
            
        </div>

        <!-- Fecha Pago Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('t_fecha_pago', 'Fecha Pago:') !!}
            @if (isset($tramite->t_fecha_pago))
                {!! Form::date('t_fecha_pago', $tramite->t_fecha_pago, ['class' => 'form-control','id'=>'fecha_pago']) !!}
            @else
                {!! Form::date('t_fecha_pago', null, ['class' => 'form-control','id'=>'fecha_pago']) !!}
            @endif
            
        </div>

        <!-- Porcentaje Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('t_porcentaje', 'Porcentaje para el asesor:') !!}
            {!! Form::number('t_porcentaje', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Monto Asesor Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('t_monto_para_asesor', 'Monto Asesor ($):') !!}
            {!! Form::number('t_monto_para_asesor', null, ['class' => 'form-control' , '']) !!}
        </div>

        {{-- <!-- Email Verified At Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('email_verified_at', 'Email Verified At:') !!}
            {!! Form::date('email_verified_at', null, ['class' => 'form-control','id'=>'email_verified_at']) !!}
        </div> --}}

    </div>
    
</div>
    