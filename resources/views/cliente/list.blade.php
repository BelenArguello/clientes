<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="{{asset('bootstrap-5.3.3-dist/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">Clientes</div>
        </div>
    </div>

    <div class="container">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Lista de clientes</div>
            <div> 
                <a href="{{route('clientes.create')}}" class="btn btn-primary">Agregar</a>
            </div>
        </div>
       
        <div>
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif
        </div>
        
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>RUC</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                @if($clientes->isNotEmpty())
                @foreach ($clientes as $cliente)
                <tr valign="middle">
                    <td>{{$cliente->id}}</td>
                    <td>{{$cliente->nombre}}</td>
                    <td>{{$cliente->ruc}}</td>
                    <td>{{$cliente->telefono}}</td>
                    <td>{{$cliente->direccion}}</td>
                    <td>
                        @if($cliente->activo)
                            Activo
                        @else
                            Inactivo
                        @endif
                    </td>
                    <td>
                        <a href="{{route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <a href="#" onclick="deleteCliente({{ $cliente->id }})" class="btn btn-danger btn btn-sm">Eliminar</a>

                        <form id="cliente-edit-action-{{$cliente->id}}" action="{{route('clientes.destroy', $cliente->id)}}" method="post">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
                @endforeach
                
                @else
                <tr>
                    <td colspan="6">Registro no encontrado</td>
                </tr>
                @endif
            </table>
        </div>
        
        <div class="d-flex justify-content-center mt-3">
            <!-- Botones de paginación -->
            <ul class="pagination">
                <!-- Botón "Anterior" -->
                <li class="page-item {{ $clientes->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $clientes->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                
                <!-- Números de página -->
                @for ($i = 1; $i <= $clientes->lastPage(); $i++)
                    <li class="page-item {{ $clientes->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ $clientes->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                
                <!-- Botón "Siguiente" -->
                <li class="page-item {{ $clientes->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $clientes->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</body>
</html>
<script>
    function deleteCliente(id){
        if(confirm("¿Estas seguro de realizar esta acción?")){
            document.getElementById('cliente-edit-action-'+id).submit();
        }
    }
</script>