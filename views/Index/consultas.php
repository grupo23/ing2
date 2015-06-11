<?php 
    
            define('CONNECT',mysql_connect(DB_HOST,DB_USER,DB_PASS));
         
           
            function chao_tilde($entra)
            {
                  $traduce=array( 'á' => '&aacute;' , 'é' => '&eacute;' , 'í' => '&iacute;' , 'ó' => '&oacute;' , 'ú' => '&uacute;' , 'ñ' => '&ntilde;' , 'Ñ' => '&Ntilde;' , 'ä' => '&auml;' , 'ë' => '&euml;' , 'ï' => '&iuml;' , 'ö' => '&ouml;' , 'ü' => '&uuml;');
                  $sale=strtr( $entra , $traduce );
                  return $sale;
             }
            function select($unaQuery){
                $res=mysql_db_query(DB_NAME,$unaQuery,CONNECT);
                return $res;
             }
             function obtenerCategoriasPadres(){
                 $unaQuery="select nombre from categoria where idPadre = 0";
                 $res=mysql_db_query(DB_NAME,$unaQuery,CONNECT);
                 return $res;
             }
             function obtenerCategoriasHijasDe($idCategoria){
                   $unaQuery="select nombre from categoria where idPadre = $idCategoria ";
                   $res=mysql_db_query(DB_NAME,$unaQuery,CONNECT);
                   return $res;
             }
          

?>