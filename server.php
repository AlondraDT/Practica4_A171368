<?php
    require_once "lib/nusoap.php";
    function getCanciones($datos){
        if($datos == "Canciones"){
            return join(",", array(
                "Persiguiendo Sombras",
    			"Viaje epico hacia la nada",
    			"Pide al tiempo",
    			"Historia de un minuto",
    			"Unicos"));
        }else{
            return "No hay canciones";
        }
    }
    $server = new soap_server();//Creamos instancia SOAP
    $server->register("getCanciones");//Indica el método o función a devolver
    if( !isset( $HTTP_RAW_POST_DATA ) ) 
        $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
        $server->service($HTTP_RAW_POST_DATA);
?>