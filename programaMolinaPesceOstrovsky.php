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
echo "6) Mostrar listado de partidas ordenadas por jugador y por palabra  \n";      // interfaz de entrada (usuario)
echo "7) Agregar una palabra de 5 letras a Wordix  \n";
echo "8) salir  \n";


$palabrasGuardadas = [ 0 => "QUESO" , 1 => "JAMON" ,  2 => "VIAJE" ];               // array que contiene las palabras disponibles para jugar , con sus respectivas claves
$elementosPalabrasGuardadas = count($palabrasGuardadas);                            // variable que lleva la cuenta de la cantidad de palabras disp para jugar

do {                                                                                // se le solicita al usuario su eleccion y actua en base a la misma
    echo "Ingrese Eleccion:  ";
    $opcion = (int)trim(fgets(STDIN));
    $opcionValida = true;
    if ( $opcion >= 1 && $opcion <= 8) {                                            // su eleccion debe estar entre la 1 y la 8
       switch ($opcion) {
           case 1: 
               $jugarOtraPartida = true;                                 
               $numeroGuardado = [];                                                // array que contiene el numero de palabra jugado
               echo "Ingrese nombre del jugador: \n";
               $nombreJugador = (string)trim(fgets(STDIN));
               escribirMensajeBienvenida($nombreJugador);
               while($jugarOtraPartida == true) {                                   // mientras la eleccion del usuario sea jugar otra vez, ejecutar while
               echo "Ingrese numero de palabra para jugar: ";
               $numero = solicitarNumeroEntre(0,$elementosPalabrasGuardadas - 1);   // el numero de palabras debe estar dentro de la cantidad de palabras disp para jugar
               if (in_array($numero , $numeroGuardado)) {                           // si el numero de palabra ya se jugo (se checkea el registro) solicita un nuevo num
                   echo "No puede jugar esta palabra. Intente con otra \n";
               } else {
                 array_push($numeroGuardado, $numero);                            // comienza la partida. Guarda la palabra elegida para jugar asi no la puede voler a repetir.
                 $palabra = leerPalabra5Letras();  
                 $estructuraIntentosWordix = [];
                 $victoria = "perdiste";
                 $intentos = 5;
                  while($victoria == "perdiste" && $intentos != 0 ) {  
                  $resultado = analizarPalabraIntento($palabrasGuardadas[$numero] , $estructuraIntentosWordix , $palabra );
                  $primeraLetra = $resultado[0][0]["estado"];  // del array Estructura Intentos Wordix, accede a las palabras guardadas. Luego accede a la posicion 0 dentro de ese array (letra 1). Luego, devolveme lo que contenga la KEY = estado dentro de esa array
                  $segundaLetra = $resultado[0][1]["estado"];
                  $terceraLetra = $resultado[0][2]["estado"];
                  $cuartaLetra = $resultado[0][3]["estado"];
                  $quintaLetra = $resultado[0][4]["estado"];
                    if ($palabra == $palabrasGuardadas[$numero]) {
                        echo "ganaste \n";
                        $victoria = "ganaste \n";    
                        if ($primeraLetra == "encontrada") {
                            escribirVerde( $resultado[0][0]["letra"] );
                        } else if ($primeraLetra == "pertenece" ) {
                           escribirAmarillo($resultado[0][0]["letra"]);
                        } else if ($primeraLetra == "descartada") {
                          escribirRojo($resultado[0][0]["letra"]);
                        }
                        if ($segundaLetra == "encontrada") {
                            escribirVerde( $resultado[0][1]["letra"] );
                        } else if ($segundaLetra == "pertenece" ) {
                           escribirAmarillo($resultado[0][1]["letra"]);
                        } else if ($segundaLetra == "descartada") {
                          escribirRojo($resultado[0][1]["letra"]);
                        }
                        if ($terceraLetra == "encontrada") {
                            escribirVerde( $resultado[0][2]["letra"] );
                        } else if ($terceraLetra == "pertenece" ) {
                           escribirAmarillo($resultado[0][2]["letra"]);
                        } else if ($terceraLetra == "descartada") {
                          escribirRojo($resultado[0][2]["letra"]);
                        }
                        if ($cuartaLetra == "encontrada") {
                            escribirVerde( $resultado[0][3]["letra"] );
                        } else if ($cuartaLetra == "pertenece" ) {
                           escribirAmarillo($resultado[0][3]["letra"]);
                        } else if ($cuartaLetra == "descartada") {
                          escribirRojo($resultado[0][3]["letra"]);
                        }
                        if ($quintaLetra == "encontrada") {
                            escribirVerde( $resultado[0][4]["letra"] );
                        } else if ($quintaLetra == "pertenece" ) {
                           escribirAmarillo($resultado[0][4]["letra"]);
                        } else if ($quintaLetra == "descartada") {
                          escribirRojo($resultado[0][4]["letra"]);
                        }      
                        echo "\n";            
                    } else {
                        echo "Fallo intento. Intentos restantes: $intentos \n";
                        $intentos--;
                        $victoria == "perdiste \n";
                        if ($primeraLetra == "encontrada") {
                            escribirVerde( $resultado[0][0]["letra"] );
                        } else if ($primeraLetra == "pertenece" ) {
                           escribirAmarillo($resultado[0][0]["letra"]);
                        } else if ($primeraLetra == "descartada") {
                          escribirRojo($resultado[0][0]["letra"]);
                        }
                        if ($segundaLetra == "encontrada") {
                            escribirVerde( $resultado[0][1]["letra"] );
                        } else if ($segundaLetra == "pertenece" ) {
                           escribirAmarillo($resultado[0][1]["letra"]);
                        } else if ($segundaLetra == "descartada") {
                          escribirRojo($resultado[0][1]["letra"]);
                        }
                        if ($terceraLetra == "encontrada") {
                            escribirVerde( $resultado[0][2]["letra"] );
                        } else if ($terceraLetra == "pertenece" ) {
                           escribirAmarillo($resultado[0][2]["letra"]);
                        } else if ($terceraLetra == "descartada") {
                          escribirRojo($resultado[0][2]["letra"]);
                        }
                        if ($cuartaLetra == "encontrada") {
                            escribirVerde( $resultado[0][3]["letra"] );
                        } else if ($cuartaLetra == "pertenece" ) {
                           escribirAmarillo($resultado[0][3]["letra"]);
                        } else if ($cuartaLetra == "descartada") {
                          escribirRojo($resultado[0][3]["letra"]);
                        }
                        if ($quintaLetra == "encontrada") {
                            escribirVerde( $resultado[0][4]["letra"] );
                        } else if ($quintaLetra == "pertenece" ) {
                           escribirAmarillo($resultado[0][4]["letra"]);
                        } else if ($quintaLetra == "descartada") {
                          escribirRojo($resultado[0][4]["letra"]);
                        }
                        echo "\n";    
                        $palabra = leerPalabra5Letras();
                    }
                    echo "perdiste! \n";
                  }
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