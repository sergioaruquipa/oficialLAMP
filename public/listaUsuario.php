<?php
include "../lib/config.php";
include "../lib/dataBase.php";
include "../lib/sesion.php";
//$user= $_GET['msg'];
?>
<?php
			$db = new Database();
			$query="SELECT * FROM tbl_login";
			$read=$db->select($query);
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
<li class="nav-item"><a class="list-group-item  list-group-item-action" href="principal.php?msg=<?php echo urldecode($user);?>"><span data-feather="file"></span>IR A INICIO</a></li>
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
<article class="container mt-1">
<?php
if(isset($_GET['msg1'])){
	echo "<div class='alert-success fw-bold fs-5 text-end'><span>".$_GET['msg1']."</span></div>";
}?>
<h3 class="display-4" text-center text-uppercase text-success mb-3> Lista de Usuarios</h3>
<table id="tabla_dinamica" class="table table-hover">
	<thead class="thead-drak">
	<tr>
	<th scope="col">Id_Unico</th>
	<th scope="col">Nombres</th>
	<th scope="col">Apaterno</th>
    <th scope="col">Amaterno</th>
	<th scope="col">Correo</th>
	<th scope="col">Cargo</th>
	<th scope="col">Fecha_Creacion</th>
  <th scope="col">Foto</th>
	<th scope="col">Accion</th>
    </tr>	
	</thead>
	<tbody>

		<?php foreach ($read as $row) {?>
<tr>
    <td><?php echo $row ['id_login'];?></td>
    <td><?php echo $row ['Nombre'];?></td>
    <td><?php echo $row ['A_paterno'];?></td>
    <td><?php echo $row ['A_materno'];?></td>
    <td><?php echo $row ['user'];?></td>
    <td><?php echo $row ['Rol_id'];?></td>
    <td><?php echo $row ['Fecha_creacion'];?></td>
    <?php if($row['foto']){?>
     <td> <img class="img-thumbnail" width="100" src="../img/<?php echo $row ['foto']; ?>"></td>
     <td><a href="updateUsuario.php?id_login= <?php echo urlencode($row['id_login']);?>" class="btn btn-primary btn-sm">EDITAR</a></td>
    <?php }else{
      ?><td> <img class="img-thumbnail" width="100" src="../img/avatar.png"></td>
      <td><a href="updateUsuario.php?id_login=<?php echo urlencode($row['id_login']);?>" class="btn btn-primary btn-sm">EDITAR</a></td>
</tr>
<?php }
}?>
</tbody>
</table>


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