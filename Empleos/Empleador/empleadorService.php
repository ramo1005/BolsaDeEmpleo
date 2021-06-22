<?php

    if (str_contains('http://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'], 'index.php')) { 
        require_once 'EmailHandler/EmailHandler.php';
    }


    class EmpleadorService{

        public $conexcion;

        function __construct($con){
            $this->conexcion=$con;
        }
        function generateRandomString() {
            $length = 25;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        function CheckEmpleador($user){

            $stmt = $this->conexcion->prepare("select * from empleador where user=?");
            $stmt->bind_param("s",$user);

            $stmt->execute();

            $result = $stmt->get_result();
            $stmt->close();
            
            return $result;
            
        }
        
        function InsertEmpleador($item){

            $token= new EmailHandler();
            $api=$this->generateRandomString();

            $stmt = $this->conexcion->prepare("insert into empleador (nombre,compañia,email,user,password,api_token) values(?,?,?,?,?,?)");
            $stmt->bind_param("ssssss",$item->nombre,$item->compañia,$item->email,$item->user,$item->password,$api);
            $stmt->execute();
            $stmt->close();
            $token->SendEmail($item->email,'Bolsa de Empleos',$api);


            
        }
        function InsertEmpleo($item){

            $stmt = $this->conexcion->prepare("insert into empleo (nombre,compañia,tipo,categoria,posicion,ubicacion,url,logo,email,estado,descripcion,id_empleador) values(?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssssssssi",$item->name,$item->company,$item->type,$item->category,$item->position,$item->location,$item->url,$item->photo,$item->email,$item->status,$item->description,$item->idEmpleador);
            $stmt->execute();
            $stmt->close();
            
        }
        function InsertApplyJob($item){

            $stmt = $this->conexcion->prepare("insert into postulacion (nombre,apellido,genero,ubicacion,url,email,curriculum,descripcion,idEmpleador,jobId) values(?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssssssssii",$item->name,$item->lastName,$item->gender,$item->location,$item->url,$item->email,$item->curriculum,$item->description,$item->idEmpleador,$item->jobId);
            $stmt->execute();
            $stmt->close();
            
        }
        function GetCategory(){

            $stmt = $this->conexcion->prepare("select * from categoria");

            $stmt->execute();

            $result = $stmt->get_result();
            $stmt->close();
            
            return $result;
            
        }
        function GetJobsEmpleador($id){

            $stmt = $this->conexcion->prepare("select * from empleo where id_empleador=?");
            $stmt->bind_param("i",$id);


            $stmt->execute();

            $result = $stmt->get_result();
            $stmt->close();
            
            return $result;
            
        }
        function GetSpecificEmpleo($id){

            $stmt = $this->conexcion->prepare("select * from empleo where id=?");
            $stmt->bind_param("i",$id);


            $stmt->execute();

            $result = $stmt->get_result();
            $stmt->close();
            
            return $result;
            
        }
        function GetLimitJobs(){

            $stmt = $this->conexcion->prepare("select limitJobs from admin where id=?");
            $stmt->bind_param("i",$_SESSION['adminLogin']);


            $stmt->execute();

            $result = $stmt->get_result();
            $stmt->close();
            
            return $result;
            
        }
        function ToListEmpleos($id){
            $stmt = $this->conexcion->prepare("select * from empleo where id_empleador=?");
            $stmt->bind_param("s",$id);

            $stmt->execute();

            $result = $stmt->get_result();
            $stmt->close();
            
            return $result;
        }
        function ListAllEmpleosLimit($category){

            $data=$this->GetLimitJobs();
            $limit=$data->fetch_assoc();

            if(isset($limit['limitJobs'])&&$limit['limitJobs']>0){

                $stmt = $this->conexcion->prepare("select * from empleo where estado='activo' and categoria=? order by creado desc limit ".$limit['limitJobs']);

            }
            else{
                $stmt = $this->conexcion->prepare("select * from empleo where estado='activo' and categoria=? order by creado desc limit 5");
            }
            $stmt->bind_param("s",$category);


            $stmt->execute();

            $result = $stmt->get_result();
            $stmt->close();
            
            return $result;
        }
        function ListAllApplyEmpleador($id,$jobid){
            $stmt = $this->conexcion->prepare("select * from postulacion where idEmpleador=? and jobId=? order by fecha desc ");
            $stmt->bind_param("ii",$id,$jobid);


            $stmt->execute();

            $result = $stmt->get_result();
            $stmt->close();
            
            return $result;
        }
        function ListAllEmpleosMore($category){
            $stmt = $this->conexcion->prepare("select * from empleo where estado='activo' and categoria=? order by creado desc ");
            $stmt->bind_param("s",$category);


            $stmt->execute();

            $result = $stmt->get_result();
            $stmt->close();
            
            return $result;
        }
        function CountEmpleos(){

            $stmt = $this->conexcion->prepare("select * from empleo where estado='activo' ");

            $stmt->execute();

            $result = $stmt->get_result();
            $stmt->close();
            
            return $result;
            
        }
        function CountEmpleosEmpleador($id){

            $stmt = $this->conexcion->prepare("select * from postulacion where idEmpleador=? ");
            $stmt->bind_param("s",$id);

            $stmt->execute();

            $result = $stmt->get_result();
            $stmt->close();
            
            return $result;
            
        }
        function CountApplyJobsEmpleador($id){

            $stmt = $this->conexcion->prepare("select * from postulacion where jobId=? ");
            $stmt->bind_param("s",$id);

            $stmt->execute();

            $result = $stmt->get_result();
            $stmt->close();
            
            return $result;
            
        }
        
        function CountEmpleosCategory($category){
            $stmt = $this->conexcion->prepare("select * from empleo where estado='activo' and categoria=?");
            $stmt->bind_param("s",$category);

            $stmt->execute();
            $stmt->store_result();
            $totalRows = $stmt->num_rows;            
            $stmt->close();

            return $totalRows;

        }
        function GetCompanyUser(){
            $stmt = $this->conexcion->prepare("select compañia from empleador where id=".$_SESSION['empleadorLogin']);
            $stmt->execute();

            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $stmt->close();
            
            return $row['compañia'];


        }
        function GetEmpleadorApi($token){
            $stmt = $this->conexcion->prepare("select * from empleador where api_token=?");
            $stmt->bind_param("s",$token);

            $stmt->execute();

            $result = $stmt->get_result();
            if($result->num_rows>0){
                $row = $result->fetch_assoc();
                return $row['id'];

            }
            else{
                return 0;
            }
            $stmt->close();
            

        }

        function photoId(){
            $stmt = $this->conexcion->prepare("select id from empleo order by id desc limit 1");
            $stmt->execute();

            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $stmt->close();
            
            return $row['id'];


        }
        function curriculumId(){
            $stmt = $this->conexcion->prepare("select id from postulacion order by id desc limit 1");
            $stmt->execute();

            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $stmt->close();
            
            return $row['id'];

        }
        function RefreshPathPhoto(){
            
            $id=$this->photoId();


            $stmt = $this->conexcion->prepare("update empleo SET logo = ? where id = ?");
            $stmt->bind_param("si",$_POST['realpath'],$id);

            $stmt->execute();
            $stmt->close();
                        
        }

        function getEmpleoPhoto(){
        
            $id=$this->photoId();
        
            $nombre="empleo#".$id.'.'.pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            $guardado=$_FILES['photo']['tmp_name'];
        
            
            if(!file_exists('img/logos')){
                mkdir('img/logos',0777,true);
                if(file_exists('img/logos')){
                    if(move_uploaded_file($guardado, 'img/logos/'.$nombre)){
                        $_POST['realpath']=realpath('img/logos/'.$nombre);
                    }
                }
            }else{
                if(move_uploaded_file($guardado, 'img/logos/'.$nombre)){
                    $_POST['realpath']=realpath('img/logos/'.$nombre);
        
                }
            }
        }
        function RefreshPathCurriculum(){

            $id=$this->curriculumId();

            
            $stmt = $this->conexcion->prepare("update postulacion SET curriculum = ? where id = ?");
            $stmt->bind_param("si",$_POST['realpath'],$id);

            $stmt->execute();
            $stmt->close();
                        
        }
        function getApplyJobFile(){
        
            $id=$this->curriculumId();
        
            $nombre="apply#".$id.'.'.pathinfo($_FILES['curriculum']['name'], PATHINFO_EXTENSION);
            $guardado=$_FILES['curriculum']['tmp_name'];
        
            
            if(!file_exists('files/curriculum')){
                mkdir('files/curriculum',0777,true);
                if(file_exists('files/curriculum')){
                    if(move_uploaded_file($guardado, 'files/curriculum/'.$nombre)){
                        $_POST['realpath']=realpath('files/curriculum/'.$nombre);
                    }
                }
            }else{
                if(move_uploaded_file($guardado, 'files/curriculum/'.$nombre)){
                    $_POST['realpath']=realpath('files/curriculum/'.$nombre);
        
                }
            }
        }

        

    }

?>