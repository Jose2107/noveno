<table id="transporte" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Clave</th>
       
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
        <td>{{$transpor->modelo}}</td>
        <td>{{$transpor->placas}}</td>
        <td>{{$transpor->tpc}}</td>
        <td>{{$transpor->nombre}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>