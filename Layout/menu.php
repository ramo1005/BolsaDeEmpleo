<?php

    class Menu{
        function loginBar(){
            $content = <<<EOF
        
            <div class="col-md1" id="login-bar">

                <button id="btn-login-back" type="button" class="btn btn-dark  " style="display:none;" onclick="BackLoginPanel()">Volver</button>
                <button id="btn-loginAdmin-back" type="button" class="btn btn-dark  " style="display:none;" onclick="BackLoginAdminPanel()">Volver</button>
                <button id="btn-login" type="button" class="btn btn-dark float-end"onclick="LoginPanel()">Ingresar</button>
                <button id="btn-login-admin" type="button" class="btn btn-dark float-end" style="display:none;" onclick="AdminPanel()">Administrador</button>
                <select class="btn btn-dark" id="filter" onchange="Filter()">
                    <option >Filtrar:</option>
                </select>
                <button id="btn-login-filter" type="button" class="btn btn-dark  " onclick="ClearFilter()">X</button>

            </div>
            <br><br>
            

EOF;

            echo $content;
        }
        function backButtonSearch(){
            $content = <<<EOF
        
            <div class="col-md1" id="login-bar">

                <button id="btn-login" type="button" class="btn btn-dark float-end"onclick="BackSearch()">Regresar</button>

            </div>
            <br><br>
            

EOF;

            echo $content;
        }
        function backButtonMore(){
            $content = <<<EOF
        
            <div class="col-md1" id="login-bar">

                <button id="btn-login" type="button" class="btn btn-dark float-end"onclick="BackMoreEmpleos()">Regresar</button>

            </div>
            <br><br>
            

EOF;

            echo $content;
        }
        function applyButton(){
            $content = <<<EOF
        
            <div class="col-md1" id="apply-bar">

                <button id="btn-apply" type="button" class="btn btn-dark float-end"onclick="ApplyJob()">Aplicar</button>

            </div>
            <br><br>
            

EOF;

            echo $content;
        }
        
    }

?>