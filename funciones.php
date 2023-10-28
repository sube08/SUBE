<?php

require_once('Conexion/Negocio.php');

	function funcionConsulta1($consulta)
	{
		$objetoProcesos = new Negocio();
		
		$consulta = 'select * from tb_mov_movimiento';
		
		$objetoProcesos->ConsultaUno($consulta);
	}
	
	function funcionConsulta2($consulta)
	{
		$objetoProcesos = new Negocio();
		
		$consulta = 'select * from tb_cic_ciclista';
		
		$objetoProcesos->ConsultaDos($consulta);
	}

	function consultaBicicletasPorRut($rut)
	{
		$objetoProcesos = new Negocio();	
		$objetoProcesos->ConsultarBiciletasPorRut($rut);
	}

	function funcionLoguear($txtUsuario, $txtPasswd)
	{
		$objetoProcesos = new Negocio();	
		$objetoProcesos->Loguear($txtUsuario, $txtPasswd);
	}
	
	function funcionObtenerVisitas($opcionTablaVisita)
	{
		$objetoProcesos = new Negocio();		
		$objetoProcesos->ConsultaMovimientos_sb($opcionTablaVisita);
	}
	
	function funcionReporteDiario($consulta)
	{
		$objetoProcesos = new Negocio();
		$consulta = "";
		
		$objetoProcesos->ConsultaMovimientos_sb_reporte($consulta);
	}
	
	function BuscarCic($txtRut)
	{
		$objetoProcesos = new Negocio();
		
		$objetoProcesos->BuscarCic($txtRut);
	}

 
    function funcionNuevoCliente($rut,$nombre,$telefono,$sexo,$fecNac,$nac,$mail,$direc,$comuna,$uvecinal,$tarjnum,$tagnum,$modBici,$desc)
	{
		$objetoProcesos = new Negocio();
		
		$objetoProcesos->NuevoCliente($rut,$nombre,$telefono,$sexo,$fecNac,$nac,$mail,$direc,$comuna,$uvecinal,$tarjnum,$tagnum,$modBici,$desc);
	}
	
	function funcionNuevoClientesb($rut,$nombre,$telefono,$sexo,$fecNac,$nac,$mail,$direc,$comuna,$uvecinal,$tarjnum, $slcComoSeEntero, $txtOtroComoSeEntero)
	{
		$objetoProcesos = new Negocio();
		$comoSeEntero = $slcComoSeEntero;
		if($slcComoSeEntero == "0")
		{
			$comoSeEntero = $txtOtroComoSeEntero;
		}
		
		$objetoProcesos->NuevoClientesb($rut,$nombre,$telefono,$sexo,$fecNac,$nac,$mail,$direc,$comuna,$uvecinal,$tarjnum, $comoSeEntero);
	}
	
	function funcionActualizarCliente($rutUpd, $nombreupd, $telefonoupd, $sexoupd, $emailupd, $direccionupd, $comunaupd, $numerouvupd, $nroTarjetaupd, $fecnacupd, $nacionalidadupd)
	{
		$objetoProcesos = new Negocio();
		
		$objetoProcesos->ActualizarCliente($rutUpd, $nombreupd, $telefonoupd, $sexoupd, $emailupd, $direccionupd, $comunaupd, $numerouvupd, $nroTarjetaupd, $fecnacupd, $nacionalidadupd);
	}
	
	function funcionInsertarBicicleta($rutCic, $tagBic, $modeloBic, $descBic)
	{
		$objetoProcesos = new Negocio();
		
		$objetoProcesos->InsertarBicicleta($rutCic, $tagBic, $modeloBic, $descBic);
		
	}

	function funcionEditarBicicleta($idBicicleta, $tagBic, $modeloBic, $descBic)
	{
		echo "2";
		$objetoProcesos = new Negocio();
		
		$objetoProcesos->EditarBicicleta($idBicicleta, $tagBic, $modeloBic, $descBic);
		
	}
	
	function funcionInsertarLectura($datoLeido, $posicion, $tipoLector)
	{
		$objetoProcesos = new Negocio();
		
		$datoLeido = trim($datoLeido);
		$datoLeido = substr($datoLeido, 0, 53);
		$datoLeido = trim($datoLeido);

		$objetoProcesos->InsertarLectura($datoLeido, $posicion, $tipoLector);
	}
	
	function funcionBuscarCliente($txtRut, $txtNombre, $txtTelefono, $cmbSexo, $txtFechaNacimiento, $cmbNacionalidad, $txtEmail, $txtDireccion, $cmbComuna, $txtNroUV, $txtNroTarjeta)
	{
		$objetoProcesos = new Negocio();		
		$objetoProcesos->BuscarCliente($txtRut, $txtNombre, $txtTelefono, $cmbSexo, $txtFechaNacimiento, $cmbNacionalidad, $txtEmail, $txtDireccion, $cmbComuna, $txtNroUV, $txtNroTarjeta);
	}
	
	function funcionObtenerTag($idScanner)
	{
		$objetoProcesos = new Negocio();		
		$objetoProcesos->ConsultaTagScaneado($idScanner, 2);
	}

	function funcionObtenerNFC($idScannerNFC)
	{
		$objetoProcesos = new Negocio();		
		$objetoProcesos->ConsultaTagScaneado($idScannerNFC, 1);
	}
	
	
	function InicioSesion($usuario, $pswd)
	{

		$objetoProcesos = new Negocio();
		$respuesta = $objetoProcesos->InicioSesion($usuario,$pswd);
		
		
		return $respuesta;
	}
	
	function CrearUsuario($Nombreusuario, $email, $esAdministrador)
	{

		$objetoProcesos = new Negocio();
		$respuesta = $objetoProcesos->CrearUsuario($Nombreusuario, $email, $esAdministrador);
		
		
		return $respuesta;
	}
	
	function BorrarVideo($idVideo)
	{
	    $objetoProcesos = new Negocio();
		$respuesta = $objetoProcesos->BorrarVideo($idVideo);
		
		
		return $respuesta;
	}
	function MovimientoCiclista($idPosicion)
	{
		$objetoProcesos = new Negocio();
		$respuesta = $objetoProcesos->MovimientoCiclista($idPosicion);
	}

	function RegistrarMovimientoCiclistaManual($rutRegistro, $horaRegistro, $tipoRegistro, $idBicicleta)
	{
		$objetoProcesos = new Negocio();
		$respuesta = $objetoProcesos->RegistrarMovimientoCiclistaManual($rutRegistro, $horaRegistro, $tipoRegistro, $idBicicleta);
	}
	
	/*** DESARROLLO NOVIEMBRE***/
	
	function funcionObtenerVisitasPorRut($rut)
	{
		$objetoProcesos = new Negocio();		
		$objetoProcesos->ConsultarVisitasPorRut($rut);
	}
	
	function funcionObtenerCandadosPorRut($rut)
	{
		$objetoProcesos = new Negocio();		
		$objetoProcesos->ConsultarCandadosPorRut($rut);
	}
	
	function funcionObtenerObservacionesPorRut($rut)
	{
		$objetoProcesos = new Negocio();		
		$objetoProcesos->ConsultarObservacionesPorRut($rut);
	}
	
	function funcionInsertarCnd($rut, $numCnd)
	{
		$objetoProcesos = new Negocio();		
		$objetoProcesos->AsociarCandadoARut($rut, $numCnd);
	}

	function funcionInsertarObservacionCiclista($rutCiclista, $tipoObs, $observacion)
	{
		$objetoProcesos = new Negocio();		
		$objetoProcesos->InsertarObservacionCiclista($rutCiclista, $tipoObs, $observacion);
	}

	function funcionGetUltimoCiclista($idPosLector)
	{
		$objetoProcesos = new Negocio();
		$objetoProcesos->GetUltimoCiclista($idPosLector);
	}		

	
	function funcionInsertarNovedad($textoNovedad)
	{
		$objetoProcesos = new Negocio();		
		session_start();
		if($_SESSION["OPR_ID"] > 0)
		{
			$objetoProcesos->InsertarLibroNovedades($_SESSION["OPR_ID"], $textoNovedad);
		}
		else
		{
			echo $_SESSION["OPR_ID"];
		}
	}	
	
	function funcionObtenerNovedadPorFecha($fechaNovedades)
	{
		$objetoProcesos = new Negocio();		
		$objetoProcesos->ConsultarLibro($fechaNovedades);
	}
	
	function funcionDesvincularCnd($idCandado, $rutCic)
	{
		$objetoProcesos = new Negocio();		
		$objetoProcesos->DesvincularCandado($idCandado, $rutCic);
	}
	
	
	
	/****************************/
	
	function RegistrarLog($evento)
	{
		$fichero = fopen(__DIR__ . "/../LOG/LOG_" . date("d-m-Y") . ".txt", "a");
		fputs($fichero, "[" . date("d-m-Y H:i:s") . "] ". $evento ."\n");
	fclose($fichero);
	}
	
	
	

	try{

		//registrar cliente
		if (isset($_POST['txtRut_'])) {
			RegistrarLog("REGISTRAR CICLISTA: " . $_POST['txtRut_'] . " NOMBRE:" . $_POST['txtNombre_']);
			funcionNuevoCliente($_POST['txtRut_'],$_POST['txtNombre_'],$_POST['txtTelefono'],$_POST['cmbSexo'],$_POST['txtFechaNacimiento'],$_POST['cmbNacionalidad'],$_POST['txtEmail'],$_POST['txtDireccion'],$_POST['cmbComuna'],$_POST['txtNroUV'],$_POST['txtNroTarjeta'],$_POST['txtNroTag'],$_POST['txtModeloBici'],$_POST['subject']);
			
		}
		
		else if (isset($_GET['txtRut_'])) {
			RegistrarLog("REGISTRAR CICLISTA: " . $_GET['txtRut_'] . " NOMBRE:" . $_GET['txtNombre_']);
			funcionNuevoClientesb($_GET['txtRut_'],$_GET['txtNombre_'],$_GET['txtTelefono'],$_GET['cmbSexo'],$_GET['txtFechaNacimiento'],$_GET['cmbNacionalidad'],$_GET['txtEmail'],$_GET['txtDireccion'],$_GET['cmbComuna'],$_GET['txtNroUV'],$_GET['txtNroTarjeta'],$_GET['slcComoSeEntero'],$_GET['txtComoSeEntero']);
			
		}
		
		//buscar cliente 
		else if (isset($_GET['txtRutBsc']))
		{

			funcionBuscarCliente($_GET['txtRutBsc'],$_GET['txtNombre_'],$_GET['txtTelefono'],$_GET['cmbSexo'],$_GET['txtFechaNacimiento'],$_GET['cmbNacionalidad'],$_GET['txtEmail'],$_GET['txtDireccion'],$_GET['cmbComuna'],$_GET['txtNroUV'],$_GET['txtNroTarjeta']);
			
		}

		//actualizar cliente
		else if (isset($_GET['rutUpd'])) {
			funcionActualizarCliente($_GET['rutUpd'],$_GET['nombreupd'],$_GET['telefonoupd'],$_GET['sexoupd'],$_GET['emailupd'],$_GET['direccionupd'],$_GET['comunaupd'],$_GET['numerouvupd'],$_GET['nroTarjetaupd'],$_GET['fecnacupd'],$_GET['nacionalidadupd']);
		}
		
				
		else if (isset($_POST['txtDatoLeido']) && (isset($_POST['txtPosicion'])) && (isset($_POST['txtTipo']))) 
		{

			$datoLeidoPost = $_POST['txtDatoLeido'];
		
			if($_POST['txtTipo'] == '2')
			{
				$conjuntos = explode(' ', $datoLeidoPost);
				$datoLeidoPost = implode(' ', array_slice($conjuntos,0, 18));
			}

			
			try
			{	
				RegistrarLog("Insertar lectura Dato leido: " . $datoLeidoPost . " ; posicion: " . $_POST['txtPosicion'] . " ; tipo: " . $_POST['txtTipo']);
				funcionInsertarLectura($datoLeidoPost, $_POST['txtPosicion'], $_POST['txtTipo']);	
			}
			catch(Exception $ex)
			{
				RegistrarLog("Insertar lectura - Error:" . $ex);
			}
			
					
		}
		
		//OBTENER CODIGO SCANEADO PARA LLENAR FORMULARIO
		else if(isset($_POST['idScanner'])){
			try
			{	
				funcionObtenerTag($_POST['idScanner']);		
			}
			catch(Exception $ex)
			{
				RegistrarLog("Obtener TAG formulario - " . $ex);
			}
			
		}



		//OBTENER CODIGO NFC ESCANEADO PARA LLENAR FORMULARIO
		else if(isset($_POST['idScannerNFC'])){
			try
			{	
				funcionObtenerNFC($_POST['idScannerNFC']);		
			}
			catch(Exception $ex)
			{
				RegistrarLog("Obtener NFC formulario - " . $ex);
			}
			
		}
		
		else if(isset($_GET['idScannerNFC'])){
			try
			{	
				funcionObtenerNFC($_GET['idScannerNFC']);		
			}
			catch(Exception $ex)
			{
				RegistrarLog("Obtener NFC formulario - " . $ex);
			}
			
		}

		
		else if(isset($_GET['idScanner'])){
			try
			{	
				funcionObtenerTag($_GET['idScanner']);		
			}
			catch(Exception $ex)
			{
				RegistrarLog("Obtener TAG formulario - " . $ex);
			}
			
		}
		
		//nueva bicicleta
		else if (isset($_GET['rutCic']) && (isset($_GET['tagBic'])) && (isset($_GET['modeloBic']))) {

			echo "uno";
			
			if(isset($_GET['idBicicleta']) && $_GET['idBicicleta'] != "")
			   {
				   echo "uno -1";
			   	funcionEditarBicicleta($_GET['idBicicleta'], $_GET['tagBic'], $_GET['modeloBic'], $_GET['descBic']);
			   }
			else
			{
				funcionInsertarBicicleta($_GET['rutCic'], $_GET['tagBic'], $_GET['modeloBic'], $_GET['descBic']);
			}
			
		}
		
		else if (isset($_GET['txtDatoLeido']) && (isset($_GET['txtPosicion'])) && (isset($_GET['txtTipo']))) {
			
			funcionInsertarLectura($_GET['txtDatoLeido'], $_GET['txtPosicion'], $_GET['txtTipo']);
			RegistrarLog("Tarjeta ingresada: " . $_GET['txtDatoLeido']. " Posicion:" . $_GET['txtPosicion'] . " TipoLectora:" . $_GET['txtTipo']);
			echo 'OK 1';
			
		}
		else if(isset($_GET['txtConsulta1']))
		{
			echo 'consulta1';
			funcionConsulta1($_GET['txtConsulta1']);
		}
		else if(isset($_GET['txtTablaVisitas']))
		{
			funcionObtenerVisitas($_GET['txtTablaVisitas']);
		}
		else if(isset($_GET['txtRepDiario']))
		{
			funcionReporteDiario($_GET['txtRepDiario']);
		}
		else if(isset($_GET['rutConsultaCic']))
		{
			RegistrarLog("CONSULTAR RUT: " . $_GET['rutConsultaCic'] );
			BuscarCic($_GET['rutConsultaCic']);
		}
		else if(isset($_POST['txtLogUsuario']) && (isset($_POST['txtLogPassword'])))
		{
			session_start();
			session_destroy();
			
			RegistrarLog("Inicio Sesion:" . ($_POST['txtLogUsuario']));
			funcionLoguear($_POST['txtLogUsuario'], $_POST['txtLogPassword']);
		}
		else if (isset($_POST['cerrarSesion']))
		{
			session_start();
			
			RegistrarLog("CERRAR SESION");
			// Terminar la sesión:
			session_destroy();
			header("Location: index.html");
			
		}
		else if (isset($_GET['tipomovcic']))
		{
			MovimientoCiclista($_GET['tipomovcic']);
		}

		else if (isset($_GET['idRutMM']) && (isset($_GET['horaMovimiento'])) && (isset($_GET['idTipoMovimientoMM'])))
		{
			RegistrarMovimientoCiclistaManual($_GET['idRutMM'], $_GET['horaMovimiento'], $_GET['idTipoMovimientoMM'], $_GET['cmbBicicleta']);

			RegistrarLog("Ingreso manual: ". $_GET['idRutMM'] . " tipoMov: " . $_GET['idTipoMovimientoMM'] . " bici: " . $_GET['cmbBicicleta']);
		}
		else if(isset($_GET['rutObtBic']))
		{
			consultaBicicletasPorRut($_GET['rutObtBic']);
		}
		else if(isset($_GET['rutObtVis']))
		{
			funcionObtenerVisitasPorRut($_GET['rutObtVis']);
		}
		else if(isset($_GET['rutObtCnd']))
		{
			funcionObtenerCandadosPorRut($_GET['rutObtCnd']);
		}
		else if(isset($_GET['rutObtObs']))
		{
			funcionObtenerObservacionesPorRut($_GET['rutObtObs']);
		}
		else if (isset($_GET['rutObtCndSet']) && (isset($_GET['numCndSet']))) 
		{
			funcionInsertarCnd($_GET['rutObtCndSet'], $_GET['numCndSet']);
		}		
		else if(isset($_GET['rutInsObs']) && (isset($_GET['tipoInsObs'])) && (isset($_GET['descInsObs']))) 
		{
			funcionInsertarObservacionCiclista($_GET['rutInsObs'], $_GET['tipoInsObs'], $_GET['descInsObs']);
		}
		else if(isset($_GET['txtAnotacionIns'])) 
		{
		   funcionInsertarNovedad($_GET['txtAnotacionIns']);
		}
		else if(isset($_GET['fehaRegAnotaciones'])) 
		{
			funcionObtenerNovedadPorFecha($_GET['fehaRegAnotaciones']);
		}
		else if (isset($_GET['idCandVinc']) && (isset($_GET['rutCicCnd']))) 
		{
			funcionDesvincularCnd($_GET['idCandVinc'], $_GET['rutCicCnd']);
		}
		else if (isset($_GET['idPosLector']))
		{
			funcionGetUltimoCiclista($_GET['idPosLector']);
		}
		else{
		
			RegistrarLog("No se encontró función para los parametros ingresados");
		}
	
	}
	catch(Exception $ex)
	{
		echo $ex;
		RegistrarLog("Funciones - " . $ex);
	}
	
?>
