<?php 
	include '../includes.php';
	header('Content-Type: application/json; charset=utf-8');
	 
	class ModelCity
	{
		
		 public static function getCity()
		 {
		 
		 	 $sql="SELECT `city_id`, `city_name`  FROM `cities`  WHERE `city_estado`='create'";
		 
		 	 $conexiondb = conexion();
		 	 $retorno = $conexiondb->query($sql);
             $array = array(); 
 
              while ($r = $retorno->fetch_assoc()) {
                  array_push($array, array("id"=> $r["city_id"],'name' =>$r["city_name"]));
              }
		 	 $conexiondb->close();

		 	 return $array;
		 }

		 public static function createCity($name)
		 {
			$sql = "INSERT INTO `cities`(`city_name` ) VALUES ('$name')";
			$conexiondb = conexion();
			$retorno = $conexiondb->query($sql);
			$conexiondb->close();

			return $retorno;
		 }

		 public static function getCityByid($id)
		 {
		 
		 	 $sql="SELECT `city_name`  FROM `cities`  WHERE `city_estado`='create' AND city_id =  $id";
		 
		 	 $conexiondb = conexion();
		 	 $retorno = $conexiondb->query($sql);
             $array = array(); 
 
              while ($r = $retorno->fetch_assoc()) {
				$array = array("id"=> $id,'name' =>$r["city_name"]);
              }
		 	 $conexiondb->close();

		 	 return $array;
		 }

		 public static function deleteCity($id)
		 {
			$sql = "UPDATE `cities` SET  `city_estado`='eliminado' WHERE `city_id` = $id";
			$conexiondb = conexion();
			$retorno = $conexiondb->query($sql);
			$conexiondb->close();

			return $retorno;
		 }
		 public static function modifiCity($id,$name)
		 {
			$sql = "UPDATE `cities` SET `city_name`='$name' WHERE `city_id` = $id";
			$conexiondb = conexion();
			$retorno = $conexiondb->query($sql);
			$conexiondb->close();

			return $retorno;
		 }
 
	 }
 ?>