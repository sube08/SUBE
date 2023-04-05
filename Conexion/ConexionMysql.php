<?php

require_once('../../config.php');

class conexion
{
    private $cadenaConexion;
    private $objetoConexion;
    private $user;
    private $password;

    public function __construct()
    {

	$this->cadenaConexion= 'mysql:host='. DB_HOST .';dbname=' . DB_NAME;
        $this->user= DB_USER;
        $this->password= DB_PASSWORD;  

 }

    public function conector()
    {
        try
        {
            $this->objetoConexion = new PDO($this->cadenaConexion, $this->user, $this->password);
        }
        catch(PDOException $ex)
        {
            echo "problema al conectar con la BD";
        }
    }

    public function desconectar()
    {
        $this->objetoBaseDatos = null;
    }

    public function ejecutar($comando)
    {
        try
        {
			$textoConsulta = str_replace("'", " ", $comando);
			$textoConsulta = substr($comando, 0, 50);
			$ejecutar = $this->objetoConexion->prepare("INSERT INTO LOG_CONSULTAS(STRING_CONSULTA, FECHA_HORA) VALUES('$textoConsulta', now())");
            $ejecutar->execute();
			
            $ejecutar = $this->objetoConexion->prepare($comando);
            $ejecutar->execute();
            $rows = $ejecutar->fetchAll();
            return $rows;
        }
        catch(PDOException $ex)
        {
			echo '$ex';
            throw $ex;
        }
    }
	
	
	public function ejecutarSP($comando)
    {
        try
        {
			
			$q = $this->objetoConexion->query($comando);
            $q->setFetchMode(PDO::FETCH_ASSOC);
			$resp = "";
			
		do {
    if ($resultado = $this->objetoConexion->store_result()) {
        printf("---\n");
        var_dump($resultado->fetch_all());
        $resultado->free();
    } else {
        if ($mysqli->errno) {
            echo "Store failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
    }
} while ($mysqli->more_results() && $mysqli->next_result());
			
            return $resp;
        }
        catch(PDOException $ex)
        {
			echo '$ex';
            throw $ex;
        }
    }

}


/*

        $mysqli = new mysqli("localhost", "root","","BD_EVALUADOR");
        if($mysqli->connect_errno)
        {
            echo "Falló la conexion a Mysql: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        $this->$objetoConexion = $mysqli;
    }

    public function EjecutarSP($procedure)
    {
        if(!($resultado = $mysqli->query("call LOGIN_USUARIO ('fjmoragase@gmail.com', '12345678')")))
        {
            echo "Falló ejecución al SP: " . $mysqli->errno . ") " . $mysqli->error;
        }
        else
        {
            
            //while ($fila = mysql_fetch_assoc($resultado)) 
            //{
            //    $cantidad = $fila[0];
            //    echo 'Hemos encontrado' . $cantidad . "resultados con esos datos."
            //}
        }
    }

    */


//var_dump($resultado->fetch_assoc());
?>
