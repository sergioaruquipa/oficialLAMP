<?php
include "../lib/config.php";
include "../lib/sesion.php";
include "../lib/dataBase.php";
//$user= $_GET['msg'];
$id= $_GET['id_login'];
$db = new Database();
$query = "SELECT * FROM tbl_login WHERE id_login = $id";
$getData = $db->select($query)->fetch_assoc();

if (isset($_POST['submit'])) {
$Nombre = mysqli_real_escape_string($db->link, $_POST['Nombre']);
$A_paterno = mysqli_real_escape_string($db->link, $_POST['A_paterno']);
$A_materno = mysqli_real_escape_string($db->link, $_POST['A_materno']);

$user = mysqli_real_escape_string($db->link, $_POST['user']);
$pass = mysqli_real_escape_string($db->link, $_POST['pass']);
$rol = mysqli_real_escape_string($db->link, $_POST['rol_id']);
if ($Nombre =='' || $A_paterno =='' || $A_materno =='' || $user ==''|| $pass ==''|| $rol =='') 
{
		 $error = "LOS CAMPOS NO DEBEN ESTAR VACIOS!!!";
		} 
		else 
		{
	$query = "UPDATE tbl_login 
	          SET 
	           Nombre='$Nombre',
	           A_paterno='$A_paterno',
	           A_materno='$A_materno',
	           user='$user',
	           password='$pass',
	           Rol_id='$rol'
              WHERE id_login = '$id'";
            $update = $db->updateUser($query,$user);
		}
	}
 
if(isset($_POST['delete'])){
	$query="DELETE FROM tbl_login WHERE id_login=$id";
	$deleteData=$db->deleteUser($query);
}
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
<article class="container mt-1">
<!--============OTRO=====================-->

<form action="updateUsuario.php?id_login=<?php echo $id;?>" method="POST" class="col-lg-6">
<?php
if(isset($error)){ 
echo"<center>div class='alert alert-danger'><span>".$error."</span></div></center>";
}
?>
<h2 class="display-6 text-danger fw-bold text-uppercase mb-5"><center>ACTUALIZAR DATOS</center></h2>
<div class="mb-3">
	<input type="text" class="form-control text-primary" placeholder="Registrar Nombre" name="Nombre" id="Nombre" value <?php echo $getData['Nombre']?>"> 
</div>
<div class="mb-3">
	<input type="text" class="form-control text-primary" placeholder="Registrar Apellido Paterno" name="A_paterno" id="A_paterno" value <?php echo $getData['A_paterno']?>"> 
</div>
<div class="mb-3">
	<input type="text" class="form-control text-primary" placeholder="Registrar Apellido Materno" name="A_materno" id="A_materno" value <?php echo $getData['A_materno']?>"> 
</div>
<div class="mb-3">
	<input type="text" class="form-control text-primary" placeholder="Registrar Nuevo Usuario" name="user" id="user" value <?php echo $getData['user']?>"> 
</div>
<div class="mb-3">
	<input type="password" class="form-control" placeholder="Registrar Una Nueva Contraseña" name="pass" id="pass" value=""> 
</div>
<select name="rol_id" id="rol_id" class="form-control mb-5 text-primary">
     <option value="<?php echo $getData['Rol_id']?>" selected> <?php echo $getData['Rol_id']?></option>
     <option value="1">ADMINISTRADOR</option>
     <option value="2">COLABORADOR</option>
     <option value="3">INVITADO</option>
</select>

<div class="mb-3">
   	<center>
   	  <button type="submit" name="submit" id="submit" class="btn btn-primary">GUARDAR</button>
      <button type="submit" name="delete" id="delete" value="Delete" class="btn btn-danger">ELIMINAR</button>
   		<a href="listaUsuario.php" class="btn btn-info">CANCELAR</a>   		
   	</center>
   </div>
   </form>

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