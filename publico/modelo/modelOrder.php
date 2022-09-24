<?php 
	include '../includes.php';
	header('Content-Type: application/json; charset=utf-8');
	 
	class ModelOrder
	{
		
		 public static function saveOrder($cliente,$date)
		 {
		 
		 	 $sql="INSERT INTO `orders`( `custumer_id`, `order_date`) VALUES ('$cliente','$date')";
		 
		 	 $conexiondb = conexion();
		 	 $retorno = $conexiondb->query($sql);
         
		 	 $conexiondb->close();

		 	 return $retorno;
		 }

         public static function maxID($cliente)
		 {
		 
		 	 $sql="SELECT  max(`order_id`)  as id FROM `orders` WHERE `custumer_id` = $cliente ";
		 
		 	 $conexiondb = conexion();
		 	 $retorno = $conexiondb->query($sql);
             $r = $retorno->fetch_assoc();
           
		 	 $conexiondb->close();

		 	 return  $r["id"];
		 }

         public static function saveOrderDetail($order,$id_product)
		 {
		 
		 	 $sql="INSERT INTO `order_details`(`order_id`,`product_id`) VALUES  ($order,$id_product) ";
		 
		 	 $conexiondb = conexion();
		 	 $retorno = $conexiondb->query($sql);           
		 	 $conexiondb->close();

		 	 return  $retorno;
		 }

		 public static function updatePrice($id_order,$price )
		 {
			 $sql = "UPDATE `orders` SET  `order_total`='$price'  WHERE `order_id`=$id_order";
			 $conexiondb = conexion();
		 	 $retorno = $conexiondb->query($sql);           
		 	 $conexiondb->close();

		 	 return  $retorno;
		 }

		 public static function getPriceOrder($id_order)
		 {
			$sql = "SELECT sum(p.product_value) as price FROM `order_details` od JOIN products p on(p.product_id=od.product_id) WHERE od.order_id = $id_order";
		 
			$conexiondb = conexion();
			$retorno = $conexiondb->query($sql);
		    $r = $retorno->fetch_assoc();
		 
			$conexiondb->close();

			return  $r["price"]; 
		}

		public static function getProductByorder($id_order)
		{
			$sql = "SELECT p.product_value,p.product_description ,od.detail_id  FROM `order_details` od JOIN products p on(p.product_id=od.product_id) WHERE od.order_id =$id_order ";
			  
			$conexiondb = conexion();
			 $retorno = $conexiondb->query($sql);
			 $array= array();
			 while ($r = $retorno->fetch_assoc()) {
                array_push($array, array("id"=> $r["detail_id"],"price"=> number_format( $r["product_value"],2,",","."),"description"=> $r["product_description"]  ));
            }
			 $conexiondb->close();
 
			 return  $array; 
		}

		public static function deleteDetailByidDetail($id_order)
		{
			 $sql = "DELETE FROM `order_details` WHERE `detail_id`=$id_order";
			 $conexiondb = conexion();
		 	 $retorno = $conexiondb->query($sql);           
		 	 $conexiondb->close();

		 	 return  $retorno;
		}

		public static function updateClientOrder($id_order,$id_client)
		{
			$sql = "UPDATE `orders` SET  `custumer_id`= '$id_client' WHERE `order_id`=$id_order";
			$conexiondb = conexion();
			$retorno = $conexiondb->query($sql);           
			$conexiondb->close();

			return  $retorno;
		}

		public static function getInfoOrder()
		{
			 $sql = "SELECT o.order_id , c.customer_name, o.order_total  ,o.order_date,o.order_date_delivery ,o.order_status FROM orders o JOIN customers c on(c.customer_id=o.custumer_id) WHERE o.order_status!='eliminado' ;";
			 $conexiondb = conexion();
			 $retorno = $conexiondb->query($sql);
			 $array= array();
			 while ($r = $retorno->fetch_assoc()) {
                array_push($array, array("id"=>$r["order_id"], "name_client"=> $r["customer_name"],"price"=> number_format( $r["order_total"],2,",","."),"date"=> $r["order_date"] ,"delivery"=> $r["order_date_delivery"],"status"=> $r["order_status"]));
            }
			 $conexiondb->close();
 
			 return  $array; 
		}

		public static function getInfoOrderByid($id)
		{
			 $sql = "SELECT  o.custumer_id   FROM orders o WHERE o.order_id  = $id   ;";
		 
			 $conexiondb = conexion();
			 $retorno = $conexiondb->query($sql);
			 $array= array();
			 while ($r = $retorno->fetch_assoc()) {
                $array = array("id"=>$r["custumer_id"] );
            }
			 $conexiondb->close();
 
			 return  $array; 
		}

		public static function orderDelete($id_order)
		{
			$sql = "UPDATE `orders` SET  `order_status`= 'eliminado' WHERE `order_id`=$id_order";
			$conexiondb = conexion();
			$retorno = $conexiondb->query($sql);           
			$conexiondb->close();

			return  $retorno;
		}

		public static function updateDelivery($id_order,$date)
		{
			$sql = "UPDATE `orders` SET  `order_status`= 'entregado',order_date_delivery='$date' WHERE `order_id`=$id_order";
			$conexiondb = conexion();
			$retorno = $conexiondb->query($sql);           
			$conexiondb->close();

			return  $retorno;
		}

    }