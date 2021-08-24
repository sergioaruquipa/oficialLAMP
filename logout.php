<?php
session_start();     //INICIA UNA NUEVA SESIONO REANUDA LA EXISTENTE
session_destroy();   //DEWSTRUYE TODA LA INFORMACION REGISTRADA DE UNA SESION
header("Location:index.php"); //REDIRECCIONA A LA PAGINA DE INCIO
exit(); 
?>