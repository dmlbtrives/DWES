<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<script>
	$(document).ready(function(){
		$("#texto").keyup(function(){
			var regExp= /^[a-zA-Z]*$/;
			if (regExp.test($("#texto").val())){ 
				$("#sugerencias").load("biblioteca.php?q=" + $("#texto").val());
			}
			else{
				$("#sugerencias").html("introduce sólo letras");
			}
		});
	});
</script>
</head>
<body>
<p><b>Búsqueda de usuarios:</b></p>
<form>
<!--
Cada vez que tecleamos algo en este field se ejecutará mostrar_sugerencias
-->
Contacto: <input type="text" id="texto">
</form>
<!-- En el span con id="sugerencias" mostraremos las coincidencias -->
<p><strong>Sugerencias:</strong> <span id="sugerencias" style="color: #0080FF;"></span></p>
</body>
</html>

