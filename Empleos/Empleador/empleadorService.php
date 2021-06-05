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
        

    }

?>