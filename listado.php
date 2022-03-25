<br><div class="row">
    <h2 class="col-sm-10">Listado de contactos</h2>
    <a href="registrar.php" class="btn btn-primary col-sm-2">Registrar Contacto</a>
</div>


<script type="text/javascript">
    $( document ).ready(function() {
        $.ajax({
            url: 'http://localhost:8080/api/contactos.php',
            type: 'GET',
            dataType: 'json',
            success: function(respuesta) {
                respuesta.forEach(element => {
                    $('#tablaProspectos').append('<tr>' + 
                        '<td>' + element.nombre + '</td>' +
                        '<td>' + element.telefono + '</td>' +
                        '<td>' + element.email + '</td>' +
                        '<td><button onclick="editarContacto('+ element.id_contacto + ')" class="btn btn-info">Editar</button></td>' +
                        '<td><button onclick="eliminarContacto('+ element.id_contacto + ')" class="btn btn-secondary">Eliminar</button></td>' + 
                        '</tr>');
                });
            },
            error: function() {
                console.error("No es posible completar la operación");
            }
        });
    });
</script>

<table class="table" id="tablaProspectos">
    <thead class="thead-dark">
        <tr>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Correo</th>
        <th></th>
        <th></th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>