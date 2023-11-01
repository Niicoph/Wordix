<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ****COMPLETAR***** */
// Pesce Matias Nicolas. FAI-4594. TUDW. matias.pesce@est.fi.uncoma.edu.ar. Niicoph.
//
//

/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS"
        /* Agregar 5 palabras más */
    ];

    return ($coleccionPalabras);
}

/* ****COMPLETAR***** */



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

// $partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);



/*
do {
    $opcion = ...;

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X);
*/

echo "Menu de opciones: \n";
echo "1) Jugar al wordix con una palabra elegida  \n";
echo "2) Jugar al wordix con una palabra aleatoria  \n";
echo "3) Mostrar una partida  \n";
echo "4) Mostrar la primera partida ganadora  \n";
echo "5) Mostrar resumen de Jugador  \n";
echo "6) Mostrar listado de partidas ordenadas por jugador y por palabra  \n";
echo "7) Agregar una palabra de 5 letras a Wordix  \n";
echo "8) salir  \n";

do {
 echo "Ingrese Eleccion:  ";
 $opcion = (int)trim(fgets(STDIN));
 $opcionValida = true;
 if ( $opcion >= 1 && $opcion <= 8) {
    switch ($opcion) {
        case 1: 
            $jugarOtraPartida = true;
            $numeroGuardado = [];
            echo "Ingrese nombre del jugador: \n";
            $nombreJugador = (string)trim(fgets(STDIN));
            escribirMensajeBienvenida($nombreJugador);
            while($jugarOtraPartida == true) {
            echo "Ingrese numero de palabra para jugar: ";
            $numero = solicitarNumeroEntre(1,5);
            if (in_array($numero , $numeroGuardado)) {
                echo "No puede jugar esta palabra. Intente con otra \n";
            } else {
                array_push($numeroGuardado, $numero);
                var_dump($numeroGuardado);

                // logica de partida


                echo "Desea jugar otra vez? s/n \n";
                $respuesta = trim(fgets(STDIN));
                if ( $respuesta == "s") {
                    $jugarOtraPartida = true;
                } else {
                    $jugarOtraPartida = false;
                }
            }
        }
            break;
        case 2: 
            echo "Ingrese nombre del jugador: \n";
            $nombreJugador = (string)trim(fgets(STDIN));
            escribirMensajeBienvenida($nombreJugador);
            break;
        case 3: 
            echo "implementacion a hacer: 3";
            break;   
        case 4: 
            echo "implementacion a hacer: 4";
            break;
        case 5:
            echo "implementacion a hacer: 5";
            break;
        case 6:
            echo "implementacion a hacer: 6";
            break;
        case 7: 
            echo "implementacion a hacer: 7";
            break;
        case 8:
            echo "implementacion a hacer: 8";
            break; 
    } 
}else {
  echo " ** Ingrese una opcion valida ** \n";
  $opcionValida = false;
}
} while ($opcionValida == false);