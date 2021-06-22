<?php
    class AdminService{

        public $conexcion;

        function __construct($con){
            $this->conexcion=$con;
        }
        
        function CheckAdmin($user){

            $stmt = $this->conexcion->prepare("select * from admin where user=? ");
            $stmt->bind_param("s",$user);

            $stmt->execute();

            $result = $stmt->get_result();
            $stmt->close();
            
            return $result;
            
        }
        function ChangeLimitJobs($limit){
            
            session_start();

            $stmt = $this->conexcion->prepare("update admin SET limitJobs = ? where id = ?");
            $stmt->bind_param("ii",$limit,$_SESSION['adminLogin']);

            $stmt->execute();
            $stmt->close();
                        
        }
        function AddCategory($name){
            
            $stmt = $this->conexcion->prepare("insert into categoria(nombre) values(?)");
            $stmt->bind_param("s",$name);

            $stmt->execute();
            $stmt->close();
                        
        }
        function ReleaseCategory($name,$id){
            
            $stmt = $this->conexcion->prepare("update categoria SET nombre = ? where id = ?");
            $stmt->bind_param("si",$name,$id);

            $stmt->execute();
            $stmt->close();
                        
        }
        function ReleaseJob(){
            
            $stmt = $this->conexcion->prepare("update empleo SET nombre = ? , compañia = ? , tipo = ? , categoria = ? , posicion = ? , url = ? , email = ? , logo = ? , ubicacion = ? , descripcion = ? , estado = ? ,  modificado = current_timestamp() where id = ?");
            $stmt->bind_param("sssssssssssi",$_POST['nameRelease'],$_POST['company'],$_POST['type'],$_POST['category'],$_POST['position'],$_POST['url'],$_POST['email'],$_POST['realpath'],$_POST['location'],$_POST['description'],$_POST['status'],$_POST['idRelease']);

            $stmt->execute();
            $stmt->close();
                        
        }
        function DeleteCategory($id){
            
            $stmt = $this->conexcion->prepare("delete from categoria where id=?");
            $stmt->bind_param("i",$id);

            $stmt->execute();
            $stmt->close();
                        
        }
        function DeleteJob($id){
            
            $stmt = $this->conexcion->prepare("delete from empleo where id=?");
            $stmt->bind_param("i",$id);

            $stmt->execute();
            $stmt->close();
                        
        }
        function ListCategory(){
            $stmt = $this->conexcion->prepare("select * from categoria ");

            $stmt->execute();

            $result = $stmt->get_result();
            $stmt->close();
            
            return $result;
        }
        function ListJobs(){
            $stmt = $this->conexcion->prepare("select * from empleo ");

            $stmt->execute();

            $result = $stmt->get_result();
            $stmt->close();
            
            return $result;
        }
        function ReleasePhotoJob(){
        
            $id=$_POST['idRelease'];
        
            $nombre="empleo#".$id.'.'.pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            $guardado=$_FILES['photo']['tmp_name'];
        
            
            if(!file_exists('../Empleador/img/logos')){
                mkdir('../Empleador/img/logos',0777,true);
                if(file_exists('../Empleador/img/logos')){
                    if(move_uploaded_file($guardado, '../Empleador/img/logos/'.$nombre)){
                        $_POST['realpath']=realpath('../Empleador/img/logos/'.$nombre);
                    }
                }
            }else{
                if(move_uploaded_file($guardado, '../Empleador/img/logos/'.$nombre)){
                    $_POST['realpath']=realpath('../Empleador/img/logos/'.$nombre);
        
                }
            }
        }

    }

?>