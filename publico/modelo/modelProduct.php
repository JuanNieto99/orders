 
<?php 
	include '../includes.php';
	header('Content-Type: application/json; charset=utf-8');
	 
	class ModelProduct
	{
		
		 public static function getProduct()
		 {
            $sql = "SELECT `product_id`,`product_description`,`product_amount`,`product_value` FROM `products` WHERE `product_status`='creado'  ";
            $conexiondb = conexion();
            $retorno = $conexiondb->query($sql);
            $array = array(); 

            while ($r = $retorno->fetch_assoc()) {
                array_push($array, array("id"=> $r["product_id"],'name' =>$r["product_description"],'amount' =>$r["product_amount"],'value' =>$r["product_value"]));
            }
            $conexiondb->close();

            return $array;
         }

         public static function createProduct($price,$cantidad,$descripton)
         {
             $sql = "INSERT INTO `products`(  `product_description`, `product_amount`, `product_value` ) VALUES  ('$descripton','$cantidad','$price')";
             $conexiondb = conexion();
             $retorno = $conexiondb->query($sql);
             $conexiondb->close();
             return $retorno;
         }

         public static function getProductByid($id)
         {
            $sql = " SELECT `product_id`, `product_description`, `product_amount`, `product_value` FROM `products` WHERE `product_id` =$id";
            $conexiondb = conexion();
            $retorno = $conexiondb->query($sql);
            $array = array(); 
            while ($r = $retorno->fetch_assoc()) {
                 $array = array("id"=> $r["product_id"],'name' =>$r["product_description"],'amount' =>$r["product_amount"],'value' =>$r["product_value"]);
            }
            $conexiondb->close();

            return $array;
  
         }

         public static function modifiProduct($id,$price,$cantidad ,$description)
         {
            $sql = "UPDATE `products` SET  `product_description`='$description',`product_amount`='$cantidad',`product_value`='$price'  WHERE `product_id` =$id";
            $conexiondb = conexion();
            $retorno = $conexiondb->query($sql);
            $conexiondb->close();
            return $retorno;
         }

         public static function updateProduct($id)
         {
            $sql = "UPDATE `products` SET  `product_status`='eliminado' WHERE `product_id` =$id";
            $conexiondb = conexion();
            $retorno = $conexiondb->query($sql);
            $conexiondb->close();
            return $retorno;
         }
 
 
	 }
 ?>