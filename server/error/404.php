<?php
require_once '../../layout/layout.php';
require_once '../../layout/menu.php';


$layout = new Layout();
$menu = new Menu();


?>

<?php echo $layout->printHeader(); ?>

<center>
    <h1>Pagina No Encontrada</h1>
    <div class="col-md1" id="login-bar">

    <button id="btn-login" type="button" class="btn btn-warning "onclick="BackToIndex404()">Regresar al Inicio</button>

    </div>
</center>

<?php echo $layout->printFooter(); ?>
