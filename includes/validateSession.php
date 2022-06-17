<?php
include "includes/clientCurl.php";
$new = new CurlRequest();

session_start();
$estadoIdentificador = 0;
$estadoNombre = "Ubicaci&oacute;n";
$paisNombre = "";

if (isset($_POST["state"])){
    $_SESSION["estadoIdUser"] = $_POST["state"];
    $estadoIdentificador = $_POST["state"];
}

if (!isset($_SESSION["estadoIdUser"])) {
    $estadoIdentificador = $_SESSION["estadoIdUser"];
}

$resultadoLocations = $new->request("getLocations", array(), "GET");
$jsonLocations = json_decode($resultadoLocations, true);
$countries = (null != $jsonLocations && $jsonLocations["countries"]) ? $jsonLocations["countries"] : array();

if ($estadoIdentificador != 0) {
    foreach ($countries as $country) {
        $states = (null != $country && $country["states"]) ? $country["states"] : array();
        $countryName = (null != $country && $country["pais_nombre"]) ? $country["pais_nombre"] : "";
        foreach ($states as $state) {
            $stateId = $state["estado_id"] * 1;
            $stateName = $state["estado_nombre"];
            if ($estadoIdentificador == $stateId) {
                $estadoNombre = $stateName;
                $paisNombre = $countryName;
                break;
            }
        }
    }
}


?>