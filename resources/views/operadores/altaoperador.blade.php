@extends('layouts.index')

@section('Content')
<form action="{{route('guardaroperador')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h1 class="card-title"><center>Registro de operadores</center></h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-row">
                <div class="form-group col-md-3">
                        <label for="idoperador">Clave del operador
                        </label>
                        <input type="number" class="form-control" name="idoperador" id="idoperador" value="{{$idlsigue}}" readonly="readonly">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="nombre">Nombre
                      @if($errors->first('nombre'))
                      <p class='text-danger'>{{$errors->first('nombre')}}</p>
                      @endif
                    </label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{old('nombre')}}" placeholder="Nombre">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="apellidop">Apellido
                    @if($errors->first('apellidop'))
                      <p class='text-danger'>{{$errors->first('apellidop')}}</p>
                      @endif
                    </label>
                    <input type="text" class="form-control" name="apellidop" id="apellidop" value="{{old('apellidop')}}" placeholder="Apellido paterno">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="apellidom">Apellido
                    @if($errors->first('apellidom'))
                      <p class='text-danger'>{{$errors->first('apellidom')}}</p>
                      @endif
                    </label>
                    <input type="text" class="form-control" name="apellidom" id="apellidom" value="{{old('apellidom')}}" placeholder="Apellido materno">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                  <label for="telefono">Telefono
                    @if($errors->first('telefono'))
                      <p class='text-danger'>{{$errors->first('telefono')}}</p>
                      @endif
                    </label>
                    <input type="text" class="form-control" name="telefono" id="telefono" value="{{old('telefono')}}" placeholder="7221632863">
                  </div>
                    <div class="form-group col-md-4">
                        <label for="email">Email
                            @if($errors->first('email'))
                                <p class='text-danger'>{{$errors->first('email')}}</p>
                            @endif
                        </label>
                        <input type="text" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="Correo electrónico">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Genero:</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="genero1" name="genero" value="Mujer" class="custom-control-input" checked>
                            <label class="custom-control-label" for="genero1">M</label>
                        </div>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="genero2" name="genero" value="Hombre" class="custom-control-input">
                        <label class="custom-control-label" for="genero2">H</label>
                      </div>
                  </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="calle">Calle
                            @if($errors->first('calle'))
                                <p class='text-danger'>{{$errors->first('calle')}}</p>
                            @endif
                        </label>
                        <input type="text" class="form-control" name="calle" id="calle" value="{{old('calle')}}" placeholder="Calle">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="colonia">Colonia
                            @if($errors->first('colonia'))
                                <p class='text-danger'>{{$errors->first('colonia')}}</p>
                            @endif
                        </label>
                        <input type="text" class="form-control" name="colonia" id="colonia" value="{{old('colonia')}}" placeholder="Colonia">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="idmunicipio">Municipio:</label>
                        <select name="idmunicipio" id="idmunicipio" class="form-control">
                            <option selected="">Elige tu colonia</option>
                            @foreach($municipios as $muni)
                                <option value="{{$muni->idmunicipio}}">{{$muni->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="noexterior">No. exterior
                            @if($errors->first('noexterior'))
                                <p class='text-danger'>{{$errors->first('noexterior')}}</p>
                            @endif
                        </label>
                        <input type="text" class="form-control" name="noexterior" id="noexterior" value="{{old('noexterior')}}" placeholder="No. exterior">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nointerior">No. interior
                            @if($errors->first('nointerior'))
                                <p class='text-danger'>{{$errors->first('nointerior')}}</p>
                            @endif
                        </label>
                        <input type="text" class="form-control" name="nointerior" id="nointerior" value="{{old('nointerior')}}" placeholder="No. interior">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cp">C.P.
                            @if($errors->first('cp'))
                                <p class='text-danger'>{{$errors->first('cp')}}</p>
                            @endif
                        </label>
                        <input type="text" class="form-control" name="cp" id="cp" value="{{old('cp')}}" placeholder="Código postal">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="maneja">Licencia de conducir activa:</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="maneja1" name="maneja" value="Si" class="custom-control-input" checked>
                            <label class="custom-control-label" for="maneja1">Si</label>
                        </div>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="maneja2" name="maneja" value="No" class="custom-control-input">
                        <label class="custom-control-label" for="maneja2">No</label>
                      </div>
                  </div>
                    <div class="form-group col-md-4">
                        <label for="conduce">Conduce:</label>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="conduce1" name="conduce" value="Remolque" class="custom-control-input" checked>
                          <label class="custom-control-label" for="conduce1">Remolque</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="conduce2" name="conduce" value="Torton" class="custom-control-input">
                          <label class="custom-control-label" for="conduce2">Tortón</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="conduce3" name="conduce" value="CamionR" class="custom-control-input">
                          <label class="custom-control-label" for="conduce3">Camión rigido</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="conduce4" name="conduce" value="Trailer" class="custom-control-input">
                          <label class="custom-control-label" for="conduce4">Trailer</label>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="foto">Foto:
                            @if($errors->first('foto'))
                                <p class='text-danger'>{{$errors->first('foto')}}</p>
                            @endif
                        </label>
                        <input type="file" class="form-control" name="foto" id="foto">
                    </div>
                </div>
                <div class="row">
                  <div class="col-xs-6 col-md-6"><input type="submit" value="Guardar" class="btn btn-primary start btn-block btn-lg" tabindex="7"
                    title="Guardar datos ingresados">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</form>
    
@endsection