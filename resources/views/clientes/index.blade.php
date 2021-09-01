@extends('layouts.index')


@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('Content')
@section('Content')
<div id= "page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-muted" align="center">REPORTE DE CLIENTES</h1>
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
                        <div class="btn-group float-right">
                            <a href="/alta_cliente">
                                <span class="btn btn-primary float-right col fileinput-button">
                                  <i class="fa fa-plus"></i>
                                    <span>Agregar Cliente</span>
                                </span>
                            </a>
                        </div>

                        <div class="row">
                            <div class="col-8 position-relative">
                                <div class="position-relative ">
                                <a href="{{route('pdfclientes')}}">
                                <img width="40" height="40" src="images\pdf.png">				
                                </a>
                                <a href="{{route('excelclientes')}}">
                                    <img width="40" height="40" src="images\excel.png">				
                                </a>
                                </div>
                            </div>
                        </div>

                    </div>     
                <div class="card-body">
                <table id="clientes" class="table table-striped table-bordered" style="width:100%" >
                <thead>
                <tr>
                    <th scope="col" align="justify">Clave</th>
                    <th scope="col" align="justify">Nombre Completo</th>
                    <th scope="col" align="justify">Teléfono</th>
                    <th scope="col" align="justify">Correo Electrónico</th>
                    <th scope="col" align="justify">Colonia</th>
                    <th scope="col" align="justify">Calle</th>
                    <th scope="col" align="justify">Opciones</th>
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
                    <td>
                        <form action="{{ route ('clientes.destroy',$cliente->id)}}" method="POST" class="formulario-eliminar">
                            @csrf 
                            @method('DELETE')
                            <a href="/clientes/{{$cliente->id}}/edit" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Editar</a>
                            @if($cliente->deleted_at)
                                <a href="{{route('activarcliente', $cliente->id)}}" class="btn btn-warning"> <i class="material-icons">Activar</i></a>
                                <button type="submit" class="btn btn-secondary"><i class="material-icons">Eliminar</i></button>
                            @else
                            <a href="{{route('desactivarcliente', $cliente->id)}}" class="btn btn-danger"> <i class="material-icons">Desactivar</i></a>
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


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<!-- Alerts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>
<script>
        $(document).ready(function(){ 
            $(document).on("mouseover",".columna",function(){
                //alert("Esta es una imagen");
                $(this).attr("width",200);
                $(this).attr("height",100);
            });
            $(document).on("mouseout",".columna",function(){
                //alert("Esta es una imagen");
                $(this).attr("width",100);
                $(this).attr("height",100);
            });  
        });
</script>

<script>
    $(function () {
      $('#clientes').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": false,
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
    title: 'Cliente creado',
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
    title: 'Cliente Editado Correctamente',
    showConfirmButton: false,
    timer: 1500
    })
</script>
@endif

@if (session('success') =='desactivar')
<script>
Swal.fire('Cliente Desactivado')
</script>
@endif

@if (session('success') =='activar')
<script>
Swal.fire('Cliente Activado')
</script>

<script>
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();
            Swal.fire({
            title: '¿Desea eliminar este Cliente?',
            text: "¡Este Cliente se eliminara definitivamente!",
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
            'Cliente Eliminado!',
            'El Cliente se elimino con exito.',
            'success'
       )
</script>
@endif
@endif


@endsection