<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Mostrar datos json</title>
 

	</head>

	<body>
		
		<section>
		<?php
        //Llamar api
        $json = file_get_contents("https://servicios.ine.es/wstempus/js/es/DATOS_TABLA/2891?tip=AM");

		//Decodificar json, extraer datos
		$datos = json_decode($json, true);
		
		//var_dump($datos);
		
         foreach($datos as $dato)
        {	
			if(!preg_match("/(Hombres|Mujeres)/",$dato["Nombre"]))
			{
			$cadena = strtok($dato["Nombre"], '.');
			echo "<b>".$cadena."</b>"."<br>";
			foreach($dato["Data"] as $pob)
			{	
				if ($pob["Anyo"]==2021)
					{
					echo "Año: ".$pob["Anyo"].". "."Número de habitantes: ". $pob["Valor"]."<br>"."<br>";
					}
			}
			}
		}

		?>
		</section>		
	</body>
</html>