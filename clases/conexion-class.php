<?php 
// Se incluye el archivo de la clase config 
require 'config-class.php';
/**
 * Conexión a la Base de Datos
 */

Class Conexion extends PDO
{
    // variables de la configuración
    private $serverName;
    private $dataBase;
    private $UID;
    private $PWD;
    private $CharacterSet;
    private $dbType;
    private $connectionInfo;

    function __construct()
    {
        $this->setConexion();
        $this->conectar();
    }

    // metodo para configurar los parametros de la conexión
    private function setConexion()
    {
        $conf = new Configuracion();
        $this->serverName = $conf->getServerName();
        $this->dataBase = $conf->getDataBase();
        $this->UID = $conf->getUID();
        $this->PWD = $conf->getPWD();
        $this->CharacterSet = $conf->getCharacterSet();
        $this->dbType = $conf->getDbType();
    }

    private function conectar()
    {
        if($this->dbType == "sqlsrv")
        {
            if (!isset($this->UID) && !isset($this->PWD))
            {
                // Se crea el string con la información de la conexión, autenticación de Windows
                $connectionInfo = array( "Database"=>$this->dataBase);
            }
            else
            {
                // se crea el string con información de la conexión incluyendo el user y password
                $connectionInfo = array("UID" => $this->UID, "PWD" => $this->PWD, "Database" => $this->dataBase);
            }
            
            // Como es una conexión SQL Server, usamos el comando sqlsrv_connect para establecer la conexión
            return sqlsrv_connect( $this->serverName, $connectionInfo);
        }
        else if($this->dbType == "mysql")
        {
            try {
                parent::__construct('mysql:host='.$this->serverName.';dbname='.$this->dataBase.';', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                
            } catch (PDOException $e) {
                echo "Error: ".$e->getMessage();
                exit;
            }
        }
    }
}

?>