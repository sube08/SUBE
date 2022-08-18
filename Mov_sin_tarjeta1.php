<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="sweetalert/dist/sweetalert.js"></script>
    <link href="sweetalert/assets/docs.css" rel="stylesheet">

    <script src="dist/sweetalert.js"></script>
    <link rel="stylesheet" href="sweetalert/dist/sweetalert.css">
    <link rel="shortcut icon" href="Img/fav-SUBE.png">


    <link rel="stylesheet" href="CSS/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/font-awesome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <title>Ingresos Manuales - SUBE</title>

<!--    <script>
  function valida_enviaF(){ 
   	//valido el nombre 
   	varRut = document.getElementById("idRutMM").value;
        
        if( varRut == null || varRut.length == 0 ) 
        {
//            alert("Favor Ingresar Nombre...");
            swal({ title: 'Error', text: 'Favor ingresar RUT', type: 'error' });
            document.getElementById("idRutMM").focus();
            event.stopImmediatePropagation();


        }       
        else{} 
   	
    }
</script>   -->

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
        $(function () {
            var d = new Date(),
                h = d.getHours(),
                m = d.getMinutes();
            if (h < 10) h = '0' + h;
            if (m < 10) m = '0' + m;
            $('input[type="time"][value="now"]').each(function () {
                $(this).attr({ 'value': h + ':' + m });
            });
        });
    </script>

    <table style="width:90%">
        <tr>
            <td align="right"><img style="width:80px; height:80px;" align='right' src="Img/cofodep-logo-1.png" /></td>
        </tr>
    </table>
    <div id="frm">
        <br />
        <div id="divUsuarioSistema" name="divUsuarioSistema">Usuario: <?PHP   ECHO $_SESSION["OPR_NOMBRE"] ?>&nbsp; </div>
        <table style="max-width:100%">
             <div id="divMenu" class="icon-bar">
                <a class="active" style="width: 185px" href="MenuPrincipal.php" title="INICIO" name="menuInicio" id="menuInicio"><i class="fa fa-home"><br><label style="font-size: small; font-family:courier,arial,helvética;">Principal</label></i></a>
                <a href="NuevoUsuario.php" style="width: 185px" title="NUEVO USUARIO" name="nuevoUsuario" id="nuevoUsuario"><i class="fa fa-user-plus"><br><label style="font-size: small; font-family:courier,arial,helvética;">Nuevo Usuario</label></i></a>
                <a href="Mov_sin_tarjeta.php" style="width: 185px" title="AGREGA REGISTRO MANUAL" name="addManual" id="addMaual"><i class="fa fa-pencil-square-o"><br><label style="font-size: small; font-family:courier,arial,helvética;">Registro Manual</label></i></a>
                <a href="EditarUsuario.php" style="width: 185px" title="BUSCAR" id="buscUsuarios" name="buscUsuarios"><i class="fa fa-search"><br><label style="font-size: small; font-family:courier,arial,helvética;">Buscar Usuario</label></i></a>
                <a href="LibroNovedades.php" style="width: 185px" title="Libro de Novedades"><i class="fa fa-book"><br><label style="font-size: small; font-family:courier,arial,helvética;">Libro de Novedades</label></i></a>
                <a href="" title="Ayuda" style="width: 185px" ><i class="fa fa-info-circle"><br><label style="font-size: small; font-family:courier,arial,helvética;">Ayuda</label></i></a>
                <a href="#" style="width: 185px" title="SALIR" id="CloseSesion" name="CloseSesion"><i class="fa fa-sign-out"><br><label style="font-size: small; font-family:courier,arial,helvética;">Salir</label></i></a>
            </div>
        </table>

        <hr />
        </br>

        <center><h2>Ingresos Manuales</h2></center>


        <p style="text-align:justify;">En este formulario podrá insertar un registro de forma manual que se almacenará como un movimiento de un ciclista registrado, ya sea ingreso o salida del estacionamiento según se requiera. Este formulario es de uso exclusivo para casos de ausencia de tarjeta BIP(nfc)</p>

        <form id="idFormRegMov" name="idFormRegMov" method="GET" action="funciones.php" style="max-width:100%">

            <div class="container">
                <div class="row" style="width:50%">
                    <div class="col">
                        <label>RUT</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-user"></i></div>
                            </div>
                            <input id="idRutMM" name="idRutMM" type="text" maxlength="12" placeholder="Ej. 18.773.566-6" class="form-control form-control-sm" style="width:200px" onkeyup="blurRutField(this)" onblur="CargaBicicletas(this)" required />
                        </div>
                    </div>
                </div>
                &nbsp;
                <div class="row" style="width:50%">
                    <div class="col">
                        <label>HORA</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                            </div>
                            <input id="horaMovimiento" name="horaMovimiento" type="time" value="now" class="form-control form-control-sm" style="width:200px" required />
                        </div>
                    </div>
                </div>
                &nbsp;
                <div class="row" style="width:50%">
                    <div class="col">
                        <label>BICICLETA</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-bicycle"></i></div>
                            </div>
                            <select style="width: 400px" id="cmbBicicleta" name="cmbBicicleta" class="form-select form-select-sm" required>
                                <option value="0">Sin Bicicleta</option>

                            </select>
                        </div>
                    </div>
                </div>
                &nbsp;
                <div class="row" style="width:50%">
                    <div class="col">
                        <label>MOVIMIENTO</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-exchange"></i></div>
                            </div>
                            <select id="idTipoMovimientoMM" name="idTipoMovimientoMM" style="width:200px" class="form-select form-select-sm" required>
                                <option value="1">ENTRADA</option>
                                <option value="2">SALIDA</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>


            <br />

            <center>  <input type="submit" id="idRealizarMovimiento" name="idRealizarMovimiento" onclick="" class="btn btn-primary" style="width: 180px" value="Guardar" /> </center>

        </form>


    </div>
    <script src="js/Principal.js"></script>
    <script type="text/javascript">


        function CargaBicicletas(rut) {
            $("#tblBicCic").empty();


            var cmbBic = document.getElementById('cmbBicicleta');
            var length = cmbBic.options.length;
            for (i = length - 1; i >= 0; i--) {
                cmbBic.options[i] = null;
            }


            var res = checkearRutCic(rut, 1);


            var nroRut = rut.value;
			
			 var opt0 = document.createElement('option');
                        opt0.value = 0;
                        opt0.innerHTML = 'Sin Bicicleta';
                        cmbBic.appendChild(opt0);


            $.ajax({
                type: 'GET',
                url: 'funciones.php',
                data: { "rutObtBic": nroRut },
                error: function (jqXHR, textStatus, errorThrown) {

                },
                success: function (response) {

                    var len = response.length;

                    for (var i = 0; i < len; i++) {

                        var BIC_ID = response[i].BIC_ID,
                            NRO_TAG = response[i].BIC_NRO_TAG,
                            MODELO = response[i].BIC_MODELO,
                            DESCR = response[i].BIC_DESCRIPCION;


                       


                        var opt = document.createElement('option');
                        opt.value = BIC_ID;
                        opt.innerHTML = MODELO + " - " + DESCR;
                        cmbBic.appendChild(opt);

                    }

                }
            });

        }


        function validation() {
            var id = document.f1.user.value;
            var ps = document.f1.pass.value;
            if (id.length == "" && ps.length == "") {
                alert("Ingrese sus credenciales");
                return false;
            }
            else {
                if (id.length == "") {
                    alert("Ingrese un nombre de usuario");
                    return false;
                }
                if (ps.length == "") {
                    alert("Ingrese una password");
                    return false;
                }
            }
        }
    </script>

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

            //CERRAR SESION
            $('#CloseSesion').click(function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'funciones.php',
                    dataType: 'json',
                    data: { cerrarSesion: 1 },
                    success: function (response) {

                    },

                });
                url = "index.html";
                $(location).attr('href', url);
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
                        swal({ title: 'Exito', text: 'Movimiento Registrado Correctamente', type: 'success' });
                        //alert("Movimiento Registrado Correctamente");

                        document.getElementById("idRutMM").value = "";
                        document.getElementById("idTipoMovimientoMM ").value = "NULL";

                    }

                });
            });


        });



    </script>

</body>
</html>
