<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="sweetalert/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="CSS/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <title>Login SUBE</title>


</head>
<body class="bg-img">
    <?php
    session_start();
    $nombreSesion;
    $usuarioId;
    $usuarioAdmin= "0";
    if (isset($_SESSION["OPR_USUARIO"])) {
    //////////////////////////////////
    }
    else
    {
    header("Location: index.html");
    }


    ?>
<script>
          $(function(){     
  var d = new Date(),        
      h = d.getHours(),
      m = d.getMinutes();
  if(h < 10) h = '0' + h; 
  if(m < 10) m = '0' + m; 
  $('input[type="time"][value="now"]').each(function(){ 
    $(this).attr({'value': h + ':' + m});
  });
});
</script>



    <div id="frmIngManual">
	
	<center><h2>Ingresos Manuales</h2></center>


	<table id="tablaAntenaEntrada" name="tablaAntenaEntrada">
		<tr>
			<td>LECTURA</td>
			<td>RUT</td>
			<td>NOMBRE</td>
			<td>DESCRIPCION</td>
			<td>HORA</td>
		</tr>
	</table>
	
	<table id="tablaAntenaSalida" name="tablaAntenaSalida">
		<tr>
			<td>ID LECTURA</td>
			<td>RUT</td>
			<td>NOMBRE</td>
			<td>DESCRIPCION</td>
			<td>HORA</td>
		</tr>
	</table>
	



    </div>
    <script>
	
  setInterval(function()
  { 
	$.ajax({
    type: 'GET',
    url: 'funciones.php',
    data: {"logAntenaUhf":1},
    error: function (jqXHR, textStatus, errorThrown) {

    },
    success: function (response) {
	
    var len = response.length;
	$("#tblEventos").empty();
	  
	document.getElementById("tablaAntenaEntrada").insertRow(-1).innerHTML = '<td>ID LECTURA</td><td>RUT</td><td>NOMBRE</td><td>DESCRIPCION</td><td>HORA</td>'
    for (var i = 0; i < len; i++) 
	{
	
        var RUT_CIC = response[i].CIC_RUT,
		NOMBRE = response[i].CIC_NOMBRE,
		ENTRADA = response[i].HORA_ENTRADA,
		SALIDA = response[i].HORA_SALIDA;
		document.getElementById("tblEventos").insertRow(-1).innerHTML = 
		'<td>' + (i+1) +
		'</td><td>' + RUT_CIC +
		'</td><td>' + NOMBRE.toUpperCase() +
		'</td><td>' + ENTRADA +
		'</td><td>' + (SALIDA == ENTRADA? '' : SALIDA) +
	//	'</td><td>' + (SALIDA == null? '' : SALIDA) + // PARA BICICLETAS
		'</td>';
                     
    }

    }
    });
	//alert("Hello"); 
  
  }, 5000);



    </script>

    <script src="js/Principal.js"></script>
    <script type="text/javascript">



        $(document).ready(function () {

            $("input").keydown(function (e) {
                // Capturamos qué telca ha sido
                var keyCode = e.which;
                // Si la tecla es el Intro/Enter
                if (keyCode == 13) {
                    // Evitamos que se ejecute eventos
                    event.preventDefault();
                    // Devolvemos falso
                    return false;
                }
            });

  
            //AJAX NUEVO USUARIO SIN BICICLETA
            $('#idFormRegMov').submit(function (e) {

                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: 'funciones.php',
                    data: $(this).serialize(),
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Error: " + jqXHR + " +" + textStatus + " +" + errorThrown);
                    },
                    success: function (response) {
                        alert("Movimiento Registrado Correctamente");

                        document.getElementById("idRutMM").value = "";
                        document.getElementById("idTipoMovimientoMM ").value = "NULL";

                    }

                });
            });


        });



    </script>

</body>
</html>
