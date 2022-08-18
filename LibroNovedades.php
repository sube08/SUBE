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
    <title>Libro Novedades - SUBE</title>


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

        $(function () {
            var d = new Date();
            var dia = d.getDate();
            var mes = d.getMonth();
            var anio = d.getFullYear();

            if (dia < 10) dia = '0' + dia;
            if (mes < 10) mes = '0' + mes;

            $('input[type="date"]').each(function () {
                $(this).attr({ 'value': anio + '-' + (mes + 1) + '-' + dia });
            });

        });
        buscarAnotaciones();
    </script>

    <table style="width:90%">
        <tr>
            <td align="right"><img style="width:80px; height:80px;" align='right' src="Img/cofodep-logo-1.png" /></td>
        </tr>
    </table>
    <div id="frm" style="width: 98%">
        <br />
        <div id="divUsuarioSistema" name="divUsuarioSistema">Usuario: <?PHP   ECHO $_SESSION["OPR_NOMBRE"] ?>&nbsp; </div>
        <table style="max-width:100%">
             <div id="divMenu" class="icon-bar">
                <a class="active" style="width: 185px" href="MenuPrincipal.php" title="INICIO" name="menuInicio" id="menuInicio"><i class="fa fa-home"><br><label style="font-size: small; font-family:courier,arial,helvética;">Principal</label></i></a>
                <a href="NuevoUsuario.php" style="width: 185px" title="NUEVO USUARIO" name="nuevoUsuario" id="nuevoUsuario"><i class="fa fa-user-plus"><br><label style="font-size: small; font-family:courier,arial,helvética;">Nuevo Usuario</label></i></a>
                <a href="Mov_sin_tarjeta.php" style="width: 185px" title="AGREGA REGISTRO MANUAL" name="addManual" id="addMaual"><i class="fa fa-pencil-square-o"><br><label style="font-size: small; font-family:courier,arial,helvética;">Registro Manual</label></i></a>
                <a href="EditarUsuario.php" style="width: 185px" title="BUSCAR" id="buscUsuarios" name="buscUsuarios"><i class="fa fa-search"><br><label style="font-size: small; font-family:courier,arial,helvética;">Buscar Usuario</label></i></a>
                <a href="LibroNovedades.php" style="width: 185px" title="Libro de Novedades"><i class="fa fa-book"><br><label style="font-size: small; font-family:courier,arial,helvética;">Libro de Novedades</label></i></a>
                <a href="Ayuda.php" title="AYUDA" style="width: 185px" ><i class="fa fa-info-circle"><br><label style="font-size: small; font-family:courier,arial,helvética;">Ayuda</label></i></a>
                
                <a href="#" style="width: 185px" title="SALIR" id="CloseSesion" name="CloseSesion"><i class="fa fa-sign-out"><br><label style="font-size: small; font-family:courier,arial,helvética;">Salir</label></i></a>
            </div>        </table>

        <hr />


        <center><h2>Libro de Novedades</h2></center>
        <br />

        <div class="container">
            <div class="row">
                <div class="col">
                    <label>HORA</label>
                    <div class="input-group" style="width:300px">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                        </div>
                        <input id="txtHoraAnotacion" name="txtHoraAnotacion" disabled type="time" value="now" style="width:200px" class="form-control form-control-sm" required />
                    </div>
                </div>
            </div>
            &nbsp;
            <div class="row">
                <div class="col">
                    <label>Anotación</label>
                    <div class="input-group" style="width:700px; height:100px">

                        <textArea rows="2" id="txtAnotacion" name="txtAnotacion" style="width:50px; resize: none; font-size: 12px" value="" size="30" placeholder="Escribir anotación, máximo 250 caracteres..." maxlength="250" class="form-control"></textArea>

                    </div>
                </div>
            </div>
            <br />
            <center><input type="button" id="btnGuardarAnot" name="btnGuardarAnot" class="btn btn-danger" style="width:180px; align:right; font-family: 'Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif'" value="Guardar" /></center>
            <br />

            <label for="fehaRegAnotaciones">Registros con fecha:</label>
            <br />
            <input type="date" id="fehaRegAnotaciones" name="fehaRegAnotaciones"
                   value="2021-11-07"
                   min="2021-08-11" max="2099-12-31">
            <input type="button" id="btnBuscarAnot" name="btnBuscarAnot" class="btn btn-success btn-sm" style="width:110px; align:right; font-family: 'Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif'" value="Buscar" />
            <br />
            <br />
            <div style="height:220px; width:100%; overflow:auto;">
                <center>
                    <table id="tblAnotaciones" name="tblAnotaciones" class="tablaCLientes">
                        <tr>
                            <td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">N° Anotación</font></td>
                            <td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Fecha</font></td>
                            <td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Hora</font></td>
                            <td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Operador</font></td>
                            <td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Anotación</font></td>
                        </tr>
                    </table>
                </center>
            </div>


        </div>



        <script type="text/javascript">
            $(document).ready(function () {


                //GUARDAR ANOTACION
                $('#btnGuardarAnot').click(function (e) {
                    document.getElementById("btnGuardarAnot").disabled = true;
                    var txtAnotacion = document.getElementById("txtAnotacion").value
                    txtAnotacion = txtAnotacion.trim();
                    if (txtAnotacion.length < 10) {
                        swal({ title: 'Error', text: 'Debe ingresar un texto válido en el cuadro', type: 'error' });
                        document.getElementById("btnGuardarAnot").disabled = false;

                        return "";
                    }
                    e.preventDefault();
                    $.ajax({
                        type: "GET",
                        url: 'funciones.php',
                        data: { "txtAnotacionIns": txtAnotacion },
                        error: function (jqXHR, textStatus, errorThrown) {
                            swal({ title: 'Error', text: 'No se pudo almacenar el registro. Error de conexión', type: 'error' });
                            document.getElementById("btnGuardarAnot").disabled = true;

                        },
                        success: function (response) {
                            swal({ title: 'Exito', text: 'Anotación agregada correctamente', type: 'success' });
                            document.getElementById("txtAnotacion").value = "";
                            document.getElementById("btnGuardarAnot").disabled = false;

                            buscarAnotaciones();

                        }

                    });
                });



                $("#btnBuscarAnot").click(function () {

                    buscarAnotaciones();


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


                //BUSCAR ANOTACIONES POR FECHA
                function buscarAnotaciones() {

                    var fechaAnotacionesBusc = document.getElementById("fehaRegAnotaciones").value;
                    $("#tblAnotaciones").empty();

                    document.getElementById("tblAnotaciones").insertRow(-1).innerHTML = '<tr><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">N° Anotación</font></td>' +
                        '<td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Fecha</font></td>' +
                        '<td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Hora</font></td>' +
                        '<td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Operador</font></td>' +
                        '<td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Anotación</font></td>';


                    $.ajax({
                        type: 'GET',
                        url: 'funciones.php',
                        data: { "fehaRegAnotaciones": fechaAnotacionesBusc },
                        error: function (jqXHR, textStatus, errorThrown) {
                            swal({ title: 'Error', text: 'No se pudo obtener los registros. Error de conexión', type: 'error' });
                        },
                        success: function (response) {

                            var len = response.length;

                            for (var i = 0; i < len; i++) {

                                var lib_id = response[i].LIB_ID,
                                    fecha_lib = response[i].FECHA,
                                    hora_lib = response[i].HORA,
                                    nombre_lib = response[i].OPR_NOMBRE,
                                    descr_lib = response[i].LIB_DESCRIPCION;
                                document.getElementById("tblAnotaciones").insertRow(-1).innerHTML =
                                    '<td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + lib_id +
                                    '</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + fecha_lib +
                                    '</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + hora_lib +
                                    '</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + nombre_lib +
                                    '</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + descr_lib +
                                    '</font></td>';

                            }

                        }
                    });

                }




            });</script>

</body>
</html>
