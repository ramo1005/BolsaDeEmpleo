<?php
    class AdminService{

        public $conexcion;

        function __construct($con){
            $this->conexcion=$con;
        }
        
        function CheckAdmin($user,$password){

            $stmt = $this->conexcion->prepare("select * from admin where user=? and password =?");
            $stmt->bind_param("ss",$user,$password);

            $stmt->execute();

            $result = $stmt->get_result();
            $stmt->close();
            
            return $result;
            
        }

    }

?>