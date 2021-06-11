<?php 
    require_once 'adminService.php';
    require_once '../../Database/conect.php';
    require_once '../../layout/layout.php';
    include 'categoryCrud.php';

 
    $layout = new Layout(false);

    $conect = new Conect();
    $admin = new AdminService($conect->db);

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<center id="categoryPanel" style="display:none;">
        <div class="card-body">
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#add-category-modal">Agregar Categorias </button>             
            <button type="button" class="btn btn-danger float-end"onclick="BackCategory()">Volver</button>     
        </div>
    <table class="table table-dark " id="categoryTable" style="display:none;width: 60%;">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Creada</th>
            <th scope="col">Editar</th>
            <th scope="col">Borrar</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $data=$admin->ListCategory();

            if($data->num_rows>0):
                while($row = $data->fetch_assoc()) : ?>
                    <tr>
                    <th scope="row"><?= $row['id']?></th>
                    <td><?= $row['nombre'] ?></td>
                    <td><?= $row['created'] ?></td>
                    <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#release-category-modal" onclick="EditCategory('<?= $row['nombre']?>',<?= $row['id'] ?>)"><i class="fa fa-folder"></i></button></td>  
                    <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete-category-modal" onclick="DeleteCategory(<?= $row['id'] ?>)"><i class="fa fa-trash"></i></button></td>  
                    </tr>

                <?php endwhile ?>
            <?php endif ?>
            
        </tbody>
    </table>
</center>
<?php echo $layout->printCategoryModals();?>

