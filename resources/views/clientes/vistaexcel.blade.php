<table id="clientes" class="table table-striped table-bordered" style="width:100%" >
    <thead>
    <tr>
        <th scope="col" align="justify">Clave</th>
        <th scope="col" align="justify">Nombre Completo</th>
        <th scope="col" align="justify">Teléfono</th>
        <th scope="col" align="justify">Correo Electrónico</th>
        <th scope="col" align="justify">Colonia</th>
        <th scope="col" align="justify">Calle</th>
    </tr>
</thead>
<tbody>
    @foreach ($clientes as $cliente)
    <tr>
        <td align="center">{{ $cliente->id }}</td>
        <td  class="columna" width="100" heigth="100">{{ $cliente->nombre }} {{ $cliente->app }} {{ $cliente->apm }}</td>
        <td>{{ $cliente->telefono }}</td>
        <td>{{ $cliente->correo }}</td>
        <td>{{ $cliente->colonia }}</td>
        <td>{{ $cliente->calle }}</td>
    </tr>
    @endforeach
</tbody>
</table>
