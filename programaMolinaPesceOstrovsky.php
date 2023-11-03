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

// 1-Funcion cargarColeccionPalabras

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "CRUDO", "RANGO", "FARDO", "BRAZO", "MUNDO"
    ];

    return ($coleccionPalabras);
}

//2-Funcion cargarPartidas 

/**
 * Obtiene una coleccion de partidas
 * @return array
 */
function cargarPartidas() {
    // comenzamos las partidas individuales
    $partida1 = [ "palabraWordix" => "QUESO" , "jugador" => "JUAN" , "intentos" => 1, "puntaje" => 15 ];
    $partida2 = [ "palabraWordix" => "MUJER" , "jugador" => "PABLO" , "intentos" => 3, "puntaje" => 13 ];
    $partida3 = [ "palabraWordix" => "CASAS" , "jugador" => "CAMILA" , "intentos" => 4, "puntaje" => 13 ];
    $partida4 = [ "palabraWordix" => "RASGO" , "jugador" => "JOSE" , "intentos" => 1, "puntaje" => 16 ];
    $partida5 = [ "palabraWordix" => "BRAZO" , "jugador" => "JULIO" , "intentos" => 2, "puntaje" => 15 ];
    $partida6 = [ "palabraWordix" => "FARDO" , "jugador" => "CAMILA" , "intentos" => 5, "puntaje" => 11 ];
    $partida7 = [ "palabraWordix" => "CRUDO" , "jugador" => "MARTINA" , "intentos" => 6, "puntaje" => 0  ];
    $partida8 = [ "palabraWordix" => "RANGO" , "jugador" => "PAULA" , "intentos" => 1, "puntaje" => 15 ];
    $partida9 = [ "palabraWordix" => "MUNDO" , "jugador" => "PABLO" , "intentos" => 6, "puntaje" => 0 ];
    $partida10 = [ "palabraWordix" => "VERDE" , "jugador" => "JUAN" , "intentos" => 6, "puntaje" => 0 ];
    // array que va a contener a las partidas
    $partidas = [];
    // pusheamos las partidas al array principal, permitiendo tener los indices.
    array_push($partidas, $partida1, $partida2, $partida3, $partida4, $partida5, $partida6, $partida7, $partida8, $partida9 , $partida10);
    // retornamos las partidas
    return $partidas;
}

//3-Funcion seleccionarOpcion
/**
 * Muestras las opciones al usuario
 * @return int
 */
function seleccionarOpcion() {
    echo "Menu de opciones: \n";
    echo "1) Jugar al wordix con una palabra elegida  \n";
    echo "2) Jugar al wordix con una palabra aleatoria  \n";
    echo "3) Mostrar una partida  \n";
    echo "4) Mostrar la primera partida ganadora  \n";
    echo "6) Mostrar listado de partidas ordenadas por jugador y por palabra  \n";      
    echo "7) Agregar una palabra de 5 letras a Wordix  \n";
    echo "8) salir  \n";    
    echo "Ingrese una opcion: ";
    $opcionUsuario = solicitarNumeroEntre(1,8);
    return $opcionUsuario;
}

//6-Funcion mostrarPartida 
/**
 * toma como parametro una partida para mostrar. Si se encuentra la muestra. Sino solicita otra partida
 * @param int $numPartida
 * @return string
 */

 // se le solicita un num al usuario

function mostrarPartida($numPartida , $partidas) {
    if ($numPartida >= 0 && $numPartida < count($partidas)) {
        $datosPartida = $partidas[$numPartida];
        $respuesta =          
        "*********************\n";
        "Partida Wordix $numPartida: " . "palabra " . $datosPartida["palabraWordix"] . "\n";
        "Jugador: " . $datosPartida["jugador"] . "\n";
        "Puntaje: " . $datosPartida["puntaje"] . "\n";
        "Intentos: " . $datosPartida["intentos"] . "\n";
        "*********************\n";
    } else {
        $respuesta = "Error: Número de partida inválido.\n";
    }
    return $respuesta;
}


/* ****COMPLETAR***** */

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:
$coleccionPalabras = cargarColeccionPalabras();
$coleccionPartidas = []; 
function solicitarOpcionMenu() {
    echo "Menu de opciones: \n";
    echo "1) Jugar al wordix con una palabra elegida  \n";
    echo "2) Jugar al wordix con una palabra aleatoria  \n";
    echo "3) Mostrar una partida  \n";
    echo "4) Mostrar la primera partida ganadora  \n";
    echo "6) Mostrar listado de partidas ordenadas por jugador y por palabra  \n";      
    echo "7) Agregar una palabra de 5 letras a Wordix  \n";
    echo "8) salir  \n";                                                                         
}


//Proceso:

do {    
       $mostrarMenu = true;
       while ($mostrarMenu == true)  { 
       solicitarOpcionMenu();
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
                  }else {
                  $partida = jugarWordix($coleccionPalabras[$numeroPalabra] , $nombreJugador); // devuelve array partida y lo almacena en una variable
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
            $repetirPartida = true;
            $numeroGuardado = [];
            $coleccionPalabrasAleatorias = $coleccionPalabras; 

            while($repetirPartida == true ) {
                echo "Ingrese su nombre: \n";
                $nombreJugador = (string)trim(fgets(STDIN));
                $numeroPalabra = array_rand($coleccionPalabrasAleatorias, 1); /*Entrega un valor aleatorio del array (una palabra aleatoria), y se asigna a $numeroPalabra*/
                                                                       
                    $partida = jugarWordix($coleccionPalabrasAleatorias[$numeroPalabra] , $nombreJugador); // devuelve array partida y lo almacena en una variable
                    array_push($coleccionPartidas, $partida);   
                    array_push($numeroGuardado, $numeroPalabra);   
                
                echo "Desea jugar otra vez s/n? \n";
               $respuestaJugador = (string)trim(fgets(STDIN));
               if ($respuestaJugador == "s") {
                  $repetirPartida = true;
                  $coleccionPalabrasAleatorias = array_diff($coleccionPalabrasAleatorias, $numeroGuardado); /*Eliminamos los elementos del array $numeroGuardado en $coleccionPalabrasAleatorias, 
                para que al usuario no le toquen las mismas palabras si desea volver a jugar el mismo modo */

                }                                                         
                else {                                                   
                  $repetirPartida = false;
               }
            }
               break;   
           case 3: 
            echo "Número de partida que desea ver: ";
            $numIngresado = (int)trim(fgets(STDIN));
            if ($numIngresado >= 0 && $numIngresado < count($coleccionPartidas)) {
                $datosPartida = $coleccionPartidas[$numIngresado];
                echo "*********************\n";
                echo "Partida Wordix $numIngresado: " . "palabra " . $datosPartida["palabraWordix"] . "\n";
                echo "Jugador: " . $datosPartida["jugador"] . "\n";
                echo "Puntaje: " . $datosPartida["puntaje"] . "\n";
                echo "Intentos: " . $datosPartida["intentos"] . "\n";
                echo "*********************\n";
            } else {
                echo "Error: Número de partida inválido.\n";
            }
        
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
               $nuevaPalabra = leerPalabra5Letras();
               if (in_array($nuevaPalabra , $coleccionPalabras)) {
                 echo "Intente otra vez. Palabra disponible \n";
               } else {
                array_push($coleccionPalabras , $nuevaPalabra);
                 echo "Exito! la palabra $nuevaPalabra ha sido agregada \n";
               }
               break;
           case 8:
               $mostrarMenu = false;
               break; 
       } 
    }else {
    echo " ** Ingrese una opcion valida ** \n";
      $opcionValida = false;
    }
  }
} while ($opcionValida == false);