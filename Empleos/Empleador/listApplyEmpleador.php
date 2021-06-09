<?php 
    require_once 'empleadorService.php';
    require_once '../../Database/conect.php';

    $conect = new Conect();
    $empleos = new EmpleadorService($conect->db);
    
?>
<div id="allApplyEmpleador" style="display:none;">
<?php 
    $check=$empleos->CountEmpleosEmpleador($_SESSION['empleadorLogin']);

    if ($check->num_rows>0):
        $data=$empleos->GetJobsEmpleador($_SESSION['empleadorLogin']);
        if($data->num_rows>0):
            while($row = $data->fetch_assoc()):
                $count=$empleos->ListAllApplyEmpleador($_SESSION['empleadorLogin'],$row['id']);
                if($count->num_rows>0):?>   
                    <h2><?=$row['nombre']?> <?=$row['compañia']?> <?=$row['creado']?></h2>
                    <table class="table table-dark " >
                            <thead>
                                <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Genero</th>
                                <th scope="col">Ubicacion</th>
                                <th scope="col">url</th>
                                <th scope="col">email</th>
                                <th scope="col">Curriculum</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $data2=$empleos->ListAllApplyEmpleador($_SESSION['empleadorLogin'],$row['id']);
                                if($data2->num_rows>0):
                                    while($row2 = $data2->fetch_assoc()) : ?>
                                        <tr>
                                        <td><?= $row2['nombre'] ?></td>
                                        <td><?= $row2['apellido'] ?></td>
                                        <td><?= $row2['genero'] ?></td>
                                        <td><?= $row2['ubicacion'] ?></td>
                                        <td><?= $row2['url'] ?></td>
                                        <td><?= $row2['email'] ?></td>

                                        <td><a href="files/curriculum/<?= str_replace(array('C:\\xampp\\htdocs\\BolsaDeEmpleos\\Empleos\\Empleador\\files\\curriculum\\','#'),array('','%23'), $row2['curriculum']) ?>" download="Curriculum Vitae <?= $row2['nombre'] ?>">Download</a></td>
                                        </tr>

                                    <?php endwhile ?>
                                <?php endif ?>
                            </tbody>
                            
                    </table>

                <?php endif ?>
            <?php endwhile ?>
        <?php endif ?>
    <?php else:?> <h1>No hay postulaciones Disponibles</h1>

    <?php endif ?>   

</div>
