
<?php

/* Esta primera cagada llamada aplicacion consume la api de un desparchado sarnoso que se 
la pasa viendo la última mierdipeli de Marvel que va a salir.
A fecha de hoy (04/07/2025) la próxima peli que va a salir es la de los 4 fantasticos (medio se salva por Pedrito pascal)
El caso es que se usa cURL para realizar la petición y se muestra con html y toda la vaina
Este esperpento de app acopla lógica y vista en un solo fichero, por lo que es un mero acercamiento a php,
si se empeña en usar esta cagada en vida real lo echan a escopetasos de la empresa
*/
const API_URL = "https://whenisthenextmcufilm.com/api";
# Inicializar una nueva sesión de cURL; ch = cURL handle
$ch = curl_init(API_URL);
// Indicar que queremos recibir el resultado de la petición y no mostrarla en la pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* Ejecutar la operacion
y guardamos el resultado
*/
$result = curl_exec($ch);
$data = json_decode($result,true);
curl_close($ch);

?>

<head>
	<title>La proxima peli de Marvel</title>

	<meta name="description" content="la proxima peli de marvel :D"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
>
</head>
<main>
	<section>
		<img src="<?= $data["poster_url"];?>" width="200" alt="Poster de <?= $data["title"]?>"
		style = "border-radius: 16px;" />

	</section>
	<hgroup>
		<h2><?= $data["title"]?> se estrena en <?=$data["days_until"]?> días</h2>
		<p>Fecha de estreno: <?= $data["release_date"]?></p>
		<p>La siguiente es: <?= $data["following_production"]["title"]?></p>
	</hgroup>
</main>


<style>
	:root{
		color-scheme: light dark;
	}
	body{
		display: grid;
		place-content: center;
		justify-items: center;
	}
	img{
		margin: 0 auto;
	}
	section{
		display: flex;
		justify-content: center;
	}
	hgroup{
		display: flex;
		flex-direction: column;
		justify-content: center;
		text-align: center;
	}
</style>