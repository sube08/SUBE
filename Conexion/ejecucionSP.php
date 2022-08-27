<?php 
header('Content-Type: application/json');

class conexionSP
{
	private $cadenaConexion;
    private $mysqli;
    private $user;
    private $password;
	
	public function __construct()
    {
        $this->cadenaConexion = 'mysql:host=localhost;dbname=bd_sb_sube';
        $this->user = 'root';
        $this->password = 'Fr4nc1sc0*1+Ñw';
    }

    public function conector()
    {
        try
        {
            $this->mysqli = new mysqli("localhost", "root","Fr4nc1sc0*1+Ñw", "bd_sb_sube");
        }
        catch(PDOException $ex)
        {
            echo "problema al conectar con la BD";
        }
    }

    public function desconectar()
    {
        $this->mysqli = null;
    }
	
	
	public function Ejecutar($consulta)
	{
		if ($this->mysqli->connect_errno) {
			echo "Falló la conexión a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
		}
		$return_arr = array();
		$resultado = $this->mysqli->query($consulta);
		
		if ($resultado->num_rows > 0) {
			// output data of each row
			while($row = $resultado->fetch_assoc()) 
			{
				/*
				$return_arr[] = array(
				"CIC_RUT" => $row[0],
				"CIC_NOMBRE" => $row[1],
				"HORA_ENTRADA" => $row[2],
				"HORA_SALIDA" => $row[3]
				);*/
				
				echo json_encode($row);
			}	
		//	echo json_encode($row) ;		
		}
	/*	
		echo "\n1.-" . json_encode($resultado);
		echo "\n2.-" . json_encode(mysqli_num_rows($resultado));
		echo "\n3.-" . json_encode(mysqli_free_result($resultado));	
		*/
	}
		
	
	public function EjecutarSP($sp)
	{
	
		if ($this->mysqli->connect_errno) {
			echo "Falló la conexión a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
		}
	
	
		if (!$this->mysqli->query($sp)) {
			echo "Falló CALL: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
		}
		

		do {
			if ($resultado = $this->mysqli->store_result()) {

				while($roww = var_dump($resultado->fetch_assoc()))
				{
				  $result_array[] = $roww;
				}
				$resultado->free();
			} else {
				if ($this->mysqli->errno) {
					echo "Store failed: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
				}
			}
		} while ($this->mysqli->more_results() && $this->mysqli->next_result());
	}
}
?>
