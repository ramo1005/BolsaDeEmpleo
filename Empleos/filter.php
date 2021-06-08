<?php 
    require_once 'Empleador/empleadorService.php';
    require_once 'Database/conect.php';

    $conect = new Conect();
    $empleos = new EmpleadorService($conect->db);
?>
<div id="allJobs">
<?php 
    $check=$empleos->CountEmpleos();

    if ($check->num_rows>0):
        $data=$empleos->GetCategory();
        if($data->num_rows>0):
            
            while($row = $data->fetch_assoc()):
                $count=$empleos->CountEmpleosCategory($row['nombre']);
                if($count>0): ?>
                    <!--add category to filter-->
                    <script type="text/javascript">
                        var x = document.getElementById("filter");
                        var option = document.createElement("option");
                        option.text = "<?=$row['nombre']?>";
                        x.add(option);
                        window.history.pushState(null, '', window.location.href.replace(window.location.search, ""))

                    </script>
                    <!---->

                   
                <?php endif ?>
            <?php endwhile ?>
        <?php endif ?>      
    <?php endif ?>   
    <h2><?=$_GET['filter']?></h2>
                    <table class="table table-dark " >
                            <thead>
                                <tr>
                                <th scope="col">Ubicacion</th>
                                <th scope="col">Posicion</th>
                                <th scope="col">Compañia</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">More...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $data2=$empleos->ListAllEmpleosMore($_GET['filter']);
                                if($data2->num_rows>0):
                                    while($row2 = $data2->fetch_assoc()) : ?>
                                        <tr>
                                        <td><?= $row2['ubicacion'] ?></td>
                                        <td><?= $row2['posicion'] ?></td>
                                        <td><?= $row2['compañia'] ?></td>
                                        <td><?= $row2['creado'] ?></td>
                                        <td><a href="Empleos/Empleador/infoEmpleo.php?jobId=<?= $row2['id']?>" target="_blank">Click</a></td>
                                        </tr>

                                    <?php endwhile ?>
                                <?php endif ?>


                            </tbody>
                    </table>

</div>
