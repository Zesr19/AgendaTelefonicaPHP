<?php

Class Contactos
{
	private $_nombre;
	private $_telefono;
	private $_correo;

	public function __construct($nombre, $telefono, $correo)
	{
		$this->_nombre = $nombre;
		$this->_telefono = $telefono;
		$this->_correo = $correo;
	}

	public function getNombre()	{
		return $this->_nombre;
	}

	public function setNombre($nombre) {
		$this->_nombre = $nombre;
		return $this;
	}

	public function getTelefono() {
		return $this->_telefono;
	}

	public function setTelefono($telefono) {
		$this->_telefono = $telefono;
		return $this;
	}

	public function getCorreo() {
		return $this->_correo;
	}

	public function setCorreo($correo) {
		$this->_correo = $correo;
		return $this;
	}


	// CRUD

	public function registrarContacto()
	{
		// Aquí va para registrar contactos
		// Query para insertar un registro
		/*
		$conn = new Conexion();
		$sql = "INSERT INTO contactos (nombre, telefono, email) VALUES (?, ?, ?)";
		$params = array($this->_nombre, $this->_telefono, $this->_correo);

		// Prepare and execute the query.   
		$stmt = sqlsrv_query($conn, $sql, $params);  
		if ($stmt) {  
		    echo "Row successfully inserted.\n";  
		} else {  
		    echo "Row insertion failed.\n";  
		    die(print_r(sqlsrv_errors(), true));  
		}  
		  
		// Free statement and connection resources.
		sqlsrv_free_stmt($stmt);  
		sqlsrv_close($conn);
		*/
	}

	public function editarContacto()
	{
		// Aquí va para editar contactos
	}

	public function consultarContacto()
	{
		// Aquí va para consultar contactos
	}

	public function eliminarContacto()
	{
		// Aquí va para eliminar contactos
	}
}
?>