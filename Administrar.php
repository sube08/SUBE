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
    <title>Menú Principal - SUBE</title>




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
                <a href="Ayuda.php" title="Ayuda" style="width: 185px" ><i class="fa fa-info-circle"><br><label style="font-size: small; font-family:courier,arial,helvética;">Ayuda</label></i></a>
                <a href="Administrar.php" title="ADMINISTRAR" style="width: 185px"><i class="fa fa-cogs"><br><label style="font-size: small; font-family:courier,arial,helvética;">Administrar</label></i></a>
                <a href="#" style="width: 185px" title="SALIR" id="CloseSesion" name="CloseSesion"><i class="fa fa-sign-out"><br><label style="font-size: small; font-family:courier,arial,helvética;">Salir</label></i></a>
            </div>
        </table>
        <!--<a href="Mov_sin_tarjeta.php" target="_blank" onclick="window.open(this.href, this.target, 'width=600,height=400'); return false;">Movimientos sin tarjeta</a>-->
        <br />
        <br />
        <hr />
        <!-- <center><img style="width:700px; height:400px" src="img/Logo-SUBE.png" /></center> -->
        <div id="divContenido" name="divContenido" style="padding-left:30px; padding-right:30px;">







        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="/docs/3.0/index.html" class="brand-link logo-switch">
                <img src="../docs/3.0/assets/img/logo-xs.png" alt="AdminLTE Docs Logo Small" class="brand-image-xl logo-xs">
                <img src="../docs/3.0/assets/img/logo-xl.png" alt="AdminLTE Docs Logo Large" class="brand-image-xs logo-xl" style="left: 12px">

            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link active">
                                <i class="nav-icon"></i>
                                <p>
                                    Administración
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Beneficios
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="ListarBeneficios.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Listar Beneficios</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="CrearBeneficio.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Nuevo beneficio</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Actividades
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="ListarActividades.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Listar actividades</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="Actividades.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Nueva Actividad</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Noticias
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="ListarNoticias.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Listar Noticias</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="CrearNoticia.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Nueva noticia</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Emprendedores
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="ListarEmprendedores.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Listar Emprendedores</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="CrearEmprendedor.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Nuevo Emprendedor</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Notificación
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="ListarNotificaciones.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Listar Notificaciones</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="CrearNotificacion.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Nueva Notificación</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Usuarios
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="ListarUsuarios.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Listar Usuarios</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>

        </aside>














        </div>
        <!--   <center><img style="width:100%; height:400px; opacity: 0.5" src="img/Logo-SUBE.png" /></center> -->
    </div>
    <script>

        function mostrarMensaje() {
            var rut = document.querySelector("#txtRut_");
            alert("aqui voy");
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
    <div id="fondoAvisoCorrecto" name="fondoAvisoCorrecto" class="fondo-correcto">
        <div class="correcto">
            <br /><br />
            <center>
                <TABLE style="max-width:100%">
                    <tr>
                        <td><img src="img/correcto.jfif" /></td>
                        <td id="textCuadroOk"></td>
                    </tr>
                </TABLE>
            </center>
            <br />
        </div>
    </div>



    <script src="js/Principal.js"></script>
    <script type="text/javascript">

        function UpdateRegistros() {

        }





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






            $('#fondoAvisoCorrecto').click(function () {


                $('#fondoAvisoCorrecto').css('display', 'none');


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


        });



    </script>

</body>
</html>
