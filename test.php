<?php

#require_once 'EmailHandler/EmailHandler.php';

#$new = new EmailHandler();

#$new->SendEmail("ramoo200001@gmail.com","prueba1","prueba2");

$opciones = [
    'cost' => 10,
];
echo password_hash("1234", PASSWORD_BCRYPT, $opciones)."\n";

$hash='$2y$10$BH9xnPfhoIbKvAk8sy1JE.EyJnjcA/r7FpIOqypQKlVrwVTIIGQBW ';

if(password_verify('1234',$hash)){

    echo '1'; 
}
else{
    echo '0';

}

?>