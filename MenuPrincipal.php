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
                <!--<a href="Administrar.php" title="ADMINISTRAR" style="width: 185px"><i class="fa fa-cogs"><br><label style="font-size: small; font-family:courier,arial,helvética;">Administrar</label></i></a> -->
                <a href="#" style="width: 185px" title="SALIR" id="CloseSesion" name="CloseSesion"><i class="fa fa-sign-out"><br><label style="font-size: small; font-family:courier,arial,helvética;">Salir</label></i></a>
            </div>
        </table>
        <!--<a href="Mov_sin_tarjeta.php" target="_blank" onclick="window.open(this.href, this.target, 'width=600,height=400'); return false;">Movimientos sin tarjeta</a>-->
        <br />
        <br />
        <hr />
        <!-- <center><img style="width:700px; height:400px" src="img/Logo-SUBE.png" /></center> -->
        <div id="divContenido" name="divContenido" style="padding-left:30px; padding-right:30px;">
            <center><h1 style="font-size: 50px; text-decoration: underline">CICLISTAS EN SUBE</h1></center>
            <br />
            <form>
                <input type="radio" id="rbUsuarios" name="rbCiclistas" value="0">
                <label for="html">TODOS</label> &nbsp;
                <input type="radio" id="rbBicicletas" name="rbCiclistas" value="1" checked>
                <label for="css">CON BICICLETA</label>
            </form>
            <table id="tblEventos" name="tblEventos" class="hoverTable" style="color: #06357a">
                <tr style="background-color: #FC5C01">
                    <td>N°</td>
                    <td>RUT</td>
                    <td>NOMBRE</td>
                    <td>HORA ENTRADA</td>
                    <td>HORA SALIDA</td>
                </tr>

            </table>

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

    <div id="id01" class="w3-modal">
        <div class="w3-modal-content">
            <div class="w3-container">
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>

                <br />
                <center><h2>NUEVO USUARIO</h2></center>
                <hr />

                <div id="formularioingreso" style="padding-left:30px; padding-right:30px;">

                    <form id="form-new-user" method="POST" name="form-new-user">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label>RUT</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                                        </div>
                                        <input type="text" id="txtRut_" name="txtRut_" title="Rut" size="30" placeholder="Ej:. 11123456-0" onkeyup="blurRutField(this)" onblur="checkearRutCic(this,0)" class="form-control form-control-sm" required />
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                            <div class="row">
                                <div class="col">
                                    <label>NOMBRE</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                                        </div>
                                        <input type="text" id="txtNombre_" name="txtNombre_" value="" size="30" placeholder="Ej:. Juan Perez Perez" class="form-control form-control-sm" required />
                                    </div>
                                </div>
                            </div>
                            &nbsp;

                            <div class="row">
                                <div class="col">
                                    <label>TELEFONO</label>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                            </div>
                                            <input type="text" id="txtTelefono" name="txtTelefono" value="" size="12" maxlength="12" minlength="12" placeholder="Ej:. +56915987598" class="form-control form-control-sm" required />
                                        </div>
                                </div>
                            </div>
                            &nbsp;
                            <div class="row">
                                <div class="col">
                                    <label>SEXO</label>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-venus-mars"></i></div>
                                            </div>
                                            <select style="width: 400px" id="cmbSexo" name="cmbSexo" class="form-select form-select-sm" required>
                                            <option value="0">-Seleccionar-</option>
                                            <option value="HOMBRE">HOMBRE</option>
                                                <option value="MUJER">MUJER</option>
                                            </select>
                                        </div>
                                </div>
                            </div>
                            &nbsp;
                            <div class="row">
                                <div class="col">
                                    <label>FECHA NACIMIENTO</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                        <input type="date" id="txtFechaNacimiento" name="txtFechaNacimiento" value="" size="30" placeholder="dd-mm-aaaa" class="form-control form-control-sm" required />
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                            <div class="row">
                                <div class="col">
                                    <label>NACIONALIDAD</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                        <select style="width: 400px" id="cmbNacionalidad" name="cmbNacionalidad" class="form-select form-select-sm" required>
                                            <option value='400'>Chile</option>
                                            <option value='10'>Argentina</option>
                                            <option value='20'>Afganistán</option>
                                            <option value='30'>Albania</option>
                                            <option value='40'>Alemania</option>
                                            <option value='50'>Andorra</option>
                                            <option value='60'>Angola</option>
                                            <option value='70'>Anguilla</option>
                                            <option value='80'>Antártida Argentina</option>
                                            <option value='90'>Antigua y Barbuda</option>
                                            <option value='100'>Antillas Holandesas</option>
                                            <option value='110'>Arabia Saudita</option>
                                            <option value='120'>Argelia</option>
                                            <option value='130'>Armenia</option>
                                            <option value='140'>Aruba</option>
                                            <option value='150'>Australia</option>
                                            <option value='160'>Austria</option>
                                            <option value='170'>Azerbaiján</option>
                                            <option value='180'>Bahamas</option>
                                            <option value='190'>Bahrain</option>
                                            <option value='200'>Bangladesh</option>
                                            <option value='210'>Barbados</option>
                                            <option value='220'>Bélgica</option>
                                            <option value='230'>Belice</option>
                                            <option value='240'>Benin</option>
                                            <option value='250'>Bhutan</option>
                                            <option value='260'>Bielorusia</option>
                                            <option value='270'>Bolivia</option>
                                            <option value='280'>Bosnia Herzegovina</option>
                                            <option value='290'>Botswana</option>
                                            <option value='300'>Brasil</option>
                                            <option value='310'>Brunei</option>
                                            <option value='320'>Bulgaria</option>
                                            <option value='330'>Burkina Faso</option>
                                            <option value='340'>Burundi</option>
                                            <option value='350'>Cabo Verde</option>
                                            <option value='360'>Camboya</option>
                                            <option value='370'>Camerún</option>
                                            <option value='380'>Canadá</option>
                                            <option value='390'>Chad</option>
                                            <option value='400'>Chile</option>
                                            <option value='410'>China</option>
                                            <option value='420'>Chipre</option>
                                            <option value='430'>Colombia</option>
                                            <option value='440'>Comoros</option>
                                            <option value='450'>Congo</option>
                                            <option value='460'>Corea del Norte</option>
                                            <option value='470'>Corea del Sur</option>
                                            <option value='480'>Costa de Marfil</option>
                                            <option value='490'>Costa Rica</option>
                                            <option value='500'>Croacia</option>
                                            <option value='510'>Cuba</option>
                                            <option value='520'>Darussalam</option>
                                            <option value='530'>Dinamarca</option>
                                            <option value='540'>Djibouti</option>
                                            <option value='550'>Dominica</option>
                                            <option value='560'>Ecuador</option>
                                            <option value='570'>Egipto</option>
                                            <option value='580'>El Salvador</option>
                                            <option value='590'>Em. Arabes Un.</option>
                                            <option value='600'>Eritrea</option>
                                            <option value='610'>Eslovaquia</option>
                                            <option value='620'>Eslovenia</option>
                                            <option value='630'>España</option>
                                            <option value='640'>Estados Unidos</option>
                                            <option value='650'>Estonia</option>
                                            <option value='660'>Etiopía</option>
                                            <option value='670'>Fiji</option>
                                            <option value='680'>Filipinas</option>
                                            <option value='690'>Finlandia</option>
                                            <option value='700'>Francia</option>
                                            <option value='710'>Gabón</option>
                                            <option value='720'>Gambia</option>
                                            <option value='730'>Georgia</option>
                                            <option value='740'>Ghana</option>
                                            <option value='750'>Gibraltar</option>
                                            <option value='760'>Grecia</option>
                                            <option value='770'>Grenada</option>
                                            <option value='780'>Groenlandia</option>
                                            <option value='790'>Guadalupe</option>
                                            <option value='800'>Guam</option>
                                            <option value='810'>Guatemala</option>
                                            <option value='820'>Guayana Francesa</option>
                                            <option value='830'>Guinea</option>
                                            <option value='840'>Guinea Ecuatorial</option>
                                            <option value='850'>Guinea-Bissau</option>
                                            <option value='860'>Guyana</option>
                                            <option value='870'>Haití</option>
                                            <option value='880'>Holanda</option>
                                            <option value='890'>Honduras</option>
                                            <option value='900'>Hong Kong</option>
                                            <option value='910'>Hungría</option>
                                            <option value='920'>India</option>
                                            <option value='930'>Indonesia</option>
                                            <option value='940'>Irak</option>
                                            <option value='950'>Irán</option>
                                            <option value='960'>Irlanda</option>
                                            <option value='970'>Islandia</option>
                                            <option value='980'>Islas Cayman</option>
                                            <option value='990'>Islas Cook</option>
                                            <option value='1000'>Islas Faroe</option>
                                            <option value='1010'>Islas Marianas del Norte</option>
                                            <option value='1020'>Islas Marshall</option>
                                            <option value='1030'>Islas Solomon</option>
                                            <option value='1040'>Islas Turcas y Caicos</option>
                                            <option value='1050'>Islas Vírgenes</option>
                                            <option value='1060'>Islas Wallis y Futuna</option>
                                            <option value='1070'>Israel</option>
                                            <option value='1080'>Italia</option>
                                            <option value='1090'>Jamaica</option>
                                            <option value='1100'>Japón</option>
                                            <option value='1110'>Jordania</option>
                                            <option value='1120'>Kazajstán</option>
                                            <option value='1130'>Kenya</option>
                                            <option value='1140'>Kirguistán</option>
                                            <option value='1150'>Kiribati</option>
                                            <option value='1160'>Kuwait</option>
                                            <option value='1170'>Laos</option>
                                            <option value='1180'>Lesotho</option>
                                            <option value='1190'>Letonia</option>
                                            <option value='1200'>Líbano</option>
                                            <option value='1210'>Liberia</option>
                                            <option value='1220'>Libia</option>
                                            <option value='1230'>Liechtenstein</option>
                                            <option value='1240'>Lituania</option>
                                            <option value='1250'>Luxemburgo</option>
                                            <option value='1260'>Macao</option>
                                            <option value='1270'>Macedonia</option>
                                            <option value='1280'>Madagascar</option>
                                            <option value='1290'>Malasia</option>
                                            <option value='1300'>Malawi</option>
                                            <option value='1310'>Mali</option>
                                            <option value='1320'>Malta</option>
                                            <option value='1330'>Marruecos</option>
                                            <option value='1340'>Martinica</option>
                                            <option value='1350'>Mauricio</option>
                                            <option value='1360'>Mauritania</option>
                                            <option value='1370'>Mayotte</option>
                                            <option value='1380'>México</option>
                                            <option value='1390'>Micronesia</option>
                                            <option value='1400'>Moldova</option>
                                            <option value='1410'>Mónaco</option>
                                            <option value='1420'>Mongolia</option>
                                            <option value='1430'>Montserrat</option>
                                            <option value='1440'>Mozambique</option>
                                            <option value='1450'>Myanmar</option>
                                            <option value='1460'>Namibia</option>
                                            <option value='1470'>Nauru</option>
                                            <option value='1480'>Nepal</option>
                                            <option value='1490'>Nicaragua</option>
                                            <option value='1500'>Níger</option>
                                            <option value='1510'>Nigeria</option>
                                            <option value='1520'>Noruega</option>
                                            <option value='1530'>Nueva Caledonia</option>
                                            <option value='1540'>Nueva Zelandia</option>
                                            <option value='1550'>Omán</option>
                                            <option value='1570'>Pakistán</option>
                                            <option value='1580'>Panamá</option>
                                            <option value='1590'>Papua Nueva Guinea</option>
                                            <option value='1600'>Paraguay</option>
                                            <option value='1610'>Perú</option>
                                            <option value='1620'>Pitcairn</option>
                                            <option value='1630'>Polinesia Francesa</option>
                                            <option value='1640'>Polonia</option>
                                            <option value='1650'>Portugal</option>
                                            <option value='1660'>Puerto Rico</option>
                                            <option value='1670'>Qatar</option>
                                            <option value='1680'>RD Congo</option>
                                            <option value='1690'>Reino Unido</option>
                                            <option value='1700'>República Centroafricana</option>
                                            <option value='1710'>República Checa</option>
                                            <option value='1720'>República Dominicana</option>
                                            <option value='1730'>Reunión</option>
                                            <option value='1740'>Rumania</option>
                                            <option value='1750'>Rusia</option>
                                            <option value='1760'>Rwanda</option>
                                            <option value='1770'>Sahara Occidental</option>
                                            <option value='1780'>Saint Pierre y Miquelon</option>
                                            <option value='1790'>Samoa</option>
                                            <option value='1800'>Samoa Americana</option>
                                            <option value='1810'>San Cristóbal y Nevis</option>
                                            <option value='1820'>San Marino</option>
                                            <option value='1830'>Santa Elena</option>
                                            <option value='1840'>Santa Lucía</option>
                                            <option value='1850'>Sao Tomé y Príncipe</option>
                                            <option value='1860'>Senegal</option>
                                            <option value='1870'>Serbia y Montenegro</option>
                                            <option value='1880'>Seychelles</option>
                                            <option value='1890'>Sierra Leona</option>
                                            <option value='1900'>Singapur</option>
                                            <option value='1910'>Siria</option>
                                            <option value='1920'>Somalia</option>
                                            <option value='1930'>Sri Lanka</option>
                                            <option value='1940'>Sudáfrica</option>
                                            <option value='1950'>Sudán</option>
                                            <option value='1960'>Suecia</option>
                                            <option value='1970'>Suiza</option>
                                            <option value='1980'>Suriname</option>
                                            <option value='1990'>Swazilandia</option>
                                            <option value='2000'>Taiwán</option>
                                            <option value='2010'>Uruguay</option>
                                            <option value='2020'>Venezuela</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                            <div class="row">
                                <div class="col">
                                    <label>E-MAIL</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-at"></i></div>
                                        </div>
                                        <input type="text" id="txtEmail" name="txtEmail" value="" size="30" placeholder="Ej:. alguien@dominio.com" class="form-control form-control-sm" required />
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                            <div class="row">
                                <div class="col">
                                    <label>DIRECCION</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-home"></i></div>
                                        </div>
                                        <input type="text" id="txtDireccion" name="txtDireccion" value="" size="30" placeholder="Ej:. Villa Margarita psje. 12 número 123 dpto. 21" class="form-control form-control-sm" required />
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                            <div class="row">
                                <div class="col">
                                    <label>COMUNA</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-group"></i></div>
                                        </div>
                                        <select style="width: 400px" id="cmbComuna" name="cmbComuna" class="form-select form-select-sm" required>
                                            <option value='13101'>SANTIAGO</option>
                                            <option value='13502'>ALHUÉ</option>
                                            <option value='13402'>BUIN </option>
                                            <option value='13403'>CALERA DE TANGO </option>
                                            <option value='13102'>CERRILLOS </option>
                                            <option value='13103'>CERRO NAVIA </option>
                                            <option value='13301'>COLINA</option>
                                            <option value='13104'>CONCHALÍ</option>
                                            <option value='13503'>CURACAVÍ</option>
                                            <option value='13105'>EL BOSQUE </option>
                                            <option value='13602'>EL MONTE</option>
                                            <option value='13106'>ESTACIÓN CENTRAL</option>
                                            <option value='13107'>HUECHURABA</option>
                                            <option value='13108'>INDEPENDENCIA </option>
                                            <option value='13603'>ISLA DE MAIPO </option>
                                            <option value='13109'>LA CISTERNA </option>
                                            <option value='13110'>LA FLORIDA</option>
                                            <option value='13111'>LA GRANJA </option>
                                            <option value='13112'>LA PINTANA</option>
                                            <option value='13113'>LA REINA</option>
                                            <option value='13302'>LAMPA</option>
                                            <option value='13114'>LAS CONDES</option>
                                            <option value='13115'>LO BARNECHEA</option>
                                            <option value='13116'>LO ESPEJO </option>
                                            <option value='13117'>LO PRADO</option>
                                            <option value='13118'>MACUL</option>
                                            <option value='13119'>MAIPÚ</option>
                                            <option value='13504'>MARÍA PINTO </option>
                                            <option value='13501'>MELIPILLA </option>
                                            <option value='13120'>ÑUÑOA</option>
                                            <option value='13604'>PADRE HURTADO </option>
                                            <option value='13404'>PAINE</option>
                                            <option value='13121'>PEDRO AGUIRRE CERDA </option>
                                            <option value='13605'>PEÑAFLOR</option>
                                            <option value='13122'>PEÑALOLÉN </option>
                                            <option value='13202'>PIRQUE</option>
                                            <option value='13123'>PROVIDENCIA </option>
                                            <option value='13124'>PUDAHUEL</option>
                                            <option value='13201'>PUENTE ALTO </option>
                                            <option value='13125'>QUILICURA </option>
                                            <option value='13126'>QUINTA NORMAL </option>
                                            <option value='13127'>RECOLETA</option>
                                            <option value='13128'>RENCA</option>
                                            <option value='13401'>SAN BERNARDO</option>
                                            <option value='13129'>SAN JOAQUÍN </option>
                                            <option value='13203'>SAN JOSÉ DE MAIPO </option>
                                            <option value='13130'>SAN MIGUEL</option>
                                            <option value='13505'>SAN PEDRO </option>
                                            <option value='13131'>SAN RAMÓN </option>
                                            <option value='13101'>SANTIAGO</option>
                                            <option value='13601'>TALAGANTE </option>
                                            <option value='13303'>TILTIL</option>
                                            <option value='13132'>VITACURA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                            <div class="row">
                                <div class="col">
                                    <label>UNIDAD VECINAL</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-group"></i></div>
                                        </div>
                                        <input type="text" id="txtNroUV" name="txtNroUV" value="" size="30" placeholder="Ej:. 143" class="form-control form-control-sm" required />
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                            <div class="row">
                                <div class="col">
                                    <label>TARJETA N°</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-credit-card"></i></div>
                                        </div>
                                        <input type="text" id="txtNroTarjeta" name="txtNroTarjeta" value="" size="30" placeholder="Ingrese nro. Tarjeta" class="form-control form-control-sm" required /> <input id="scanerusrRegNFC" name="scanerusrRegNFC" type="button" class="btn btn-danger btn-sm" value="ESCANEAR" /><label id="lblEscUsuRegNFC" name="lblEscUsuRegNFC" style="display:none; color:darkred">Escaneando</label>
                                    </div>

                                </div>
                            </div>
                            &nbsp;
                            <!--        <tr>
                                        <td>TAG N°</td>
                                        <td><input type="text" id="txtNroTag" name="txtNroTag" value="" size="30" placeholder="Presione para escanear" disabled class="form-control" required /> <input id="scanerusr" name="scanerusr" type="button" value="ESCANEAR" /><label id="lblEscUsu" name="lblEscUsu" style="display:none; color:darkred">Escaneando</label></td>
                                    </tr>
                                    <tr>
                                        <td>MODELO BICICLETA</td>
                                        <td><input type="text" name="txtModeloBici" value="" size="30" placeholder="Ej:. Ruta Felt Carbono 105 11v Rod28 Carrera" class="form-control" required /></td>
                                    </tr>
                                    <tr>
                                        <td>DESCRIPCION</td>
                                        <td><textarea id="subject" name="subject" placeholder="Ingrese descripción de la bicicleta.." style="height:50px; width: 400px; resize: none;font-size: 14px" required></textarea></td>
                                    </tr> -->

                        </div>
                        <br />
                        <center><input type="submit" name="botondeenvio" value="GUARDAR" class="btn btn-primary" style="width:100px; height:50px" /></center>
                        <br />
                    </form>
                </div>
            </div>

        </div>
    </div>

    <div id="id02" class="w3-modal-B">
        <div class="w3-modal-content-B">
            <div class="w3-container">
                <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-display-topright">&times;</span>

                <br />
                <center><h2>BUSCAR CICLISTA</h2></center>
                <hr />

                <div id="formularioingreso" style="padding-left:30px; padding-right:30px;">

                    <form id="form-bsc-user" method="POST" name="form-bsc-user">
                        <table>
                            <tr>
                                <td>R.U.T.</td>
                                <td><input type="text" id="txtRut_bsc" name="txtRut_bsc" title="Rut" size="30" placeholder="Ej:. 11123456-0" onkeyup="blurRutField(this)" onblur="checkearRut(this)" class="form-control" /></td>
                                <td>NOMBRE</td>
                                <td><input type="text" id="txtNombre_bsc" name="txtNombre_bsc" value="" size="30" placeholder="Ej:. Juan Perez Perez" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td>TELEFONO</td>
                                <td><input type="text" id="txtTelefono_bsc" name="txtTelefono_bsc" value="" size="30" placeholder="Ej:. +56915987598" class="form-control" /></td>
                                <td>SEXO</td>
                                <td>
                                    <select style="width: 400px" id="cmbSexo_bsc" name="cmbSexo_bsc" class="col-10">
                                        <option>HOMBRE</option>
                                        <option>MUJER</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>NACIONALIDAD</td>
                                <td>
                                    <select style="width: 400px" id="cmbNacionalidad" name="cmbNacionalidad" class="col-10">
                                        <option value='400'>Chile</option>
                                        <option value='10'>Argentina</option>
                                        <option value='20'>Afganistán</option>
                                        <option value='30'>Albania</option>
                                        <option value='40'>Alemania</option>
                                        <option value='50'>Andorra</option>
                                        <option value='60'>Angola</option>
                                        <option value='70'>Anguilla</option>
                                        <option value='80'>Antártida Argentina</option>
                                        <option value='90'>Antigua y Barbuda</option>
                                        <option value='100'>Antillas Holandesas</option>
                                        <option value='110'>Arabia Saudita</option>
                                        <option value='120'>Argelia</option>
                                        <option value='130'>Armenia</option>
                                        <option value='140'>Aruba</option>
                                        <option value='150'>Australia</option>
                                        <option value='160'>Austria</option>
                                        <option value='170'>Azerbaiján</option>
                                        <option value='180'>Bahamas</option>
                                        <option value='190'>Bahrain</option>
                                        <option value='200'>Bangladesh</option>
                                        <option value='210'>Barbados</option>
                                        <option value='220'>Bélgica</option>
                                        <option value='230'>Belice</option>
                                        <option value='240'>Benin</option>
                                        <option value='250'>Bhutan</option>
                                        <option value='260'>Bielorusia</option>
                                        <option value='270'>Bolivia</option>
                                        <option value='280'>Bosnia Herzegovina</option>
                                        <option value='290'>Botswana</option>
                                        <option value='300'>Brasil</option>
                                        <option value='310'>Brunei</option>
                                        <option value='320'>Bulgaria</option>
                                        <option value='330'>Burkina Faso</option>
                                        <option value='340'>Burundi</option>
                                        <option value='350'>Cabo Verde</option>
                                        <option value='360'>Camboya</option>
                                        <option value='370'>Camerún</option>
                                        <option value='380'>Canadá</option>
                                        <option value='390'>Chad</option>
                                        <option value='400'>Chile</option>
                                        <option value='410'>China</option>
                                        <option value='420'>Chipre</option>
                                        <option value='430'>Colombia</option>
                                        <option value='440'>Comoros</option>
                                        <option value='450'>Congo</option>
                                        <option value='460'>Corea del Norte</option>
                                        <option value='470'>Corea del Sur</option>
                                        <option value='480'>Costa de Marfil</option>
                                        <option value='490'>Costa Rica</option>
                                        <option value='500'>Croacia</option>
                                        <option value='510'>Cuba</option>
                                        <option value='520'>Darussalam</option>
                                        <option value='530'>Dinamarca</option>
                                        <option value='540'>Djibouti</option>
                                        <option value='550'>Dominica</option>
                                        <option value='560'>Ecuador</option>
                                        <option value='570'>Egipto</option>
                                        <option value='580'>El Salvador</option>
                                        <option value='590'>Em. Arabes Un.</option>
                                        <option value='600'>Eritrea</option>
                                        <option value='610'>Eslovaquia</option>
                                        <option value='620'>Eslovenia</option>
                                        <option value='630'>España</option>
                                        <option value='640'>Estados Unidos</option>
                                        <option value='650'>Estonia</option>
                                        <option value='660'>Etiopía</option>
                                        <option value='670'>Fiji</option>
                                        <option value='680'>Filipinas</option>
                                        <option value='690'>Finlandia</option>
                                        <option value='700'>Francia</option>
                                        <option value='710'>Gabón</option>
                                        <option value='720'>Gambia</option>
                                        <option value='730'>Georgia</option>
                                        <option value='740'>Ghana</option>
                                        <option value='750'>Gibraltar</option>
                                        <option value='760'>Grecia</option>
                                        <option value='770'>Grenada</option>
                                        <option value='780'>Groenlandia</option>
                                        <option value='790'>Guadalupe</option>
                                        <option value='800'>Guam</option>
                                        <option value='810'>Guatemala</option>
                                        <option value='820'>Guayana Francesa</option>
                                        <option value='830'>Guinea</option>
                                        <option value='840'>Guinea Ecuatorial</option>
                                        <option value='850'>Guinea-Bissau</option>
                                        <option value='860'>Guyana</option>
                                        <option value='870'>Haití</option>
                                        <option value='880'>Holanda</option>
                                        <option value='890'>Honduras</option>
                                        <option value='900'>Hong Kong</option>
                                        <option value='910'>Hungría</option>
                                        <option value='920'>India</option>
                                        <option value='930'>Indonesia</option>
                                        <option value='940'>Irak</option>
                                        <option value='950'>Irán</option>
                                        <option value='960'>Irlanda</option>
                                        <option value='970'>Islandia</option>
                                        <option value='980'>Islas Cayman</option>
                                        <option value='990'>Islas Cook</option>
                                        <option value='1000'>Islas Faroe</option>
                                        <option value='1010'>Islas Marianas del Norte</option>
                                        <option value='1020'>Islas Marshall</option>
                                        <option value='1030'>Islas Solomon</option>
                                        <option value='1040'>Islas Turcas y Caicos</option>
                                        <option value='1050'>Islas Vírgenes</option>
                                        <option value='1060'>Islas Wallis y Futuna</option>
                                        <option value='1070'>Israel</option>
                                        <option value='1080'>Italia</option>
                                        <option value='1090'>Jamaica</option>
                                        <option value='1100'>Japón</option>
                                        <option value='1110'>Jordania</option>
                                        <option value='1120'>Kazajstán</option>
                                        <option value='1130'>Kenya</option>
                                        <option value='1140'>Kirguistán</option>
                                        <option value='1150'>Kiribati</option>
                                        <option value='1160'>Kuwait</option>
                                        <option value='1170'>Laos</option>
                                        <option value='1180'>Lesotho</option>
                                        <option value='1190'>Letonia</option>
                                        <option value='1200'>Líbano</option>
                                        <option value='1210'>Liberia</option>
                                        <option value='1220'>Libia</option>
                                        <option value='1230'>Liechtenstein</option>
                                        <option value='1240'>Lituania</option>
                                        <option value='1250'>Luxemburgo</option>
                                        <option value='1260'>Macao</option>
                                        <option value='1270'>Macedonia</option>
                                        <option value='1280'>Madagascar</option>
                                        <option value='1290'>Malasia</option>
                                        <option value='1300'>Malawi</option>
                                        <option value='1310'>Mali</option>
                                        <option value='1320'>Malta</option>
                                        <option value='1330'>Marruecos</option>
                                        <option value='1340'>Martinica</option>
                                        <option value='1350'>Mauricio</option>
                                        <option value='1360'>Mauritania</option>
                                        <option value='1370'>Mayotte</option>
                                        <option value='1380'>México</option>
                                        <option value='1390'>Micronesia</option>
                                        <option value='1400'>Moldova</option>
                                        <option value='1410'>Mónaco</option>
                                        <option value='1420'>Mongolia</option>
                                        <option value='1430'>Montserrat</option>
                                        <option value='1440'>Mozambique</option>
                                        <option value='1450'>Myanmar</option>
                                        <option value='1460'>Namibia</option>
                                        <option value='1470'>Nauru</option>
                                        <option value='1480'>Nepal</option>
                                        <option value='1490'>Nicaragua</option>
                                        <option value='1500'>Níger</option>
                                        <option value='1510'>Nigeria</option>
                                        <option value='1520'>Noruega</option>
                                        <option value='1530'>Nueva Caledonia</option>
                                        <option value='1540'>Nueva Zelandia</option>
                                        <option value='1550'>Omán</option>
                                        <option value='1570'>Pakistán</option>
                                        <option value='1580'>Panamá</option>
                                        <option value='1590'>Papua Nueva Guinea</option>
                                        <option value='1600'>Paraguay</option>
                                        <option value='1610'>Perú</option>
                                        <option value='1620'>Pitcairn</option>
                                        <option value='1630'>Polinesia Francesa</option>
                                        <option value='1640'>Polonia</option>
                                        <option value='1650'>Portugal</option>
                                        <option value='1660'>Puerto Rico</option>
                                        <option value='1670'>Qatar</option>
                                        <option value='1680'>RD Congo</option>
                                        <option value='1690'>Reino Unido</option>
                                        <option value='1700'>República Centroafricana</option>
                                        <option value='1710'>República Checa</option>
                                        <option value='1720'>República Dominicana</option>
                                        <option value='1730'>Reunión</option>
                                        <option value='1740'>Rumania</option>
                                        <option value='1750'>Rusia</option>
                                        <option value='1760'>Rwanda</option>
                                        <option value='1770'>Sahara Occidental</option>
                                        <option value='1780'>Saint Pierre y Miquelon</option>
                                        <option value='1790'>Samoa</option>
                                        <option value='1800'>Samoa Americana</option>
                                        <option value='1810'>San Cristóbal y Nevis</option>
                                        <option value='1820'>San Marino</option>
                                        <option value='1830'>Santa Elena</option>
                                        <option value='1840'>Santa Lucía</option>
                                        <option value='1850'>Sao Tomé y Príncipe</option>
                                        <option value='1860'>Senegal</option>
                                        <option value='1870'>Serbia y Montenegro</option>
                                        <option value='1880'>Seychelles</option>
                                        <option value='1890'>Sierra Leona</option>
                                        <option value='1900'>Singapur</option>
                                        <option value='1910'>Siria</option>
                                        <option value='1920'>Somalia</option>
                                        <option value='1930'>Sri Lanka</option>
                                        <option value='1940'>Sudáfrica</option>
                                        <option value='1950'>Sudán</option>
                                        <option value='1960'>Suecia</option>
                                        <option value='1970'>Suiza</option>
                                        <option value='1980'>Suriname</option>
                                        <option value='1990'>Swazilandia</option>
                                        <option value='2000'>Taiwán</option>
                                        <option value='2010'>Uruguay</option>
                                        <option value='2020'>Venezuela</option>
                                    </select>
                                </td>
                                <td>E-MAIL</td>
                                <td><input type="text" id="txtEmail_bsc" name="txtEmail_bsc" value="" size="30" placeholder="Ej:. alguien@dominio.com" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td>DIRECCION</td>
                                <td><input type="text" id="txtDireccion_bsc" name="txtDireccion_bsc" value="" size="30" placeholder="Ej:. Villa Margarita psje. 12 número 123 dpto. 21" class="form-control" /></td>
                                <td>COMUNA</td>
                                <td>
                                    <select style="width: 400px" id="cmbComuna_bsc" name="cmbComuna_bsc" class="col-10">
                                        <option value='0'></option>
                                        <option value='13101'>SANTIAGO</option>
                                        <option value='13502'>ALHUÉ</option>
                                        <option value='13402'>BUIN </option>
                                        <option value='13403'>CALERA DE TANGO </option>
                                        <option value='13102'>CERRILLOS </option>
                                        <option value='13103'>CERRO NAVIA </option>
                                        <option value='13301'>COLINA</option>
                                        <option value='13104'>CONCHALÍ</option>
                                        <option value='13503'>CURACAVÍ</option>
                                        <option value='13105'>EL BOSQUE </option>
                                        <option value='13602'>EL MONTE</option>
                                        <option value='13106'>ESTACIÓN CENTRAL</option>
                                        <option value='13107'>HUECHURABA</option>
                                        <option value='13108'>INDEPENDENCIA </option>
                                        <option value='13603'>ISLA DE MAIPO </option>
                                        <option value='13109'>LA CISTERNA </option>
                                        <option value='13110'>LA FLORIDA</option>
                                        <option value='13111'>LA GRANJA </option>
                                        <option value='13112'>LA PINTANA</option>
                                        <option value='13113'>LA REINA</option>
                                        <option value='13302'>LAMPA</option>
                                        <option value='13114'>LAS CONDES</option>
                                        <option value='13115'>LO BARNECHEA</option>
                                        <option value='13116'>LO ESPEJO </option>
                                        <option value='13117'>LO PRADO</option>
                                        <option value='13118'>MACUL</option>
                                        <option value='13119'>MAIPÚ</option>
                                        <option value='13504'>MARÍA PINTO </option>
                                        <option value='13501'>MELIPILLA </option>
                                        <option value='13120'>ÑUÑOA</option>
                                        <option value='13604'>PADRE HURTADO </option>
                                        <option value='13404'>PAINE</option>
                                        <option value='13121'>PEDRO AGUIRRE CERDA </option>
                                        <option value='13605'>PEÑAFLOR</option>
                                        <option value='13122'>PEÑALOLÉN </option>
                                        <option value='13202'>PIRQUE</option>
                                        <option value='13123'>PROVIDENCIA </option>
                                        <option value='13124'>PUDAHUEL</option>
                                        <option value='13201'>PUENTE ALTO </option>
                                        <option value='13125'>QUILICURA </option>
                                        <option value='13126'>QUINTA NORMAL </option>
                                        <option value='13127'>RECOLETA</option>
                                        <option value='13128'>RENCA</option>
                                        <option value='13401'>SAN BERNARDO</option>
                                        <option value='13129'>SAN JOAQUÍN </option>
                                        <option value='13203'>SAN JOSÉ DE MAIPO </option>
                                        <option value='13130'>SAN MIGUEL</option>
                                        <option value='13505'>SAN PEDRO </option>
                                        <option value='13131'>SAN RAMÓN </option>
                                        <option value='13101'>SANTIAGO</option>
                                        <option value='13601'>TALAGANTE </option>
                                        <option value='13303'>TILTIL</option>
                                        <option value='13132'>VITACURA</option>

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>UNIDAD VECINAL</td>
                                <td><input type="text" id="txtNroUV_bsc" name="txtNroUV_bsc" value="" size="30" placeholder="Ej:. 143" class="form-control" /></td>
                                <td>TARJETA N°</td>
                                <td><input type="text" id="txtNroTarjeta_bsc" name="txtNroTarjeta_bsc" value="" size="30" placeholder="Ingrese nro. Tarjeta" class="form-control" /> <input id="scanerusrNFC" name="scanerusrNFC" type="button" value="ESCANEAR" /><label id="lblEscUsuNFC" name="lblEscUsuNFC" style="display:none; color:darkred">Escaneando</label> </td>
                            </tr>
                            <tr>
                                <td>FECHA NACIMIENTO</td>
                                <td><input type="date" id="bscFechaNacimiento" name="bscFechaNacimiento" value="" size="30" placeholder="dd-mm-aaaa" class="form-control" /></td>
                            </tr>
                        </table>
                        <br />
                        <table align="right">
                            <tr>
                                <td><input type="submit" style="width:110px; font-family: 'Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif'" name="botonBuscar" value="BUSCAR" /></td>
                                <td><input type="button" id="ActualizarCliente" name="ActualizarCliente" style="width:110px; font-family: 'Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif'" value="ACTUALIZAR" /></td>
                                <td><input type="button" id="limpBuscar" name="limpBuscar" style="width:110px; font-family: 'Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif'" value="LIMPIAR" /></td>
                            </tr>
                        </table>
                        <center></center>
                        <br />
                    </form>
                    <hr />
                    <div style="height:280px; width:100%; overflow:auto;">
                        <table id="tblBusqueda" name="tblBusqueda" class="tablaCLientes">
                            <tr>

                                <td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">RUT</font></td>
                                <td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">NOMBRE</font></td>
                                <td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">TELEFONO</font></td>
                                <td style="display:none"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">SEXO</font></td>
                                <td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">NACIONALIDAD</font></td>
                                <td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">E-MAIL</font></td>
                                <td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">DIRECCION</font></td>
                                <td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">COMUNA</font></td>
                                <td style="display:none"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">N° UNIDAD VECINAL</font></td>
                                <td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">TARJETA</font></td>
                                <td style="display:none">idcomuna</td>
                                <td style="display:none">fecNac</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="id03" class="w3-modal-C">
        <div class="w3-modal-content-C">
            <div class="w3-container">
                <span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-display-topright">&times;</span>

                <br />
                <center><h2><b>Agregar bicicleta</b></h2></center>
                <hr />

                <div id="formularioingreso" style="padding-left:30px; padding-right:30px;">

                    <form id="form-add-bic" method="GET" name="form-add_bic">
                        <table>
                            <tr>
                                <td>R.U.T.</td>
                                <td><input type="text" id="rutCic" name="rutCic" title="Rut" size="30" placeholder="Ej:. 11123456-0" onkeyup="blurRutField(this)" onblur="buscarBicicletas(this)" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <td>TAG N°</td>
                                <td><input type="text" id="tagBic" name="tagBic" value="" size="30" placeholder="Presione para escanear" class="form-control" required /><input id="scanerbic" name="scanerbic" type="button" value="ESCANEAR" /><label id="lblEscBic" name="lblEscBic" style="display:none; color:darkred">Escaneando</label></td>
                            </tr>
                            <tr>
                                <td>MODELO BICICLETA</td>
                                <td><input type="text" id="modeloBic" name="modeloBic" value="" size="30" placeholder="Ej:. Ruta Felt Carbono 105 11v Rod28 Carrera" class="form-control" required /></td>
                            </tr>
                            <tr>
                                <td>DESCRIPCION</td>
                                <td><textarea id="descBic" name="descBic" placeholder="Ingrese descripción de la bicicleta.." style="height:50px; width: 400px; resize: none;font-size: 14px" required></textarea></td>
                            </tr>
                        </table>
                        <br />
                        <center><input type="submit" name="botondeenvio" style="width:50px; height:50px" src="img/diskette.png" /></center>
                        <br />
                    </form>
                    <div style="height:200px; width:100%; overflow:auto;">
                        <center>
                            <table id=tblBicCic name="tblBicCic" class="hoverTable">
                                <tr>
                                    <td>ID BIC</td>
                                    <td>TAG NRO</td>
                                    <td>MODELO BICICLETA</td>
                                    <td>DESCRIPCION</td>
                                </tr>
                            </table>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="js/Principal.js"></script>
    <script type="text/javascript">

        function UpdateRegistros() {

        }

        //AJAX BUSCAR USUARIO
        function mostrar(rutSeleccionado) {
            document.getElementById("txtRut_bsc").value = "";
            document.getElementById("txtNombre_bsc").value = "";
            document.getElementById("txtTelefono_bsc").value = "";
            document.getElementById("cmbSexo_bsc").value = "";
            document.getElementById("txtEmail_bsc").value = "";
            document.getElementById("txtDireccion_bsc").value = "";
            document.getElementById("txtNroUV_bsc").value = "";
            document.getElementById("txtNroTarjeta_bsc").value = "";
            document.getElementById("cmbComuna_bsc").value = "";
            document.getElementById("bscFechaNacimiento").empty;


            var resume_table = document.getElementById("tblBusqueda");

            for (var i = 0, row; row = resume_table.rows[i]; i++) {


                if ((row.cells[0].innerText) == rutSeleccionado) {
                    document.getElementById("txtRut_bsc").value = row.cells[0].innerText;
                    document.getElementById("txtNombre_bsc").value = row.cells[1].innerText;
                    document.getElementById("txtTelefono_bsc").value = row.cells[2].innerText;
                    document.getElementById("cmbSexo_bsc").value = row.cells[3].innerText;
                    document.getElementById("txtEmail_bsc").value = row.cells[5].innerText;
                    document.getElementById("txtDireccion_bsc").value = row.cells[6].innerText;
                    document.getElementById("cmbComuna_bsc").value = row.cells[10].innerText;
                    document.getElementById("txtNroUV_bsc").value = row.cells[8].innerText;
                    document.getElementById("txtNroTarjeta_bsc").value = row.cells[9].innerText;
                    document.getElementById("bscFechaNacimiento").value = row.cells[11].innerText;
                }

                //alert(cell[i].innerText);
                /*
                for (var j = 0, col; col = row.cells[j]; j++)
                {
                    //alert(col[j].innerText);
                    console.log(`Txt: ${col.innerText} \tFila: ${i} \t Celda: ${j}`);
                }
                */
            }


            //	alert(mensajito + "");
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




            $('#ActualizarCliente').click(function (e) {


                var rut_bsc = document.getElementById("txtRut_bsc").value;
                var nombre_bsc = document.getElementById("txtNombre_bsc").value;
                var telefono_bsc = document.getElementById("txtTelefono_bsc").value;
                var sexo_bsc = document.getElementById("cmbSexo_bsc").value;
                var email_bsc = document.getElementById("txtEmail_bsc").value;
                var direccion_bsc = document.getElementById("txtDireccion_bsc").value;
                var comuna_bsc = document.getElementById("cmbComuna_bsc").value;
                var numerouv_bsc = document.getElementById("txtNroUV_bsc").value;
                var nroTarjeta_bsc = document.getElementById("txtNroTarjeta_bsc").value;
                var fecNaci_bsc = document.getElementById("bscFechaNacimiento").value;
                var pais_bsc = document.getElementById("cmbNacionalidad").value;




                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: 'funciones.php',
                    data: {
                        "rutUpd": rut_bsc,
                        "nombreupd": nombre_bsc,
                        "telefonoupd": telefono_bsc,
                        "sexoupd": sexo_bsc,
                        "emailupd": email_bsc,
                        "direccionupd": direccion_bsc,
                        "comunaupd": comuna_bsc,
                        "numerouvupd": numerouv_bsc,
                        "nroTarjetaupd": nroTarjeta_bsc,
                        "fecnacupd": fecNaci_bsc,
                        "nacionalidadupd": pais_bsc

                    },
                    error: function (jqXHR, textStatus, errorThrown) {

                        alert("Error " + textStatus + " -" + jqXHR + " -" + errorThrown);
                    },
                    success: function (response) {
                        alert("Usuario actualizado correctamente");
                        LimpiarformBuscar();
                        // document.getElementById('id01').style.display = 'none';
                    }

                });


            });

            $('#fondoAvisoCorrecto').click(function () {


                $('#fondoAvisoCorrecto').css('display', 'none');


            });



            $('#form-bsc-user').submit(function (e) {

                $("#tblBusqueda").empty();

                document.getElementById("tblBusqueda").insertRow(-1).innerHTML = '<td class="tdClientes" > <font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">RUT</font></td >' +
                    '<td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">NOMBRE</font></td>' +
                    '<td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">TELEFONO</font></td>' +
                    '<td style="display:none"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">SEXO</font></td>' +
                    '<td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">NACIONALIDAD</font></td>' +
                    '<td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">E-MAIL</font></td>' +
                    '<td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">DIRECCION</font></td>' +
                    '<td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">COMUNA</font></td>' +
                    '<td style="display:none"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">N° UNIDAD VECINAL</font></td>' +
                    '<td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">TARJETA</font></td>' +
                    '<td style="display:none">idcomuna</td>' +
                    '<td style="display:none">fecNac</td>';




                var rutBsc = $("#txtRut_bsc").val() == '' ? 'nul' : $("#txtRut_bsc").val();
                //var rutBsc = $("#txtRut_bsc").val();
                var nombreBsc = $("#txtNombre_bsc").val() == '' ? 'nul' : $("#txtNombre_bsc").val();
                var telefonoBsc = $("#txtTelefono_bsc").val() == '' ? 'nul' : $("#txtTelefono_bsc").val();
                var sexoBsc = 'nul';//$("#cmbSexo_bsc").val() == '' ? 'nul' : $("#cmbSexo_bsc").val();
                var fecNacBsc = 'nul';
                var nacionalidadBsc = 0; //$("#cmbNacionalidad").val() == '' ? '0' : $("#cmbNacionalidad").val();
                var emailBsc = $("#txtEmail_bsc").val() == '' ? 'nul' : $("#txtEmail_bsc").val();
                var direccionBsc = $("#txtDireccion_bsc").val() == '' ? 'nul' : $("#txtDireccion_bsc").val();
                var comunaBsc = 0; //$("#cmbComuna_bsc").val() == '' ? '0' : $("#cmbComuna_bsc").val();
                var nroUvBsc = $("#txtNroUV_bsc").val() == '' ? 'nul' : $("#txtNroUV_bsc").val();
                var nroTarjetaBsc = $("#txtNroTarjeta_bsc").val() == '' ? 'nul' : $("#txtNroTarjeta_bsc").val();


                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: 'funciones.php',
                    data: {
                        "txtRutBsc": rutBsc,
                        "txtNombre_": nombreBsc,
                        "txtTelefono": telefonoBsc,
                        "cmbSexo": sexoBsc,
                        "txtFechaNacimiento": fecNacBsc,
                        "cmbNacionalidad": nacionalidadBsc,
                        "txtEmail": emailBsc,
                        "txtDireccion": direccionBsc,
                        "cmbComuna": comunaBsc,
                        "txtNroUV": nroUvBsc,
                        "txtNroTarjeta": nroTarjetaBsc
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Error");
                    },
                    success: function (response) {

                        var len = response.length;
                        for (var i = 0; i < len; i++) {

                            var RUT_E = response[i].CIC_RUT,
                                NOMBRE_E = response[i].CIC_NOMBRE,
                                TELEFONO_E = response[i].CIC_TELEFONO,
                                SEXO_E = response[i].CIC_SEXO,
                                NACIMIENTO_E = response[i].CIC_FECHA_NACIMIENTO,
                                NACIONALIDAD_E = response[i].NACIONALIDAD_E,
                                EMAIL_E = response[i].CIC_EMAIL,
                                DIRECCION_E = response[i].CIC_DIRECCION_VECINAL,
                                COM_ID = response[i].COM_ID,
                                COM_DESCRIPCION = response[i].COM_DESCRIPCION,
                                VECINAL_E = response[i].CIC_NRO_UNIDAD_VECINAL,
                                TARJETA_E = response[i].CIC_NRO_TARJETA;


                            document.getElementById("tblBusqueda").insertRow(-1).innerHTML = '<td style="width:80px" class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + RUT_E +
                                '</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + NOMBRE_E +
                                '</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + TELEFONO_E +
                                '</font></td><td style="display:none"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + SEXO_E +
                                '</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + NACIONALIDAD_E +
                                '</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + EMAIL_E +
                                '</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + DIRECCION_E +
                                '</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + COM_DESCRIPCION +
                                '</font></td><td style="display:none"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + VECINAL_E +
                                '</font></td><td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">' + TARJETA_E +
                                '</font></td><td style="display:none" >' + COM_ID + '</td>' +
                                '<td style="display:none" >' + NACIMIENTO_E + '</td>' +
                                '<td class="tdClientes"><img style="width:20px; height:20px" onClick="mostrar(\'' + RUT_E + '\')" src="Img/editar.png" /></td>';
                        }
                        //	alert(nombre + " " + fecNaci + " " + telefono + " ");
                        //  document.getElementById('id01').style.display = 'none';


                    }

                });
            });



            //AJAX NUEVO USUARIO CON BICICLETA
            $('#form-new-user_').submit(function (e) {

                var sexoCic = $("#cmbSexo").val();
                var telefonoFrm = $("#txtTelefono").val();

                if(sexoCic == "0")
                {
                    alert("Debe seleccionar sexo del ciclista");
                    return false;
                }
                else if(telefonoFrm.length < 12)
                {
                    swal({ title: 'Error', text: 'Debe ingresar un telefono valido', type: 'error' }); 
                    return false;   
                }




                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'funciones.php',
                    data: $(this).serialize(),
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Error: " + jqXHR + " +" + textStatus + " +" + errorThrown);
                    },
                    success: function (response) {
                        alert("Usuario creado correctamente");
                        //  document.getElementById('id01').style.display = 'none';

                        document.getElementById("txtRut_").value = "";
                        document.getElementById("txtNombre_").value = "";
                        document.getElementById("txtTelefono").value = "";
                        document.getElementById("cmbSexo").value = "0";
                        document.getElementById("cmbNacionalidad").value = "400";
                        document.getElementById("txtEmail").value = "";
                        document.getElementById("txtDireccion").value = "";
                        document.getElementById("cmbComuna").value = "13101";
                        document.getElementById("txtNroUV").value = "";
                        document.getElementById("txtNroTarjeta").value = "";
                        document.getElementById("txtNroTag").value = "";
                        document.getElementById("txtModeloBici").value = "";
                        document.getElementById("subject").value = "";

                    }

                });
            });




            //AJAX NUEVO USUARIO SIN BICICLETA
            $('#form-new-user').submit(function (e) {


                var sexoCic = $("#cmbSexo").val();
                var telefonoFrm = $("#txtTelefono").val();

                if(sexoCic == "0")
                {
                    alert("Debe seleccionar sexo del ciclista");
                    return false;
                }
                else if(telefonoFrm.length < 12)
                {
                    swal({ title: 'Error', text: 'Debe ingresar un telefono valido', type: 'error' }); 
                    return false;   
                }

                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: 'funciones.php',
                    data: $(this).serialize(),
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Error: " + jqXHR + " +" + textStatus + " +" + errorThrown);
                    },
                    success: function (response) {
                        alert("Usuario creado correctamente");

                        document.getElementById("txtRut_").value = "";
                        document.getElementById("txtNombre_").value = "";
                        document.getElementById("txtTelefono").value = "";
                        document.getElementById("cmbSexo").value = "0";
                        document.getElementById("cmbNacionalidad").value = "400";
                        document.getElementById("txtEmail").value = "";
                        document.getElementById("txtDireccion").value = "";
                        document.getElementById("cmbComuna").value = "13101";
                        document.getElementById("txtNroUV").value = "";
                        document.getElementById("txtNroTarjeta").value = "";

                    }

                });
            });



            //OBTIENE TAG SCANEADO
            $('#scanerbic').click(function (e) {

                $('#lblEscBic').css('display', 'block');


                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'funciones.php',
                    data: {
                        "idScanner": "1",
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Error " + textStatus + " -" + jqXHR + " -" + errorThrown);
                    },
                    success: function (response) {

                        //        console.log(JSON.stringify(response));

                        if (response[0].LECTURA != '-1') {
                            $('#tagBic').val(response[0].LECTURA + "");
                            $('#lblEscBic').css('display', 'none');
                        }
                        else {
                            alert('No se pudo leer el TAG escaneado, por favor intentelo nuevamente');
                            $('#lblEscBic').css('display', 'none');
                        }

                    }

                });
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

            //OBTIENE TAG SCANEADO
            $('#scanerusr').click(function (e) {
                $('#lblEscUsu').css('display', 'block');

                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'funciones.php',
                    data: {
                        "idScanner": "1",
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Error " + textStatus + " -" + jqXHR + " -" + errorThrown);
                    },
                    success: function (response) {

                        console.log(JSON.stringify(response));

                        if (response[0].LECTURA != '-1') {
                            $('#txtNroTag').val(response[0].LECTURA + "");
                            $('#lblEscUsu').css('display', 'none');
                        }
                        else {
                            alert('No se pudo leer el TAG escaneado, por favor intentelo nuevamente');
                            $('#lblEscUsu').css('display', 'none');
                        }

                    }

                });

            });



            //OBTIENE CODIGO NFC EN REGISTRO
            $('#scanerusrRegNFC').click(function (e) {
                $('#lblEscUsuRegNFC').css('display', 'block');

                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'funciones.php',
                    data: {
                        "idScannerNFC": 1,
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Error " + textStatus + " -" + jqXHR + " -" + errorThrown);
                    },
                    success: function (response) {

                        console.log(JSON.stringify(response));

                        if (response[0].LECTURA != '-1') {
                            $('#txtNroTarjeta').val(response[0].LECTURA + "");
                            $('#lblEscUsuRegNFC').css('display', 'none');
                        }
                        else {
                            alert('No se pudo leer la tarjeta NFC, por favor intentelo nuevamente');
                            $('#lblEscUsuRegNFC').css('display', 'none');
                        }
                    }
                });
            });


            //OBTIENE CODIGO NFC EN ACTUALIZACION
            $('#scanerusrNFC').click(function (e) {
                $('#lblEscUsuNFC').css('display', 'block');

                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'funciones.php',
                    data: {
                        "idScannerNFC": 1,
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Error " + textStatus + " -" + jqXHR + " -" + errorThrown);
                    },
                    success: function (response) {

                        console.log(JSON.stringify(response));

                        if (response[0].LECTURA != '-1') {
                            $('#txtNroTarjeta_bsc').val(response[0].LECTURA + "");
                            $('#lblEscUsuNFC').css('display', 'none');
                        }
                        else {
                            alert('No se pudo leer la tarjeta NFC, por favor intentelo nuevamente');
                            $('#lblEscUsuNFC').css('display', 'none');
                        }
                    }
                });
            });




        });



    </script>

</body>
</html>

