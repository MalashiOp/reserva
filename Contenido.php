<?php require_once "vistas/parte_arriba.php"?>
<html>
    <head>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <script src="https://code.jquery.com/jquery-3.0.0.js"crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">

            <div class="row mt-3">
              <div class="col-12">
                <form>
                    <input type="hidden" id="txtid"/>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nombre</label>
                      <input type="text" class="form-control" id="txtnombres" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Apellidos</label>
                        <input type="text" class="form-control" id="txtapellidos" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">dni</label>
                        <input type="text" class="form-control" id="txtdni" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo</label>
                        <input type="text" class="form-control" id="txtcorreo" placeholder="">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="GuardarCliente()">Guardar</button>
                    <button type="button" class="btn btn-warning" onclick="IrFormularioInicio()">Volver</button>
                  </form>
              </div>
            </div>
          </div>
    </body>
    <script>

        function IrFormularioInicio()
        {
            window.location = "index.php";
        }

        function MostrarCliente(idcliente){

            $.get("http://clientereserva.somee.com/api/ClientsControl" + idcliente)
            .done(function( response ) {
                console.log(response);
                $("#txtnombres").val(response.DocumentoIdentidad),
                $("#txtapellidos").val(response.Nombres),
                $("#txtdni").val(response.Telefono),
                $("#txtcorreo").val(response.Correo)
            });
        }


        function GuardarCliente(){
            if(editar)
            {               
                var data = {
                    id : $("#txtid").val(),
                    nombre : $("#txtnombres").val(),
                    apellido : $("#txtnombres").val(),
                    dni : $("#txttelefono").val(),
                    correo : $("#txtcorreo").val(),
                }

                $.ajax({
                method: "PUT",
                url: "http://clientereserva.somee.com/api/ClientsControl/",
                contentType: 'application/json',
                data: JSON.stringify(data), // access in body
                })
                .done(function( response ) {
                    console.log(response);
                    if(response){
                        alert("Se guardaron los cambios");
                        window.location = "Index.html";
                    }else{
                        alert("Error al Modificar")
                    }
                });

            }
            else{

                var data = {
                    nombre : $("#txtdocumento").val(),
                    apellido : $("#txtnombres").val(),
                    dni : $("#txttelefono").val(),
                    correo : $("#txtcorreo").val(),
                }

                $.post("http://clientereserva.somee.com/api/ClientsControl/5", data)
                .done(function(response) {
                    console.log(response);
                    if(response){
                        alert("Usuario Creado");
                        window.location = "Index.php";
                    }else{
                        alert("Error al crear");
                    }
                });
            }

        }
        var editar = false;
                window.onload = function() {
                var id = $.urlParam('id');
                console.log(id);
                if(id != null){
                    editar = true;
                    $("#txtid").val(id);
                    MostrarUsuario(id);
                }
                };


        $.urlParam = function(name)
        {
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            if (results==null) {
            return null;
            }
            return decodeURI(results[1]) || 0;
        }

    </script>
</html>

