<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="{{ asset('/assets/css/dataTables.dataTables.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/buttons.dataTables.css') }}">
<div class="card-body p-2">
    <div class="table-responsive">
        <table class="display nowrap table table-striped text-center" id="plazas-table">
            <thead>
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Activa</th>
                <th class="col-sm-2 text-center">Acciónes</th>
            </tr>
            </thead>
            <tbody>
            @foreach($plazas as $plaza)
                <tr>
                    <td>{{ $plaza->nombre }}</td>
                    <td>
                        @if ($plaza->activa == true)
                            {{'Sí'}}
                        @else
                            {{'No'}}
                        @endif
                    </td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['plazas.destroy', $plaza->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('plazas.show', [$plaza->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('plazas.edit', [$plaza->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $plazas])
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

    new DataTable('#plazas-table', {
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
        paginate: false,
        select: true
    });
</script>