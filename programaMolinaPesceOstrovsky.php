<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* ****COMPLETAR***** */
// Pesce Matias Nicolas. FAI-4594. TUDW. matias.pesce@est.fi.uncoma.edu.ar. Niicoph.


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras() {
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
               $repetirPartida = true;
               $numeroGuardado = [];
               while($repetirPartida == true ) {
                echo "Ingrese su nombre: \n";
                $nombreJugador = (string)trim(fgets(STDIN));
                echo "Ingrese numero de palabra para jugar: \n";
                $numeroPalabra = (int)trim(fgets(STDIN));
               if (in_array($numeroPalabra, $numeroGuardado)) {   
                 echo "No puede jugar esta palabra. Intente con otra \n";
               } else {
                  $coleccionPalabras = cargarColeccionPalabras();
                  $partida = jugarWordix($coleccionPalabras[$numeroPalabra] , $nombreJugador); // devuelve array partida y lo almacena en una variable
                  $coleccionPartidas = []; 
                  array_push($coleccionPartidas,$partida);   
                  array_push($numeroGuardado, $numeroPalabra);    
               } 
               echo "Desea jugar otra vez s/n? \n";
               $respuestaJugador = (string)trim(fgets(STDIN));
               if ($respuestaJugador == "s") {
                  $repetirPartida = true;
               } else {
                 $repetirPartida = false;
               }
            }
               break;   
           case 2: 
               echo "implementacion a hacer: 3";
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