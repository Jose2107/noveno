<!DOCTYPE html>
<html>
<head>
<title>Reportes PDF</title>
</head>
<body>	
        <h1><caption>Reporte de Operadores</caption></h1>
        <table id="operadores" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th><center>Clave</center></th>
                    <!-- <th><center>Foto</center></th> -->
                    <th><center>Nombre</center></th>
                    <th><center>Teléfono</center></th>
                    <th><center>Correo electrónico</center></th>
                    <th><center>Licencia vigente</center></th>
                </tr>
            </thead>
            <tbody id="table">
                @foreach($consulta as $c)
                <tr>
                    <th><center>{{$c->idoperador}}</center></th>
                    <!-- <td><img class="operadorf" src="{{asset('archivos/'. $c->foto)}}" height=55 width=50></td> -->
                    <td>{{$c->nombre}} {{$c->apellidop}} {{$c->apellidom}}</td>
                    <td><center>{{$c->telefono}}</center></td>
                    <td>{{$c->email}}</td>
                    <td><center>{{$c->maneja}}</center></td>
                </tr>
                @endforeach
            </tbody>
        </table>

</body>
</html>