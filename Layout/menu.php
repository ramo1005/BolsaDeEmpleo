<?php

    class Menu{
        function loginBar(){
            $content = <<<EOF
        
            <div class="col-md1" id="login-bar">

                <button id="btn-login-back" type="button" class="btn btn-dark  " style="display:none;" onclick="BackLoginPanel()">Volver</button>
                <button id="btn-loginAdmin-back" type="button" class="btn btn-dark  " style="display:none;" onclick="BackLoginAdminPanel()">Volver</button>
                <button id="btn-login" type="button" class="btn btn-dark float-end"onclick="LoginPanel()">Ingresar</button>
                <button id="btn-login-admin" type="button" class="btn btn-dark float-end" style="display:none;" onclick="AdminPanel()">Administrador</button>
                <select class="btn btn-dark" id="filter">
                    <option >Filtrar:</option>
                </select>
            </div>
            <br><br>
            

EOF;

            echo $content;
        }
        
    }

?>