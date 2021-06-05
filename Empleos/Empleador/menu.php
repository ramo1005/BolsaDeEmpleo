<?php
require_once '../../layout/layout.php';
require_once '../../layout/menu.php';


$layout = new Layout(false);
$menu = new Menu();
session_start();

if (!isset($_SESSION['empleador'])){
    header('Location: ../../index.php');
}


?>

<?php echo $layout->printHeader(); ?>





<?php echo $layout->printFooter(); ?>
