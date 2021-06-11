<?php 
    require_once 'empleadorService.php';
    require_once '../../Database/conect.php';

    $conect = new Conect();
    $empleos = new EmpleadorService($conect->db);

    $data=$empleos->ToListEmpleos($_SESSION['empleadorLogin']);

?>
<?php 
if($data->num_rows>0):?>
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
                            while($row = $data->fetch_assoc()) : ?>
                                <tr>
                                <th scope="row"><?= $row['id']?></th>
                                <td><?= $row['nombre'] ?></td>
                                <td><?= $row['compañia'] ?></td>
                                <td><?= $row['tipo'] ?></td>
                                <td><?= $row['categoria'] ?></td>
                                <td><?= $row['creado'] ?></td>
                                <td><a href="infoEmpleo.php?jobId=<?= $row['id']?>" target="_blank">Click</a></td>

                                </tr>

                            <?php endwhile ?>
                    </tbody>
    </table>
<?php else:?><h1 >No hay Puestos Agregados</h1>

<?php endif ?>   
