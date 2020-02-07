<?php

use App\Clases\Auxiliares\Constantes;

if( isset($_GET['id']) ) {
    get_eventos($_GET['id']);
}

function get_eventos( $id ) {
    
    //Cambia por los detalles de tu base datos
    $dbserver = "localhost";;
    $dbuser = "chaparrillo";;
    $password = "pistacho123";;
    $dbname = "chaparrillo";;
    
    $database = new mysqli($dbserver, $dbuser, $password, $dbname);
    
    if($database->connect_errno) {
        die("No se pudo conectar a la base de datos");
    }
    
    $jsondata = array();
    
    //Sanitize ipnut y preparar query
//    if( is_array($id) ) {
//        $id = array_map('intval', $id);
//        $querywhere = "WHERE id_evento IN (" . implode( ',', $id ) . ")";
//    } else {
//        $id = intval($id);
//        $querywhere = "WHERE id_evento = " . $id;
//    }
    
    $querywhere = "WHERE id_evento = " . $id;
    if ( $result = $database->query( "SELECT * FROM eventos " . $querywhere ) ) {
        
        if( $result->num_rows > 0 ) {
            
            $jsondata["success"] = true;
            $jsondata["data"]["message"] = sprintf("Se han encontrado %d eventos", $result->num_rows);
            $jsondata["data"]["users"] = array();
            while( $row = $result->fetch_object() ) {
                //$jsondata["data"]["users"][] es un array no asociativo. Tendremos que utilizar JSON_FORCE_OBJECT en json_enconde
                //si no queremos recibir un array en lugar de un objeto JSON en la respuesta
                //ver http://www.php.net/manual/es/function.json-encode.php para más info
                $jsondata["data"]["users"][] = $row;
            }
            
        } else {
            
            $jsondata["success"] = false;
            $jsondata["data"] = array(
            'message' => 'No se encontró ningún resultado.'
            );
            
        }
        
        $result->close();
        
    } else {
        
        $jsondata["success"] = false;
        $jsondata["data"] = array(
        'message' => $database->error
        );
        
    }
    
    header('Content-type: application/json; charset=utf-8');
    echo json_encode($jsondata, JSON_FORCE_OBJECT);
    
    $database->close();
    
}
