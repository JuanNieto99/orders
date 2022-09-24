<?php 
  class Encryptar {

 
  public static function   encrypt_($message, $encode = false)
    {
        
            return base64_encode($message);
       //MTIzNDU2
    }

     
    public static function  decrypt_($message, $encoded = false)
    {
   
         $message = base64_decode($message, true);
     

        return $message;
    }


    public static  function encrypt_md5($var)
    {
     return md5($var);
    }
}
 ?>