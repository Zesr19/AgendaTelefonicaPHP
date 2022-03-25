<?php
// Aquí es donde se recibirán las peticiones del cliente
// La ruta sería localhost:8080/api/contactos.php

require '../clases/conexion-class.php';
require '../clases/contactos-class.php';

$pdo = new Conexion();

switch ($_SERVER['REQUEST_METHOD']) {
	case 'POST':
		if (isset($_POST['name']) && isset($_POST['telefono']) && isset($_POST['correo']))
		{
			//$contacto = new Contactos();
			$contacto = new Contactos($_POST['name'], $_POST['telefono'], $_POST['correo']);

			$sql = "INSERT INTO contactos (nombre, telefono, email) VALUES (:nombre, :telefono, :email)";
			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(':nombre', $contacto->getNombre());
			$stmt->bindValue(':telefono', $contacto->getTelefono());
			$stmt->bindValue(':email', $contacto->getCorreo());
			$stmt->execute();

			$idPost = $pdo->lastInsertId();
			if ($idPost) {
				echo "El contacto ha sido registrado.";
			} else {
				echo "Hubo un error en el registro";
			}

			//$mensaje = $contacto->registrarContacto();
			//echo $mensaje;
			/*
			// Query para insertar un registro
			$sql = "INSERT INTO contactos (nombre, telefono, email) VALUES (?, ?, ?)";
			$params = array($contacto->getNombre(), $contacto->getTelefono(), $contacto->getCorreo());

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
			/* Get the product picture for a given product ID. 
			try  
			{  
				$tsql = "INSERT INTO contactos (nombre, telefono, email) VALUES (?, ?, ?)";
				$params = array($contacto->getNombre(), $contacto->getTelefono(), $contacto->getCorreo());
				$insertReview = $conn->prepare($tsql);
				$insertReview->execute($params);
			}  
			catch(Exception $e)  
			{   
				die( print_r( $e->getMessage() ) );   
			}  */
		}
		break;
	case 'GET':
		if(isset($_GET['Id']))
		{
			$sql = $pdo->prepare("SELECT * FROM contactos WHERE  id_contacto=:id;");
			$sql->bindValue(':id', $_GET['Id']);
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			echo json_encode($sql->fetchAll());
		}
		else
		{
			$sql = $pdo->prepare("SELECT * FROM contactos;");
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			echo json_encode($sql->fetchAll());
		}
		break;
	case 'PUT':
		echo "Actualizar usuario";
		break;
	case 'DELETE':
		echo "Eliminar un usuario";
		break;
	//default:
		# code...
		//break;
}

?>