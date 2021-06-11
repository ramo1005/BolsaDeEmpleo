<?php
    class Layout{

        private $IsRoot;

        public function __construct($isRoot = false)
        {
            $this->IsRoot = $isRoot;
        }

    function printHeader(){

        $directory = ($this->IsRoot) ? "" : "../../";

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
        <form action="search.php" class="form-inline my-2 my-lg-0">
            <input id="search" style="display:none;" name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" >

        </form>
   
    </div>
    
    </nav>

    <br><br><br><br><br>
    <script type="text/javascript">
    if(window.location.href.includes('index.php')||window.location.href.includes('search.php')){
        document.getElementById('search').style.display="";
    }
    </script>

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

                                <div class="mb-3">
                                    <label for="user" class="form-label">Usuario:</label>
                                    <input type="text" class="form-control" id="user" name="user">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Constraseña:</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </form>
                            <br>
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-warning btn-lg"onclick="SingUp()">Registrarse</button>
                                <button type="submit" class="btn btn-success btn-lg" onclick="CheckLogin()">Ingresar</button>
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
                    
                    <form id="formSingUp" method="post" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="nameSingUp" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nameSingUp">
                        </div>
                        <div class="mb-3">
                            <label for="companySingUp" class="form-label">Compañia:</label>
                            <input type="text" class="form-control" id="companySingUp">
                        </div>
                        <div class="mb-3">
                            <label for="userSingUp" class="form-label">Usuario:</label>
                            <input type="text" class="form-control" id="userSingUp">
                        </div>
                        <div class="mb-3">
                            <label for="passwordSingUp1" class="form-label">Constraseña:</label>
                            <input type="password" class="form-control" id="passwordSingUp1">
                        </div>
                        <div class="mb-3">
                            <label for="passwordSingUp2" class="form-label">Confirmar Constraseña:</label>
                            <input type="password" class="form-control" id="passwordSingUp2">
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


        $admin = <<<EOF

        <div class="row" id="adminLogin"style="display:none;" >
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-white bg-dark"><h3 class="text-center">Administrador</h3></div>
                    <div class="card-body">
                            <form id="formAdmin" method="post"  enctype="multipart/form-data">

                                <div class="mb-3">
                                    <label for="userAdmin" class="form-label">Usuario:</label>
                                    <input type="text" class="form-control" id="userAdmin" name="userAdmin">
                                </div>
                                <div class="mb-3">
                                    <label for="passwordAdmin" class="form-label">Constraseña:</label>
                                    <input type="password" class="form-control" id="passwordAdmin" name="passwordAdmin">
                                </div>
                            </form>
                            <br>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success btn-lg" onclick="CheckAdmin()">Ingresar</button>
                            </div>

                    </div>
                </div>
            </div>
        </div>

EOF;

    echo $admin;

    }
    function printCategoryModals(){


        $modal = <<<EOF
    <div class="modal fade" id="add-category-modal" tabindex="-1" aria-labelledby="addCategoryModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModal">Nueva Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="menu.php" method="POST">
                        <div class="mb-3">
                            <label for="category-name" class="form-label">Nombre:</label>
                            <input name="nameAdd" type="text" class="form-control" id="category-name">
    
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
    <div class="modal fade" id="release-category-modal" tabindex="-1" aria-labelledby="releaseCategoryModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="releaseCategoryModal">Actualizar Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="menu.php"  method="POST">
                        <div class="mb-3">
                            <label for="category-name-release" class="form-label">Nombre:</label>
                            <input name="nameRelease" type="text" class="form-control" id="category-name-release">
                        </div>
                        <div class="mb-3" style="display:none;">
                            <label for="category-id-release" class="form-label">Id:</label>
                            <input name="idRelease" type="text" class="form-control" id="category-id-release">
                        </div>
                        <div class="mb-3">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
    </div>

    <div class="modal fade" id="delete-category-modal" tabindex="-1" aria-labelledby="deleteCategoryModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteCategoryModal">Borrar Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
    
                    <form action="menu.php" method="POST">
                        <div class="mb-3">
                            <label for="category-id-delete" class="form-label">Id:</label>
                            <input name="idDelete" type="text" class="form-control" id="category-id-delete" readonly="readonly">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Borrar</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>

EOF;

    echo $modal;

    }
    function printModalsJobs(){


        $modal = <<<EOF

        <div class="modal fade" id="delete-job-modal" tabindex="-1" aria-labelledby="deleteJobModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteJobModal">Borrar Puesto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="menu.php" method="POST">
                            <div class="mb-3">
                                <label for="job-id-delete" class="form-label">Id:</label>
                                <input name="idDelete" type="text" class="form-control" id="job-id-delete" readonly="readonly">
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Borrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
        </div>

EOF;

    echo $modal;

    }
    

    

    function printFooter(){

        $directory = ($this->IsRoot) ? "" : "../../";

        $footer = <<<EOF

        </main>      
        <script src="{$directory}assets/js/index/MenuFuntions.js"></script>
        <script src="{$directory}assets/js/index/LoginFuntions.js"></script>
        <script src="{$directory}assets/js/index/SingUpFuntions.js"></script>
        <script src="{$directory}assets/js/index/AdminFuntions.js"></script>
        <script src="{$directory}assets/js/index/EmpleadorFuntions.js"></script>




        <script src="{$directory}assets/js/bootstrap/bootstrap.min.js"></script>
        <script src="{$directory}assets/js/jquery/jquery-3.5.1.min.js"></script>

    
    </body>
    
    </html>

EOF;

    echo $footer;

    }
    
}
