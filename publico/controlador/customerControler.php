<?php 
	include '../modelo/modelCustomer.php'; 
 
	empty($_POST["case"])?$case=NULL:$case=$_POST["case"];
	if ($case==NULL) {
		empty($_GET["case"])?$case=NULL:$case=$_GET["case"];
	}
	$retorno = array();
	switch ($case) {
			case 'list_customer':
 
			$lista = ModelCustomer::getCustomer();
	 		 for ($i=0; $i <count($lista) ; $i++) { 
	 		 	 $opciones = ' 
	          	<div style="text-aling:center">
	          		<a href="#" class="eliminar"  data-control="'.Encryptar::encrypt_($lista[$i]["id"]).'" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:25px;color:red" ></i></a>
		 			<a href="#" class="edit"   data-control="'.Encryptar::encrypt_($lista[$i]["id"]).'"><i class="fa fa-pencil" aria-hidden="true" style="font-size:25px"></i></a>
	          	</div> 
				 '; 
	          
	          	 $data["data"][] = array_map('utf8_encode',  array('name' =>utf8_decode($lista[$i]["name"])  ,'number' => utf8_decode($lista[$i]["number"]), 'birth_date' => utf8_decode( $lista[$i]["birth_date"]) ,'phone' =>$lista[$i]["phone"],'city' =>utf8_decode($lista[$i]["city"]) ,'opcion' =>$opciones) );
	 		 }

	 		 if (count($lista)==0) {
	 		 	 $data["data"]  = [];
	 		 }
	 
	           
	        $lista = $data;		 
			break;
			case 'load_city':
				$lista = ModelCustomer::getCity();
				$option = "";
                for ($i=0; $i <count($lista) ; $i++) { 
					if(!empty($lista[$i]["id"])){ 
						$option.="<option value='".Encryptar::encrypt_($lista[$i]["id"])."' >".$lista[$i]["name"]."<option>";
					}
				}
				 
				$data = array('retorno' =>$option , 'mensaje'  =>array() ,'continuar' =>true );
				break;
			case 'register_customer':

				$name = $_POST["name"];
				$number = $_POST["number"];
				$birth_day = $_POST["birth_day"];
				$phone = $_POST["phone"];
				$city = Encryptar::decrypt_( $_POST["city"]);

				$request = ModelCustomer::createCustomer($name,$number,$birth_day,$phone,$city);
				  if( $request ){
					$mensaje = array('texto' =>p_29 ,"titulo"=>p_14,'tipo'=>'success' );
				  }else{
					$mensaje = array('texto' =>p_30,"titulo"=>p_16,'tipo'=>'error' );
				  }
				  $data = array('retorno' =>'' , 'mensaje'  =>$mensaje ,'continuar' =>true );
			 
				break;
			case 'modify_customer':
				$name = $_POST["name_edit"];
				$number = $_POST["number_edit"];
				$birth_day = $_POST["birth_day_edit"];
				$phone = $_POST["phone_edit"];
				$city = Encryptar::decrypt_( $_POST["city_edit"]);
				$id = Encryptar::decrypt_( $_POST["idCustomer"]);
				$request = ModelCustomer::updateCustomer($name,$number,$birth_day,$phone,$city,$id);
				 if( $request ){
					$mensaje = array('texto' =>p_20 ,"titulo"=> p_13,'tipo'=>'success' );
				  }else{
					$mensaje = array('texto' => p_21,"titulo"=> p_15,'tipo'=>'error' );
				  }
				  $data = array('retorno' =>'' , 'mensaje'  =>$mensaje ,'continuar' =>true );
				break;
			case 'edit_customer':
				$id = Encryptar::decrypt_( $_POST["id"]);
				$request = ModelCustomer::getCoustomer( $id);
			
				$data = array('retorno' =>$request , 'mensaje'  =>array() ,'continuar' =>true );
				break;	
			case 'delete':
				$id = Encryptar::decrypt_( $_POST["id"]);
				$request = ModelCustomer::deleteCustomer($id);
					if( $request ){
					$mensaje = array('texto' =>p_31 ,"titulo"=> p_13,'tipo'=>'success' );
					}else{
					$mensaje = array('texto' => p_32,"titulo"=> p_15,'tipo'=>'error' );
					}
					$data = array('retorno' =>'' , 'mensaje'  =>$mensaje ,'continuar' =>true );
			
				break;		
				
            default:
                    $data = array('retorno' =>$option , 'mensaje'  =>array() ,'continuar' =>false );
            break;
	}

	
 	if ($case!='list_customer') {
 		$retorno["iniciar"]=$data["continuar"] ;$retorno["mensaje"]=$data["mensaje"];$retorno["adjunto"]=$data["retorno"];

		echo json_encode( $retorno);
 	}else{
 		echo json_encode( $lista);
 	}
	
	 
 ?>