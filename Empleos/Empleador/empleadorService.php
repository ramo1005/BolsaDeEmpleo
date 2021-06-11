<?php
    class EmpleadorService{

        public $conexcion;

        function __construct($con){
            $this->conexcion=$con;
        }

        function CheckEmpleador($user,$password){

            $stmt = $this->conexcion->prepare("select * from empleador where user=? and password =?");
            $stmt->bind_param("ss",$user,$password);

            $stmt->execute();

            $result = $stmt->get_result();
            $stmt->close();
            
            return $result;
            
        }
        
        function InsertEmpleador($item){

            $stmt = $this->conexcion->prepare("insert into empleador (nombre,compañia,user,password) values(?,?,?,?)");
            $stmt->bind_param("ssss",$item->nombre,$item->compañia,$item->user,$item->password);
            $stmt->execute();
            $stmt->close();
            
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