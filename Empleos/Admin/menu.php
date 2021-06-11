<?php
require_once '../../layout/layout.php';
require_once '../../layout/menu.php';

include 'limitJobs.php';




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
            <button type="button" class="btn btn-dark"onclick="CategoryPanel()">Gestionar Categorias </button>            
            <button type="button" class="btn btn-dark"onclick="JobsPanel()">Gestionar Puestos</button>  
            <button type="button" class="btn btn-warning"onclick="LimitJobsIndex()">Limite de Puestos en la pagina de inicio</button>   
 
            <button type="button" class="btn btn-danger float-end"onclick="ExitAdmin()">Salir</button>     
        </div>
    </center>



<?php include 'category.php'; include 'jobs.php'; echo $layout->printFooter(); ?>
