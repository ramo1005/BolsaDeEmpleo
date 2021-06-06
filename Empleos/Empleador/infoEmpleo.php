
<?php
require_once '../../layout/layout.php';
require_once '../../layout/menu.php';
$layout = new Layout(false);
session_start();


?>
<?php echo $layout->printHeader();?>

<div class="row">
        <div class="row" id="infoEmpleo" >
            <center>
                <div class="col-md-6"></div>
                <div class="col-md-6">

                <div class="card">
                    <div class="card-header text-white bg-dark"><h3 class="text-center"> Datos del Empleo</h3></div>
                    <div class="card-body">
                    <div class="card-title"> <h3 class="text-center">Logo:</h3></div>
                            <center>
                            <img class="card-img-top"src="<?=$_SESSION['candidato']['foto']?>"alt="Card image cap"style="height: 250px;width: 50%;">

                            </center>
                            <div class="margen-top-2">
                                <label for="cedulaInfo" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="cedulaInfo" value="<?=$_SESSION['candidato']['cedula']?>" readonly="readonly">
                            </div>

                            <div class="margen-top-2">
                                <label for="nombreInfo" class="form-label">Compañia:</label>
                                <input type="text" class="form-control" id="nombreInfo" value="<?=$_SESSION['candidato']['nombres']?>" readonly="readonly">
                            </div>
                            <div class="margen-top-2">
                                <label for="apellidoInfo" class="form-label">Tipo:</label>
                                <input type="text" class="form-control" id="apellidoInfo" value="<?=$_SESSION['candidato']['apellidos']?>" readonly="readonly">
                            </div>
                            <div>
                                <label for="estadoInfo" class="form-label">Categoria:</label>
                                <input type="text" class="form-control" id="estadoInfo" value="<?=$_SESSION['candidato']['estado']?>" readonly="readonly">

                            </div>
                            <div>
                                <label for="fechaInfo" class="form-label">Posicion:</label>
                                <input type="text" class="form-control" id="fechaInfo" value="<?=$_SESSION['candidato']['partido']?>" readonly="readonly">

                            </div>
                            <div>
                                <label for="lugarInfo" class="form-label">Url:</label>
                                <input type="text" class="form-control" id="lugarInfo" value="<?=$_SESSION['candidato']['puesto']?>" readonly="readonly">

                            </div>
                            <div>
                                <label for="lugarInfo" class="form-label">Ubicacion:</label>
                                <input type="text" class="form-control" id="lugarInfo" value="<?=$_SESSION['candidato']['puesto']?>" readonly="readonly">

                            </div>                        <div>
                                <label for="lugarInfo" class="form-label">Estado:</label>
                                <input type="text" class="form-control" id="lugarInfo" value="<?=$_SESSION['candidato']['puesto']?>" readonly="readonly">

                            </div>                        <div>
                                <label for="lugarInfo" class="form-label">Descripcion:</label>
                                <input type="text" class="form-control" id="lugarInfo" value="<?=$_SESSION['candidato']['puesto']?>" readonly="readonly">

                            </div>
                            <div>
                                <label for="lugarInfo" class="form-label">Estado:</label>
                                <input type="text" class="form-control" id="lugarInfo" value="<?=$_SESSION['candidato']['puesto']?>" readonly="readonly">

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
<?php echo $layout->printFooter();?>
