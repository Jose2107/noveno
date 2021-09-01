<!DOCTYPE html>
<html>
<head>
<title>Reportes PDF</title>
</head>
<body>	
        <h1><caption>Reporte de Clientes</caption></h1>
        <table id="transporte" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Clave</th>
                <!-- <th>Foto</th> -->
                <th>Modelo</th>
                <th>Placas</th>
                <th>Tipo de camion</th>
                <th>Dueño</th>
                </tr>
            </thead>
            <tbody id="table" >
            @foreach ($transporte as $transpor)
              <tr>
                  <td scope="row">{{$transpor->idtranspor}}</td>
                  <!-- <td><img class="camion"src="{{asset('images/Transporte/'.$transpor->img)}}" height="50" width="50"></td> -->
                <td>{{$transpor->modelo}}</td>
                <td>{{$transpor->placas}}</td>
                <td>{{$transpor->tpc}}</td>
                <td>{{$transpor->nombre}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>

</body>
</html>