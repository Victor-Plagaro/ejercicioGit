<?php
    //Horario de clase
    $horario = array(
        0 => array(
            0 => array(
                "DEW", "MariaRod", "201"
            ),
            1 => array(
                "DEW", "MariaRod", "201"
            ),
            2 => array(
                "DPL", "MariaMon", "201"
            ),
            3 => array(
                "recreo"
            ),
            4 => array(
                "DSW", "Sergio", "201"
            ),
            5 => array(
                "DOR", "MariaVen", "201"
            ),
            6 => array(
                "DOR", "MariaVen", "201"
            )
        ),
        1 => array(
            0 => array(
                "DEW", "MariaRod", "201"
            ),
            1 => array(
                "DEW", "MariaRod", "201"
            ),
            2 => array(
                "DOR", "MariaVen", "201"
            ),
            3 => array(
                "recreo"
            ),
            4 => array(
                "DOR", "MariaVen", "201"
            ),
            5 => array(
                "DSW", "Sergio", "201"
            ),
            6 => array(
                "DSW", "Sergio", "201"
            )
            ),
        2 => array(
            0 => array(
                "DEW", "MariaRod", 201
            ),
            1 => array(
                "DEW", "MariaRod", "201"
            ),
            2 => array(
                "DEW", "MariaRod", "201"
            ),
            3 => array(
                "recreo"
            ),
            4 => array(
                "DPL", "MariaMon", "201"
            ),
            5 => array(
                "DSW", "Sergio", "201"
            ),
            6 => array(
                "DSW", "Sergio", "201"
            )
        ),
        3 => array(
            0 => array(
                "DOR", "MariaVen", "201"
            ),
            1 => array(
                "DOR", "MariaVen", "201"
            ),
            2 => array(
                "EMR", "MariaGar", "201"
            ),
            3 => array(
                "recreo"
            ),
            4 => array(
                "DSW", "Sergio", "201"
            ),
            5 => array(
                "DPL", "MariaMon", "201"
            ),
            6 => array(
                "DPL", "MariaMon", "201"
            )
        ),
        4 => array(
            0 => array(
                "EMR", "MariaGac", "201"
            ),
            1 => array(
                "EMR", "MariaGac", "201"
            ),
            2 => array(
                "DSW", "Sergio", "201"
            ),
            3 => array(
                "recreo"
            ),
            4 => array(
                "DSW", "Sergio", "201"
            ),
            5 => array(
                "DPL", "MariaMon", "201"
            ),
            6 => array(
                "DPL", "MariaMon", "201"
            )
        ),
    );

    //Rango de horas por módulo
    function hora(){
        echo "Indique la hora que quiera conocer:
        \n1. 08:00-08:55
        \n2. 08:55-09:50
        \n3. 09:50-10:45
        \n4. 10:45-11:15
        \n5. 11:15-12:10
        \n6. 12:10-13:05
        \n7. 13:05-14:00\n";

        $hora = readline();
        if ($hora > 0 && $hora < 8)
        return $hora - 1;
    }

    //Días de la semana
    function dia(){
        echo "Indique el día de la semana que quiere conocer\n";
        $dia = strtolower(readline());
        if($dia != "lunes" && $dia != "martes" && $dia != "miercoles" && $dia != "jueves" && $dia != "viernes"){
            while($dia != "lunes" && $dia != "martes" && $dia != "miercoles" && $dia != "jueves" && $dia != "viernes"){
                echo "Por favor introduzca uno de los valores indicados.\n";
                $dia = strtolower(readline());
            }
        }
        switch($dia){
            case "lunes":
                return 0;
                break;
            case "martes":
                return 1;
                break;
            case "miercoles":
                return 2;
                break;
            case "jueves":
                return 3;
                break;
            case "viernes":
                return 4;
                break;
        }   
    }

    //Ejecucion
    $dia = dia();
    $hora = hora();
    $d;

    if($hora == 3){
        echo "Estamos en el descanso";
        
    }else{
        switch($dia){
            case 0:
                $d = "Lunes";
                break;
            case 1:
                $d = "Martes";
                break;
            case 2:
                $d = "Miercoles";
                break;
            case 3:
                $d = "Jueves";
                break;
            case 4:
                $d = "Viernes";
                break;
        }
        echo "El ". $d ." se imparte la asignatura " . $horario[$dia][$hora][0] . 
        " por " . $horario[$dia][$hora][1] . 
        " en el aula " . $horario[$dia][$hora][2] . 
        " a " . ($hora + 1) ."ª hora";
    }

    //Version 2
    function horaActual(){
        $hoy = getDate();
        $h = $hoy["hours"];
        $h = $h - 2;
        $m = $hoy["minutes"];
        $hora = $h . ":" . $m;

            if($hora <= '08:00' && $hora > '08:55'){
                return 0;
            }elseif($hora >= '08:55' && $hora <= '09:50'){
                return 1;
            }elseif($hora >= '09:50' && $hora <= '10:45'){
                return 2;
            }elseif($hora >= '10:45' && $hora <= '11:15'){
                return 3;
            }elseif($hora >= '11:15' && $hora <= '12:10'){
                return 4;
            }elseif($hora >= '12:10' && $hora <= '13:05'){
                return 5;
            }elseif($hora>='13:05' && $hora<='14:00'){
                return 6;
            }else{
                return 7;
            }     
    }

    function diaActual(){
        $hoy = getDate();
        $d = $hoy["wday"];
        return $d - 1;
    }

    //Ejecucion
    if(diaActual() > 4){
        echo "\nHoy no es un dia lectivo";
    }elseif (horaActual() == 7){
        echo "\nEstamos fuera del horario lectivo";
    }else{
        echo "\nEn estos momentos se esta impartiendo " . $horario[diaActual()][horaActual()][0] .
        " por " . $horario[diaActual()][horaActual()][1] .
        " en el aula ".$horario[diaActual()][horaActual()][2] . 
        " a ".(horaActual()+1)."ª hora";
    }
    
?>