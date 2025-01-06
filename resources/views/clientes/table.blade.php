<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="{{ asset('/assets/css/dataTables.dataTables.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/buttons.dataTables.css') }}">
<style>
    .fs-5{
        font-size: .7rem !important;
    }
    .fs-6{
        font-size: .9rem !important;
    }
</style>
<div class="card-body p-2">
    <div class="table-responsive">
        <table class="display nowrap table table-striped text-center fs-6" id="clientes-table">
            <thead>
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Estatus</th>
                <th class="text-center">N° Contacto</th>
                <th class="text-center">NSS</th>
                <th class="text-center">CURP</th>
                <th class="text-center">Fecha Baja</th>
                <th class="text-center">Fecha Solicitud</th>
                <th class="text-center">Fecha Cobro</th>
                <th class="text-center">Afore</th>
                <th class="text-center">Monto</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td class="text-center">{{ $cliente->nombre }}</td>
                    <td class="text-center">
                        @if ($cliente->estatus == 'Pendiente')
                            <span class="bg-danger text-bold p-2 rounded">{{ $cliente->estatus }}</span>
                        @elseif($cliente->estatus == 'Completo')
                            <span class="bg-warning text-bold p-2 rounded">{{ $cliente->estatus }}</span>
                        @elseif($cliente->estatus == 'Pagado')
                            <span class="bg-success text-bold p-2 rounded">{{ $cliente->estatus }}</span>
                        @endif
                    </td>
                    <td class="text-center">{{ $cliente->n_contacto }}</td>
                    <td class="text-center">{{ $cliente->nss }}</td>
                    <td class="text-uppercase text-center">{{ $cliente->curp }}</td>
                    <td class="text-center">
                        {{ substr($cliente->fecha_baja, 0, 10) }}
                    </td>
                    <td class="text-center">
                        {{ substr($cliente->fecha_solicitud, 0, 10) }}
                    </td>
                    <td class="text-center">
                        {{ substr($cliente->fecha_cobro, 0, 10) }}
                    </td>
                    <td class="text-center">{{ $cliente->afore }}</td>
                    <td class="text-center">{{ '$' .  number_format($cliente->monto) }}</td>
                    <td class="text-center" style="width: 120px">
                        {!! Form::open(['route' => ['clientes.destroy', $cliente->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('clientes.show', [$cliente->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('clientes.edit', [$cliente->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $clientes])
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
    new DataTable('#clientes-table', {
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