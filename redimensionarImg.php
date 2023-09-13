<?php 

function redimensionarImg($imagen, $ancho_f, $alto_f){
	// Extraemos atributos de la imagen
	list($ancho_i, $alto_i, $nro_tipo) = getimagesize($imagen);

	// Creamos una variable a partir de la imagen original según su tipo
	switch ($nro_tipo) {
		case 1: $img_inicial = imagecreatefromgif($imagen); break;
		case 2: $img_inicial = imagecreatefromjpeg($imagen); break;
		case 3: $img_inicial = imagecreatefrompng($imagen); break;
		default:
			echo "imagen inválida";
			break;
	}

	// Calculamos RATIO proporción entre las magnitudes originales y finales
	$ratio_ancho = $ancho_f / $ancho_i;
	$ratio_alto = $alto_f / $alto_i;

	// Obtenemos el máximo entre los RATIOS
	$ratio_max = max($ratio_ancho, $ratio_alto);

	// Utilizamos el ratio máximo para calcular el nuevo ancho y alto de la imagen
	$nvo_ancho = $ancho_i * $ratio_max;
	$nvo_alto = $alto_i * $ratio_max;

	// Calculamos recortes
	$cortar_ancho = $nvo_ancho - $ancho_f;
	$cortar_alto = $nvo_alto - $alto_f;

	// Definimos el desplazamiento en 0.5 para recortar la parte central de la imagen
	$desplazamiento = 0.5;

	// Creamos una imagen en blanco con los tamaños finales
	$nueva_img = imagecreatetruecolor($ancho_f, $alto_f);

	// Copiamos la imagen original sobre la que acabamos de crear en blanco
	imagecopyresampled($nueva_img, $img_inicial, -$cortar_ancho * $desplazamiento, -$cortar_alto * $desplazamiento, 0, 0, $ancho_f + $cortar_ancho, $alto_f + $cortar_alto, $ancho_i, $alto_i);

	// Destruimos la variable original para liberar memoria
	imagedestroy($img_inicial);

	// Definimos la calidad de la imagen a guardar
	$calidad = 60;

	// Definimos el nombre final de la imagen, para que sea único lo concatenamos con la función time()
	$nbr_img = time() . "-" . $imagen;

	// Creamos la imagen final en el directorio indicado
	imagejpeg($nueva_img, 'imagenes/' . $nbr_img, $calidad);
	chmod('imagenes/' . $nbr_img, 0777);

	// Retornamos el nombre de la nueva imagen
	return $nbr_img;
}

 ?>