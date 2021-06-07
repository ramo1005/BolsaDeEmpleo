<?php 
    require_once 'empleadorService.php';
    require_once '../../Database/conect.php';

    $conect = new Conect();
    $category = new EmpleadorService($conect->db);
?>

<div class="row">
    <div class="row" id="addJob"style="display:none;" >
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-white bg-dark"><h3 class="text-center"> Datos del Trabajo</h3></div>
                    <div class="card-body">
                        <div class="card-title"> <h3 class="text-center">Complete toda la informacion</h3></div>
                            <form id="formEmpleo" method="post" onsubmit="return false" enctype="multipart/form-data">
                                <div class="margen-top-2">
                                    <label for="name" class="form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="name"name="name">
                                </div>
                                <div>
                                <div class="margen-top-2">
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
                                <div class="margen-top-2">
                                    <label for="position" class="form-label">Posicion:</label>
                                    <input type="text" class="form-control" id="position"name="position">
                                </div>
                                <div class="margen-top-2">
                                    <label for="location" class="form-label">Ubicacion:</label>
                                    <input type="text" class="form-control" id="location"name="location">
                                </div>
                                <div class="margen-top-2">
                                    <label for="url" class="form-label">Url:</label>
                                    <input type="text" class="form-control" id="url"name="url">
                                </div>
                                <div>
                                        <label for="photo" class="form-label">Logo:</label>
                                        <input type="file" class="form-control" name="photo" id="photo"size="30">
                                </div>
                                <div class="margen-top-2">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="text" class="form-control" id="email"name="email">
                                </div>
                                <div class="margen-top-2" style="display:none;">
                                    <label for="idEmpleador" class="form-label">idEmpleador:</label>
                                    <input type="text" class="form-control" id="idEmpleador"name="idEmpleador" value="<?=$_SESSION['empleadorLogin'];?>">
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
                                <br>
                            </form>
                        <div class="col-md-12 text-center">
                            <button type="buttom" class="btn btn-dark btn-lg" onclick="BackAddJobEmpleador()">Volver</button>
                            <button type="submit" class="btn btn-success btn-lg" onclick="CheckAddJobEmpleador()">Agregar</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
</div>
