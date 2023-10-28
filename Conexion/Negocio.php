<?php


include_once ("ConexionMysql.php");
include_once ("ejecucionSP.php");
//require_once("excel.php");  
include "mcript.php";
header('Content-Type: application/json');

 class Negocio
{
    public $objetoDato;
    public $objetoDatoParaSP;
	

    public function __construct()
    {
       $this->objetoDato = new conexion('mysql:host=localhost;dbname=bd_sb_sube','root','fr4nc1sc0*1+Ñw');
	$this->objetoDatoParaSP = new conexionSP('mysql:host=localhost;dbname=bd_sb_sube','root','fr4nc1sc0*1+Ñw');
    }


	public function ConsultarBiciletasPorRut($rut)
	{
		$this->objetoDato->conector();
		$respConsulta = $this->objetoDato->ejecutar("CALL SP_GET_BICICLETA_POR_RUT ('$rut')"); 
        $this->objetoDato->desconectar();
		echo json_encode($respConsulta);
	}
	
	public function NuevoClientesb($rut,$nombre,$telefono,$sexo,$fecNac,$nac,$mail,$direc,$comuna,$uvecinal,$tarjnum, $comoSeEntero)
	{
		$usuarioSesion = 0;

		session_start();
		if($_SESSION["OPR_ID"] > 0)
		{
			$usuarioSesion = $_SESSION["OPR_ID"];
		}
		else
		{
			echo "Error session";
			return null;
		}



		$this->objetoDato->conector();				
	    $consulta = "CALL SP_INS_CLIENTE_SB ('$rut','$nombre','$telefono','$sexo','$fecNac',$nac,'$mail','$direc',$comuna,0,'$tarjnum', '$usuarioSesion', '$comoSeEntero')";
        $this->objetoDato->ejecutar($consulta);				
        $this->objetoDato->desconectar();
		
		$return_arr = array();
		$return_arr[] = array("RESULTADO" => "OK");
		echo json_encode($return_arr);
		
	}
	
	
	public function ActualizarCliente($rutUpd, $nombreupd, $telefonoupd, $sexoupd, $emailupd, $direccionupd, $comunaupd, $numerouvupd, $nroTarjetaupd, $fecnacupd, $nacionalidadupd)
	{

		$usuarioSesion = 0;

		session_start();
		if($_SESSION["OPR_ID"] > 0)
		{
			$usuarioSesion = $_SESSION["OPR_ID"];
		}
		else
		{
			echo "error usuario";
			return null;
		}




		$this->objetoDato->conector();
		
	    $consulta = "CALL SP_UPD_UPDATE_CLIENTE ('$rutUpd', '$nombreupd', '$telefonoupd', '$sexoupd', '$emailupd', '$direccionupd', '$comunaupd', '$numerouvupd', '$nroTarjetaupd', '$fecnacupd', '$nacionalidadupd', '$usuarioSesion')";
        $this->objetoDato->ejecutar($consulta);			
        $this->objetoDato->desconectar();
		$return_arr = array();
		$return_arr[] = array("RESULTADO" => "OK");
		echo json_encode($return_arr);
	}
	
	
	
	public function InsertarLectura($datoLeido, $posicion, $tipoLector)
	{
		
	$this->objetoDatoParaSP->conector();
        $consulta = "CALL SP_INS_LECTURA ('$datoLeido', $posicion, $tipoLector)";
        $this->objetoDatoParaSP->EjecutarSP($consulta);
	
	$this->objetoDato->desconectar();
	
	}
	
	/*
	public function BuscarCliente__($txtRut, $txtNombre, $txtTelefono, $cmbSexo, $txtFechaNacimiento, $cmbNacionalidad, $txtEmail, $txtDireccion, $cmbComuna, $txtNroUV, $txtNroTarjeta)
	{
		/*
		$this->objetoDato->conector();
		$consulta = "CALL SP_BSC_BUSCAR_CLIENTE ('$txtRut', '$txtNombre', '$txtTelefono', '$cmbSexo', '$txtFechaNacimiento', $cmbNacionalidad, '$txtEmail', '$txtDireccion', $cmbComuna, '$txtNroUV', '$txtNroTarjeta')";
        $this->objetoDatoParaSP->EjecutarSP($consulta);
        $this->objetoDatoParaSP->desconectar();
		echo 'hola';
	}
	*/
	public function BuscarCliente($txtRut, $txtNombre, $txtTelefono, $cmbSexo, $txtFechaNacimiento, $cmbNacionalidad, $txtEmail, $txtDireccion, $cmbComuna, $txtNroUV, $txtNroTarjeta)
	{
	

		$this->objetoDato->conector();
		$votacion = $this->objetoDato->ejecutar(" SELECT * FROM TB_CIC_CICLISTA CIC INNER JOIN TB_COM_COMUNA COM ON CIC.COM_ID = COM.COM_ID INNER JOIN TB_PA_PAIS PA ON CIC.PA_ID = PA.PA_ID WHERE ('$txtRut' = 'nul' OR CIC.CIC_RUT = '$txtRut') AND ('$txtNombre' = 'nul' OR CIC.CIC_NOMBRE like '%$txtNombre%') AND ('$txtTelefono' = 'nul' OR CIC.CIC_TELEFONO = '$txtTelefono') AND ('$cmbSexo' = 'nul' OR CIC.CIC_SEXO = '$cmbSexo') AND ($cmbNacionalidad = 0 OR CIC.PA_ID = $cmbNacionalidad) AND ('$txtEmail' = 'nul' OR CIC.CIC_EMAIL = '$txtEmail') AND ('$txtDireccion' = 'nul' OR CIC.CIC_DIRECCION_VECINAL = '$txtDireccion')AND ($cmbComuna = 0 OR CIC.COM_ID = $cmbComuna) AND ('$txtNroUV' = 'nul' OR CIC.CIC_NRO_UNIDAD_VECINAL = '$txtNroUV') AND ('$txtNroTarjeta' = 'nul' OR CIC.CIC_NRO_TARJETA = '$txtNroTarjeta')"); 
		$return_arr = array();
		foreach($votacion as $vot)
		{
			
			 $return_arr[] = array(
					"CIC_RUT" => $vot['CIC_RUT'],
                    "CIC_NOMBRE" => $vot['CIC_NOMBRE'],
                    "CIC_TELEFONO" => $vot['CIC_TELEFONO'],
					"CIC_SEXO" => $vot['CIC_SEXO'],
					"CIC_FECHA_NACIMIENTO" => $vot['CIC_FECHA_NACIMIENTO'],
					"CIC_EMAIL" => $vot['CIC_EMAIL'],
					"CIC_DIRECCION_VECINAL" => $vot['CIC_DIRECCION_VECINAL'],
					"COM_ID" => $vot['COM_ID'],
					"COM_DESCRIPCION" => $vot['COM_NOMBRE'],
					"CIC_NRO_UNIDAD_VECINAL" => $vot['CIC_NRO_UNIDAD_VECINAL'],
					"CIC_NRO_TARJETA" => $vot['CIC_NRO_TARJETA'],
                             		"ID_NACIONALIDAD" => $vot['PA_ID'],
					"NACIONALIDAD_E" => $vot['PA_NOMBRE']);			
		}
		echo json_encode($return_arr);
        $this->objetoDato->desconectar();
	}
	
	public function Loguear($txtUsuario, $txtPasswd)
	{

		$this->objetoDato->conector();
		$usuario_log = $this->objetoDato->ejecutar("SELECT opr_usuario, opr_password, opr_activo, pfl_id, opr_nombre, opr_id FROM TB_OPR_OPERADOR WHERE opr_usuario = '$txtUsuario' AND opr_password = '$txtPasswd'"); 
		$return_arr = array();
		$encontrado = false;
		foreach($usuario_log as $ulog)
		{
			if($ulog[2]== true)
			{
			
				$encontrado = true;
				$return_arr[] = array(
					"OPR_USUARIO" => $ulog[0],
                    "OPR_PASSWORD" => $ulog[1],
                    "OPR_ACTIVO" => $ulog[2],
					"PFL_ID" => $ulog[3],
					"OPR_ID" => $ulog[5],
					"OPR_NOMBRE" => $ulog[4]);	
					
				session_start();
				$_SESSION["OPR_USUARIO"] = $ulog[0];
				$_SESSION["OPR_ACTIVO"] = $ulog[2];
				$_SESSION["PFL_ID"] = $ulog[3];
				$_SESSION["OPR_NOMBRE"] = $ulog[4];
				$_SESSION["OPR_ID"] = $ulog[5];
			}		
					
					
		}
		
		if($encontrado == false)
		{
			$return_arr[] = array(
					"OPR_USUARIO" => "-1");
		}
		echo json_encode($return_arr);
        $this->objetoDato->desconectar();
	}
	
	
	
	
	public function BuscarCic($txtRut)
	{
		$this->objetoDato->conector();
		$votacion = $this->objetoDato->ejecutar("SELECT CIC_NOMBRE FROM TB_CIC_CICLISTA CIC WHERE CIC_RUT = '$txtRut' "); 
		$return_arr = array();
		$encontrado = false;
		foreach($votacion as $vot)
		{
			
			 $return_arr[] = array( "RESP" => $vot[0]);
			 $encontrado = true;
			 
		}
		
		if (!$encontrado)
		{
			$return_arr[] = array( "RESP" => "-1");
		}
		echo json_encode($return_arr);
        $this->objetoDato->desconectar();
	}
	
	public function MovimientoCiclista($posicion)
	{
		$this->objetoDato->conector();
                $mov_cic = $this->objetoDato->ejecutar("SELECT CIC.CIC_NOMBRE FROM TB_CIC_CICLISTA CIC INNER JOIN TB_MOV_MOVIMIENTO MOV ON CIC.CIC_RUT = MOV.CIC_RUT WHERE MOV.MOV_REVISADO = false AND PL_ID = $posicion");
                $return_arr = array();
                $encontrado = false;
                foreach($mov_cic as $mcic)
                {

                         $return_arr[] = array( "RESP" => $mcic[0]);
                         $encontrado = true;

                }

                if (!$encontrado)
                {
                        $return_arr[] = array( "RESP" => "-1");
                }
                echo json_encode($return_arr);
		$this->objetoDato->ejecutar("UPDATE TB_MOV_MOVIMIENTO SET MOV_REVISADO = true WHERE PL_ID = $posicion");
        	
		$this->objetoDato->desconectar();
		
	}

	public function GetUltimoCiclista($posicion)
	{
$this->objetoDato->conector();
$mov_cic = $this->objetoDato->ejecutar("SELECT MOV_ID, CIC.CIC_NOMBRE FROM TB_CIC_CICLISTA CIC INNER JOIN TB_MOV_MOVIMIENTO MOV ON CIC.CIC_RUT = MOV.CIC_RUT WHERE PL_ID = $posicion AND MOV_ID = (SELECT MAX(MOV_ID) FROM TB_MOV_MOVIMIENTO WHERE PL_ID = $posicion)");

$return_arr = array();

foreach($mov_cic as $mcic)
{
	$return_arr[] = array("MOV_ID" => $mcic[0], "CIC_NOMBRE" => $mcic[1]);
}

echo json_encode($return_arr);

$this->objetoDato->desconectar();


}	
	
	
	
	//Insertar bicicleta
	public function InsertarBicicleta($rutCic, $tagBic, $modeloBic, $descBic)
	{
		$this->objetoDato->conector();

		$usuarioSesion = 0;

		session_start();
		if($_SESSION["OPR_ID"] > 0)
		{
			$usuarioSesion = $_SESSION["OPR_ID"];
		}
		else
		{
			echo "SIN LOGUEAR";
			return null;
		}

	    $consulta = "CALL SP_INS_BICICLETA('$rutCic','$modeloBic','$descBic','$tagBic', '$usuarioSesion')";
        $this->objetoDato->ejecutar($consulta);
        $this->objetoDato->desconectar();
		
	$return_arr = array();
	$return_arr[] = array("RESULTADO" => "OK");
	echo json_encode($return_arr);
		
	}



//Actualizar bicicleta
	public function EditarBicicleta($idBicicleta, $tagBic, $modeloBic, $descBic)
	{
		$this->objetoDato->conector();

		$usuarioSesion = 0;

		session_start();
		if($_SESSION["OPR_ID"] > 0)
		{
			$usuarioSesion = $_SESSION["OPR_ID"];
		}
		else
		{
			echo "SIN LOGUEAR";
			return null;
		}

	    $consulta = "UPDATE TB_BIC_BICICLETA SET BIC_MODELO = '$modeloBic', BIC_NRO_TAG = '$tagBic' , BIC_DESCRIPCION = '$descBic', BIC_FECHA_UPDATE = NOW(), OPR_ID_UPDATE = '$usuarioSesion' WHERE BIC_ID = $idBicicleta)";
        $this->objetoDato->ejecutar($consulta);
        $this->objetoDato->desconectar();
		
	$return_arr = array();
	$return_arr[] = array("RESULTADO" => "OK");
	echo json_encode($return_arr);
		
	}

	


	//Insertar Movimiento Manual
	public function RegistrarMovimientoCiclistaManual($rutRegistro, $horaRegistro, $tipoRegistro, $idBicicleta)
	{
		$fecha_registro = (date("Y/m/d") . " " .  $horaRegistro);
		$this->objetoDato->conector();
		
		$cadena = "";
		if($idBicicleta == 0)
		{
			$cadena = "CALL SP_INS_MOVIMIENTO_MANUAL('$rutRegistro', $tipoRegistro,'$fecha_registro', null)";
		}
		else
		{
			$cadena = "CALL SP_INS_MOVIMIENTO_MANUAL('$rutRegistro', $tipoRegistro,'$fecha_registro', $idBicicleta)";
		}
		
		
	    $consulta = $cadena;
        $this->objetoDato->ejecutar($consulta);
        $this->objetoDato->desconectar();
		
		$return_arr = array();
		$return_arr[] = array("RESULTADO" => "OK");
		echo json_encode($return_arr);
		
	}
	
	public function ConsultaTagScaneado($idScanner, $tipoLector)
	{
		$this->objetoDato->conector();
		//$this->objetoDato->ejecutar("UPDATE TB_LEC_LECTURAS SET LEC_REVISADO = 1 WHERE TL_ID = $tipoLector  AND PL_ID = $idScanner");
		
		//CANTIDAD DE INTENTOS DE BUSQUEDA = 5 CADA 1 SEGUNDO
		$intentos_busq = 5;
		$contador_busq = 0;
		$encontrado = false;
		$return_arr = array();
		
		while(($contador_busq <= $intentos_busq) && $encontrado == false)
		{
			$lec_scanner = $this->objetoDato->ejecutar("SELECT LEC_DATO_LEIDO FROM TB_LEC_LECTURAS LEC WHERE LEC.TL_ID = $tipoLector  AND LEC.PL_ID = $idScanner ORDER BY LEC_ID DESC LIMIT 1"); 	
			
			foreach($lec_scanner as $lec)
			{
				if(strlen($lec[0]) > 1)
				{
					$encontrado = true;
					$return_arr[] = array("LECTURA" => $lec[0]);
				}
				
			}
			sleep(1);	
			$contador_busq = $contador_busq + 1;
		}
		
		$this->objetoDato->ejecutar("UPDATE TB_LEC_LECTURAS SET LEC_REVISADO = 1 WHERE TL_ID = $tipoLector  AND PL_ID = $idScanner");
		
		if (!$encontrado)
		{
			$return_arr[] = array("LECTURA" => "-1");
		}
		
		$this->objetoDato->desconectar();
		echo json_encode($return_arr);
	}
	
	
	
	public function InicioSesion($usuario, $pswd)
	{
		$this->objetoDato->conector();
		$consulta = "CALL LOGIN_USUARIO('$usuario','$pswd')";
		$session_ = $this->objetoDato->ejecutar($consulta);
        $this->objetoDato->desconectar();
				
		$resp;
		$estado;
		foreach ($session_ as $ses_)
		{
			$resp = $ses_[0];
		}
		
		if($resp >= 1)
		{
		    echo 'resp mayor 1';
			$this->RegistrarAcceso($ses_[0]);
			$estado = 1;			
		}
		else{
		    echo 'estado = 0';
			$estado = 0;
		}
		
		echo $estado ;
	}
	

	public function ConsultaUno($txtConsulta)
	{
		echo 'consulta1';
		$this->objetoDato->conector();
		$respConsulta = $this->objetoDato->ejecutar($txtConsulta); 
        $this->objetoDato->desconectar();
		echo json_encode($respConsulta);
	}
	
	public function ConsultaDos($txtConsulta)
	{
		echo $txtConsulta;
		$this->objetoDatoParaSP->conector();
     //   $respConsulta = $this->objetoDatoParaSP->EjecutarSP($txtConsulta);
	 $respConsulta = $this->objetoDatoParaSP->Ejecutar($txtConsulta);
        $this->objetoDatoParaSP->desconectar();
		echo $respConsulta;
	}
	
	public function ConsultaMovimientos($txtConsulta)
	{
		
		$this->objetoDato->conector();
		$respConsulta = $this->objetoDato->ejecutar("CALL SP_GET_MOVIMIENTO_POR_FECHA()"); 
        $this->objetoDato->desconectar();
		echo json_encode($respConsulta);
	}
	
	public function ConsultaMovimientos_sb($txtOpcionTabla)
	{
		$cons_vis = "";
		if($txtOpcionTabla == 0)
		{
			$cons_vis = "CALL SP_GET_MOVIMIENTO_POR_FECHA_SB()";
		}
		else
		{
			$cons_vis = "CALL SP_GET_MOVIMIENTO_POR_FECHA_CB()";
		}
		$this->objetoDato->conector();
		$respConsulta = $this->objetoDato->ejecutar($cons_vis); 
        $this->objetoDato->desconectar();
		echo json_encode($respConsulta);
	}
	
		public function ConsultaMovimientos_sb_reporte($txtConsulta)
	{
		
		$this->objetoDato->conector();
		$respConsulta = $this->objetoDato->ejecutar("CALL SP_GET_MOVIMIENTO_POR_FECHA_SB()"); 
		$nuevosRegistros = $this->objetoDato->ejecutar("SELECT COUNT(*) as 'cantidad' FROM TB_CIC_CICLISTA WHERE CAST(CIC_FECHA_INSCRIPCION AS DATE) = CURDATE()"); 
		$totalRegistros = $this->objetoDato->ejecutar("SELECT COUNT(*) as 'cantidad' FROM TB_CIC_CICLISTA"); 
		$totalMujeres = $this->objetoDato->ejecutar("SELECT COUNT( DISTINCT(CIC.CIC_RUT)) AS MUJERES FROM TB_CIC_CICLISTA CIC INNER JOIN TB_MOV_MOVIMIENTO MOV ON  CIC.CIC_RUT = MOV.CIC_RUT  WHERE CIC.CIC_SEXO = 'MUJER' AND CAST(MOV.MOV_HORA AS DATE) = CURDATE()"); 
		$totalHombres = $this->objetoDato->ejecutar("SELECT COUNT( DISTINCT(CIC.CIC_RUT)) AS 'HOMBRES' FROM TB_CIC_CICLISTA CIC INNER JOIN TB_MOV_MOVIMIENTO MOV ON  CIC.CIC_RUT = MOV.CIC_RUT  WHERE CIC.CIC_SEXO = 'HOMBRE' AND CAST(MOV.MOV_HORA AS DATE) = CURDATE()"); 
		$totalExtranjeros = $this->objetoDato->ejecutar("SELECT COUNT( DISTINCT(CIC.CIC_RUT)) AS 'EXTRANJEROS' FROM TB_CIC_CICLISTA CIC INNER JOIN TB_MOV_MOVIMIENTO MOV ON  CIC.CIC_RUT = MOV.CIC_RUT  WHERE PA_ID <> 400 AND CAST(MOV.MOV_HORA AS DATE) = CURDATE()"); 
		$usuCincuenta = $this->objetoDato->ejecutar("SELECT COUNT( DISTINCT(CIC.CIC_RUT)) AS 'MAS 50' FROM TB_CIC_CICLISTA CIC INNER JOIN TB_MOV_MOVIMIENTO MOV ON  CIC.CIC_RUT = MOV.CIC_RUT  WHERE CIC_FECHA_NACIMIENTO <= ADDDATE(CURDATE(), INTERVAL -50 YEAR) AND CAST(MOV.MOV_HORA AS DATE) = CURDATE()"); 
		$usuCuarenta = $this->objetoDato->ejecutar("SELECT COUNT( DISTINCT(CIC.CIC_RUT)) AS '40 Y 49' FROM TB_CIC_CICLISTA CIC INNER JOIN TB_MOV_MOVIMIENTO MOV ON  CIC.CIC_RUT = MOV.CIC_RUT  WHERE CIC.CIC_FECHA_NACIMIENTO > ADDDATE(CURDATE(), INTERVAL -50 YEAR) AND CIC.CIC_FECHA_NACIMIENTO <= ADDDATE(CURDATE(), INTERVAL -40 YEAR)  AND CAST(MOV.MOV_HORA AS DATE) = CURDATE()"); 
		$usuTreinta = $this->objetoDato->ejecutar("SELECT COUNT( DISTINCT(CIC.CIC_RUT)) AS '30 Y 39' FROM TB_CIC_CICLISTA CIC INNER JOIN TB_MOV_MOVIMIENTO MOV ON  CIC.CIC_RUT = MOV.CIC_RUT  WHERE CIC.CIC_FECHA_NACIMIENTO > ADDDATE(CURDATE(), INTERVAL -40 YEAR) AND CIC.CIC_FECHA_NACIMIENTO <= ADDDATE(CURDATE(), INTERVAL -30 YEAR)  AND CAST(MOV.MOV_HORA AS DATE) = CURDATE()"); 
		$usuVeinte = $this->objetoDato->ejecutar("SELECT COUNT( DISTINCT(CIC.CIC_RUT)) AS '20 Y 29' FROM TB_CIC_CICLISTA CIC INNER JOIN TB_MOV_MOVIMIENTO MOV ON  CIC.CIC_RUT = MOV.CIC_RUT  WHERE CIC.CIC_FECHA_NACIMIENTO > ADDDATE(CURDATE(), INTERVAL -30 YEAR) AND CIC.CIC_FECHA_NACIMIENTO <= ADDDATE(CURDATE(), INTERVAL -20 YEAR)  AND CAST(MOV.MOV_HORA AS DATE) = CURDATE()"); 
		$usuDiez = $this->objetoDato->ejecutar("SELECT COUNT( DISTINCT(CIC.CIC_RUT)) AS 'MENOS 20' FROM TB_CIC_CICLISTA CIC INNER JOIN TB_MOV_MOVIMIENTO MOV ON  CIC.CIC_RUT = MOV.CIC_RUT  WHERE CIC.CIC_FECHA_NACIMIENTO > ADDDATE(CURDATE(), INTERVAL -20 YEAR) AND CIC.CIC_FECHA_NACIMIENTO <= ADDDATE(CURDATE(), INTERVAL -10 YEAR)  AND CAST(MOV.MOV_HORA AS DATE) = CURDATE()"); 
		$usuComunas = $this->objetoDato->ejecutar("SELECT COUNT(*) as 'cantidad_com', COM.COM_NOMBRE AS 'COMUNA' FROM TB_CIC_CICLISTA CIC INNER JOIN TB_MOV_MOVIMIENTO MOV ON CIC.CIC_RUT = MOV.CIC_RUT INNER JOIN TB_COM_COMUNA COM ON COM.COM_ID = CIC.COM_ID WHERE CAST(MOV.MOV_HORA AS DATE) = CURDATE() GROUP BY COM.COM_NOMBRE"); 
		$RegistroNovedades = $this->objetoDato->ejecutar("SELECT LIB.LIB_DESCRIPCION, LIB.LIB_HORA, OPR.OPR_NOMBRE FROM TB_LIB_LIBRO_NOVEDADES LIB INNER JOIN TB_OPR_OPERADOR OPR ON OPR.OPR_ID = LIB.OPR_ID WHERE  CAST(LIB_HORA AS DATE) = CURDATE()");
		$comunas_arr = array();
        foreach($usuComunas as $ucom)
        {
		
                 $comunas_arr[] = array( "cant_com" => $ucom[0], "nombre_com" => $ucom[1]);
		
        }
		
		
        $this->objetoDato->desconectar();
		echo json_encode($respConsulta);
		echo "nuevos registros: "; 
		echo json_encode($nuevosRegistros);
		echo "total registros: "; 
		echo json_encode($totalRegistros);
		echo "mujeres: "; 
		echo json_encode($totalMujeres);
		echo "hombres: "; 
		echo json_encode($totalHombres);
		echo "extranjeros: "; 
		echo json_encode($totalExtranjeros);
		echo "cincuenta: "; 
		echo json_encode($usuCincuenta);
		echo "cuarenta: "; 
		echo json_encode($usuCuarenta);
		echo "treinta: "; 
		echo json_encode($usuTreinta);
		echo "veinte: "; 
		echo json_encode($usuVeinte);
		echo "diez: "; 
		echo json_encode($usuDiez);
		echo "comunas: "; 
		echo json_encode($comunas_arr);
                echo "libroNovedades"; 
                echo json_encode($RegistroNovedades);

	}
	
	public function RegistrarAcceso($idUsuario)
	{
		$this->objetoDato->conector();
        $consulta = "CALL INS_ACC_ACCESO ($idUsuario)";
        $this->objetoDato->ejecutar($consulta);
		$this->objetoDato->desconectar();
		$this->LlamarDatos($idUsuario);
		
	}
	
	/*** COMIENZO DESARROLLOS NOVIEMBRE ***/
	
	public function ConsultarCandadosPorRut($rut)
	{
		$this->objetoDato->conector();
		$respConsulta = $this->objetoDato->ejecutar("CALL SP_GET_CANDADO_POR_RUT ('$rut')"); 
        $this->objetoDato->desconectar();
		echo json_encode($respConsulta);
	}	
	
	public function AsociarCandadoARut($rutCiclista, $numCandado)
	{
		$this->objetoDato->conector();
        $consulta = "CALL SP_INS_CANDADO_RUT ('$rutCiclista', $numCandado)";
        $this->objetoDato->ejecutar($consulta);
		$this->objetoDato->desconectar();
		
		$return_arr = array();
		$return_arr[] = array("RESULTADO" => "OK");
		echo json_encode($return_arr);		
	}
	
	public function ConsultarVisitasPorRut($rut)
	{
		$this->objetoDato->conector();
		$respConsulta = $this->objetoDato->ejecutar("CALL SP_GET_VISITAS_POR_RUT ('$rut')"); 
        $this->objetoDato->desconectar();
		echo json_encode($respConsulta);
	}
	
	
	public function InsertarObservacionCiclista($rutCiclista, $tipoObs, $observacion)
	{
		$this->objetoDato->conector();
        $consulta = "CALL SP_INS_OBSERVACION_CICLISTA ('$rutCiclista', $tipoObs, '$observacion')";

        $this->objetoDato->ejecutar($consulta);
		$this->objetoDato->desconectar();
		
		$return_arr = array();
		$return_arr[] = array("RESULTADO" => "OK");
		echo json_encode($return_arr);		
	}
	
	public function ConsultarObservacionesPorRut($rut)
	{
		$this->objetoDato->conector();
		$respConsulta = $this->objetoDato->ejecutar("CALL SP_GET_OBSERVACION_POR_RUT ('$rut')"); 
        $this->objetoDato->desconectar();
		echo json_encode($respConsulta);
	}
	
	public function InsertarLibroNovedades($idOperador, $descripcion)
	{
		$this->objetoDato->conector();
        $consulta = "CALL SP_INS_LIBRO_NOVEDADES ($idOperador, '$descripcion')";
        $this->objetoDato->ejecutar($consulta);
		$this->objetoDato->desconectar();
		
		$return_arr = array();
		$return_arr[] = array("RESULTADO" => "OK");
		echo json_encode($return_arr);		
	}
	
	public function ConsultarLibro($fechaNovedades)
	{
		$this->objetoDato->conector();
		$respConsulta = $this->objetoDato->ejecutar("CALL SP_GET_NOVEDADES_POR_FECHA ('$fechaNovedades')"); 
        $this->objetoDato->desconectar();
		echo json_encode($respConsulta);
	}
	
	public function DesvincularCandado($idCandado, $rutCicCnd)
	{
		$this->objetoDato->conector();
        $consulta = "CALL SP_UPD_CANDADO ('$rutCicCnd', $idCandado, false)";
		$this->objetoDato->ejecutar($consulta);
		$this->objetoDato->desconectar();
		
		$return_arr = array();
		$return_arr[] = array("RESULTADO" => "OK");
		echo json_encode($return_arr);
	}
	
	
	
	
	/**************************************/
	
	
	function encryptIt( $q )
	{
		$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
		$qEncoded = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
		return( $qEncoded );

	}

 

	function decryptIt( $q ) 
	{
		$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
		$qDecoded = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
		return( $qDecoded );
	}
	
	function createExcel($filename, $arrydata) {
	$excelfile = "xlsfile://tmp/".$filename;  
	$fp = fopen($excelfile, "wb");  
	if (!is_resource($fp)) {  
		die("Error al crear $excelfile");  
	}  
	fwrite($fp, serialize($arrydata));  
	fclose($fp);
	header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");  
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
	header ("Cache-Control: no-cache, must-revalidate");  
	header ("Pragma: no-cache");  
	header ("Content-type: application/x-msexcel");  
	header ("Content-Disposition: attachment; filename=\"" . $filename . "\"" );
	readfile($excelfile);  
}
	

}
?>
 























