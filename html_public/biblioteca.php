<?php
$salida="";
$salida2="";
$salida3 = "";

if (isset($_GET["q"]))
{
    $nombre = $_GET["q"];
    
    $mysqli = new mysqli("127.0.0.1", "u562383642_diego", "123456789Aa*", "u562383642_tarea06");
    if (!$mysqli->connect_error)
    {
    $mysqli->set_charset("utf8");
    
    $sql = "SELECT * FROM Autor WHERE nombre LIKE '%$nombre%' ORDER BY nombre";
    $sql2= "SELECT * FROM Libro WHERE id_autor=(
    				SELECT id FROM Autor WHERE nombre LIKE '%$nombre%')";

    if (($resultado = $mysqli->query($sql)) && (!$mysqli->error))
    {
        //Trabajar con datos
        while ($fila = $resultado->fetch_assoc())
        {
          //Procesar result set como asociativo
          $salida = $salida . "<br><b>".$fila["nombre"]." ".$fila["apellidos"]."</b>";
        }
    }

    if (($resultado2 = $mysqli->query($sql2)) && (!$mysqli->error))
    {
    	while ($fila2 = $resultado2->fetch_assoc())
    	{
    	    //Procesar result set como asociativo
    		$salida2 = $salida2 . "<li>".$fila2["titulo"]."</li>";
    	}
	}

    $salida3 = $salida.$salida2;
    
    }
    //$resultado->free();
    //$resultado2->free();
    $mysqli->close();


}

echo $salida3;
?>