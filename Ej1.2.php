<?php 

/*
Ejercicio 1.2;

Implementa un script en PHP que almacene en un array el horario del grupo 2º DAM, teniendo en cuenta los siguientes detalles:

Se debe registrar, para actividad (cada hora de clase) qué módulo se imparte, qué docente lo hace y en qué taller.
El array debe estar indexado de forma que se facilite el acceso a los detalles (módulo, docente y tutor) de la actividad de un día y hora determinados. La elección de los índices la puedes hacer según el criterio que estimes oportuno.
Al ejecutar el script se debe proporcionar al usuario la siguiente información:

Versión 1: Todos los detalles de la actividad que se esté impartiendo en el día y la hora especificados por el usuario (tú escoges el formato en que se obtienen esos datos).
Versión 2: Además de la información anterior, mostrar también todos los detalles de la actividad que se esté impartiendo en el momento de la ejecución del script.
Si no se está impartiendo ninguna actividad en un momento determinado, se debe informar de ello al usuario. En caso de que estemos en el recreo, deberemos indicárselo también al usuario.

*/
date_default_timezone_set("Atlantic/Canary");
$tutor = "MARIA DEL CARMEN RODRIGUEZ SUAREZ";
$taller = 201;


$asignaturas = array(
    "DEW" => array("Asignatura" => "Desarrollo web entorno cliente", "Profesor" => "MARIA DEL CARMEN RODRIGUEZ SUAREZ", "taller" =>"201","tutor" => $tutor ),
    "DOR" => array("Asignatura" => "Diseño de interfaces web","Profesor" => "MARIA DE LOURDES VENTURA URBINA", "taller" =>"201","tutor" => $tutor),
    "DPL" => array("Asignatura" => "Despliegue de aplicaciones web","Profesor" => "MARIA ANTONIA MONTESDEOCA VIERA", "taller" =>"201","tutor" => $tutor),
    "DSW" => array("Asignatura" => "Desarrollo web en entorno servidor","Profesor" => "SERGIO RAMOS SUAREZ", "taller" =>"201","tutor" => $tutor),
    "EMR" => array("Asignatura" => "Empresa e iniciativa emprendedora","Profesor" => "MARIA DEL SOL GARCIA TARAJANO", "taller" =>"201","tutor" => $tutor),
);

$dias_en_ingles = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

$dias_en_espanol = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");

$dias = array(
    "Lunes" => array(
        "1" => $asignaturas["DEW"],
        "2" => $asignaturas["DEW"],
        "3" => $asignaturas["DPL"],
        "4" => $asignaturas["DSW"],
        "5" => $asignaturas["DOR"],
        "6" => $asignaturas["DOR"],
    ),
    
    "Martes" => array(
        "1" => $asignaturas["DEW"],
        "2" => $asignaturas["DEW"],
        "3" => $asignaturas["DOR"],
        "4" => $asignaturas["DOR"],
        "5" => $asignaturas["DSW"],
        "6" => $asignaturas["DSW"],
    ),
        
    
    "Miercoles" => array(
        "1" => $asignaturas["DEW"],
        "2" => $asignaturas["DEW"],
        "3" => $asignaturas["DEW"],
        "4" => $asignaturas["DPL"],
        "5" => $asignaturas["DSW"],
        "6" => $asignaturas["DSW"],
    ),

    "Jueves" => array(
        "1" => $asignaturas["DOR"],
        "2" => $asignaturas["DOR"],
        "3" => $asignaturas["EMR"],
        "4" => $asignaturas["DSW"],
        "5" => $asignaturas["DPL"],
        "6" => $asignaturas["DPL"],
        
    ),
    "Viernes" => array(
        "1" => $asignaturas["EMR"],
        "2" => $asignaturas["EMR"],
        "3" => $asignaturas["DSW"],
        "4" => $asignaturas["DSW"],
        "5" => $asignaturas["DPL"],
        "6" => $asignaturas["DPL"],
            
    ),
);

function HorasAMinutos($horaString){

    $horas = explode(":", $horaString);
    $hora = intval($horas[0]); 
    $minutos = intval($horas[1]) ;
    $resultado = $hora *60 + $minutos;
    return $resultado;
}


/*
function ComprobarFormato($horaString){
    $horas = explode(":", $horaString);
    $hora = intval($horas[0]); 
    $minutos = intval($horas[1]);
    if(preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/', $horaString)){ 
        if(($hora >= 0 && $hora <= 23) && ($minutos >= 0 && $minutos <= 59)) {
            return true;
        }else{
            return false;
        }     
    }else{
        return false;
    }
    
}
*/


function ComprobarDiaSemana ($arrayDias, $diaSemana){   
    foreach ($arrayDias as $dia => $asignaturas){
        if($dia == $diaSemana){
            return true;
        }
    }
    return false;

}

//Comprobar el formato y los numeros en el mismo bucle y no en la funcion.


    $bucle = true;
    while ($bucle){
        echo "Bienvenido al horario de clase \n";
        echo "Introduce un dia para poder escoger hora: ";
        $DiaDeClase = fgets(STDIN);
        $DiaDeClaseSinEspacios = trim($DiaDeClase);
        $DiaDeClaseM = strtolower($DiaDeClaseSinEspacios);
        $DiaDeClaseCAP = ucwords($DiaDeClaseM);
        if(ComprobarDiaSemana($dias, $DiaDeClaseCAP)){
            echo "Escoge la hora que deseas consultar: \n";
            echo "Puedes indroducir la hora y los minutos en formato hh:mm \n";
            echo "Tu elección: ";
            $horaDeClase = fscanf(STDIN, "%s%s:%s%s", $hora1, $hora2, $minuto1, $minuto2);
            $horaDeClaseSTR = strval($hora1) . strval($hora2) .":". strval($minuto1) . strval($minuto2);
            $arrayHora = explode(":", $horaDeClaseSTR);
            $hora = intval($arrayHora[0]);
            $minutos = intval($arrayHora[1]);
            if(($hora >= 0 && $hora <= 23) && ($minutos >= 0 && $minutos <= 59)){
                $mintuosTotales = HorasAMinutos($horaDeClaseSTR);
                if (480 <= $mintuosTotales && $mintuosTotales < 535 ){   
                    $primera = "1";                
                    echo "A las " . $horaDeClaseSTR . " tienes " . $dias[$DiaDeClaseCAP][$primera]["Asignatura"] . " cuyo profesor/a es "
                    . $dias[$DiaDeClaseCAP][$primera]["Profesor"] . " en el aula ". $dias[$DiaDeClaseCAP][$primera]["taller"] .  ".\n"; 

                }else if(535 <= $mintuosTotales && $mintuosTotales < 590 )  {
                    $segunda = "2";
                    echo "A las " . $horaDeClaseSTR . " tienes " . $dias[$DiaDeClaseCAP][$segunda]["Asignatura"] . " cuyo profesor/a es "
                    . $dias[$DiaDeClaseCAP][$segunda]["Profesor"] . " en el aula ". $dias[$DiaDeClaseCAP][$segunda]["taller"] .  ".\n"; 

                } else if(590 <= $mintuosTotales && $mintuosTotales < 645 )  {
                    $tercera = "3";
                    echo "A las " . $horaDeClaseSTR . " tienes " . $dias[$DiaDeClaseCAP][$tercera]["Asignatura"] . " cuyo profesor/a es "
                    . $dias[$DiaDeClaseCAP][$tercera]["Profesor"] . " en el aula ". $dias[$DiaDeClaseCAP][$tercera]["taller"] .  ".\n"; 

                } else if(645 <= $mintuosTotales && $mintuosTotales < 675 )  {
                    echo "A las " . $horaDeClaseSTR . " tienes Recreo";

                } else if(675 <= $mintuosTotales && $mintuosTotales < 730 )  {
                    $cuarta = "4";
                    echo "A las " . $horaDeClaseSTR . " tienes " . $dias[$DiaDeClaseCAP][$cuarta]["Asignatura"] . " cuyo profesor/a es "
                    . $dias[$DiaDeClaseCAP][$cuarta]["Profesor"] . " en el aula ". $dias[$DiaDeClaseCAP][$cuarta]["taller"] .  ".\n"; 

                } else if(730 <= $mintuosTotales && $mintuosTotales < 785 )  {
                    $quinta = "5";
                    echo "A las " . $horaDeClaseSTR . " tienes " . $dias[$DiaDeClaseCAP][$quinta]["Asignatura"] . " cuyo profesor/a es "
                    . $dias[$DiaDeClaseCAP][$quinta]["Profesor"] . " en el aula ". $dias[$DiaDeClaseCAP][$quinta]["taller"] .  ".\n"; 

                } else if(785 <= $mintuosTotales && $mintuosTotales < 840 )  {
                    $sexta = "6";
                    echo "A las " . $horaDeClaseSTR . " tienes " . $dias[$DiaDeClaseCAP][$sexta]["Asignatura"] . " cuyo profesor/a es "
                    . $dias[$DiaDeClaseCAP][$sexta]["Profesor"] . " en el aula ". $dias[$DiaDeClaseCAP][$sexta]["taller"] .  ".\n"; 

                }else{
                    echo "A esa hora no estas en horario de clase \n";
                }
            }else{
                echo "El formato introducido no es correcto, vuelvelo a intentar. \n";
            }
        }else{
            echo "Ese dia no tienes clase. \n";
        }
        

        //COMPROBANDO SI ESTAMOS EN CLASE ACTUALMENTE:
        
        $time = time();
        $horaActual = date("H", $time);
        $horaActualVerdadera = $horaActual;
        $minutosActuales = date ("i", $time);
        $tiempoActual = $horaActualVerdadera . ":" . $minutosActuales;
        $mintuosTotalesActuales = HorasAMinutos($tiempoActual);
        $nombre_dia_ingles = date("l");
        $nombre_dia_espanol = str_replace($dias_en_ingles, $dias_en_espanol, $nombre_dia_ingles);

        if(($nombre_dia_espanol=="Domingo") || ($nombre_dia_espanol == "Sabado")){
            echo "Hoy no tienes clases";
        }else{

            if (480 <= $mintuosTotalesActuales && $mintuosTotalesActuales < 535 ){   
                $primera = "1";                
                echo "Actualmente estas en " . $dias[$nombre_dia_espanol][$primera]["Asignatura"] . " cuyo profesor/a es "
                . $dias[$nombre_dia_espanol][$primera]["Profesor"] . " en el aula ". $dias[$nombre_dia_espanol][$primera]["taller"] .  ".\n"; 
    
            }else if(535 <= $mintuosTotalesActuales && $mintuosTotalesActuales < 590 )  {
                $segunda = "2";
                echo "Actualmente estas en "  . $dias[$nombre_dia_espanol][$segunda]["Asignatura"] . " cuyo profesor/a es "
                . $dias[$nombre_dia_espanol][$segunda]["Profesor"] . " en el aula ". $dias[$nombre_dia_espanol][$segunda]["taller"] .  ".\n"; 
    
            } else if(590 <= $mintuosTotalesActuales && $mintuosTotalesActuales < 645 )  {
                $tercera = "3";
                echo "Actualmente estas en "  . $dias[$nombre_dia_espanol][$tercera]["Asignatura"] . " cuyo profesor/a es "
                . $dias[$nombre_dia_espanol][$tercera]["Profesor"] . " en el aula ". $dias[$nombre_dia_espanol][$tercera]["taller"] .  ".\n"; 
    
            } else if(645 <= $mintuosTotalesActuales && $mintuosTotalesActuales < 675 )  {
                echo "Actualmente estas en  el Recreo";
    
            } else if(675 <= $mintuosTotalesActuales && $mintuosTotalesActuales < 730 )  {
                $cuarta = "4";
                echo "Actualmente estas en "  . $dias[$nombre_dia_espanol][$cuarta]["Asignatura"] . " cuyo profesor/a es "
                . $dias[$nombre_dia_espanol][$cuarta]["Profesor"] . " en el aula ". $dias[$nombre_dia_espanol][$cuarta]["taller"] .  ".\n"; 
    
            } else if(730 <= $mintuosTotalesActuales && $mintuosTotalesActuales < 785 )  {
                $quinta = "5";
                echo "Actualmente estas en ". $dias[$nombre_dia_espanol][$quinta]["Asignatura"] . " cuyo profesor/a es "
                . $dias[$nombre_dia_espanol][$quinta]["Profesor"] . " en el aula ". $dias[$nombre_dia_espanol][$quinta]["taller"] .  ".\n"; 
    
            } else if(785 <= $mintuosTotalesActuales && $mintuosTotalesActuales < 840 )  {
                $sexta = "6";
                echo "Actualmente estas en "  . $dias[$nombre_dia_espanol][$sexta]["Asignatura"] . " cuyo profesor/a es "
                . $dias[$nombre_dia_espanol][$sexta]["Profesor"] . " en el aula ". $dias[$nombre_dia_espanol][$sexta]["taller"] .  ".\n"; 
    
            }else{
                echo "Ahora no estas en horario de clase \n";
            }
        }
        
        echo "¿Quieres seguir comprobando el horarior? \n";
        echo "Introduce tu elección \n 1: Si \n 2: No \n";
        echo "Numero: ";
        $eleccion = fgets(STDIN);
        if($eleccion == 2){
            $bucle = false;
        }
    }           
    



?> 