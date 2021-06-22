<?php
require_once '../../layout/layout.php';
require_once '../../layout/menu.php';
include 'createEmpleo.php';

$layout = new Layout(false);
$menu = new Menu();
session_start();
if(isset($_POST['exitEmpleador'])){
    session_destroy();
}

if (!isset($_SESSION['empleador'])){
    header('Location: ../../index.php');
}


?>

<?php echo $layout->printHeader();?>

    <center id="empleadorOption">
        <div class="card-body">
            <button id="btn-menu-back" type="button" class="btn btn-warning " style="display:none;" onclick="BackMenuEmpleador()">Volver</button>
            <button id="btn-menu-back-apply" type="button" class="btn btn-warning " style="display:none;" onclick="BackMenuApply()">Volver</button>

            <button id="btn-menu-add" type="button" class="btn btn-dark"onclick="AddJobEmpleador()">Agregar Puesto </button>            
            <button id="btn-menu-list" type="button" class="btn btn-dark"onclick="ShowJobsEmpleador()">Listar Puestos Agregados</button>   
            <button id="btn-menu-list-apply" type="button" class="btn btn-warning"onclick="ShowApplyJobEmpleador()">Listar Postulaciones de Puestos Agregados</button>   

            <button id="btn-menu-exit"type="button" class="btn btn-danger float-end"onclick="ExitEmpleador()">Salir</button>     
        </div>
    </center>

    

<?php   include 'listEmpleador.php';include 'listApplyEmpleador.php';echo $layout->printFooter(); include 'addEmpleador.php';?>
