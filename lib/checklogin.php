<?php
include ('config.php');
include ('dataBase.php');


$db = new DataBase();
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD']=='POST') {
	$user = mysqli_real_escape_string($db->link, $_POST['user']);
	$pass = mysqli_real_escape_string($db->link, $_POST['pass']);
	if (empty($user) || empty($pass)) {
		header('Location:../index.php?msg='.urlencode('DEBE LLENAR LOS CAMPOS DE MANERA CORRECTA'));
}
else{
		$query = "SELECT * FROM tbl_login  WHERE user='$user'";
		$result = $db->select($query);
		if(mysqli_num_rows($result)){
			while($row=mysqli_fetch_array($result)){
				
				if(password_verify($pass,$row['password'])){
					session_start();
					$_SESSION['user_sesion'] = $user;
					$_SESSION['pass_sesion'] = $pass;
					$login = $db->signIn($query,$_SESSION['user_sesion']);
				}
			    
			else{
				header("Location:../index.php?error=si");
			}
		}
	}else{
		header("Location:../index.php?error=si");
	}
}
}
?>
