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
    <title>Ayuda Monitores - SUBE La Florida</title>


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
function funcionDespliegaInfo() {
  var x = document.getElementById("divIngresoTurno");
  if (x.style.display === "none")  {
    x.style.display = "block";
  } else {
      x.style.display = "none";
  }
}
</script>
<script>
function funcionDespliegaInfoLP() {
  var x = document.getElementById("divLP");
  if (x.style.display === "none")  {
    x.style.display = "block";
  } else {
      x.style.display = "none";
  }
}
</script>
<script>
function funcionDespliegaInfoST() {
  var x = document.getElementById("divSalidaTurno");
  if (x.style.display === "none")  {
    x.style.display = "block";
  } else {
      x.style.display = "none";
  }
}
</script>
<script>
function funcionDespliegaInfoRG() {
  var x = document.getElementById("divCasosCrit");
  if (x.style.display === "none")  {
    x.style.display = "block";
  } else {
      x.style.display = "none";
  }
}
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
                <a href="" title="Manual de ayuda para Monitores" style="width: 185px" ><i class="fa fa-info-circle"><br><label style="font-size: small; font-family:courier,arial,helvética;">Manual de ayuda</label></i></a>
                <a href="#" style="width: 185px" title="SALIR" id="CloseSesion" name="CloseSesion"><i class="fa fa-sign-out"><br><label style="font-size: small; font-family:courier,arial,helvética;">Salir</label></i></a>
            </div>        </table>

        <hr />


        <center><h2>Ayuda Monitores</h2></center>
        <br />
 <div class="card">
           <li style="font-weight: bold; font-size: 18px; color: #D8000C; font-style:  ">IMPORTANTE</li>
           <li style="font-weight: bold; font-size: 18px; color: #41464b; font-style:  ">En caso de no presentar cédula de identidad (o extranjeros sin RUT), NO se podrá registrar al usuario, ni podrá ingresar a estacionar. Si existe alguna excepción, favor consultar a su supervisor. </li>
           <li style="font-weight: bold; font-size: 14px; color: #41464b; font-style:  ">No se puede realizar venta de chip si hay un solo Monitor/Nochero en el recinto. Debe ayudarse de su compañero para realizar la venta de estos. Visualizar usted como monitor los detalles de la bicicleta e indicárselos a su compañero para que lo ingrese al sistema. </li>
           <li style="font-weight: bold; font-size: 14px; color: #41464b; font-style:  ">No se puede realizar venta de Chip si el usuario no presenta tarjeta BIP o similar. Nunca se pasa en mano el chip al usuario. Realizar prueba de funcionamiento siempre, luego pegar el chip en la bicicleta, con la leyenda SUBE de izquierda a derecha o de abajo hacia arriba. Sacar foto nítida y completa a la bicicleta. Registrar pago.</li>
           <li style="font-weight: bold; font-size: 14px; color: #41464b; font-style:  ">Es de su obligación informar al usuario: Chip intransferible (una tarjeta BIP sirve para N bicicletas, no al revés por seguridad obviamente), horarios, multa por noche, aseguramiento correcto de la bicicleta (a través del marco), ingreso correcto (primero el chip en la antena que emita sonido, luego la bip mantener en sensor), nunca forzar torniquetes. </li>
           <li style="font-weight: bold; font-size: 14px; color: #41464b; font-style:  ">Realizar los procedimientos como se indica en el MANUAL presente físicamente en la caseta que usted firmó y está en pleno conocimiento.</li>
           <li style="font-weight: bold; font-size: 14px; color: #41464b; font-style:  ">Única playlist permitida por jefatura y COFODEP (a un volumen máximo de 22% en PC, 100 en pantalla Bievenida, 100 en spotify), sonido por pantalla de Bienvenida. Nombre de usuario sube1@fomentolaflorida.cl misma contraseña de los PC <a href="https://open.spotify.com/playlist/6p8E6KtKyaqpXmN5lbaAay?si=516fbb3806d24586" target="_blank" rel="noopener noreferrer">♫ CLICK AQUÍ ♫</a></li>
 </div> <p>
 
 <div  class="icon-bar btn" style="width: 100%;"> <a class="active" style="width: 100%;" onclick="checkPing()"  ><i  class="fa fa-android" style="color:#ffc720; font-size: 30px; height: 20px; "> <label  style="font-size: 18px; vertical-align: 5; font-family: courier,arial,helvética;">Revisar integridad del sistema</label></i></a></div>
  <p>
 <div  class="icon-bar btn" style="width: 100%;"> <a class="active" style="width: 100%;"  onclick="funcionDespliegaInfo()"><i  class="fa fa-angle-double-right" style="color:#ffc720; font-size: 30px; height: 20px; "> <label  style="font-size: 18px; vertical-align: 5; font-family: courier,arial,helvética;">Ingreso a turno</label></i></a></div>
        <p>
      <div id="divIngresoTurno" style="display: none" class="card">
      <li>Registrar su ingreso en reloj control. </li>
      <li>Realizar Control de Temperatura (Nombre, Rut, hora que ingresó, Temperatura y firma). </li>
      <li>Realizar Checklist de Ingreso a turno. </li>
      <li>Registrar en sistema - Libro de Novedades: Recibo turno con X en caja efectivo, X chip disponibles. Más novedades. </li>
      
      <li>Recuerde la pantalla de Bienvenida siempre con texto al 67%, y en pantalla completa.</li>
        </div> <p>
<!--       <div><button onclick="funcionDespliegaInfoLP()" class="btn-danger" style="width: 100%; background-color: #717171"></button></div>-->
 <div  class="icon-bar btn" style="width: 100%;"> <a class="active" style="width: 100%;"  onclick="funcionDespliegaInfoLP()"><i  class="fa fa-bicycle" style="color:#ffc720; font-size: 30px; height: 20px; "> <label  style="font-size: 18px; vertical-align: 5; font-family: courier,arial,helvética;">Labores Principales</label></i></a></div>

       <p>
       <div id="divLP"  style="display: none" class="card">      
           <li style="font-weight: bold">Registro de usuarios antiguos y nuevos. </li><p>
      <p>Solicitar RUT a usuario, click en pestaña "BUSCAR USUARIO", ingresar su Rut, click en botón azul Buscar. Si no aparece información, solicitar cedula y BIP y registrarlo. </p>
      <p style="text-decoration: underline; color: #FC5C01">Usuarios Antiguos:</p><p> Poseen chip (antiguo, mitad naranjo mitad blanco) pegado en su bicicleta, y su BIP no abre torniquete, en el sistema no aparece buscando su RUT.
      Solicitar Cedula de identidad y BIP, registrar como usuario nuevo, y reutilizar CHIP(antiguo)</p>
       <p>Se pueden agregar o asignar varias bicicletas a un Usuario, vale decir, una tarjeta BIP a N bicicletas(chips). No lo contrario por seguridad. </p>
      <p></p>
      <p style="font-style: oblique; font-weight: bold"> ¿Cómo saber si el chip antiguo está bueno? Posicionar el chip frente a la antena (5-10cm), mover lentamente de forma paralela, al tocar el chip si la antena emite sonido el chip esta bueno, de lo contrario esta malo y el usuario debe adquirir uno nuevo. </p>
       <p style="text-decoration: underline; color: #0dcaf0">Usuarios Nuevos:</p><p> Su bicicleta no tiene CHIP, probablemente no tenga U-Lock. Debe presentar cedula de identidad, tarjeta BIP y cancelar el costo del CHIP. </p>
      <p>En caso de no tener U-Lock: Completar el registro del usuario agregando el CHIP a su bicicleta, posteriormente asignar Nro. de U-lock a Usuario.
      Pestaña Buscar Usuario -> ingresar RUT -> Click en botón Buscar -> Click en Info. -> Pestaña U-Lock -> Asignar Nro. U-Lock (se refleja en Pantalla Principal -> Con Bicicleta). </p>
      <p>En caso de no tener CHIP, ni como comprarlo por x motivo, asignar U-Lock en Excel (crear pestaña con fecha del día, guiarse por registros anteriores. Nombre, Rut, hora entrada, U-Lock, hora salida). </p>
      <p>Se pueden validar nombres de los Usuarios en pestaña marcadores de Mozilla "BUSCAR PERSONA X RUT."</p>
      <p>En caso de que el Usuario perdió su BIP y no trae otra para actualizarla, debe agregar el registro del ingreso del Usuario a través del "Registro Manual", previamente inscrito. </p>      
      <p>En caso de que la lectura de la tarjeta BIP arroje 0 a la izquierda, se deben borrar. Ej: 02572535444, debe quedar 2572535444. </p>
      <li style="font-weight: bold">Verificar que los usuarios NO empujen el pórtico de Bicicletas</li>
      <li style="font-weight: bold">Poner atención a las acciones que realizan los Usuarios mientras se encuentran dentro del recinto. </li>
      
      <li style="font-weight: bold">Verificar U-Locks.</li>
      <p>Si se detecta una bicicleta sin candado, con su candado mal asegurado o con otro tipo de candado de baja seguridad, se debe asegurar con uno de nuestro stock. </p>
      <li style="font-weight: bold">
          Mantener orden y limpieza dentro y fuera de la caceta. Entrada y salida del recinto. Revisar papeles o basuras plásticas en Racks y alrededor.
      </li>
      <li style="font-weight: bold">Mantener lenguaje y actitud cordial y correcta con los usuarios. </li>
      <li style="font-weight: bold">Mantener compresor enchufado, si usa el microondas, desenchufe el compresor, luego de que termine de usarlo, volver a enchufar compresor.</li>
     
       </div>
       <p>
       <!--<div><button onclick="funcionDespliegaInfoRG()" class="btn-danger" style="width: 100%; background-color: #717171">CASOS CRITICOS</button></div>-->
       <div  class="icon-bar btn" style="width: 100%;"> <a class="active" style="width: 100%;"  onclick="funcionDespliegaInfoRG()"><i  class="fa fa-warning" style="color:#ffc720; font-size: 30px; height: 20px; "> <label  style="font-size: 18px; vertical-align: 10; font-family: courier,arial,helvética;">Casos Críticos</label></i></a></div>

       <p>
            <div id="divCasosCrit" style="display: none" class="card">
      <li style="font-weight: bold">Torniquete de Bicicleta pegado </li>
      <p>Realizar procedimiento cerrando la aplicación "AntenaUHF", desenchufar USB azul y volver a enchufar en mismo puerto, abrir nuevamente aplicación "AntenaUHF". Debe mostrar lectura de números acercando un chip a la antena.</p>
      <img src="Img/AntenaUHFSinLEc.jpg" alt=""/>&nbsp;&nbsp;<img src="Img/Antenauhflec.jpg" alt=""/><br><label>En el caso de la Antena de entrada debe decir "Puerto 6 abierto" con color verde, en el PC de salida "Puerto 5 abierto".</label>
      <p>Otro mensaje de error, es cuando se desconecta alguno de los cables de la Antena fisicamente, mostrara un mensaje como el siguiente:</p>
      <img src="Img/ErrorAntenaUHF.jpg" alt=""/> 
      <p>Debe ubicar los cables y verficicar su estado visualemente, si esta alguno desenchufado favor enchufar y repetir el procedimiento abriendo la aplicación</p>
      <img src="Img/cableAntena.jpeg" alt="" style="width: 300px; height: 300px"/>
      
      <p>¿Sigue sin mostrar lecturas y se realizaron los procedimientos anteriores?.
      En el panel switch de energia, bajar en nro 4 correspondiente a los torniquietes, esperar 15 segundos y volver a subirlo, realizar procedimiento nuevamente. Si persiste el error comunicarse con Supervisor.</p>
      <li>...</li>
      <li style="font-weight: bold">Usuario solocita romper su candado por perdida de llaves o x motivo</li>
      <p>El usuario debe firmar "Declaración de seguridad y perdida de elementos SUBE" antes de proceder (en carpeta azul),  debe solicitar su cedula de identidad y sacar una foto, sacar foto mientras el usuario realiza el procedimiento con celular de oficina SUBE</p>
        </div>
          <p>
       <!--<div><button onclick="" class="btn-danger" style="width: 100%; background-color: #717171">REGLAS GENERALES</button></div>-->
       <div  class="icon-bar btn" style="width: 100%;"> <a class="active" style="width: 100%;"  onclick=""><i  class="fa fa-tasks" style="color:#ffc720; font-size: 30px; height: 20px; "> <label  style="font-size: 18px; vertical-align: 5; font-family: courier,arial,helvética;">Reglas Generales</label></i></a></div>

       <p>
       <!--<div><button onclick="funcionDespliegaInfoST()" class="btn-danger" style="width: 100%; background-color: #717171">SALIDA DE TURNO</button></div>-->
       <div  class="icon-bar btn" style="width: 100%;"> <a class="active" style="width: 100%;"  onclick="funcionDespliegaInfoST()"><i  class="fa fa-angle-double-left" style="color:#ffc720; font-size: 30px; height: 20px; "> <label  style="font-size: 18px; vertical-align: 5; font-family: courier,arial,helvética;">Salida de turno</label></i></a></div>

       <p>
      <div id="divSalidaTurno" style="display: none" class="card">
      <li>Registrar su salida en reloj control. </li>
      <li>Realizar Control de Temperatura (Nombre, Rut, Temperatura y firma). </li>      
      <li>Registrar en sistema - Libro de Novedades: Entrega de turno con X en caja efectivo, se vendieron x chips en efectivo, x chips con tarjeta, quedan X chip disponibles (si aplica). Más novedades. </li>
      <li>Entregar interior de caseta limpia en condiciones para próximo turno entrante, y exterior sin papeles ni residuos de basura.</li>

        </div>
       <p> 
      

  
  
  
  
  
     
</div>








</body>
</html>
<script type="text/javascript">
            $(document).ready(function () {


                //GUARDAR ANOTACION
              
               

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
             




            });</script>


<?php 
//function pingDomain($domain){
//    $starttime = microtime(true);
//    $file      = @fsockopen ($domain, 80, $errno, $errstr, 10);
//    $stoptime  = microtime(true);
//    $status    = 0;
// 
//    if (!$file) $status = -1;  // Site is down
//    else {
//        fclose($file);
//        $status = ($stoptime - $starttime) * 1000;
//        $status = floor($status);
//    }
//    if ($status <> -1) {
//        return true;
//    }
// 
//    return false;
//    
//}
// 
//if (pingDomain('192.168.18.103')) {
//    echo 'Conectado';
//} else {
//    echo 'Desconectado';
//}
?>
