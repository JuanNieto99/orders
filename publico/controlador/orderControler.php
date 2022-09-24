<?php 
	include '../modelo/modelOrder.php'; 
 
	empty($_POST["case"])?$case=NULL:$case=$_POST["case"];
	if ($case==NULL) {
		empty($_GET["case"])?$case=NULL:$case=$_GET["case"];
	}
	$retorno = array();
	switch ($case) {
			case 'list_order':
                $lista =  ModelOrder::getInfoOrder();
                for ($i=0; $i <count($lista) ; $i++) { 
                    if($lista[$i]["status"]=="entregado"){
                      $opciones = ' 
                      <div style="text-aling:center">
                        <a href="#" class="eliminar"  data-control="'.Encryptar::encrypt_($lista[$i]["id"]).'" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:25px;color:red" ></i></a>
                      </div> 
                     '; 
                    }else{
                      $opciones = ' 
                      <div style="text-aling:center">
                        <a href="#" class="eliminar"  data-control="'.Encryptar::encrypt_($lista[$i]["id"]).'" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:25px;color:red" ></i></a>
                        <a href="#" class="edit"   data-control="'.Encryptar::encrypt_($lista[$i]["id"]).'"><i class="fa fa-pencil" aria-hidden="true" style="font-size:25px"></i></a>
                        <a href="#" class="delivery"   data-control="'.Encryptar::encrypt_($lista[$i]["id"]).'"><i class="fa fa-inbox" aria-hidden="true" style="font-size:25px;color:green"></i></a>
                      </div> 
                     '; 
                    } 
                    $data["data"][] = array_map('utf8_encode',  array('name_client' =>utf8_decode($lista[$i]["name_client"])  ,'date' => utf8_decode($lista[$i]["date"])  ,'delivery' => utf8_decode($lista[$i]["delivery"]), 'price' =>  $lista[$i]["price"],'opcion' =>$opciones) );
                }
 
               if (count($lista)==0) {
                    $data["data"]  = [];
               } 
             $lista = $data;
            break;
            case 'addOrder':
                $cliente  = Encryptar::decrypt_( $_POST["cliente"]);
                $producto  = Encryptar::decrypt_( $_POST["producto"]);
           
                if(empty($_POST["id"])){
                  $date = date('Y-m-d');
                  ModelOrder::saveOrder($cliente,$date);
                  $id_order = ModelOrder::maxID($cliente);                  
                }else{
                  $id_order = Encryptar::decrypt_( $_POST["id"]);
                }
             
             
                $request = ModelOrder::saveOrderDetail($id_order,$producto);
                $price =  ModelOrder::getPriceOrder($id_order);
                ModelOrder::updatePrice($id_order,$price);
                if($request){
                  $mensaje = array('texto' =>p_57 ,"titulo"=> p_13,'tipo'=>'success' );
                 }else{
                  $mensaje = array('texto' => p_58,"titulo"=> p_15,'tipo'=>'error' );
                 }
                 $data = array('retorno' =>Encryptar::encrypt_( $id_order)  , 'mensaje'  =>$mensaje ,'continuar' =>true );
            break;
            case 'loadOrder':
                $id_order = Encryptar::decrypt_( $_POST["id"]);
                $data_product = ModelOrder::getProductByorder($id_order);
                
                $tr = "";
                for ($i=0; $i < count($data_product ) ; $i++) { 
                   $tr .= '
                   <tr>
                   <td>'. ($data_product[$i]["description"]).'</td>
                   <td>'. (  $data_product[$i]["price"] ).'</td>
                   <td><i class="fa fa-trash" onclick="deleteProductDetail(this)" data-order="'.Encryptar::encrypt_($id_order) .'" data-control="'.Encryptar::encrypt_($data_product[$i]["id"]).'" aria-hidden="true" style="cursor: pointer;"></i></td>
                   </tr>';
                }
                $price =  ModelOrder::getPriceOrder($id_order);
                if( $price > 0 ){
                    $price =  number_format($price,2,",",".");
                }else{
                    $price ="0";
                }
               
                $data = array('retorno' => array($tr,$price )  , 'mensaje'  =>array() ,'continuar' =>true );
     
                break;
            case 'deleteDetailOrder':
                $id = Encryptar::decrypt_( $_POST["id"]);
                $id_order = Encryptar::decrypt_( $_POST["id_order"]);
                
                $request = ModelOrder::deleteDetailByidDetail( $id);
                $price =  ModelOrder::getPriceOrder($id_order);
                ModelOrder::updatePrice($id_order,$price);
                if($request){
                    $mensaje = array('texto' =>p_59 ,"titulo"=> p_13,'tipo'=>'success' );
                  }else{
                    $mensaje = array('texto' => p_60,"titulo"=> p_15,'tipo'=>'error' );
                  }
                  $data = array('retorno' => "" , 'mensaje'  =>$mensaje ,'continuar' =>true );
   
                break;
            case 'updateClient':
                $id_order = Encryptar::decrypt_( $_POST["id"]);
                $cliente  = Encryptar::decrypt_( $_POST["id_client"]);
                $request = ModelOrder:: updateClientOrder($id_order,$cliente);
                if($request){
                    $mensaje = array('texto' =>p_61 ,"titulo"=> p_13,'tipo'=>'success' );
                  }else{
                    $mensaje = array('texto' =>p_62,"titulo"=> p_15,'tipo'=>'error' );
                  }
                  $data = array('retorno' => "" , 'mensaje'  =>$mensaje ,'continuar' =>true );
            break;
            case 'edit_order':
              $id_order = Encryptar::decrypt_( $_POST["id"]);         
              $request = ModelOrder::getInfoOrderByid($id_order);
              $id_customer = Encryptar::encrypt_( $request["id"]) ;
              $data = array('retorno' =>array("id_customer"=>$id_customer )  , 'mensaje'  =>array() ,'continuar' =>true );
             break;
             case 'delete_order':
              $id_order = Encryptar::decrypt_( $_POST["id"]);
              $request = ModelOrder:: orderDelete($id_order);
              if($request){
                $mensaje = array('texto' =>p_67 ,"titulo"=> p_13,'tipo'=>'success' );
              }else{
                $mensaje = array('texto' =>p_68,"titulo"=> p_15,'tipo'=>'error' );
              }
              $data = array('retorno' => "" , 'mensaje'  =>$mensaje ,'continuar' =>true );
              break;
            case 'delivery_order':
              $id_order = Encryptar::decrypt_( $_POST["id"]);
              $date = date('Y-m-d');
              $request = ModelOrder:: updateDelivery($id_order,$date);
              if($request){
                $mensaje = array('texto' =>p_69 ,"titulo"=> p_13,'tipo'=>'success' );
              }else{
                $mensaje = array('texto' =>p_70,"titulo"=> p_15,'tipo'=>'error' );
              }
              $data = array('retorno' => "" , 'mensaje'  =>$mensaje ,'continuar' =>true );
            break;
              
            
    }

    	
 	if ($case!='list_order') {
        $retorno["iniciar"]=$data["continuar"] ;$retorno["mensaje"]=$data["mensaje"];$retorno["adjunto"]=$data["retorno"];

       echo json_encode( $retorno);
    }else{
        echo json_encode( $lista);
    }
   
    
?>