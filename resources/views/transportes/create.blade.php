@extends('layouts.index')

<head>
    <title>Alta </title>
<link href="css\jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
<!-- jQuery -->
<script src="jquery/dist/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function() {

    document.getElementById("file").onchange = function(e) {
      // Creamos el objeto de la clase FileReader
      let reader = new FileReader();

      // Leemos el archivo subido y se lo pasamos a nuestro fileReader
      reader.readAsDataURL(e.target.files[0]);

      // Le decimos que cuando este listo ejecute el código interno
      reader.onload = function(){
        let preview = document.getElementById('preview'),
                image = document.createElement('img');

        image.src = reader.result;

        preview.innerHTML = '';
        preview.append(image);
      };
    }

    $('#placas').keyup(function() {
  this.value = this.value.toUpperCase();
});

    });
</script>

</head>

@section('Content')
<form class="" action="{{route('guardartranspor')}}" method="post" enctype="multipart/form-data">
    <div class="card card-dark">
        <h1 class="text-muted" align="center">ALTA DE TRANSPORTE</h1>
        <!-- /.card-header -->
        <div class="card-body">
            @csrf
            <div class="row">
                {{-- <div class="col-sm-2">
              <!-- text input -->
              <div class="form-group">

                  @if($errors->first('idtrasnpor'))
                  <p class='text-danger'>{{$errors->first('idtrasnpor')}}</p>
                @endif
                <label>Clave</label>
                <input type="text" class="form-control" id="idtrasnpor" value="{{$Idsig}}" readonly='readonly' name="idtrasnpor">
            </div>
        </div> --}}
        <div class="col-sm-5 form-group has-feedback">
            <!-- text input -->
            <div class="form-group">

                @if($errors->first('marca'))
                    <p class='text-danger'>{{$errors->first('marca')}}<i class="fas fa-times-circle"></i></p>

                    @endif

                    <input type="text" class="form-control has-feedback-left" id="marca" value="{{old('marca')}}" name="marca" placeholder="Marca del camion"required>
                    <span class="fa fa-keyboard-o form-control-feedback left" aria-hidden="true"></span>
            </div>
        </div>
        <div class="col-sm-5 form-group has-feedback">
            <!-- text input -->
            <div class="form-group">

                @if($errors->first('placas'))
                    <p class='text-danger'>{{$errors->first('placas')}}<i class="fas fa-times-circle"></i></p>

                    @endif

                    <input type="text" class="form-control has-feedback-left" id="placas"  value="{{old('placas')}}" name="placas" placeholder="Placas - Ejemplo(AAA-001)" required>
                    <span class="fa fa-keyboard-o form-control-feedback left" aria-hidden="true"></span>
            </div>
        </div>
        <div class="col-sm-5 form-group has-feedback">
            <!-- text input -->
            <div class="form-group">

                @if($errors->first('color'))
                    <p class='text-danger'>{{$errors->first('color')}}<i class="fas fa-times-circle"></i></p>

                    @endif

                    <input type="text" class="form-control has-feedback-left" id="color" value="{{old('color')}}" name="color" placeholder="Color del camion" required>
                    <span class="fa fa-keyboard-o form-control-feedback left" aria-hidden="true"></span>
            </div>
        </div>
        <div class="col-sm-5 form-group has-feedback">
            <!-- text input -->
            <div class="form-group">

                @if($errors->first('modelo'))
                    <p class='text-danger'>{{$errors->first('modelo')}}<i class="fas fa-times-circle"></i></p>

                    @endif

                    <input type="text" class="form-control has-feedback-left" id="modelo" value="{{old('modelo')}}" name="modelo" placeholder="Modelo del camion" required>
                    <span class="fa fa-keyboard-o form-control-feedback left" aria-hidden="true"></span>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-4 form-group has-feedback">

            <div class="form-group">
                @if($errors->first('tpc'))
                    <p class='text-danger'>{{$errors->first('tpc')}}<i class="fas fa-times-circle"></i></p>
                    @endif
                    <label>Tipo de camion</label>
                    <select class="custom-select" name="tpc">
                        <option value="tracto">camion grande</option>
                        <option value="tracto">camion mediano</option>

                    </select>
            </div>
        </div>

        <div class="col-md-4">

            <label>Seguro:</label>
            <p>
                SI:
                <input type="radio" class="flat" name="seguro" id="seguro" value="si" checked="" required />
                NO:
                <input type="radio" class="flat" name="seguro" id="seguro1" value="no" />
            </p>
        </div>
    </div>
    <div class="row">

        <div class="col-md-4 form-group has-feedback">

            <div class="form-group has-feedback">
                <label>Tipo de seguro:</label>
                <p>

                    <input type="radio" class="flat" name="tps" id="tps" value="civil" checked="" required />Responsabilidad civil:<br>

                    <input type="radio" class="flat" name="tps" id="tps1" value="limitada" />Cobertura limitada:<br>
                    <input type="radio" class="flat" name="tps" id="tps1" value="amplia" />Cobertura amplia:

                </p>
            </div>
        </div>

        <div class="col-md-4">

            <label>Alarma:</label>
            <p>

                <input type="radio" class="flat" name="alarma" id="alarma" value="si" checked="" required />SI <br>

                <input type="radio" class="flat" name="alarma" id="alarma1" value="no" />NO <br>

                <input type="radio" class="flat" name="alarma" id="alarma1" value="clasica" />CLASICA
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                @if($errors->first('tpc'))
                    <p class='text-danger'>{{$errors->first('tpc')}}<i class="fas fa-times-circle"></i></p>
                    @endif
                    <label>Selecione la Agencia</label>
                    <select class="custom-select" name="agencia">
                        <option value="ford sanchez">ford</option>
                        <option value="kia">kia</option>

                    </select>
            </div>

        </div>

        <div class="col-md-4 form-group has-feedback">

            <div class="form-group has-feedback">
                <label>Imagen del camion</label>
                <input type="file"  id="file" name="imagen" multiple/>
<div id="preview"></div>
        </div>


    </div>
    </div>

    <div class="card card-dark">
          <h4 class="text-muted" align="center">DATOS DEL DUEÑO</h4>
          <hr>
        <div class="card-body">
            @csrf
            <div class="row">
                <div class="col-sm-4 form-group has-feedback">
                    <!-- text input -->
                    <div class="form-group">

                        @if($errors->first('nombre'))
                            <p class='text-danger'>{{$errors->first('nombre')}}<i class="fas fa-times-circle"></i></p>

                            @endif

                            <input type="text" class="form-control has-feedback-left" id="nombre" value="{{old('nombre')}}" name="nombre" placeholder="Nombre" required>
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="col-sm-4 form-group has-feedback">
                    <!-- text input -->
                    <div class="form-group">

                        @if($errors->first('app'))
                            <p class='text-danger'>{{$errors->first('app')}}<i class="fas fa-times-circle"></i></p>

                            @endif

                            <input type="text" class="form-control has-feedback-right" id="app" value="{{old('app')}}" name="app" placeholder="Apellido Paterno" required>
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="col-sm-4 form-group has-feedback">
                    <!-- text input -->
                    <div class="form-group">

                        @if($errors->first('apm'))
                            <p class='text-danger'>{{$errors->first('apm')}}<i class="fas fa-times-circle"></i></p>

                            @endif

                            <input type="text" class="form-control has-feedback-right" id="apm" value="{{old('apm')}}" name="apm" placeholder="Apellido Materno" required>
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="col-sm-4 form-group has-feedback">
                    <!-- text input -->
                    <div class="form-group">

                        @if($errors->first('calle'))
                            <p class='text-danger'>{{$errors->first('calle')}}<i class="fas fa-times-circle"></i></p>

                            @endif

                            <input type="text" class="form-control has-feedback-left" id="calle" value="{{old('calle')}}" name="calle" placeholder="Calle" required>
                            <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="col-sm-4 form-group has-feedback">
                    <!-- text input -->
                    <div class="form-group">

                        @if($errors->first('colonia'))
                            <p class='text-danger'>{{$errors->first('colonia')}}<i class="fas fa-times-circle"></i></p>

                            @endif

                            <input type="text" class="form-control has-feedback-left" id="colonia" value="{{old('colonia')}}" name="colonia" placeholder="Colonia" required>
                            <span class="fa fa-flag-o form-control-feedback left" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="col-sm-4 form-group has-feedback">
                    <!-- text input -->
                    <div class="form-group">

                        @if($errors->first('telefono'))
                            <p class='text-danger'>{{$errors->first('telefono')}}<i class="fas fa-times-circle"></i></p>

                            @endif

                            <input type="text" class="form-control has-feedback-left" id="telefono" value="{{old('telefono')}}" name="telefono" placeholder="Numero de contacto" required>
                            <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                    </div>
                </div>

            </div>
            <div class="row w-100 align-items-center">
                <div class="col text-center">

                    <button type="submit" class="btn btn-success btn-lg float-center"> <i class="fa fa-check"></i>
                        <span>Guardar</span></button>
                    <a href="ReporteTrans" class="btn btn-danger btn-lg float-center"><i class="fa fa-close"></i>
                        <span>Cancelar</span> </a>

                </div>
            </div>

</form>
</div>
<!-- /.card-body -->
</div>


@endsection
