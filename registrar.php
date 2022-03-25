<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Contacto</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <br>
        <div class="row">
            <h2 class="col-sm-11">Registrar contacto</h2>
            <button type="submit" class="btn btn-danger col-sm-1" id="salirForm">Salir</button>
        </div>
        <br>
        <form method="POST" enctype="multipart/form-data" id="formContacto">
            <div class="row g-3">
                <div class="col-sm">
                    <input type="text" class="form-control" id="formName" name="name" placeholder="Nombre(s) *" maxlength="50" required>
                </div>
            </div>
            <br>
            <div class="row g-3">
                <div class="col">
                    <!-- pattern="[0-9]{10}" -->
                    <input type="tel" class="form-control" id="formTelefono" name="telefono" aria-describedby="telefonoHelp" placeholder="Ingresa tu numero de telefono *"  minlength="10" maxlength="10" pattern = "[0-9]{10}"  required>
                    <small id="telefonoHelp" class="form-text text-muted">El n&uacute;mero deber&aacute; ser a 10 digitos</small>
                </div>
            </div>
            <br>
            <div class="row g-3">
                <div class="col">
                    <input type="email" class="form-control" id="formCorreo" name="correo" aria-describedby="correoHelp" placeholder="Ingresa tu Correo electr&oacute;nico *" required>
                </div>
            </div>
            <br>
            <p>Los campos con * son requeridos</p>
            <button type="submit" class="btn btn-primary" id="enviar">Registrar</button>
            <span id = "status"></span>
        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){

            // funcion para alertar de que saldrá del formulario
            $(document).on('click', '#salirForm', function(){
                alert('Si sales del registro perderás todos los datos capturados!');
                window.location = "http://localhost/sitioweb-concredito/";
            });
            
            // Este es para enviar el formulario al servidor mediante ajax
            $("#formContacto").on("submit", function(e){
                e.preventDefault()
                var formData = new FormData(document.getElementById("formContacto"))
                //console.log(formData);

                /*var jsonData = {};
                formData.forEach((value, key) => jsonData[key] = value);
                */
                $.ajax({
                    url: "http://localhost:8080/api/contactos.php",
                    type: "POST",
                    //dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                })
                    .done(function(res){
                        alert(res);
                        window.location = "http://localhost:8080";
                    })
                    .fail(function(res){
                        alert(res);
                        //$("#status").html("Respuesta FAIL: " + res);
                        window.location = "http://localhost:8080/registrar.php";
                    })
                    
            });
            
        });
    </script>
</body>
</html> 