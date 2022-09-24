<?php 
	include '../modelo/modelProduct.php'; 
 
	empty($_POST["case"])?$case=NULL:$case=$_POST["case"];
	if ($case==NULL) {
		empty($_GET["case"])?$case=NULL:$case=$_GET["case"];
	}
	$retorno = array();
	switch ($case) {
			case 'list_product':
 
			$lista = ModelProduct::getProduct();
	 		 for ($i=0; $i <count($lista) ; $i++) { 
	 		 	 $opciones = ' 
	          	<div style="text-aling:center">
	          		<a href="#" class="eliminar"  data-control="'.Encryptar::encrypt_($lista[$i]["id"]).'" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:25px;color:red" ></i></a>
		 			<a href="#" class="edit"   data-control="'.Encryptar::encrypt_($lista[$i]["id"]).'"><i class="fa fa-pencil" aria-hidden="true" style="font-size:25px"></i></a>
	          	</div> 
				 '; 
	          
	          	 $data["data"][] = array_map('utf8_encode',  array('name' =>utf8_decode($lista[$i]["name"])  ,'amount' => utf8_decode($lista[$i]["amount"]), 'value' => utf8_decode( number_format($lista[$i]["value"],2,",",".")),'opcion' =>$opciones) );
	 		 }

	 		 if (count($lista)==0) {
	 		 	 $data["data"]  = [];
	 		 } 
	        $lista = $data;		 
			break;

            case 'register_product':

                $price = $_POST["price"];
                $cantidad = $_POST["cantidad"];
                $description = $_POST["description"];

                $request = ModelProduct::createProduct($price,$cantidad,$description);
                if( $request ){
					$mensaje = array('texto' =>p_42 ,"titulo"=> p_13,'tipo'=>'success' );
				}else{
					$mensaje = array('texto' => p_43,"titulo"=> p_15,'tipo'=>'error' );
				}
				  $data = array('retorno' =>'' , 'mensaje'  =>$mensaje ,'continuar' =>true );
            break;
            case 'edit_product':
                $id = Encryptar::decrypt_($_POST["id"]);
                $request = ModelProduct:: getProductByid($id);
                $data = array('retorno' =>$request , 'mensaje'  =>array() ,'continuar' =>true );
            break;
                
            case 'modify_product':
                $id = Encryptar::decrypt_($_POST["id"]);
                $price = $_POST["price"];
                $cantidad = $_POST["cantidad"];
                $description = $_POST["description"];
                $request = ModelProduct:: modifiProduct($id,$price,$cantidad ,$description);
                if( $request ){
					$mensaje = array('texto' =>p_45 ,"titulo"=> p_13,'tipo'=>'success' );
				  }else{
					$mensaje = array('texto' => p_46,"titulo"=> p_15,'tipo'=>'error' );
				  }
                  $data = array('retorno' =>'' , 'mensaje'  =>$mensaje ,'continuar' =>true );
            break;
            case 'delete':
                $id = Encryptar::decrypt_($_POST["id"]);
                $request = ModelProduct::updateProduct($id);
                if( $request ){
					$mensaje = array('texto' =>p_47 ,"titulo"=> p_13,'tipo'=>'success' );
				  }else{
					$mensaje = array('texto' => p_48,"titulo"=> p_15,'tipo'=>'error' );
				  }
                  $data = array('retorno' =>'' , 'mensaje'  =>$mensaje ,'continuar' =>true );
                break;
				
            default:
                    $data = array('retorno' =>$option , 'mensaje'  =>array() ,'continuar' =>false );
            break;
	}

	
 	if ($case!='list_product') {
 		$retorno["iniciar"]=$data["continuar"] ;$retorno["mensaje"]=$data["mensaje"];$retorno["adjunto"]=$data["retorno"];

		echo json_encode( $retorno);
 	}else{
 		echo json_encode( $lista);
 	}
	
	 
 ?>