<?php 
    require_once 'adminService.php';
    require_once '../../Database/conect.php';
    require_once '../../layout/layout.php';
    require_once '../Empleador/empleadorService.php';

    include 'jobsCrud.php';

 
    $layout = new Layout(false);

    $conect = new Conect();
    $admin = new AdminService($conect->db);
    $category = new EmpleadorService($conect->db);


?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<center id="jobsPanel" style="display:none;">
    <div class="card-body">
        <button type="button" class="btn btn-danger float-end "onclick="BackCategoryJobs()">Volver</button>     
    </div>
    <h2>Vacantes de Trabajos</h2>
    <table class="table table-dark " id="jobsTable" style="display:none;">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Compañia</th>
            <th scope="col">Tipo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Posicion</th>
            <th scope="col">Creada</th>
            <th scope="col">Modificada</th>
            <th scope="col">Editar</th>
            <th scope="col">Borrar</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $data=$admin->ListJobs();

            if($data->num_rows>0):
                while($row = $data->fetch_assoc()) : ?>
                    <tr>
                    <th scope="row"><?= $row['id']?></th>
                    <td><?= $row['nombre'] ?></td>
                    <td><?= $row['compañia'] ?></td>
                    <td><?= $row['tipo'] ?></td>
                    <td><?= $row['categoria'] ?></td>
                    <td><?= $row['posicion'] ?></td>
                    <td><?= $row['creado'] ?></td>
                    <td><?= $row['modificado'] ?></td>
                    <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#release-job-modal" onclick='EditJob(<?=json_encode(array_values($row))?>)'><i class="fa fa-folder"></i></button></td>  
                    <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete-job-modal" onclick="DeleteJob(<?= $row['id'] ?>)"><i class="fa fa-trash"></i></button></td>  
                    </tr>

                <?php endwhile ?>
            <?php endif ?>
            
        </tbody>
    </table>
</center>
<div class="modal fade" id="release-job-modal" tabindex="-1" aria-labelledby="releaseJobModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="releaseJobModal">Actualizar Puesto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="menu.php" id="releaseJob" method="POST"  enctype="multipart/form-data">
                            <div class="mb-3" style="display:none;">
                                <label for="idRelease" class="form-label">Id:</label>
                                <input name="idRelease" type="text" class="form-control" id="idRelease">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nameRelease"name="name">
                            </div>
                            <div>
                            <div class="mb-3">
                                <label for="company" class="form-label">Compañia:</label>
                                <input type="text" class="form-control" id="company"name="company">
                            </div>
                            <div>
                                <label for="type" class="form-label">Tipo:</label>
                                <select class="form-select"  id="type" name="type">
                                    <option>Seleccione una opcion:</option>   
                                    <option>Tiempo Completo</option>                                        
                                    <option>Medio Tiempo</option>  
                                    <option>Free Lancer</option>                                                                                                                   
                                </select>
                            </div>
                            <div>
                                <label for="category" class="form-label">Categoria:</label>
                                <select class="form-select"  id="category" name="category">
                                        <option>Seleccione una opcion:</option>
                                    <?php 
                                        $data=$category->GetCategory();
                                        if($data->num_rows>0):
                                            while($row = $data->fetch_assoc()) : ?>
                                                <option><?=$row['nombre']?></option>
                                            <?php endwhile ?>
                                        <?php endif ?>                                     
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="position" class="form-label">Posicion:</label>
                                <input type="text" class="form-control" id="position"name="position">
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Ubicacion:</label>
                                <input type="text" class="form-control" id="location"name="location">
                            </div>
                            <div class="mb-3">
                                <label for="url" class="form-label">Url:</label>
                                <input type="text" class="form-control" id="url"name="url">
                            </div>
                            <div>
                                <label for="photo" class="form-label">Logo:</label>
                                <input type="file" class="form-control" name="photo" id="photo"size="30">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="text" class="form-control" id="email"name="email">
                            </div>

                            <div>
                                <label for="status" class="form-label">Estado:</label>
                                <select class="form-select"  id="status" name="status">
                                        <option>Activo</option>
                                        <option>Inactivo</option>
                                </select>
                            </div>
                            <br>
                            <div>
                                <textarea rows="5" cols="81" style="max-width: 100%;" id="description" placeholder="Descripcion:" name="description"></textarea>
                            </div>
                            <div class="mb-3">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" onclick="ReleaseJob()">Actualizar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
</div>
<?php echo $layout->printModalsJobs();?>

