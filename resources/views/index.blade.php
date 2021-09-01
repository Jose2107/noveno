@extends('layouts.index')
@section('Content')

<div class="container py-3">
  <!-- Card Start -->
  <div class="card">
    <div class="row ">
      <div class="col-md-5 px-3">
        <div class="card-block px-6">
          <h1 class="card-title">Nuestros Valores</h1>
          <ul style= "list-style-type: circle">
            <li><h6><p class="card-text">
              Trabajo honesto y profesional.
            </p></h6></li>
            <li><h6><p class="card-text">
              Crecimiento y mejora continua en base a dos pilares: innovación y creatividad.
            </p></h6></li>
            <li><h6><p class="card-text">
              Compromiso con el éxito de nuestros clientes, prestando especial atención a sus requerimientos específicos.
            </p></h6></li>
            <li><h6><p class="card-text">
              Orientación de los objetivos individuales de nuestra gente en el marco de los objetivos globales de la organización.
            </p></h6></li>
            <li><h6><p class="card-text">
              Respeto por la sociedad y el medio ambiente de cada país donde actuamos.
            </p></h6></li>
        </ul>
        </div>
      </div>
      <!-- Carousel start -->
      <div class="col-md-7">
        <div id="CarouselTest" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#CarouselTest" data-slide-to="0" class="active"></li>
            <li data-target="#CarouselTest" data-slide-to="1"></li>
            <li data-target="#CarouselTest" data-slide-to="2"></li>
            <li data-target="#CarouselTest" data-slide-to="3"></li>

          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block" src="http://www.inycom.es/sites/default/files/compromiso-empresa-inycom.png" alt="">
            </div>
            <div class="carousel-item">
              <img class="d-block" src="https://www.inycom.es/sites/default/files/compromiso-social-inycom.png" alt="">
            </div>
            <div class="carousel-item">
              <img class="d-block" src="https://www.inycom.es/sites/default/files/mejora-continua-inycom_0.png" alt="">
            </div>
            <div class="carousel-item">
              <img class="d-block" src="https://www.inycom.es/sites/default/files/profesionalidad-inycom_0.png" alt="">
            </div>
            <a class="carousel-control-prev" href="#CarouselTest" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
            <a class="carousel-control-next" href="#CarouselTest" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
          </div>
        </div>
      </div>
      <!-- End of carousel -->
    </div>
  </div>
  <!-- End of card -->

</div>

<div class="container">
  <div class="card float-left">
    <div class="row ">

      <div class="col-sm-5">
        <div class="card-block">
          <!--           <h4 class="card-title">Small card</h4> -->
          <h4>MISIÓN:</h4>
          <h6><p>Brindar un servicio de transporte de carga pesada y logística a nivel nacional
             satisfaciendo plenamente en tiempo y forma los requerimientos de nuestros
            clientes garantizando... </p></h6>
          <a href="#" id="mision" class="btn btn-primary btn-sm">Leer más</a>
        </div>
      </div>

      <div class="col-sm-7">
        <img class="d-block w-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_i-cSjfKvjDsG5OtSZNUGfPV-XztvUfoILg&usqp=CAU" alt="">
      </div>
    </div>
  </div>

 
    <div class="card float-right">
      <div class="row">
        <div class="col-sm-5">
          <img class="d-block w-100" src="https://www.zenuradio.com/wp-content/uploads/2018/03/vision-empresarial.jpg" alt="">
        </div>
        <div class="col-sm-7">
          <div class="card-block">
            <!--           <h4 class="card-title">Small card</h4> -->
            <h4>VISIÓN:</h4>
          <h6><p> Ser la empresa LIDER en el transporte de carga pesada, consolidarnos en el mercado
             mexicano y expandirnos a nivel nacional como... </p></h6>
            <br>
            <a href="#" id="vis" class="btn btn-primary btn-sm">Leer más</a>
          </div>
        </div>
 
      </div>
    </div>
  </div>
 
 <br>
<br>

<!-- Alerts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>

<script>

let p = document.getElementById("mision"); // Encuentra el elemento "p" en el sitio
  p.onclick = muestraAlerta; // Agrega función onclick al elemento

  function muestraAlerta(evento) {
    Swal.fire({
  title: 'Sweet!',
  text: 'Brindar un servicio de transporte de carga pesada y logística a nivel nacional satisfaciendo plenamente en tiempo y forma los requerimientos de nuestros clientes garantizando un servicio que destaque por la seguridad, puntualidad y calidad, con respaldo de tecnología adecuada, personal calificado y competitivo, quienes cuentan con nuestro apoyo para su formación ética y profesional; respetando el medio ambiente de las comunidades por donde operamos.',
  imageUrl: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4h-lFMC2YoNnOte6AiQ0-40YdMEE958BEWA&usqp=CAU',
  imageWidth: 400,
  imageHeight: 200,
  imageAlt: 'Custom image',
})
  }

</script>

<script>

  let p = document.getElementById("vis"); // Encuentra el elemento "p" en el sitio
    p.onclick = muestraAlerta; // Agrega función onclick al elemento
  
    function muestraAlerta(evento) {
      Swal.fire({
    title: 'Sweet!',
    text: 'Ser la empresa LIDER en el transporte de carga pesada, consolidarnos en el mercado mexicano y expandirnos a nivel nacional como una empresa de calidad que brinda sus servicios con excelencia, eficiencia y seguridad, acorde con el cambio de la tecnología y comprometiéndonos con el medio ambiente, servicio al cliente y la formación integral de sus colaboradores.',
    imageUrl: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQOqsbSUGu50WE_UmV4WI2xt6cGqvnG4vFeiQMHi6UkFVvicBgE5uiDYWiVayHBhXxCgdg&usqp=CAU',
    imageWidth: 400,
    imageHeight: 200,
    imageAlt: 'Custom image',
  })
    }
  
  </script>


@endsection