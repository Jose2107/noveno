@extends('layouts/index');

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

@section('Content')
<form class="was-validated" action="/clientes" method="POST">
 @csrf
<div class="card">
  <div class="card-header text-white bg-warning mb-3">
  <h4><b><center>NUEVO CLIENTE</center></b></h4>
  </div>
  <div class="card-body">
        <div class="row">
            <div class="col-6">
                <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-person-fill"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nombre(s)"  aria-describedby="addon-wrapping" id="nombre" name="nombre" pattern="[A-Za-záéíóú ]+[A-Za-záéíóú ]" required>  
                </div>
                
            </div>

            <div class="col-6">
                <div class="input-group flex-nowrap">
                <input type="text" class="form-control" placeholder="Apellido Paterno"  aria-describedby="addon-wrapping" id="app" name="app" pattern="[A-Za-záéíóú ]+[A-Za-záéíóú ]" required>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-person-fill"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-person-fill"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Apellido Materno" aria-describedby="addon-wrapping" id="apm" name="apm" pattern="[A-Za-záéíóú ]+[A-Za-záéíóú ]" required>   
                </div>
            </div>

            <div class="col-6">
                <div class="input-group flex-nowrap">
                <input type="email" class="form-control" placeholder="Correo Electrónico" aria-describedby="addon-wrapping" id="correo" name="correo" pattern="^[A-Za-z0-9.!#$%&´*/=]+@[A-Za-z0-9]+(?:\.[A-Za-z0-9-]+)*$" required>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-envelope-open-fill"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-telephone-fill"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Teléfono" aria-describedby="addon-wrapping" id="telefono" name="telefono" pattern="[0-9]{10}" required>
                </div>
            </div>

            <div class="col-6">
                <div class="input-group flex-nowrap">
                <input type="text" class="form-control" placeholder="Calle" aria-describedby="addon-wrapping" id="calle" name="calle" pattern="[A-Za-z0-9áéíóú ]+[A-Za-z0-9áéíóú ]"  required>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-cursor-fill"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-geo-alt-fill"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Colonia" aria-describedby="addon-wrapping" id="colonia" name="colonia" pattern="[A-Za-z0-9áéíóú ]+[A-Za-z0-9áéíóú ]"  required>
                </div>
            </div>

            <div class="col-6">
                <div class="input-group flex-nowrap">
                <input type="text" class="form-control" placeholder="No.Exterior" aria-describedby="addon-wrapping" id="num_e" name="num_e" pattern="[0-9]{3}" required>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-sort-numeric-up"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-sort-numeric-up"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="No.Interior" aria-describedby="addon-wrapping" id="num_i" name="num_i" pattern="[0-9]{3}" required>
                </div>
            </div>

            <div class="col-6">
                <div class="input-group flex-nowrap">
                <input type="text" class="form-control" placeholder="Código Postal" aria-describedby="addon-wrapping" id="cp" name="cp" pattern="[0-9]{5}" required>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-map-fill"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <label class="input-group-text" for="inputGroupSelect02"><b>Género</b></label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" id="genero" name="genero" required>
                        <option  selected value="1">Masculino</option>
                        <option value="2">Femenino</option>
                    </select>
                    
                </div>
            </div>

            <div class="col-6">
                <div class="input-group mb-3">
                    <select class="custom-select" id="inputGroupSelect02" id="municipio" name="municipio" required>
                        <option  selected value="1">Aculco</option>
                        <option value="2">Amanalco</option>
                        <option value="3">Atenco</option>
                        <option value="4">Capulhuac</option>
                        <option value="5">Chapultepec</option>
                        <option value="6">Chimalhuacan</option>
                        <option value="7">Metepec</option>
                        <option value="8">Nezahualcóyotl</option>
                        <option value="9">Ocoyoacac</option>
                        <option value="10">Otzolotepec</option>
                        <option value="11">Rayón</option>
                        <option value="12">Sultepec</option>
                        <option value="13">Tecámac</option>
                        <option value="14">Tenancingo</option>
                        <option value="15">Zumpango</option>
                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="inputGroupSelect02"><b>Municipio</b></label>
                    </div>
                </div>
            </div>
    </div>
    
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-success btn-lg"><i class="bi bi-save-fill"></i> Guardar</button>        
    <a href="/clientes" class="btn btn-danger btn-lg"><i class="bi bi-x-square-fill"></i> Cancelar</a>
</div>
</form>

@endsection