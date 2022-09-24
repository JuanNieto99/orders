<?php 
	include '../includes.php';
	header('Content-Type: application/json; charset=utf-8');
	 
	class ModelCustomer
	{
		
		 public static function getCustomer()
		 {
            $sql = "SELECT c.customer_id, c.`customer_id_number`, c.`customer_name`, c.`customer_birth_date`, c.`costomer_phone`,  ci.city_name as city FROM  `customers` c JOIN cities ci on (c.city_id=ci.city_id) WHERE c.estado ='create' ";
            $conexiondb = conexion();
            $retorno = $conexiondb->query($sql);
           $array = array(); 

            while ($r = $retorno->fetch_assoc()) {
                array_push($array, array("id"=> $r["customer_id"],'number' =>$r["customer_id_number"],'name' =>$r["customer_name"],'birth_date' =>$r["customer_birth_date"],'phone' =>$r["costomer_phone"],'city' =>$r["city"]));
            }
            $conexiondb->close();

            return $array;
         }

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

         public static function createCustomer($name,$number,$birth_day,$phone,$city)
		 {
			$sql = "INSERT INTO `customers`(  `customer_id_number`, `customer_name`, `customer_birth_date`, `costomer_phone`, `city_id`) VALUES  ('$number','$name','$birth_day','$phone','$city')";
 
			$conexiondb = conexion();
			$retorno = $conexiondb->query($sql);
			$conexiondb->close();

			return $retorno;
		 }

		 public static function updateCustomer($name,$number,$birth_day,$phone,$city,$id)
		 {
			 $sql = "UPDATE `customers` SET  `customer_id_number`='$number',`customer_name`='$name',`customer_birth_date`='$birth_day',`costomer_phone`='$phone',`city_id`='$city' WHERE `customer_id`= $id";
 
			 $conexiondb = conexion();
			 $retorno = $conexiondb->query($sql);
			 $conexiondb->close();
 
			 return $retorno;
		
		}

		public static function getCoustomer($id)
		{
		
			 $sql="SELECT   `customer_id_number`, `customer_name`, `customer_birth_date`, `costomer_phone`, `city_id` FROM `customers` WHERE `customer_id` = $id";
		
			 $conexiondb = conexion();
			 $retorno = $conexiondb->query($sql);
			$array = array(); 

			 while ($r = $retorno->fetch_assoc()) {
				 $array = array( "number"=> $r["customer_id_number"],'name' =>$r["customer_name"],'birthday' =>$r["customer_birth_date"],"phone"=>$r["costomer_phone"],"city_id"=>Encryptar::encrypt_($r["city_id"]));
			 }
			 $conexiondb->close();

			 return $array;
		}
		 
		public static function deleteCustomer($id)
		{
			$sql = "UPDATE `customers` SET  `estado`='eliminado' WHERE `customer_id` = $id";
			$conexiondb = conexion();
			$retorno = $conexiondb->query($sql);
			return $retorno; 
		}
 
	 }
 ?>