<?php 
	include '../modelo/modelCity.php'; 
	empty($_POST["case"])?$case=NULL:$case=$_POST["case"];
	if ($case==NULL) {
		empty($_GET["case"])?$case=NULL:$case=$_GET["case"];
	}
	$retorno = array();
	switch ($case) {
      case 'list_city':
          $lista = ModelCity::getCity();  
          for ($i=0; $i <count($lista) ; $i++) { 
                $opciones = ' 
                  <div style="text-aling:center">
                      <a href="#" class="eliminar"  data-control="'.Encryptar::encrypt_($lista[$i]["id"]).'" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:25px;color:red" ></i></a>
                      <a href="#" class="edit"   data-control="'.Encryptar::encrypt_($lista[$i]["id"]).'"><i class="fa fa-pencil" aria-hidden="true" style="font-size:25px"></i></a>
                  </div> 
              ';           
              $data["data"][] = array_map('utf8_encode',  array('nombre' =>utf8_decode($lista[$i]["name"]) ,'opcion' =>$opciones) );
          }

          if (count($lista)==0) {
              $data["data"]  = [];
          }
  
            
        $lista = $data;	
      break;
      case 'register_city':
          $name = $_POST["name"];
          $return = ModelCity:: createCity($name);
          if( $return ){
            $mensaje = array('texto' =>p_14 ,"titulo"=> p_13,'tipo'=>'success' );
          }else{
            $mensaje = array('texto' => p_16,"titulo"=> p_15,'tipo'=>'error' );
          }
          $data = array('retorno' =>'' , 'mensaje'  =>$mensaje ,'continuar' =>true );
        break;
      case 'edit_City':
          $id = Encryptar::decrypt_($_POST["id"]);
          $return = ModelCity::  getCityByid($id);
          $name =  $return["name"];
          $data = array('retorno' => $name, 'mensaje'  =>array() ,'continuar' =>true );
      break;
      case 'delete':
          $id = Encryptar::decrypt_($_POST["id"]);
          $return = ModelCity::   deleteCity($id);
          if( $return ){
            $mensaje = array('texto' =>p_18 ,"titulo"=> p_13,'tipo'=>'success' );
          }else{
            $mensaje = array('texto' => p_19,"titulo"=> p_15,'tipo'=>'error' );
          }
          $data = array('retorno' =>'' , 'mensaje'  =>$mensaje ,'continuar' =>true );
        break;
      case 'modify_city':
        $id = Encryptar::decrypt_($_POST["id"]);
        $name = $_POST["name"];
        $return = ModelCity::modifiCity($id,$name);
        if( $return ){
          $mensaje = array('texto' =>p_20 ,"titulo"=> p_13,'tipo'=>'success' );
        }else{
          $mensaje = array('texto' => p_21,"titulo"=> p_15,'tipo'=>'error' );
        }
        $data = array('retorno' =>'' , 'mensaje'  =>$mensaje ,'continuar' =>true );
        break;

    }
  
    if ($case!='list_city') {
        $retorno["iniciar"]=$data["continuar"] ;$retorno["mensaje"]=$data["mensaje"];$retorno["adjunto"]=$data["retorno"];

       echo json_encode( $retorno);
    }else{
        echo json_encode( $lista);
    }
   
 ?>