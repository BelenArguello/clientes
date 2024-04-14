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

    <div class="container ">
        <div class="d-flex justify-content-between py-3" >

         <div class="h4">Registrar clientes</div>
            <div> 
            <a href="{{route('clientes.index')}}" class="btn btn-primary">Volver</a>
            </div>
        </div>
       
        <form action="{{ route('clientes.store') }}" method="post">
    @csrf
    <div class="card border-0 shadow-lg">
        <div class="card-body">
            <div class="mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required>
                @error('nombre')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ruc">RUC</label>
                <input type="text" name="ruc" id="ruc" class="form-control @error('ruc') is-invalid @enderror" value="{{ old('ruc') }}" required>
                @error('ruc')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono') }}" required>
                @error('telefono')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
           

            <div class="mb-3">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion') }}" required>
                @error('direccion')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
          

            <div class="form-group mb-3">
                <label for="activo">Activo</label>
                <select name="activo" id="activo" class="form-control form-control-sm @error('activo') is-invalid @enderror">
                    <option value="1" @if(old('activo') == 1) selected @endif>Si</option>
                    <option value="0" @if(old('activo') == 0) selected @endif>No</option>
                </select>
                @error('activo')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
          
        </div>
    </div>
    <button class="btn btn-primary mt-3">Guardar</button>
</form>
     </div>

    
</body>
</html>