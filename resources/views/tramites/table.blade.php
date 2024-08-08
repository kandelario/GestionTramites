<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="tramites-table">
            <thead>
            <tr>
                <th class="text-center">Tramite</th>
                <th class="text-center">Estatus Afore</th>
                <th class="text-center">Fecha Baja</th>
                <th class="text-center">Fecha Solicitud Recurso</th>
                <th class="text-center">Fecha Pago</th>
                <th class="text-center">Porcentaje</th>
                <th class="text-center">Monto Asesor</th>
                <th class="text-center">Asesor Id</th>
                <th class="text-center">Cliente Id</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tramites as $tramite)
                <tr>
                    <td class="text-center">{{ $tramite->tramite }}</td>
                    <td class="text-center">{{ $tramite->estatus_afore }}</td>
                    <td class="text-center">{{ substr($tramite->fecha_baja, 0, 10) }}</td>
                    <td class="text-center">{{ substr($tramite->fecha_solicitud_recurso, 0, 10) }}</td>
                    <td class="text-center">{{ substr($tramite->fecha_pago, 0, 10) }}</td>
                    <td class="text-center">{{ $tramite->porcentaje . '%' }}</td>
                    <td class="text-center">{{ '$' . $tramite->monto_asesor }}</td>
                    <td class="text-center">
                        @foreach ($asesores as $asesor)
                            @if ($asesor->id == $tramite->asesor_id)
                                {{$asesor->nombre}}
                            @endif
                        @endforeach
                    </td>
                    <td class="text-center">
                        @foreach ($clientes as $cliente)
                            @if ($cliente->id == $tramite->cliente_id)
                                {{$cliente->nombre}}
                            @endif
                        @endforeach
                    </td>
                    <td class="text-center" style="width: 120px">
                        {!! Form::open(['route' => ['tramites.destroy', $tramite->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('tramites.show', [$tramite->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('tramites.edit', [$tramite->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $tramites])
        </div>
    </div>
</div>
