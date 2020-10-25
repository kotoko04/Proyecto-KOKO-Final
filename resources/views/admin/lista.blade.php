
    <table class="table table-responsive-xl" style=" position:absolute; left:-18%; padding: 8px;background: #ffffff;box-shadow: 10px 3px 31px -5px rgba(0,0,0,0.75);" >
        <thead class="bg-warning">
        <tr class="something">
            <th style="padding: 10px;" scope="col">Referencia</th>
            <th style="padding: 10px"scope="col">Nombre</th>
            <th style="padding: 10px"scope="col">Detalle</th>
            <th style="padding: 10px"scope="col">Valor</th>
            <th style="padding: 10px"scope="col">Clave</th>
            <th style="padding: 10px"scope="col">Estado</th>
            <th style="padding: 10px"scope="col">Accion</th>
            <th style="padding: 10px"scope="col">Accion</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($data))
            @foreach($data as $tipo)
                <tr>
                    <th style="padding: 10px" scope="row">{{$tipo->referencia}}</th>
                    <td style="padding: 10px">{{$tipo->nombre}}</td>
                    <td style="padding: 10px">{{$tipo->detalle}}</td>
                    <td style="padding: 10px">{{$tipo->valor}}</td>
                    <td style="padding: 10px">{{$tipo->palabraclave}}</td>
                    <td style="padding: 10px">{{$tipo->estado}}</td>
                    <td><form action="{{  route('productoviewEditar', [$tipo->id]) }}" method="POST">
                        @csrf
                        <button onclick="advertencia()" type="submit" class="btn btn-primary">Editar</button>
                    </form></td>
                    <td><button onclick="eliminar({{$tipo->id}})" id="eliminar"  type="button" class="btn btn-danger">Eliminar</button></td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>




