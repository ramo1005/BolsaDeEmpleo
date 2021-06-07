<?php 
    require_once 'Empleos/empleoService.php';
    require_once 'Database/conect.php';
    require_once 'layout/layout.php';
    require_once 'layout/menu.php';

    $layout = new Layout(true);
    $menu = new Menu();



    $conect = new Conect();
    $empleos = new EmpleoService($conect->db);
?>
<?php echo $layout->printHeader();?>
<?php echo $menu->backButton();?>


<?php $data=$empleos->GetEmpleoSearch($_GET['search']);
    if($data->num_rows>0 && !empty($_GET['search'])):?>
       <h1>Resultados:</h1>
        <table class="table table-dark " id="tableEmpleos"  >
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
                                    <td><a href="Empleos/Empleador/infoEmpleo.php?jobId=<?= $row['id']?>" target="_blank">Click</a></td>

                                    </tr>

                                <?php endwhile ?>


                        </tbody>
        </table>
    <?php else:?> <h1>Busqueda No Encontrada</h1>

    <?php endif ?>

<?php echo $layout->printFooter(); ?>
