<div class="card" style="width: 30rem; margin-bottom: 24%">
    <div class="card-body">
        <h5 class="card-title">Informacion Empresa</h5>
        <form action="{{ route('empresa') }}" method="POST" id="formularioEmpresa">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$dataEmpresa[0]->name}}" required>
            </div>
            <div class="form-group">
                <label for="somos">¿Quienes somos?</label>
                <textarea class="form-control" id="somos" name="somos" rows="3" maxlength="255">{{$dataEmpresa[0]->quienessomos}}</textarea>
            </div>
            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="{{$dataEmpresa[0]->direccion}}" >
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="number" class="form-control" id="telefono" name="telefono" value="{{$dataEmpresa[0]->telefono}}">
            </div>
            <div class="form-group">
                <label for="email">Correo</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$dataEmpresa[0]->email}}" required>
            </div>
            <div class="form-group">
                <label for="usuario">Nombre usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" value="{{$dataEmpresa[0]->username}}" required>
            </div>
            <label for="basic-url">Url Facebook</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                </div>
                <input type="text" class="form-control" id="facebook" name="facebook" aria-describedby="basic-addon3" value="{{$dataEmpresa[0]->facebook}}">
            </div>
            <label for="basic-url">Url Twitter</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                </div>
                <input type="text" class="form-control" id="twitter" name="twitter" aria-describedby="basic-addon3" value="{{$dataEmpresa[0]->twitter}}">
            </div>
            <label for="basic-url">Url Instagram</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                </div>
                <input type="text" class="form-control" id="instagram" name="instagram" aria-describedby="basic-addon3" value="{{$dataEmpresa[0]->instagram}}">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>

