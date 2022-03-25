<?php

// clase configuración de la BD
Class Configuracion
{
	// variables de la configuración
	private $_serverName;
	private $_dataBase;
	private $_UID;
	private $_PWD;
	private $_CharacterSet;
	private $_dbType;

	// Constructor de la clase
	public function __construct()
	{
		require 'config.php'; // se obtienen los valores del archivo config.php
		// Se inicializan las varbales de la configuracion
		$this->_serverName = $serverName;
		$this->_dataBase = $dataBase;
		$this->_UID = $UID;
		$this->_PWD = $PWD;
		$this->_CharacterSet = $CharacterSet;
		$this->_dbType = $dbType;
	}

	// Metodos para obtener cada valor con la clase
	public function getServerName()
	{
		return $this->_serverName;
	}

	public function getDataBase()
	{
		return $this->_dataBase;
	}

	public function getUID()
	{
		return $this->_UID;
	}

	public function getPWD()
	{
		return $this->_PWD;
	}

	public function getCharacterSet()
	{
		return $this->_CharacterSet;
	}

	public function getDbType()
	{
		return $this->_dbType;
	}


}
?>