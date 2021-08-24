<?php
include "../lib/config.php";
include "../lib/sesion.php";
include "../lib/dataBase.php";

$db = new Database();
if(isset($_POST['submit'])){
$Nombre = mysqli_real_escape_string($db->link, $_POST['Nombre']);
$A_paterno = mysqli_real_escape_string($db->link, $_POST['A_paterno']);
$A_materno = mysqli_real_escape_string($db->link, $_POST['A_materno']);

$user = mysqli_real_escape_string($db->link, $_POST['user']);
$contra = mysqli_real_escape_string($db->link, $_POST['pass']);
$rol = mysqli_real_escape_string($db->link, $_POST['rol']);
$foto =(isset($_FILES['foto']['name']))?$_FILES['foto']['name']:"";
if ($Nombre =='' || $A_paterno =='' || $A_materno =='' || $user ==''|| $contra ==''|| $rol =='' || $foto =='') 
{
	header('Location:registrar.php?msg='.urlencode('DEBE LLENAR LOS CAMPOS DE MANERA CORRECTA'));
	//$error ="Los Campos No Deben Estar Vacios!!!";
}else{

    $fecha = new DateTime();
    $nomArchivo = ($foto!="")?$fecha->getTimestamp()."_".$_FILES['foto']['name']:"avatar.png";
    $tmpfoto=$_FILES['foto']['tmp_name'];
	$pass_cifrado = password_hash($contra, PASSWORD_DEFAULT); /*ENCRIPTADO CONTRASEÑA*/
	$query = "INSERT INTO tbl_login(Nombre, A_paterno, A_materno, user, password,foto, Rol_id) 
	          VALUES('$Nombre','$A_paterno','$A_materno','$user','$pass_cifrado','$nomArchivo','$rol')";
	          if($tmpfoto !=""){
	          	move_uploaded_file($tmpfoto, "../img/".$nomArchivo);
	          }
	$create = mysqli_insert_id ($db->registerUser($query, $user));
}
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
	<link rel="stylesheet"  href="../css/bootstrap.min.css">
</head>
<body>
<section class="container">
 <div class="row bg-light">
  <div class="my-2"></div>
    <div class="col-sm-12 col-md-12 col-lg-6 float-left my-5">
      <article class="" style="text-align:justify;">
	<h3 class="display-4 text-uppercase text-center  fw-bold">CURSO DPW-II, PROYECTO PRIMERA ETAPA</h3>
	<h4 class="text-uppercase text-danger  font-italic">NOMBRE DEL PROYECTO:</h4>
	<h5>SISTEMA WEB DE SEGUIMIENTO ACADEMICO Y GESTION ADMINISTRATIVA(Tentativo)</h5>
	<P class="lead text-justify text-danger font-weight-bold font-italic">OBJETIVO GENERAL: </P>
	<p class="lead text-justify font-weight-bold font-italic">Implementar un Sistema Web para el seguimiento y consulta de información académica en la Unidad Educativa “Coromata Baja”, el cual permitirá mejorar el proceso comunicacional entre los actores de la Comunidad Educativa (Tentativo).     </p>
</article>
</div>

<div  class="col-sm-12 col-md-12 col-lg-6 float-right my-2" >
<form class="bg-secondary p-3 m-5 rounded" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
	<?php
		if(isset($_GET['msg'])){
			echo "<center><div class='alert alert-danger'><span>".$_GET['msg']."</span></div></center>";
		}
		?>
		<?php
		error_reporting(E_ALL ^ E_NOTICE);
		if($_GET["error"]=="si"){
			echo '<div class="alert alert-danger" role="alert"><center><strong> Ops!- VERIFIQUE SUS DATOS</strong></center></div>';
		}
		else{ echo "";}
		?>
     <h2 class="display-5 text-center fw-bold">REGISTRAR USUARIOS</h2>
  <div class="form-group mb-3">
	<input type="text" class="form-control" placeholder="INTRODUZCA NOMBRES" name="Nombre" id="Nombre">
  </div>
  <div class="form-group mb-3">
	<input type="text" class="form-control" placeholder="INTRODUZCA APELLIDO PATERNO" name="A_paterno" id="A_paterno">
  </div>
  <div class="form-group mb-3">
	<input type="text" class="form-control" placeholder="INTRODUZCA APELLIDO MATERNO" name="A_materno" id="A_materno">
  </div>
<div class="form-group mb-3">
	     <input type="email" class="form-control" placeholder="INTRODUZCA USUARIO" name="user" id="user">
</div>

<div class="form-group">
	<input type="password" class="form-control" placeholder="INTRODUZCA CONTRASEÑA" name="pass" id="pass">
</div>

<select name="rol" id="rol" class="form-control mt-3">
<option value="">-SELECCIONAR LOS ROLES DEL NUEVO USUARIO-</option>
<option value="1">ADMINISTRADOR</option>
<option value="2">COLABORADOR</option>
<option value="3">INVITADO</option>
</select>
<div class="input-group mb-3">
<input type="file"  accept ="image/*" name="foto" id="foto" class="form-control mt-3">
</div>
    <div class="my-4">
	<label class="custom-control custom-checkbox">
	<input type="checkbox" class="custom-control-input">
	<span class="custom-control-indicator"></span>
	<span class="custom-control-description text-dark"> RECORDAR CONTRASEÑA EN ESTA COMPUTADORA</span>
	 </label>
</div>
<div class="form-group d-grid gap-2 mb-3">
<button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg">GUARDAR DATOS</button>
<span><a class="btn btn-warning btn-block btn-lg d-grid gap-2" href="registrar.php">LIMPIAR DATOS</a></span>
<span><a class="btn btn-danger btn-block btn-lg d-grid gap-2" href="../logout.php">SALIR DE SISTEMA</a></span>		
</div>
</form>
</div>
</div>
</section>
    <script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap.bundle.min.js"></script>
	<script src="../js/popper.min.js"></script>
</body>
</html>