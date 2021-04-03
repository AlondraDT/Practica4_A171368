<?php
require_once "lib/nusoap.php";
$cliente = new nusoap_client("http://localhost/PRACTICA4ESTADOS/server.php");

$error = $cliente->getError();
if($error){
    echo "<h2>Constructor error</h2><pre>" .$error."</pre>";
}
$result = $cliente->call("getCanciones", array("datos" => "Canciones"));
if($cliente->fault){ //Checamos una falla al momento de llamar al método
    echo "<h2>Fault</h2><pre>";
    print_r($result);
    echo "</pre>";
}
else{//No hay error al llamar el método
    $error = $cliente->getError();
    if($error) {
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    }
    else {
        echo "<h2>Canciones</h2><pre>";
        echo $result;
        echo "</pre>";
    }
}
?>
