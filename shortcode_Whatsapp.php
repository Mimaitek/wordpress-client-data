<?php
//Recogemos el valor  valor que tenemos almacenado en la key
$telefono = get_option($telefono_dato, '');	

//iniciamos la funcion

function llamar_enlacew($atts){

//hacemos la variable global para trabajar con ella y creamos un array para añadir parámetros
	global $telefono;
	$telefono = shortcode_atts( array (
      'numero' => '600600600',
      'prefijo' => '34',
	  'texto' => 'Quiero recibir información'	
      ), $atts );
    // con estos parámetros podemos usar el telefono/prefijo/texto que tenemos predefinido (o en nuestra BBDD) o introducirlo a mano.
    $enlace_llamar = '<a href="whatsapp://send/?phone='.$telefono['prefijo'].$telefono['numero'].'&text='.$telefono['texto']. '">Preguntar por Whatsapp</a>';
    return $enlace_llamar;
    }
// añadimos el shortcode para utilizarlo en Wordpress
    add_shortcode('wapp','llamar_enlacew');

?>
