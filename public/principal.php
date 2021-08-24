<?php
include "../lib/config.php";
include "../lib/dataBase.php";
include "../lib/sesion.php";
$user= $_GET['msg'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name= content="Sergio Aruquipa Choque">
	<meta name="KEYWORDS" content="inicio con bootstrap">
	<meta name="description" content="pagina mejorada de inicio con bootstrap5">
	<meta name="viewport" content="width=device-widht, initial-scale=1">
	<title>PAGINA DOS - PHP-POO</title>
	<link rel="shortcut icon" type="image/x-icon" href="../img/doradito.png">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <section class="container-fluid">
    <a class="navbar-brand text-white" href="#">DPW-307 TURNO NOCHE-MAÑANA</a>
    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#colapsador1" aria-controls="colapsador1" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="colapsador1">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
        <li class="nav-item"><a class="nav-link active text-white" aria-current="page" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#">Publicidad</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Soporte</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Producto-1</a></li>
            <li><a class="dropdown-item" href="#">Producto-2</a></li>
            <li><a class="dropdown-item" href="#">Producto-2</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Otras areas</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a></li>
      </ul>
      <h2 class="d-flex text-light"><?php echo $user; ?></h2>
    </div>
  </section>
</nav>


<section class="container-fluid">
<section class="row">
<aside id="colapsador1" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
<div class="list-group">
<ul class="nav flex-column">
<center class="mb-4 mt-2"><li class="nav-item justify-content-center"><a href=""><img src="../img/logocoromata.png" alt="" width="100"></a></li>
</center>
<li class="nav-item"><a class="list-group-item  list-group-item-action" href="principal.php"><span data-feather="file"></span>IR A INICIO</a></li>
<li class="nav-item"><a class="list-group-item  list-group-item-action" href="listaUsuario.php">MOSTRAR PERSONAL</a></li>
<li class="nav-item"><a class="list-group-item  list-group-item-action" href="registrar.php">REGISTRAR USUARIOS</a></li>
<li class="nav-item"><a class="list-group-item  list-group-item-action" href="#">MOSTRAR PRODUCTOS</a></li>
<li class="nav-item"><a class="list-group-item  list-group-item-action" href="#">MOSTRAR ESTADISTICAS</a></li>
<li class="nav-item"><a class="list-group-item  list-group-item-action" href="#">MOSTRAR ACTIVOS DE LA EMPRESA</a></li>
<li class="nav-item"><a class="list-group-item  list-group-item-action font-weight-bold" href="../logout.php">SALIR DEL SISTEMA</a></li>
</ul>	
</div>
</aside>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<article class="container mt-1 bg-dark text-light">
<div class="row-featurette">
<div class="col-md-9">
<h2 class="featurette-heading">UNIDAD EDUCATIVA COROMATA BAJA</h2>
<h3 class="featurette-heading text-success">NIVELES:</h3>
<p class="lead">INICIAL-PRIMARIA-SECUNDARIA</p>
<h3 class="featurette-heading text-success">RESPONSABLE:</h3>
<p class="lead">SERGIO ARUQUIPA CHOQUE</p>	
</div>
<div class="col-lg-3 col-md-12">
<img src="../img/fondo1.jpg" alt="" class="img-fluid mt-3">	
</div>
</div>
	<hr class="featurette-divider">
</article>
	
<article class="container mb-3 bg-light">
<hr class="featurette-divider">
<div class=" row featurette">
<div class="col-md-7">
<h2 class="featurette-heading text-danger">PRESENTACION DEL<span class="text-muted">PROYECTO.</span></h2>
<h3 class="featurette-heading text-success">NOMBRE:</h3>
<p class="lead">SISTEMA WEB DE SEGUIMIENTO ACADEMICO Y GESTION ADMINISTRATIVA</p>
<h3 class="featurette-heading text-success">OBJETIVO GENERAL:</h3>
<p class="lead">Implementar un Sistema Web para el seguimiento y consulta de información académica en la Unidad Educativa “Coromata Baja”, el cual permitirá mejorar el proceso comunicacional entre los actores de la Comunidad Educativa (Tentativo).</p>	
<h3 class="featurette-heading text-danger">TIPO DE PROYECTO:</h3>
<p class="lead">PROYECTO ORIENTADO A WEB</p>
<li class="lead">ANALIZAR...</li>
<li class="lead">DISEÑAR...</li>
<li class="lead">DESARROLLAR...</li>
<li class="lead">IMPLEMENTAR...</li>
</div>
<div class="col-lg-5 col-md-12">
<img src="../img/FOTO1.jpg" alt="" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid" width="800">	
</div>
</div>
<hr class="featurette-divider">
</article>
</main>
</section>
<hr>
<footer class="blockquote-footer text-center">
<address>
	<small class="font-weight-bold text-uppercase">&copy;Todos los derechos reservados</small><br>
	<p class="lead font-weight-bold">SERGIO ARUQUIPA CHOQUE<br>LA PAZ-BOLIVIA<br>2021</p>
</address>
</footer>
</section>
	<script src="../js/bootstrap.bundle.min.js"></script>
	<script src="../js/popper.min.js"></script>
</body>
</html>