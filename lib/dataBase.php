<?php
class DataBase
{
	public $host=DB_HOST;
	public $user=DB_USER;
	public $pass=DB_PASS;
	public $dbname=DB_NAME;

	public $link;
	public $error;

	public function __construct()
	{

		$this->connectDB();
	}
	//INSTANCIANDO LA CONEXION CON LA BASE DE DATOS
	private function connectDB()
	{
		$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		if(!$this->link)
		{
			$this->error = "Conexion Fallida".$this->link->connect_error;
			return false;
		}
	}
	//SELECCCIONAR O LEERLA BASE DE DATOS
	public function select($query)
	{
		$result=$this->link->query($query) or die ($this->link->error.__LINE__);
		if($result->num_rows > 0)
		{
			return $result;
		}
		else{
			return false;
		}
	}
	
	public function signIn($query,$user)
	{
        $sign_row = $this->link->query($query) or die ($this->link->error.__LINE__);
        if($sign_row){
        	header("Location:../public/principal.php?msg=".urlencode('Datos Correctos-Bienvenidos!!!!'.$user));
        	exit();
        }
        else
        {
        	die("Error:(".$this->link->errno.")".$this->link-error);
        }
	}
	public function registerUser($query)
	{
        $sign_row = $this->link->query($query) or die ($this->link->error.__LINE__);
        if($sign_row){
        	header("Location:../public/listaUsuario.php?msg=".urlencode('Datos Registrados Correctamente!!!!'));
        	exit();
        }
        else
        {
        	die("Error:(".$this->link->errno.")".$this->link-error);
        }
	}
	public function updateUser($query)
	{
        $update_row = $this->link->query($query) or die ($this->link->error.__LINE__);
        if($update_row){
        	header("Location:../public/listaUsuario.php?msg1=".urlencode('Los Datos Registrados Han Sido Actualizados Correctamente!!!!'));
        	exit();
        }
        else
        {
        	die("Error:(".$this->link->errno.")".$this->link-error);
        }
	}
    public function deleteUser($query)
	{
        $delete_row = $this->link->query($query) or die ($this->link->error.__LINE__);
        if($delete_row){
        	header("Location:../public/listaUsuario.php?msg1=".urlencode('Datos Eliminados Exitosamente!!!!'));
        	exit();
        }
        else
        {
        	die("Error:(".$this->link->errno.")".$this->link-error);
        }
	}

	}
?>
