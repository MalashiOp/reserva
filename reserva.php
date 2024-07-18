

<?php require_once "vistas/parte_arriba.php"?>

<?php

include("db.php");


$stm=$conexion->prepare("SELECT * FROM reserva");
$stm->execute();




?>

<div
    class="table-responsive"
>
    <table class="table">
        <thead class="table table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Evento</th>
                <th scope="col">Fecha_Reserva</th>
                <th scope="col">Precio</th>
                <th scope="col">DNI</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($contactos as $contacto){?>
            <tr class="">
                <td scope="row"><?php echo $contacto['id'];?></td>
                <td><?php echo $contacto['servicio'];?></td>
                <td><?php echo $contacto['fecha_re'];?></td>
                <td><?php echo $contacto['precio'];?></td>
                <td><?php echo $contacto['DNI'];?></td>
                <td>editar/eliminar </td>


            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


