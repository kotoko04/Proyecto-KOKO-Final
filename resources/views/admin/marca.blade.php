<div class="card" style="width: 30rem; margin-bottom: 24%">
    <div class="card-body">
        <h5 class="card-title">Agregar Marca</h5>
        <form action="{{ route('marca') }}" method="POST" id="formularioMarca">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombreM" name="nombre" required >
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <textarea class="form-control" id="descripcionM" name="descripcion" rows="3" required></textarea>
            </div>
            <div id="resultadoM" style="display: none" class="alert alert-danger" role="alert">
                Por favor llena todos los campos
            </div>
            <button onclick="guardarMarca(event)" type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>

