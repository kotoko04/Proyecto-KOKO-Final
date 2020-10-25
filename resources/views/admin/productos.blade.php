<div class="card" style="width: 30rem; margin-bottom: 24%">
    <div class="card-body">
        <h5 class="card-title">Agregar Producto</h5>
        <form action="{{ route('producto') }}" method="POST" id="formularioEmpresa" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="referencia">Referencia</label>
                <input type="number" class="form-control" id="referencia" name="referencia" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required >
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="detalle">Detalle</label>
                <input type="text" class="form-control" id="detalle" name="detalle" required>
            </div>
            <div class="form-group">
                <label for="valor">Valor</label>
                <input type="number" class="form-control" id="valor" name="precio" required>
            </div>
            <div class="form-group">
                <label for="palabra">Palabra Clave</label>
                <input type="text" class="form-control" id="palabra" name="palabra" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado"required >
            </div>
            <div class="form-group">
                <label for="estado">Imagen</label>
                <input id="file-input" name="imagen" type="file"required>
            </div>

            <div class="form-group">
                <label for="c">Categoria</label>
                <select id="c" name="valor" class="form-control " required>
                    @if(!empty($data))
                        @foreach($data as $tipo)
                            <option value="{{$tipo->id}}" selected="" >{{$tipo->descripcion}}</option>
                        @endforeach
                    @else
                        <option></option>
                    @endif

                </select>
            </div>
            <div class="form-group">
                <label for="v">Marca</label>
                <select id="v" name="valorM" class="form-control " required>
                    @if(!empty($dataM))
                        @foreach($dataM as $tipo)
                            <option value="{{$tipo->id}}" >{{$tipo->nombre}}</option>
                        @endforeach
                    @else
                        <option></option>
                    @endif
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>

