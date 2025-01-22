<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="{{ asset('/assets/css/dataTables.dataTables.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/buttons.dataTables.css') }}">
<div class="card-body p-2">
    <div class="table-responsive">
        <table class="display nowrap table table-striped text-center" id="tramites-table">
            <thead>
            <tr>
                <th class="text-center">Cliente</th>
                <th class="text-center">N° Contacto</th>
                <th class="text-center">NSS</th>
                <th class="text-center">CURP</th>
                <th class="text-center">Fecha Baja</th>
                <th class="text-center">Afore</th>
                <th class="text-center">Monto</th>
                <th class="text-center">Estatus</th>

                <th class="text-center">Asesor</th>
                <th class="text-center">Trámite</th>
                <th class="text-center">Fecha Solicitud Recurso</th>
                <th class="text-center">Fecha Pago</th>
                <th class="text-center">Porcentaje Asesor</th>
                <th class="text-center">Monto Asesor</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
                
                @foreach($tramites as $tramite)
                    @if ($tramite->id > 0)
                        <tr>
                            <td class="text-center">{{ $tramite->c_nombre }}</td>
                            <td class="text-center">{{ $tramite->c_contacto }}</td>
                            <td class="text-center">{{ $tramite->c_nss }}</td>
                            <td class="text-center">{{ $tramite->c_curp }}</td>
                            <td class="text-center">{{ substr($tramite->c_afore_fecha_baja, 0, 10) }}</td>
                            <td class="text-center">{{ $tramite->c_afore }}</td>
                            <td class="text-center">{{ '$' . number_format($tramite->c_monto) }}</td>
                            <td class="text-center">{{ $tramite->t_estatus }}</td>
                            <td class="text-center">
                                @php
                                    $asesor_id = 0;
                                @endphp
                                @foreach ($asesores as $asesor)
                                    @if ($asesor->id == $tramite->asesor_id)
                                        @php
                                            $asesor_id = $asesor->id
                                        @endphp
                                        {{$asesor->nombre}}
                                    @endif
                                @endforeach
                            </td>
                            <td class="text-center">{{ $tramite->tramite }}</td>
                            <td class="text-center">{{ substr($tramite->t_fecha_solicitud_recurso, 0, 10) }}</td>
                            <td class="text-center">{{ substr($tramite->t_fecha_pago, 0, 10) }}</td>
                            <td class="text-center">{{ $tramite->t_porcentaje . '%' }}</td>
                            <td class="text-center">{{ '$' . number_format($tramite->t_monto_para_asesor) }}</td>
                            <td class="text-center" style="width: 120px">
                                {!! Form::open(['route' => ['tramites.destroy', $tramite->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{{ route('tramites.edit', [$tramite->id]) }}"
                                    class='btn btn-default btn-xs'>
                                        <i class="far fa-edit"></i>
                                    </a>
                                    @if (Auth::user()->hasRole('Superadmin') || Auth::user()->hasRole('Admin'))
                                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                    @endif
                                    
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @else
                        <tr><td>No existen registros</td></tr>
                    @endif
                        
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ asset('/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/assets/js/dataTables.js') }}"></script>
<script src="{{ asset('/assets/js/dataTables.buttons.js') }}"></script>
<script src="{{ asset('/assets/js/buttons.dataTables.js') }}"></script>
<script src="{{ asset('/assets/js/jszip.min.js') }}"></script>
<script src="{{ asset('/assets/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('/assets/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('/assets/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/assets/js/buttons.print.min.js') }}"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
<script>
    new DataTable('#tramites-table', {
    layout: {
        topStart: {
            buttons: [
                // 'copy',
                // 'csv',
                'excel',
                // 'pdf',
                'print'
            ]
        }
    },
        paginate: true,
        select: true
    });
</script>