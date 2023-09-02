<?php 
    session_start();
    include('header.php')
?>

<article class="first">
<section class="main-font container d-flex justify-content-center pt-2">
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicadores -->
    <ol class="carousel-indicators">
        <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
        <li data-bs-target="#myCarousel" data-bs-slide-to="3"></li>
        <li data-bs-target="#myCarousel" data-bs-slide-to="4"></li>
        <li data-bs-target="#myCarousel" data-bs-slide-to="5"></li>
        <li data-bs-target="#myCarousel" data-bs-slide-to="6"></li>
    </ol>

    <!-- Slides -->
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="img/trabajos realizados/corte5.jpg" class="img-fluid" alt="corte 1">
        </div>
        <div class="carousel-item d-flex justify-content-center">
        <img src="img/trabajos realizados/corte6.jpg" class="img-fluid" alt="Imagen 2">
        </div>
        <div class="carousel-item ">
        <img src="img/trabajos realizados/corte8.jpeg" class="img-fluid" alt="Imagen 3">
        </div>
        <div class="carousel-item ">
        <img src="img/trabajos realizados/corte1.jpeg" class="img-fluid" alt="Imagen 4">
        </div>
        <div class="carousel-item ">
        <img src="img/trabajos realizados/corte3.jpeg" class="img-fluid" alt="Imagen 5">
        </div>
        <div class="carousel-item ">
        <img src="img/trabajos realizados/corte4.jpeg" class="img-fluid" alt="Imagen 6">
        </div>
        <div class="carousel-item ">
        <img src="img/trabajos realizados/corte7.jpeg" class="img-fluid" alt="Imagen 7">
        </div>
    </div>

    <!-- Controles -->
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </a>
</section>
</article>


<?php include('footer.php');?>