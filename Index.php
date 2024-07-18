<?php require_once "vistas/parte_arriba.php"?>

<!-----INICIO DEL CONTENIDO-->
<div class="container">
    <h1>INICO DE CODE</h1>

</div>

<htm>
    <head>
        <!-- CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        <script src="https://code.jquery.com/jquery-3.0.0.js"crossorigin="anonymous"></script>
        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
	</head>
    <body>
        <div class="container">
            <div class="row mb-3 mt-3">
                <div class="col-4">
                    <button type="button" class="btn btn-primary" onclick="IrFormularioCrear()">Crear Nuevo</button>
                </div>
            </div>

            <div class="row">
              <div class="col-12">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">nombre</th>
                        <th scope="col">apellido</th>
                        <th scope="col">dni</th>
                        <th scope="col">email</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
    </body>
    <script>
        window.onload = function() {
            Obtener();
        };

        function IrFormularioCrear(){
            window.location = "Contenido.php";
        }

        function Obtener(){

            $(".table tbody").html("");

            $.get("http://clientereserva.somee.com/api/ClientsControl")
            .done(function( response ) {
                console.log(response);
                $.each( response, function( id, fila ) {
                    $("<tr>").append(
                        $("<td>").text(fila.id),
                        $("<td>").text(fila.nombre),
                        $("<td>").text(fila.apellido),
                        $("<td>").text(fila.dni),
                        $("<td>").text(fila.email),
                        $("<td>").append(
                            $("<button>").data("id",fila.id).addClass("btn btn-success btn-sm mr-1 editar").text("Editar").attr({"type":"button"}),
                            $("<button>").data("id",fila.id).addClass("btn btn-danger btn-sm eliminar").text("Eliminar").attr({"type":"button"})
                        )
                    ).appendTo(".table");
                });
            });
        }

        $(document).on('click', '.editar', function () {
            console.log($(this).data("id"));
            window.location = "Contenido.php?id=" + $(this).data("id");
            
        });


        $(document).on('click', '.eliminar', function () {
            console.log($(this).data("id"));

            $.ajax({
            method: "DELETE",
            url: "http://localhost:58683/api/Usuario/" + $(this).data("id")
            })
            .done(function( response ) {
                console.log(response);
                if(response){
                    Obtener();
                }else{
                    alert("Error al eliminar")
                }
            });
            
        });


    </script>
</htm>




<?php require_once "vistas/parte_abajo.php"?>