<?php
include_once("wordix.php");

// Pesce Matias Nicolas. FAI-4594. TUDW. matias.pesce@est.fi.uncoma.edu.ar. Niicoph.
//
//

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
// 4 y 5 en archivo wordix.php
//6-Funcion mostrarPartida 
/**
 * Toma como parametro un numero de partida y una coleccion de partidas. Si se encuentra la partida devuelve los datos. Sino devuelve error.
 * @param int $numPartida
 * @param array $partidas
 * @return string
 */
function mostrarPartida($numPartida , $partidas) 
{
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
//7-Funcion agregarPalabra
/**
 * Recibe como parámetros la colección de palabras y la nueva palabra. La nueva palabra se agrega solo si esta ya no pertenece a la colección.
 * Caso contrario, se escribe un mensaje con el aviso.
 * @param array $coleccionPalabras
 * @param string $nuevaPalabra
 * @return array 
 *  */ 
function agregarPalabra($coleccionPalabras, $nuevaPalabra)
{
    if (in_array($nuevaPalabra, $coleccionPalabras)) {
        echo "La palabra ya existe en la colección. Intente con otra.\n";
    } else {
        // Agrega la nueva palabra al final de la colección
        array_push($coleccionPalabras, $nuevaPalabra);
        echo "¡Éxito! La palabra $nuevaPalabra ha sido agregada.\n";
    }
    return $coleccionPalabras; // Retorna la colección actualizada
}

//8- Funcion primeraVictoria 
/**
 * funcion que retorna el indice de la primer partida ganada por un jugador. Si no se encuentra ninguna, devuelve -1
 */
function primeraVictoria($nombreJugador, $Partidas)
{
    $indice = 0;
    $total = $Partidas;
    $f = 0;
    $n = 0;
    // cuenta la cantidad de elementos del arreglo
    foreach ($total as $indice) {
        $f = $f + 1;
    }
    while ($n < $f && ($Partidas[$n]["jugador"] != $nombreJugador || $Partidas[$n]["puntaje"] == 0)) {
        $n = $n + 1;
    }
    if ($n == $f) {
        $n = -1;
    }
    return $n;
}

//9-Funcion devuelveResumen
/**
 * Funcion que devuelve el resumen de un jugador.
 * @param array $partidas
 * @param string $nombreJugador
 */
 function devuelveResumen($partidas, $nombreJugador)
{
    $resumen =
        [
            "jugador" => "",
            "partidas" => 0,
            "puntaje" => 0,
            "victorias" => 0,
            "intento1" => 0,
            "intento2" => 0,
            "intento3" => 0,
            "intento4" => 0,
            "intento5" => 0,
            "intento6" => 0
        ];
    for ($i = 0; $i < count($partidas); $i++) {
        if ($partidas[$i]["jugador"] == $nombreJugador) {
            $resumen["jugador"]  = $nombreJugador;
            $resumen["partidas"] = $resumen["partidas"] + 1;
            $resumen["puntaje"]  = $resumen["puntaje"]  + $partidas[$i]["puntaje"];
            if ($partidas[$i]["puntaje"] != 0) {
                $resumen["victorias"] = $resumen["victorias"] + 1;
            }
            switch ($partidas[$i]["intentos"]) {
                case 1:
                    $resumen["intento1"] = $resumen["intento1"] + 1;
                    break;
                case 2:
                    $resumen["intento2"] = $resumen["intento2"] + 1;
                    break;
                case 3:
                    $resumen["intento3"] = $resumen["intento3"] + 1;
                    break;
                case 4:
                    $resumen["intento4"] = $resumen["intento4"] + 1;
                    break;
                case 5:
                    $resumen["intento5"] = $resumen["intento5"] + 1;
                    break;
                case 6:
                    $resumen["intento6"] = $resumen["intento6"] + 1;
                    break;
            }
        }
    }
    echo "\n*******************************";
    echo "\nJugador: " . $resumen["jugador"];
    echo "\nPartidas: " . $resumen["partidas"];
    echo "\nPuntaje Total: " . $resumen["puntaje"];
    echo "\nVictorias: " . $resumen["victorias"];
    echo "\nPorcentaje de victorias: " . $resumen["victorias"] * 100 / $resumen["partidas"] . "%";
    echo "\nAdivinadas: \n";
    echo "  Intento 1: " . $resumen["intento1"] . "\n";
    echo "  Intento 2: " . $resumen["intento2"] . "\n";
    echo "  Intento 3: " . $resumen["intento3"] . "\n";
    echo "  Intento 4: " . $resumen["intento4"] . "\n";
    echo "  Intento 5: " . $resumen["intento5"] . "\n";
    echo "  Intento 6: " . $resumen["intento6"] . "\n";
    echo "*******************************";
}
//10-Funcion solicitarJugador
/**
 * Solicita al usuario el nombre del jugador, y lo retorna en minúsculas
 * Garantiza que el nombre del jugador comience con una letra (se emplea la función ctype_alpha)
 * @return string
 *  */ 
function solicitarJugador()
{
    $nombreCorrecto = true;

    do {
        echo "Ingrese el nombre del jugador:";
        $jugador = trim(fgets(STDIN));
        if (!ctype_alpha($jugador[0])){ //ctype_alpha retorna true si el primer carácter de $jugador es una letra, y false si no lo es
            echo "El nombre ingresado no comienza con una letra. Por favor ingrese un nombre correcto. \n";
        } else {
            $nombreCorrecto = false;
        }
    } while ($nombreCorrecto);

$jugador = strtolower($jugador); // Convertimos el string en minúsculas
return $jugador;
}

//11-Funcion partidasOrdenadas
/** Ordena las partidas que se encuentran dentro del array $coleccionPalabras y las muestra en pantalla
 * Trabaja con la función "uasort", que utiliza como parametros: 
 * 1) el array multidimensional donde quiere comparar cada índice uno por uno, con todo el resto (índice 0 con 1, 0 con 2, 0 con 3, etc.. luego 1 con 2, 1 con 3, 1 con 4, etc..)
 * 2) la function/módulo compararPartidas, donde se encuentran los criterios de las comparaciones
 * @param array $coleccionPartidas
 */ 
 function partidasOrdenadas ($coleccionPartidas){
        uasort($coleccionPartidas, 'compararPartidas');
        print_r($coleccionPartidas);    
}
 
//11.1-Funcion compararPartidas 
/**
 * Función complementaria a "11-Funcion partidasOrdenadas", para utilizar la función "uasort"
 * Hace una comparación entre los valores de dos índices de un array (en este caso, compara los valores 'jugador', y si es necesario los valores 'palabraWordix'), devolviendo un valor diferente dependiendo cada caso
 * @param array $partida1
 * @param array $partida2
 * @return int
 */
function compararPartidas($partida1, $partida2) {
      
        if ($partida1['jugador'] > $partida2['jugador']) {     //Si el nombre del jugador en Partida1 es mayor alfabeticamente que el del jugador en Partida2, retorna un 1 
            return 1;                                               //La función uasort recibe 1, y ordena al jugadorP2 antes que el jugadorP1, dentro del array

        } elseif ($partida1['jugador'] < $partida2['jugador']) {  //Si el nombre del jugador en Partida1 es menor alfabeticamente que el del jugador en Partida2, retorna un -1
            return -1;                                                //La función uasort recibe -1, y ordena al jugadorP1 antes que el jugadorP2, dentro del array

        } 
        else {  /*Si el nombre del jugador en Partida1 es igual alfabeticamente que el del jugador en Partida2, retorna un 0
          Si retorna 0, quiere decir que es el mismo jugador en ambas partidas, por lo que hace la misma comparación, pero esta vez, ordenando las palabrasWordix*/                                                                                  
            if ($partida1['palabraWordix'] > $partida2['palabraWordix']) {
                return 1;
            } elseif ($partida1['palabraWordix'] < $partida2['palabraWordix']) {
                return -1;
            } else {
                return 0; // En caso de que ambos jugadores y palabras sean iguales.
            }
        }
    }
    
/* ****COMPLETAR***** */

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:

$coleccionPalabras = cargarColeccionPalabras();
$coleccionPartidas = cargarPartidas();
$palabrasJugadas = [];
$datosPartidas = [];
//Proceso:
// 12-
do {
    $eleccionUsuario = seleccionarOpcion();
    $opcionSeleccionada = true;
    $cantidadPalabras = count($coleccionPalabras) -1 ;
    switch($eleccionUsuario) {
        case 1:
            echo "Ingrese nombre del jugador: ";
            $nombreJugador = strtoupper(trim(fgets(STDIN)));
            echo "Ingrese numero de palabra entre 0 y " . $cantidadPalabras . " :" ;
            $numeroPalabra = (int)trim(fgets(STDIN));
            if (in_array($numeroPalabra, $palabrasJugadas)) {
                echo "Numero de palabra ya jugado. \n";
            } else {
                array_push($palabrasJugadas, $numeroPalabra);
                $partidaJugada = jugarWordix($coleccionPalabras[$numeroPalabra], $nombreJugador);
                array_push($datosPartidas,$partidaJugada);
            }
            break;
        case 2:
            echo "implementacion 1: ";
            break;
        case 3:
            echo "implementacion 1: ";
            break;
        case 4:
            echo "implementacion 1: ";
            break;
        case 5:
            echo "implementacion 1: ";
            break;
        case 6:
            echo "implementacion 1: ";
            break;
        case 7:
            $palabraNueva = leerPalabra5Letras();
            $nuevaColeccion = agregarPalabra($coleccionPalabras , $palabraNueva);
            $coleccionPalabras = $nuevaColeccion;
            break;
        case 8:
            $opcionSeleccionada = false;
            break;
    }
} while ($opcionSeleccionada == true); 