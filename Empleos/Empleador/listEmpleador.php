<?php 
    require_once 'empleadorService.php';
    require_once '../../Database/conect.php';

    $conect = new Conect();
    $empleos = new EmpleadorService($conect->db);
?>

<table class="table table-dark " id="tableEmpleos" style="display:none;" >
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Compañia</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">More...</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $data=$empleos->ToListEmpleos($_SESSION['empleadorLogin']);
                    if($data->num_rows>0):
                        while($row = $data->fetch_assoc()) : ?>
                            <tr>
                            <th scope="row"><?= $row['id']?></th>
                            <td><?= $row['nombre'] ?></td>
                            <td><?= $row['compañia'] ?></td>
                            <td><?= $row['tipo'] ?></td>
                            <td><?= $row['categoria'] ?></td>
                            <td><?= $row['creado'] ?></td>
                            </tr>

                        <?php endwhile ?>
                    <?php endif ?>


                </tbody>
</table>