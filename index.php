<?php
require_once 'layout/layout.php';
require_once 'layout/menu.php';


$layout = new Layout(true);
$menu = new Menu();


?>

<?php echo $layout->printHeader(); ?>
<?php echo $menu->loginBar(); ?>

<?php echo $layout->printLogin(); ?>
<?php echo $layout->printSingUp(); ?>
<?php echo $layout->printAdminLogin(); ?>



<?php echo $layout->printFooter(); ?>
