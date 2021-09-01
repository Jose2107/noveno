@extends('layouts.index')
<head>
<title>Repoorte de Transporte</title>
<link rel="stylesheet" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.css">

</head>
@section('Content')
    <div id= "page-wrapper">
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-muted" align="center">REPORTE DE TRANSPORTE</h1>
            </div>
        </div>

    </div>
    </div>

<div class="container">
<div class="container_fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div >
                        <div class="btn-group float-right">
                            <a href="{!! route('altatranspor') !!}">
                                <span class="btn btn-primary float-right col fileinput-button">
                                  <i class="fa fa-plus"></i>
                                    <span>Agregar transporte</span>
                                </span>
                            </a>
                        </div>

                        <div class="row">
                            <div class="col-8 position-relative">
                                <div class="position-relative ">
                                <a href="{{route('pdftransportes')}}">
                                <img width="40" height="40" src="images\pdf.png">
                                </a>
                                <a href="{{route('exceltransportes')}}">
                                    <img width="40" height="40" src="images\excel.png">
                                </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                          <div class="card-box table-responsive">
                  <table id="transporte" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>Clave</th>
                        <th>Foto</th>
                        <th>Modelo</th>
                        <th>Placas</th>
                        <th>Tipo de camion</th>
                        <th>Dueño</th>
                        <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="table" >
                    @foreach ($transporte as $transpor)
                      <tr>
                          <td scope="row">{{$transpor->idtranspor}}</td>
                          <td><img class="camion"src="{{asset('images/Transporte/'.$transpor->img)}}" height="50" width="50"></td>
                        <td>{{$transpor->modelo}}</td>
                        <td>{{$transpor->placas}}</td>
                        <td>{{$transpor->tpc}}</td>
                        <td>{{$transpor->nombre}}</td>

                        <td>
                            <form action="{{route('borrartranspor',$transpor->idtranspor)}}" method="POST" class="formulario-eliminar">
                                @csrf
                                @method("DELETE")
                                <a href="/modificartranspor/{{$transpor->idtranspor}}" class="btn btn-warning"><i class="material-icons">Editar</i></a>
                                @if($transpor->deleted_at)
                                <a href="{{route('activatranspor', $transpor->idtranspor)}}" class="btn btn-warning"> <i class="material-icons">Activar</i></a>
                                <button type="submit" class="btn btn-secondary"><i class="material-icons">Eliminar</i></button>
                                @else
                                <a href="{{route('desactivatranspor', $transpor->idtranspor)}}" class="btn btn-danger"> <i class="material-icons">Desactivar</i></a>
                                @endif
                            </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                </div>
               </div>
               </div>
            </div>
        </div>
    </div>
</div>
</div>

 <!-- jQuery -->
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <!-- Datatables -->
 <script src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>
<!-- Alerts -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>

 <script>
    $(document).ready(function() {
        $(document).on("mouseover",".camion",function () {
            // alert("imagen");
            $(this).attr("width",250);
            $(this).attr("height",340);
        });
        $(document).on("mouseout",".camion",function () {
            // alert("imagen");
            $(this).attr("width",80);
            $(this).attr("height",70);
        });

    });

    </script>

<script>
    $(function () {
      $('#transporte').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
      });
    });
  </script>

@if (session('success') =='ok')
<script>
    Swal.fire({
    position: '',
    icon: 'success',
    title: 'Transporte creado',
    showConfirmButton: false,
    timer: 1500
    })
</script>
@endif

@if (session('success') =='edit')
<script>
    Swal.fire({
    position: '',
    icon: 'success',
    title: 'Transporte Editado Correctamente',
    showConfirmButton: false,
    timer: 1500
    })
</script>
@endif

@if (session('success') =='desactivar')
<script>
Swal.fire('Transporte Desactivado')
</script>
@endif

@if (session('success') =='activar')
<script>
Swal.fire('Transporte Activado')
</script>

<script>
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();
            Swal.fire({
            title: '¿Desea eliminar este Transporte?',
            text: "¡Este Transporte se eliminara definitivamente!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡si, eliminar!',
            cancelButtonText: '¡Cancelar!',
            }).then((result) => {
            if (result.value) {
                this.submit();
            }
            })
    })
</script>

@if (session('success') =='delete')
<script>
       Swal.fire(
            'Transporte Eliminado!',
            'El Transporte se elimino con exito.',
            'success'
       )
</script>
@endif
@endif
@endsection
