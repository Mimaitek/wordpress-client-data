<?php

//recogemos los valores persistentes en nuestro plugin y lo almacenamos en una variable
 	      $nombre = get_option($nombre_dato, '');
        $apellidos = get_option($apellidos_dato, '');
        $dni_cif = get_option($dni_cif_dato, '');
        $direccion = get_option($direccion_dato, '');
        $telefono = get_option($telefono_dato, '');
        $email = get_option($email_dato, '');
        $paginaweb = get_option($paginaweb_dato, '');
        $dominio = get_option($dominio_dato, '');
        $observaciones = get_option($observaciones_dato, '');

function devolver_shortcodes($atts){
	// Creamos la función para más tarde hacer globales dichas variables
  global $nombre, $apellidos, $direccion, $dni_cif, $telefono, $email, $paginaweb, $dominio;
	
  
  // Generamos un array asociativo con los valores
	$atts = shortcode_atts(
		array(
			      'nombre' => $nombre,
            'apellidos' => $apellidos,
			      'direccion' => $direccion,
            'dni_cif' => $dni_cif,
            'telefono' => $telefono,
            'paginaweb' => $paginaweb,
            'email' => $email,
            'dominio' => $dominio    
		), $atts, 'cliente');

	 $datos = '<p>'.$atts['nombre']. ' ' .$atts['apellidos']. ' '.$atts['direccion']. ' '.$atts['dni_cif']. ' '.$atts['telefono']. ' '.$atts['paginaweb']. ' '.$atts['email']. ' '.$atts['dominio'].'</p>';
	// Retornamos los valores, podremos recuperar los todos los valores, algunos o simplemente introducir otros al usar parámetros
	return $datos;
  }
add_shortcode('cliente','devolver_shortcodes');

[clientes nombre=" ...." apellidos = "...." direccion ="....." dni_cif="..." telefono="....." paginaweb="...." email="..." dominio="...."]
//Introduciendo el shortcode cliente sy los parámetros que queramos imprimiremos por pantalla lo que queramos.
?>
