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

//4-Función leerPalabra5Letras
/**
 *  Se pide el ingreso de palabra de 5 letras, garantizando que el retorno sea una palabra con dicha condición
 * La función strtoupper convierte el string en mayúsculas (en su totalidad de carácteres)
 * Es utilizada la función esPalabra
 * @return string 
 */
function leerPalabra5Letras()
{
    //string $palabra
    echo "Ingrese una palabra de 5 letras: ";
    $palabra = trim(fgets(STDIN));
    $palabra  = strtoupper($palabra);

    while ((strlen($palabra) != 5) || !esPalabra($palabra)) {
        echo "Debe ingresar una palabra de 5 letras:";
        $palabra = strtoupper(trim(fgets(STDIN)));
    }
    return $palabra;
}

//5-Funcion solicitarNumeroEntre 
/** 
 * Se encarga de garantizar que el valor ingresado por el usuario cumpla con las condiciones de: ser un número entero y estar dentro del rango especificado
 *@param int $min
 *@param int $max
 *@return int 
 */
function solicitarNumeroEntre($min, $max)   // permite solicitar un numero entre dados por parametros. Si no cumplen las restricciones, vuelve a preguntar.
{
    //int $numero

    $numero = trim(fgets(STDIN));

    if (is_numeric($numero)) { //determina si un string es un número. puede ser float como entero.
        $numero  = $numero * 1; //con esta operación convierto el string en número.
    }
    while (!(is_numeric($numero) && (($numero == (int)$numero) && ($numero >= $min && $numero <= $max)))) {
        echo "Debe ingresar un número entre " . $min . " y " . $max . ": ";
        $numero = trim(fgets(STDIN));
        if (is_numeric($numero)) {
            $numero  = $numero * 1;
        }
    }
    return $numero;
}

//6-Funcion mostrarPartida 
/**
 * toma como parametro una partida para mostrar. Si se encuentra la muestra. Sino solicita otra partida
 * @param int $numPartida
 * @return string
 */

 // se le solicita un num al usuario

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
 * Recibe como parámetros la colección de palabras y la nueva palabra. La nueva palabra se agrega, solo si esta ya no pertenece a la colección.
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
        $coleccionPalabras[] = $nuevaPalabra;
        echo "¡Éxito! La palabra $nuevaPalabra ha sido agregada.\n";
    }

    return $coleccionPalabras; // Retorna la colección actualizada
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
 * Hace una comparación entre los valores de dos índices de un array (en este caso, compara 'jugador' y 'palabraWordix'), devolviendo un valor diferente dependiendo cada caso
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
                $coleccionPalabras = agregarPalabra($coleccionPalabras, $nuevaPalabra);
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