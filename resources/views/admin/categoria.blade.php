<div class="card" style="width: 30rem; margin-bottom: 24%">
    <div class="card-body">
        <h5 class="card-title">Agregar Categoria</h5>
        <form action="{{ route('categoria') }}" method="POST" id="formularioCategoria">
            @csrf
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <textarea id="descripcion" name="descripcion" class="form-control"  rows="3" ></textarea>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <input id="estado" name="estado"  type="text" class="form-control" >
            </div>
            <div id="resultado" style="display: none" class="alert alert-danger" role="alert">
                Por favor llena todos los campos
            </div>
            <button onclick="guardarCategoria(event)" type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>

