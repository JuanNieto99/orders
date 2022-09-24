<?php 
	
 

	 function consultar_datos_producto(){
	 	$conexion = conexion();
	 	$sql = "SELECT `product_id`,`product_description` FROM `products` WHERE `product_status`='creado'" ;
	 	$data = $conexion->query($sql);
		$option = "";
		while ($consu = $data->fetch_assoc()) {
			$option .= "<option value='".Encryptar::encrypt_($consu["product_id"])."' >".$consu["product_description"]."</option>";
		}
		$conexion->close();

		return $option  ;
	 }

	 function consultar_datos_cliente(){
		$conexion = conexion();
		$sql = "SELECT `customer_id`,`customer_name` FROM `customers` WHERE `estado`='create' " ;
		$data = $conexion->query($sql);
	   $option = "";
	   while ($consu = $data->fetch_assoc()) {
		   $option .= "<option value='".Encryptar::encrypt_($consu["customer_id"])."' >".$consu["customer_name"]."</option>";
	   }
	   $conexion->close();

	   return $option  ;
	}

   function getCity()
	{
	
		$sql="SELECT `city_id`, `city_name`  FROM `cities`  WHERE `city_estado`='create'";
	
		$conexiondb = conexion();
		$retorno = $conexiondb->query($sql);
	 
		$option="";
		 while ($r = $retorno->fetch_assoc()) {
			$option .= "<option value='".Encryptar::encrypt_($r["city_id"])."' >".$r["city_name"]."</option>";

		 }
		 $conexiondb->close();

		 return $option;
	}

 ?>