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
    <title>Editar Usuario - SUBE</title>
<script>
  function valida_envia(){ 
        varRut = document.getElementById("txtRut_bsc").value;

   	//valido el nombre 
   	varNombre = document.getElementById("txtNombre_bsc").value;
        varTel = document.getElementById("txtTelefono_bsc").value;
        varDireccion = document.getElementById("txtDireccion_bsc").value;
        varComuna = document.getElementById("cmbComuna_bsc").selected;

        if( varRut == null || varRut.length == 0 ) 
        {
//            alert("Favor Ingresar Nombre...");
            swal({ title: 'Error', text: 'Favor ingresar RUT', type: 'error' });
            document.getElementById("txtRut_bsc").focus();
            event.stopImmediatePropagation();


        }else if( varNombre == null || varNombre.length == 0 ) 
        {
//            alert("Favor Ingresar Nombre...");
            swal({ title: 'Error', text: 'Favor ingresar NOMBRE', type: 'error' });
            document.getElementById("txtNombre_bsc").focus();
            event.stopImmediatePropagation();


        }else if(varTel == null || varTel.length == 0)
        {
//            alert("Favor Ingresar Telefono...");
            swal({ title: 'Error', text: 'Favor ingresar TELEFONO', type: 'error' });
            document.getElementById("txtTelefono_bsc").focus();
            event.stopImmediatePropagation();
           

        } else if(varDireccion == null || varDireccion.length == 0)
        {
//            alert("Favor Ingresar Telefono...");
            swal({ title: 'Error', text: 'Favor ingresar DIRECCIÓN', type: 'error' });
            document.getElementById("txtDireccion_bsc").focus();
            event.stopImmediatePropagation();
           

        }
        else if(varComuna.length.value == 0)
        {
//            alert("Favor Ingresar Telefono...");
            swal({ title: 'Error', text: 'Favor seleccionar COMUNA', type: 'error' });
            document.getElementById("cmbComuna_bsc").focus();
            event.stopImmediatePropagation();
           

        }
        
        else{} 
   	
    }
</script>  

<script>
function valida_enviaBici(){ 
        varCodTag = document.getElementById("tagBic").value;
   	varModeloBic = document.getElementById("modeloBic").value;
        varDescBic = document.getElementById("descBic").value;
        

        if( varCodTag == null || varCodTag.length == 0 ) 
        {
//            alert("Favor Ingresar Nombre...");
            swal({ title: 'Error', text: 'Favor escanear CHIP', type: 'error' });
            document.getElementById("tagBic").focus();
            event.stopImmediatePropagation();


        }else if(varModeloBic == null || varModeloBic.length == 0)
        {
            swal({ title: 'Error', text: 'Favor ingresar Marca/modelo', type: 'error' });
            document.getElementById("modeloBic").focus();
            event.stopImmediatePropagation();
            
        }else if(varDescBic == null || varDescBic.length == 0)
        {
            swal({ title: 'Error', text: 'Favor ingresar Descripción', type: 'error' });
            document.getElementById("descBic").focus();
            event.stopImmediatePropagation();
            
        }else{}
    }
</script>
<script>
    function validaUlock(){
        varUlock = document.getElementById("txtNumUlock").value;     
        
        
        if( varUlock == null || varUlock <= 0 ) 
        {
//            alert("Favor Ingresar Nombre...");
            swal({ title: 'Error', text: 'Favor ingrese U-Lock', type: 'error' });
            document.getElementById("txtNumUlock").focus();
            event.stopImmediatePropagation();


        }else{}
        
        
        
    }
    
    
    
</script>
<!--    <script type="text/javascript">
            $(document).ready(function () {


                //ACTUALIZAR
                $('#ActualizarCliente').click(function (e) {
                    var txtNombre = document.getElementById("txtNombre_bsc").value
                    txtNombre = txtNombre.trim();
                    if (txtNombre.length == 0 || txtNombre == null) {
                        event.stopImmediatePropagation();
                        swal({ title: 'Error', text: 'Favor ingresar NOMBRE', type: 'error' });
                        document.getElementById("txtNombre_bsc").focus();
                        
                    }else{}
                    event.stopImmediatePropagation();

                 e.preventDefault();
                });
             });
            
            </script>-->
            

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
                <a href="MenuPrincipal.php" title="INICIO" name="menuInicio" id="menuInicio"><i class="fa fa-home"></i></a>
                <a href="NuevoUsuario.php" title="NUEVO USUARIO" name="addUser" id="addUser"><i class="fa fa-user-plus"></i></a>
                <a class="" href="Mov_sin_tarjeta.php" title="AGREGA REGISTRO MANUAL" name="addManual" id="addMaual"><i class="fa fa-pencil-square-o"></i></a>
                <a class="active" href="EditarUsuario.php" title="BUSCAR" id="bscUsuarios" name="bscUsuarios"><i class="fa fa-search"></i></a>
                <a href="LibroNovedades.php" title="Libro de Novedades"><i class="fa fa-book"></i></a>
                <a href="#" title="SALIR" id="CloseSesion" name="CloseSesion"><i class="fa fa-sign-out"></i></a>
            </div>
        </table>

        <hr />

        <div id="formularioingreso">

            <form id="form-bsc-user" method="POST" name="form-bsc-user">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <label>RUT</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                                </div>
                                <input type="text" id="txtRut_bsc" name="txtRut_bsc" title="Rut" size="30" maxlength="12" placeholder="Ej:. 11123456-0" onkeyup="blurRutField(this)" onblur="checkearRut(this)" class="form-control form-control-sm" required/>
                            </div>
                        </div>
                        <div class="col">
                            <label>Nombre</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user"></i></div>
                                </div>
                                <input type="text" id="txtNombre_bsc" name="txtNombre_bsc" value="" size="30" maxlength="50" placeholder="Ej:. Juan Perez Perez" class="form-control form-control-sm" />
                            </div>
                        </div>
                        <div class="col">
                            <label>Telefono</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone"></i></div>
                                </div>
                                <input type="text" id="txtTelefono_bsc" name="txtTelefono_bsc" value="" size="30" maxlength="12" placeholder="Ej:. +56915987598" class="form-control form-control-sm" />
                            </div>
                        </div>
                    </div>
                    &nbsp;
                    <div class="row">
                        <div class="col">
                            <label>Sexo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-venus-mars"></i></div>
                                </div>

                                <select style="width: 200px" id="cmbSexo_bsc" name="cmbSexo_bsc" class="form-select form-select-sm">
                                    <option>HOMBRE</option>
                                    <option>MUJER</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <label>Nacionalidad</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-flag"></i></div>
                                </div>
                                <select style="width: 200px" id="cmbNacionalidad" name="cmbNacionalidad" class="form-select form-select-sm">
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
                        <div class="col">
                            <label>E-mail</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-at"></i></div>
                                </div>
                                <input type="text" id="txtEmail_bsc" name="txtEmail_bsc" value="" size="30" maxlength="60" placeholder="Ej:. alguien@dominio.com" class="form-control form-control-sm" />
                            </div>
                        </div>
                    </div>
                    &nbsp;
                    <div class="row">
                        <div class="col">
                            <label>Dirección</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-home"></i></div>
                                </div>
                                <input type="text" id="txtDireccion_bsc" name="txtDireccion_bsc" value="" maxlength="80" size="30" placeholder="Ej:. Villa Margarita psje. 12 número 123 dpto. 21" class="form-control form-control-sm" />
                            </div>
                        </div>
                        <div class="col">
                            <label>Comuna</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-group"></i></div>
                                </div>
                                <select style="width: 200px" id="cmbComuna_bsc" name="cmbComuna_bsc" class="form-select form-select-sm">
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
                            </div>
                        </div>
                        <div class="col">
                            <label>Unidad Vecinal</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-group"></i></div>
                                </div>
                                <input type="text" id="txtNroUV_bsc" name="txtNroUV_bsc" value="" maxlength="3" size="30" placeholder="Ej:. 143" class="form-control form-control-sm" />
                            </div>
                        </div>
                    </div>
                    &nbsp;
                    <div class="row">
                        <div class="col">
                            <label>N° Tarjeta</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-credit-card"></i></div>
                                </div>
                                <input type="text" id="txtNroTarjeta_bsc" name="txtNroTarjeta_bsc" value="" maxlength="100" size="0" placeholder="Ingrese nro. Tarjeta" class="form-control form-control-sm" style="width:0px" /> <input id="scanerusrNFC" name="scanerusrNFC" type="button" class="btn btn-danger btn-sm" style="height:31px" value="Escanear" /><label id="lblEscUsuNFC" name="lblEscUsuNFC" style="display:none; color:darkred">Escaneando</label>
                            </div>
                        </div>
                        <div class="col">
                            <label>Fecha Nacimiento</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <input type="date" id="bscFechaNacimiento" name="bscFechaNacimiento" value="" size="30" placeholder="dd-mm-aaaa" class="form-control form-control-sm" />
                            </div>
                        </div>
                        <div class="col">

                            <label>&nbsp</label>
                            <div class="input-group">
                                <input type="submit" class="btn btn-primary" style="width:110px; font-family: 'Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif'" name="botonBuscar" value="Buscar" /> &nbsp
                                <input type="button" id="ActualizarCliente" name="ActualizarCliente" class="btn btn-danger" style="width:110px; font-family: 'Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif'" value="Actualizar" onclick="valida_envia()"  />&nbsp
                                <!--<input type="submit" class="btn btn-success" id="limpBuscar" name="limpBuscar" style="width:110px; font-family: 'Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif'" value="Limpiar" />-->
                                <input type="button" class="btn btn-success" id="limpBuscar" name="limpBuscar" style="width:110px; font-family: 'Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif'" value="Limpiar" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <hr />
            <div style="height:280px; width:100%; overflow:auto;">
                <table id="tblBusqueda" name="tblBusqueda" class="tablaCLientes">
                    <tr>

                        <td class="tdClientes""><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">RUT</font></td>
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
<!--                        <td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">EDITAR</font></td>
                        <td class="tdClientes"><font face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">INFORMACION</font></td>-->


                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div id="id03" class="w3-modal-C" >
        <div class="w3-modal-content-C" style="width: 70%;" >
            <div class="w3-container" >
                <span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-display-topright">&times;</span>

                &nbsp <center><h3><b>Información Ciclista</b></h3></center>
                <input type="text" id="txtRutSeleccionado" disabled name="txtRutSeleccionado" style="display:none" />
                <hr />

                <div id="formularioingreso" style="padding-left:30px; padding-right:30px;">


                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Bicicletas</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">U-Lock</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Visitas</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="observ-tab" data-bs-toggle="tab" data-bs-target="#observ" type="button" role="tab" aria-controls="contact" aria-selected="false">Observaciones</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!-- *************************MANTENEDOR BICICLETAS*************************-->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div id="panelP1" class="panelMantenedor">

                                <br />

                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <label>Cod. TAG</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-microchip"></i></div>
                                                </div>
                                                <input type="text" id="tagBic" name="tagBic" value="" maxlength="100" style="width:50px" size="30" class="form-control form-control-sm" /><input id="scanerbic" name="scanerbic" type="button" class="btn btn-danger btn-sm" style="height:31px" value="Escanear" /><label id="lblEscBic" name="lblEscBic" style="display:none; color:darkred">Escaneando</label></td>
                                            </div>
                                        </div>
                                    </div>
                                    &nbsp;
                                    <div class="row">
                                        <div class="col">
                                            <label>Marca/Modelo</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-bicycle"></i></div>
                                                </div>
                                                <input type="text" id="modeloBic" name="modeloBic" maxlength="50" style="width:50px" value="" size="30" placeholder="Ej:. Trek Marlin 5 2021" class="form-control form-control-sm" />
                                            </div>
                                        </div>
                                    </div>
                                    &nbsp;
                                    <div class="row">
                                        <div class="col">
                                            <label>Descripción</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-pencil"></i></div>
                                                </div>
<!--                                                <input type="text" id="descBic" name="descBic" style="width:50px" value="" size="30" placeholder="Color negro con detalles blancos, Aro 27.5, frenos disco, canasta delantera, luz delantera blanca... " class="form-control form-control-sm" />-->
                                                <textarea id="descBic" name="descBic" rows="2" cols="10" maxlength="250" placeholder="Color negro con detalles blancos, Aro 27.5, frenos disco, canasta delantera, luz delantera blanca... " class="form-control form-control-sm" style="resize: none" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </br>
                                <center><input type="button" id="GuardaBic" name="GuardaBic" class="btn btn-danger" style="width:180px; align:'right'; font-family: 'Calibri'" value="Guardar" onclick="valida_enviaBici()" /></center>
                                <br />
                                <div style="height:100px; width:100%; overflow:auto;">
                                    <center>
                                        <table id="tblBicCic" name="tblBicCic" class="hoverTable">
                                            <tr>
                                                <td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">BIC ID</font></td>
                                                <td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Cod Tag</font></td>
                                                <td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Descripcion</font></td>
                                                <td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Modelo</font></td>
                                                <td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Accion</font></td>
                                            </tr>
                                        </table>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <!-- *************************MANTENEDOR U-LOCK*************************-->
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div id="panelP1" class="panelMantenedor">
                                </br>
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <label>Asignar U-Lock</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-lock"></i></div>
                                                </div>
                                                <input type="text" id="txtNumUlock" name="txtNumUlock" value="" size="30" class="form-control form-control-sm" style="width:50px" maxlength="2"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </br>
                                <center><input type="button" id="GuardarUlock" name="GuardarUlock" class="btn btn-danger" onclick="validaUlock()" style="width:180px; align:'right'; font-family: 'Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif'" value="Guardar" /></center>
                                <br />
                                <div style="height:300px; width:100%; overflow:auto;">
                                    <center>
                                        <table id="tblUlockAsig" name="tblUlockAsig" class="tablaCLientes">
                                            <tr>
                                                <td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Fecha</font></td>
                                                <td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">U-Lock</font></td>
                                            </tr>
                                        </table>
                                    </center>
                                </div>

                            </div>
                        </div>
                        <!-- *************************MANTENEDOR VISITAS*************************-->
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div id="panelP1" class="panelMantenedor">
                                </br>
                                <div style="height:410px; width:100%; overflow:auto;">
                                    <center>
                                        <table id="tblVisCic" name="tblVisCic" class="tablaCLientes">
                                            <tr>
                                                <td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">N° Visita</font></td>
                                                <td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Fecha</font></td>
                                                <td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Hora llegada</font></td>
                                                <td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Hora Salida</font></td>
                                            </tr>
                                        </table>
                                    </center>
                                </div>



                            </div>

                        </div>
                        <!-- *************************MANTENEDOR ANOTACIONES CICLISTAS*************************-->
                        <div class="tab-pane fade" id="observ" role="tabpanel" aria-labelledby="observ-tab">

                            <div id="panelP1" class="panelMantenedor">



                                <br />

                                <div id="divCantidadObs" name="divCantidadObs" style="text-align:right">LEVES:<input type="text" style="width:50px" id="txtCantLeves" name="txtCantLeves" disabled>  GRAVES:<input type="text" id="txtCantGraves" name="txtCantGraves" style="width:50px" disabled></div>

                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <label>Tipo</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-check-square-o"></i></div>
                                                </div>

                                                <select style="width: 200px" id="cmbTipoObs_bsc" name="cmbTipoObs_bsc" class="form-select form-select-sm">
                                                    <option value="1">LEVE</option>
                                                    <option value="2">GRAVE</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    &nbsp;
                                    <div class="row">
                                        <div class="col">
                                            <label>Observación</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-pencil"></i></div>
                                                </div>
<!--                                                <input type="text" id="txtDescObs" name="txtDescObs" style="width:50px" value="" size="30" placeholder="..." class="form-control form-control-sm" />-->
                                                <textarea id="txtDescObs" name="txtDescObs" rows="2" style="width: 50px; resize: none" placeholder="Describir observación con máximo de 250 caracteres..." maxlength="250" class="form-control form-control-sm"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <center><input type="button" id="GuardarObs" name="GuardarObs" class="btn btn-danger" style="width:180px; align:'right'; font-family: 'Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif'" value="Guardar" /></center>
                                </br>
                                <div style="height:190px; width:100%; overflow:auto;">
                                    <center>
                                        <table id="tblObsCic" name="tblObsCic" class="tablaCLientes">
                                            <tr>
                                                <td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Cod. Observación</font></td>
                                                <td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Fecha</font></td>
                                                <td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Tipo</font></td>
                                                <td class="tdClientes"><font size=2 face="Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif">Observación</font></td>
                                            </tr>
                                        </table>
                                    </center>
                                </div>

                            </div>






                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/ciclistas.js"></script>
    <script>
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
        }</script>

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
                        alert("Movimiento Registrado Correctamente");

                        document.getElementById("idRutMM").value = "";
                        document.getElementById("idTipoMovimientoMM ").value = "NULL";

                    }

                });
            });


        });</script>

</body>
</html>
