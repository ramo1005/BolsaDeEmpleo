
<?php
require_once '../../Database/conect.php';

require_once '../../layout/layout.php';
require_once '../../layout/menu.php';
require_once 'empleadorService.php';
include 'createEmpleo.php';

$conect = new Conect();
$item = new EmpleadorService($conect->db);

$layout = new Layout(false);
$menu = new Menu();

session_start();

if(isset($_GET['jobId'])){

    $data =$item->GetSpecificEmpleo($_GET['jobId']);
    if($data->num_rows>0){
        while($row = $data->fetch_assoc()){

            #clar the path from database
            $_SESSION['empleo']['photo']=str_replace('\\','/',$row['logo']);
            $_SESSION['empleo']['photo']=str_replace('C:/xampp/htdocs/','http://10.0.0.16/',$_SESSION['empleo']['photo']);
            $_SESSION['empleo']['photo']=str_replace('#','%23',$_SESSION['empleo']['photo']);


            $_SESSION['empleo']['name']=$row['nombre'];
            $_SESSION['empleo']['company']=$row['compañia'];
            $_SESSION['empleo']['type']=$row['tipo'];
            $_SESSION['empleo']['category']=$row['categoria'];
            $_SESSION['empleo']['position']=$row['posicion'];
            $_SESSION['empleo']['url']=$row['url'];
            $_SESSION['empleo']['location']=$row['ubicacion'];
            $_SESSION['empleo']['status']=$row['estado'];
            $_SESSION['empleo']['email']=$row['email'];
            $_SESSION['empleo']['description']=$row['descripcion'];

        }


    }

}


?>
<?php echo $layout->printHeader();?>
<?php echo $menu->applyButton();?>
<br>



<div class="row">
        <div class="row" id="infoEmpleo" >
            <center>
                <div class="col-md-6"></div>
                <div class="col-md-6">

                <div class="card" >
                    <div class="card-header text-white bg-dark"><h3 class="text-center"> Datos del Empleo</h3></div>
                    <div class="card-body">
                    <div class="card-title"> <h3 class="text-center" >Logo:</h3></div>
                            <img class="card-img-top"src="<?=$_SESSION['empleo']['photo']?>"alt="Card image cap"style="height: 350px;width: 60%;">
                            
                            <div class="margen-top-2" >
                                <label for="name" class="form-label"><b>Nombre:</b></label>
                                <input type="text" class="form-control"  value="<?=$_SESSION['empleo']['name']?>" readonly="readonly">
                            </div>

                            <div class="margen-top-2">
                                <label for="company" class="form-label"><b>Compañia:</b></label>
                                <input type="text" class="form-control"  value="<?=$_SESSION['empleo']['company']?>" readonly="readonly">
                            </div>
                            <div class="margen-top-2">
                                <label for="type" class="form-label"><b>Horario de Trabajo:</b></label>
                                <input type="text" class="form-control"  value="<?=$_SESSION['empleo']['type']?>" readonly="readonly">
                            </div>
                            <div>
                                <label for="category" class="form-label"><b>Categoria:</b></label>
                                <input type="text" class="form-control"  value="<?=$_SESSION['empleo']['category']?>" readonly="readonly">

                            </div>
                            <div>
                                <label for="position" class="form-label"><b>Posicion:</b></label>
                                <input type="text" class="form-control"  value="<?=$_SESSION['empleo']['position']?>" readonly="readonly">

                            </div>
                            <div>
                                <label for="url" class="form-label"><b>Url:</b></label>
                                <input type="text" class="form-control"  value="<?=$_SESSION['empleo']['url']?>" readonly="readonly">

                            </div>
                            <div>
                                <label for="location" class="form-label"><b>Ubicacion:</b></label>
                                <input type="text" class="form-control"  value="<?=$_SESSION['empleo']['location']?>" readonly="readonly">

                            </div>                        <div>
                                <label for="status" class="form-label"><b>Estado de la vacante:</b></label>
                                <input type="text" class="form-control"  value="<?=$_SESSION['empleo']['status']?>" readonly="readonly">

                            </div>                        <div>
                                <label for="email" class="form-label"><b>Email:</b></label>
                                <input type="text" class="form-control" value="<?=$_SESSION['empleo']['email']?>" readonly="readonly">

                            </div>

                            <div>
                                <label for="description" class="form-label"><b>Descripcion:</b></label>
                                <textarea rows="5" cols="81" style="max-width: 100%;"    name="description" placeholder="<?=$_SESSION['empleo']['description']?>" readonly="readonly"></textarea>

                            </div>
                            <br>
                            <div class="col-md-12 text-center">
                                    <button type="buttom" class="btn btn-dark btn-lg" onclick="CloseInfoEmpleo()">Volver</button>
                    
                            </div>
                    </div>
                
                </div>
                </div>
            </center>

        </div>
    </div>
</div>
<div class="row">

    <div class="row" id="applyJob"style="display:none;" >
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-white bg-dark"><h3 class="text-center">Datos de Contacto</h3></div>
                        <div class="card-body">
                            <div class="card-title"> <h3 class="text-center">Complete toda la informacion</h3></div>
                                <form id="formApplyJob" method="post" onsubmit="return false" enctype="multipart/form-data">
                                    <div class="margen-top-2">
                                        <label for="nameJob" class="form-label">Nombre:</label>
                                        <input type="text" class="form-control" id="nameJob"name="nameJob">
                                    </div>
                                    <div>
                                    <div class="margen-top-2">
                                        <label for="lastname" class="form-label">Apellido:</label>
                                        <input type="text" class="form-control" id="lastname"name="lastname">
                                    </div>
                                    <div>
                                        <label for="gender" class="form-label">Genero:</label>
                                        <select class="form-select"  id="gender" name="gender">
                                            <option>Seleccione una opcion:</option>   
                                            <option>Hombre</option>                                        
                                            <option>Mujer</option>  
                                            <option>Otro</option>                                                                                                                   
                                        </select>
                                    </div>

                                    <div class="margen-top-2">
                                        <label for="location" class="form-label">Ubicacion:</label>
                                        <input type="text" class="form-control" id="location"name="location">
                                    </div>
                                    <div class="margen-top-2">
                                        <label for="url" class="form-label">Linkedin:</label>
                                        <input type="text" class="form-control" id="url"name="url">
                                    </div>
                                    <div class="margen-top-2">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="text" class="form-control" id="email"name="email">
                                    </div>
                                    <div>
                                        <label for="curriculum" class="form-label">Curriculum:</label>
                                        <input type="file" class="form-control" name="curriculum" id="curriculum"size="30">
                                    </div>
                                    <br>
                                    <div>
                                        <textarea rows="5" cols="81" style="max-width: 100%;" id="description" placeholder="Descripcion:" name="description"></textarea>
                                    </div>
                                    <br>
                                </form>
                            <div class="col-md-12 text-center">
                                <button type="buttom" class="btn btn-dark btn-lg" onclick="BackApplyJob()">Volver</button>
                                <button type="submit" class="btn btn-success btn-lg" onclick="SendApplyJob()">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>
<?php echo $layout->printFooter();?>
