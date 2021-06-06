<?php
require_once '../../layout/layout.php';
require_once '../../layout/menu.php';


$layout = new Layout(false);
$menu = new Menu();
session_start();

if (!isset($_SESSION['admin'])){
    header('Location: ../../index.php');
}


?>

<?php echo $layout->printHeader();?>

    <center id="adminOpcion">
        <div class="card-body">
            <button type="button" class="btn btn-dark"onclick="AddJob()">Agregar Puesto </button>            
            <button type="button" class="btn btn-dark"onclick="ReleaseJob()">Editar Puestos </button>
            <button type="button" class="btn btn-dark"onclick="DeleteJob()">Borrar Puestos</button>
            <button type="button" class="btn btn-warning"onclick="ShowJobs()">Listar Puestos</button>   
            <button type="button" class="btn btn-danger float-end"onclick="ExitEmpleador()">Salir</button>     
        </div>
    </center>



<?php echo $layout->printFooter(); ?>
