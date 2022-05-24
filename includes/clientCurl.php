<?php

class CurlRequest
{

    public function request($method, $params, $type)
    {
        //$type == POST, GET, PUT, DELETE

        $domain = "https://www.121marketplace.com/admin/";
        $path = "webservices.php?method=";

        //url contra la que atacamos
        $urlString = $domain . $path . $method;

        $ch = curl_init($urlString);
        //a true, obtendremos una respuesta de la url, en otro caso,
        //true si es correcto, false si no lo es
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //establecemos el verbo http que queremos utilizar para la petición
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
        //enviamos el array data
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        //obtenemos la respuesta
        $response = curl_exec($ch);
        // Se cierra el recurso CURL y se liberan los recursos del sistema
        curl_close($ch);
        if (!$response) {
            return false;
        } else {
            return $response;
        }
    }
} ?>