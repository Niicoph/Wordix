<?php
include_once("wordix.php");

// Pesce Matias Nicolas. FAI-4594. TUDW. matias.pesce@est.fi.uncoma.edu.ar. Niicoph.
// Axel Ian Ostrovsky. FAI-4744. TUDW. axel.ostrovsky@est.fi.uncoma.edu.ar. axelost2005.
// Joaquín Molina Gabriel. FAI-4572. TUDW. joaquin.molina@est.fi.uncoma.edu.ar. JoaMolina7.

// 1-   ** Funcion cargarColeccionPalabras ** 
/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras() {
    $coleccionPalabras = [
        "MUJER", "QUESO","FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "CRUDO", "RANGO", "FARDO", "BRAZO", "MUNDO"
    ];
    return ($coleccionPalabras);
}
//2-    ** Funcion cargarPartidas ** 
/**
 * Obtiene una coleccion de partidas
 * @return array
 */
function cargarPartidas() {
    $partida1 = [ "palabraWordix" => "QUESO" , "jugador" => "juan" , "intentos" => 1, "puntaje" => 15 ];
    $partida2 = [ "palabraWordix" => "MUJER" , "jugador" => "pablo" , "intentos" => 3, "puntaje" => 13 ];
    $partida3 = [ "palabraWordix" => "CASAS" , "jugador" => "camila" , "intentos" => 4, "puntaje" => 13 ];
    $partida4 = [ "palabraWordix" => "RASGO" , "jugador" => "jose" , "intentos" => 1, "puntaje" => 16 ];
    $partida5 = [ "palabraWordix" => "BRAZO" , "jugador" => "julio" , "intentos" => 2, "puntaje" => 15 ];
    $partida6 = [ "palabraWordix" => "FARDO" , "jugador" => "camila" , "intentos" => 5, "puntaje" => 11 ];
    $partida7 = [ "palabraWordix" => "CRUDO" , "jugador" => "martina" , "intentos" => 6, "puntaje" => 0  ];
    $partida8 = [ "palabraWordix" => "RANGO" , "jugador" => "paula" , "intentos" => 1, "puntaje" => 15 ];
    $partida9 = [ "palabraWordix" => "MUNDO" , "jugador" => "pablo" , "intentos" => 6, "puntaje" => 0 ];
    $partida10 = [ "palabraWordix" => "VERDE" , "jugador" => "juan" , "intentos" => 6, "puntaje" => 0 ];
    $partidas = [
        $partida1, $partida2, $partida3, $partida4, $partida5,
        $partida6, $partida7, $partida8, $partida9, $partida10
    ];
    return $partidas;
}
//3-  ** Funcion seleccionarOpcion ** 
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
    echo "5) Mostrar resumen de Jugador  \n";
    echo "6) Mostrar listado de partidas ordenadas por jugador y por palabra  \n";      
    echo "7) Agregar una palabra de 5 letras a Wordix  \n";
    echo "8) salir  \n";    
    echo "Ingrese una opcion: ";
    $opcionUsuario = solicitarNumeroEntre(1,8);
    return $opcionUsuario;
}
// 4 y 5 en archivo wordix.php
//6- ** Funcion mostrarPartida ** 
/**
 * Toma como parametro un numero de partida y una coleccion de partidas. Si se encuentra la partida devuelve los datos. Sino devuelve error.
 * @param int $numPartida
 * @param array $partidas
 * @return string
 */
function mostrarPartida($numPartida , $partidas) {
    if ($numPartida >= 0 && $numPartida < count($partidas)) {
        $datosPartida = $partidas[$numPartida];
        $respuesta = "*********************\n". "Partida Wordix $numPartida: " . "palabra " . $datosPartida["palabraWordix"] . "\n" . "Jugador: " . $datosPartida["jugador"] . "\n" . "Puntaje: " . $datosPartida["puntaje"] . "\n" . "Intentos: " . $datosPartida["intentos"] . "\n" . "*********************\n";
    } else {
        $respuesta = "Error: Número de partida inválido.\n";
    }
    return $respuesta;
}
//7- ** Funcion agregarPalabra ** 
/**
 * Recibe como parámetros la colección de palabras y la nueva palabra. La nueva palabra se agrega solo si esta ya no pertenece a la colección.
 * Caso contrario, se escribe un mensaje con el aviso.
 * @param array $coleccionPalabras
 * @param string $nuevaPalabra
 * @return array 
 *  */ 
function agregarPalabra($coleccionPalabras, $nuevaPalabra) {
    foreach ($coleccionPalabras as $palabra) {
        if ($palabra == $nuevaPalabra) {
            echo "La palabra ya existe en la colección. Intente con otra.\n";
            return $coleccionPalabras; // Retorna la colección original si la palabra ya existe
        }
    } 
        // Agrega la nueva palabra al final de la colección
        $coleccionPalabras[] = $nuevaPalabra;
        echo "¡Éxito! La palabra $nuevaPalabra ha sido agregada.\n";
    return $coleccionPalabras; // Retorna la colección actualizada
}

//8- ** Funcion primeraVictoria ** 
/**
 * Funcion que retorna el indice de la primer partida ganada por un jugador. Si no se encuentra ninguna, devuelve -1.
 * @param string $nombreJugador
 * @param array $partidas
 * @return int
 */
function primeraVictoria($nombreJugador, $partidas) {
    $cantidad = count($partidas);
    $contador = 0;                                               
                       
    while ( $contador < $cantidad && ($partidas[$contador]["jugador"] != $nombreJugador || $partidas[$contador]["puntaje"] == 0)) {
         $contador =  $contador + 1;
    }
    if ( $contador == $cantidad) {
         $contador = -1;
    }
    return  $contador;
}
//9-Funcion devuelveResumen
/**
 * Funcion que devuelve el resumen de un jugador.
 * @param array $partidas
 * @param string $nombreJugador
 * @return array
 */
 function devuelveResumen($partidas, $nombreJugador) {
    $resumen =
        [
            "jugador" => "",
            "partidas" => 0,
            "puntaje" => 0,
            "victorias" => 0,
            "porcentaje victorias" => 0,
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
    if ($resumen["partidas"] > 0) {
       $resumen["porcentaje victorias"] = $resumen["victorias"] * 100 / $resumen["partidas"];
    } else {
        $resumen["porcentaje victorias"] = 0;
    }
    return $resumen;
}
// 9.1 - Funcion mostrarResumen
/**
* Funcion que toma como parametro el resumen de un jugador y lo muestra
* @param $resumen
*/

function mostrarResumen($resumen) {
   echo "****************************" . "\n" ;
   echo "Jugador: " . $resumen["jugador"] . "\n";
   echo "Puntaje Total: " . $resumen["partidas"] . "\n";
   echo "Victorias: " . $resumen["victorias"] . "\n";
   echo "Porcentaje Victorias: " . $resumen["porcentaje victorias"] . "%" .  "\n";
   echo "Adivinadas: " . "\n"; 
   echo "    Intento 1: " . $resumen["intento1"] . "\n"; 
   echo "    Intento 2: " . $resumen["intento2"] . "\n"; 
   echo "    Intento 3: " . $resumen["intento3"] . "\n"; 
   echo "    Intento 4: " . $resumen["intento4"] . "\n"; 
   echo "    Intento 5: " . $resumen["intento5"] . "\n"; 
   echo "    Intento 6: " . $resumen["intento6"] . "\n"; 
   echo "****************************" . "\n" ;
}





//10-Funcion solicitarJugador
/**
 * Solicita al usuario el nombre del jugador, y lo retorna en minúsculas
 * Garantiza que el nombre del jugador comience con una letra (se emplea la función ctype_alpha)
 * @return string
 *  */ 
function solicitarJugador() {
    $nombreCorrecto = true;
    while($nombreCorrecto) {
        echo "ingrese el nombre del jugador: ";
        $jugador = trim(fgets(STDIN));
        if (!ctype_alpha($jugador[0])){
            echo "El nombre ingresado no comienza con una letra. Por favor ingrese un nombre correcto \n";
        } else {
            $nombreCorrecto = false;
        }
    }
    $jugador = strtolower($jugador); 
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
        if ($partida1['jugador'] > $partida2['jugador']) {     
            return 1;                                              
        } elseif ($partida1['jugador'] < $partida2['jugador']) {  
            return -1;                                                
        } 
        else {                                                                        
            if ($partida1['palabraWordix'] > $partida2['palabraWordix']) {
                return 1;
            } elseif ($partida1['palabraWordix'] < $partida2['palabraWordix']) {
                return -1;
            } else {
                return 0; 
            }
        }
    }
    
/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/


//Inicialización de variables:

$coleccionPalabras = cargarColeccionPalabras();
$coleccionPartidas = cargarPartidas();

//Proceso:
/*12- 
Switch: La estructura de control switch es una estructura de control de condicion muy similar a una serie de sentencias if. 
En PHP, la sentencia switch se ejecuta de forma secuencial. Comienza a ejecutar las sentencias cuando encuentra un caso cuya 
expresión coincide con la expresión de switch. Continúa ejecutando las sentencias hasta el final del bloque switch o hasta que
encuentre una sentencia "break". Si falta el "break," ejecutará las sentencias del siguiente caso. Es fundamental entender esto
para evitar errores en el código.*/

do {
    $eleccionUsuario = seleccionarOpcion();
    $cantidadPalabras = count($coleccionPalabras);
    switch($eleccionUsuario) {
        case 1:
            $nombreJugador = solicitarJugador();
            $numCantidadPalabras = count($coleccionPalabras); 
            echo "ingrese el numero palabra para jugar (entre 1 y $numCantidadPalabras): "; 
            $numPartida = solicitarNumeroEntre(1,$numCantidadPalabras) - 1;  
            $contador = 0;  
            $jugoPalabra = false; 
            do {   
              while($contador < count($coleccionPartidas) && ($coleccionPartidas[$contador]["jugador"] != $nombreJugador || $coleccionPalabras[$numPartida] != $coleccionPartidas[$contador]["palabraWordix"])) {
              $contador++;
              $jugoPalabra = false;
              }
              if ($contador < count($coleccionPartidas)) {
                 $jugoPalabra = true;
                 echo "La palabra ya fue jugada por el jugador" . " $nombreJugador \n";
                 echo "ingrese otro numero para jugar: ";
                 $numPartida = solicitarNumeroEntre(1,$numCantidadPalabras) - 1;
                 $contador = 0;
              }
            } while($jugoPalabra == true);
            $nuevaPartida = jugarWordix( $coleccionPalabras[$numPartida],$nombreJugador);
            array_push($coleccionPartidas , $nuevaPartida);
            break; 
        case 2:
            $nombreJugador = solicitarJugador();
            $numCantidadPalabras = count($coleccionPalabras); 
            $numPartida = rand(0, $numCantidadPalabras);
            $contador = 0;  
            $jugoPalabra = false; 
            do {   
              while($contador < count($coleccionPartidas) && ($coleccionPartidas[$contador]["jugador"] != $nombreJugador || $coleccionPalabras[$numPartida] != $coleccionPartidas[$contador]["palabraWordix"])) {
              $contador++;
              $jugoPalabra = false;
              }
              if ($contador < count($coleccionPartidas)) {
                 $jugoPalabra = true;
                 $numPartida = rand(0, $numCantidadPalabras);
                 $contador = 0;
              }
            } while($jugoPalabra == true);
            $nuevaPartida = jugarWordix( $coleccionPalabras[$numPartida],$nombreJugador);
            array_push($coleccionPartidas , $nuevaPartida);
            break; 
        case 3:
            $partidasDisponibles = count($coleccionPartidas)  ;
            echo "Ingrese el numero de partida que desea ver (entre 1 y $partidasDisponibles): ";
            $numPartida = (int)trim(fgets(STDIN)) - 1 ;
            $respuesta = mostrarPartida($numPartida , $coleccionPartidas);
            echo $respuesta; 
            break;
        case 4:
            $nombreJugadorVictoria = solicitarJugador(); 
            $coleccionPartidas = cargarPartidas();
            $contador = 0;
            while($contador < count($coleccionPartidas) && $coleccionPartidas[$contador]["jugador"] != $nombreJugadorVictoria) {
                $contador++;
            }
            if ($contador == count($coleccionPartidas)) {
                echo "No hay partidas registradas sobre este jugador \n";
            } else {
                $numPrimeraVictoria = primeraVictoria($nombreJugadorVictoria, $coleccionPartidas);
                $respuesta = mostrarPartida($numPrimeraVictoria, $coleccionPartidas);
                if ($numPrimeraVictoria >= 0){
                    echo $respuesta;
                }
                else{
                    echo "El jugador ". $nombreJugadorVictoria . " no gano ninguna partida \n";
                }
            }
            break;
        case 5:
            $nombreJugador = solicitarJugador();
            $resumen = devuelveResumen($coleccionPartidas, $nombreJugador);
            $coleccionPartidas = cargarPartidas();
            $contador = 0;
            while($contador < count($coleccionPartidas) && $coleccionPartidas[$contador]["jugador"] != $nombreJugador) {
                $contador++;
            }
            if ($contador == count($coleccionPartidas)) {
                echo "No hay partidas registradas sobre este jugador por lo que no se puede mostrar un resumen. \n";
            } else {
            mostrarResumen($resumen);
            }
            break;
        case 6:
            partidasOrdenadas($coleccionPartidas);
            break;
        case 7:
            $palabraNueva = leerPalabra5Letras();
            $nuevaColeccion = agregarPalabra($coleccionPalabras , $palabraNueva);
            $coleccionPalabras = $nuevaColeccion;
            break;
        case 8:
            break;
    }
} while ($eleccionUsuario != 8);