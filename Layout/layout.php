<?php
    class Layout{

        private $IsRoot;

        public function __construct($isRoot = false)
        {
            $this->IsRoot = $isRoot;
        }

    function printHeader(){

        $directory = ($this->IsRoot) ? "" : "../../../";

        $header = <<<EOF
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolsa De Empleos</title>

    <link rel="stylesheet" href="{$directory}assets/css/style.css">
    <link rel="stylesheet" href="{$directory}assets/css/bootstrap/bootstrap.min.css">
</head>

<body style="background-color:grey;">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{$directory}index.php">Empleos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">

            </ul>
        </div>
    </div>
    </nav>

    <br><br><br><br><br>

    <main id="menu"class="container">


EOF;

    echo $header;

    }
    function printLogin(){


        $content = <<<EOF

        <div class="row" id="login"style="display:none;" >
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-white bg-dark"><h3 class="text-center">Empleador</h3></div>
                    <div class="card-body">
                            <form id="formLogin" method="post"  enctype="multipart/form-data">

                                <div class="margen-top-2">
                                    <label for="user" class="form-label">Usuario:</label>
                                    <input type="text" class="form-control" id="user" name="user">
                                </div>
                                <div class="margen-top-2">
                                    <label for="password" class="form-label">Constraseña:</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </form>
                            <br>
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-warning btn-lg"onclick="SingUp()">Registrarse</button>
                                <button type="submit" class="btn btn-success btn-lg" onclick="checkLogin()">Ingresar</button>
                            </div>

                    </div>
                </div>
            </div>
        </div>

EOF;

    echo $content;

    }
    function printSingUp(){


        $registro = <<<EOF

        <div class="row" id="singup"style="display:none;" >
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-white bg-dark"><h3 class="text-center">Empleador</h3></div>
                <div class="card-body">
                    <div class="card-title"> 
                        <h3 class="text-center">Complete toda la informacion</h3>
                    </div>

                    <form id="formRegistro" method="post" enctype="multipart/form-data">

                        <div class="margen-top-2">
                            <label for="cedulaAdminRegistro" class="form-label">Cedula:</label>
                            <input type="text" class="form-control" id="cedulaAdminRegistro">
                        </div>
                        <div class="margen-top-2">
                            <label for="passwordAdminRegistro" class="form-label">Constraseña:</label>
                            <input type="password" class="form-control" id="passwordAdminRegistro">
                        </div>
                        <div class="margen-top-2">
                            <label for="password2AdminRegistro" class="form-label">Confirmar Constraseña:</label>
                            <input type="password" class="form-control" id="password2AdminRegistro">
                        </div>
                        <div class="margen-top-2">
                            <label for="codigoRegistro" class="form-label">Codigo de Registro:</label>
                            <input type="text" class="form-control" id="codigoRegistro">
                        </div>
                    </form>
                    <br>
                    <div class="col-md-12 text-center">
                        <button type="button" class="btn btn-warning btn-lg"onclick="BackSingUp()">Volver</button>
                        <button type="submit" class="btn btn-success btn-lg" onclick="CheckSingUp()">Registrarse</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

EOF;

    echo $registro;

    }


    function printAdminLogin(){

        $directory = ($this->IsRoot) ? "" : "../";

        $admin = <<<EOF

        <div class="row" id="adminLogin"style="display:none;" >
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-white bg-dark"><h3 class="text-center">Administrador</h3></div>
                    <div class="card-body">
                            <form id="formAdmin" method="post"  enctype="multipart/form-data">

                                <div class="margen-top-2">
                                    <label for="userAdmin" class="form-label">Usuario:</label>
                                    <input type="text" class="form-control" id="userAdmin" name="userAdmin">
                                </div>
                                <div class="margen-top-2">
                                    <label for="passwordAdmin" class="form-label">Constraseña:</label>
                                    <input type="password" class="form-control" id="passwordAdmin" name="passwordAdmin">
                                </div>
                            </form>
                            <br>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success btn-lg" onclick="checkAdmin()">Ingresar</button>
                            </div>

                    </div>
                </div>
            </div>
        </div>

EOF;

    echo $admin;

    }
    

    

    function printFooter(){

        $directory = ($this->IsRoot) ? "" : "../../../";

        $footer = <<<EOF

        </main>      
        <script src="{$directory}assets/js/index/MenuFuntions.js"></script>


        <script src="{$directory}assets/js/bootstrap/bootstrap.min.js"></script>
        <script src="{$directory}assets/js/jquery/jquery-3.5.1.min.js"></script>

    
    </body>
    
    </html>

EOF;

    echo $footer;

    }
    
}
