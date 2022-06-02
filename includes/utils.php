<?php

function fechaFormateada($date)
{
    //echo date("m/d/Y-", strtotime($date));
    //Domingo 24 de Enero 2015
    if (date("m", strtotime($date)) == 1)
        $mes = "Enero";
    else if (date("m", strtotime($date)) == 2)
        $mes = "Febrero";
    else if (date("m", strtotime($date)) == 3)
        $mes = "Marzo";
    else if (date("m", strtotime($date)) == 4)
        $mes = "Abril";
    else if (date("m", strtotime($date)) == 5)
        $mes = "Mayo";
    else if (date("m", strtotime($date)) == 6)
        $mes = "Junio";
    else if (date("m", strtotime($date)) == 7)
        $mes = "Julio";
    else if (date("m", strtotime($date)) == 8)
        $mes = "Agosto";
    else if (date("m", strtotime($date)) == 9)
        $mes = "Septiembre";
    else if (date("m", strtotime($date)) == 10)
        $mes = "Octubre";
    else if (date("m", strtotime($date)) == 11)
        $mes = "Noviembre";
    else if (date("m", strtotime($date)) == 12)
        $mes = "Diciembre";

    if (date('l', strtotime($date)) == 'Monday')
        $day = 'Lunes';
    else if (date('l', strtotime($date)) == 'Tuesday')
        $day = 'Martes';
    else if (date('l', strtotime($date)) == 'Wednesday')
        $day = 'Miércoles';
    else if (date('l', strtotime($date)) == 'Thursday')
        $day = 'Jueves';
    else if (date('l', strtotime($date)) == 'Friday')
        $day = 'Viernes';
    else if (date('l', strtotime($date)) == 'Saturday')
        $day = 'Sabado';
    else if (date('l', strtotime($date)) == 'Sunday')
        $day = 'Domingo';

    return $day . " " . date("d", strtotime($date)) . " de " . $mes . " del " . date("Y", strtotime($date));
}
?>