<?php 
	function conexion ()
	{
		$user = "root";
		$pass = "";
		$server ="localhost";
		$basededatos ="bd";

		$con = new mysqli($server,$user,$pass,$basededatos) or die('Error al conectar a la base de dato');
		 mysqli_set_charset($con, 'utf8');

		return $con;
	}
	
?>