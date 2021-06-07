<?php
    class EmpleoService{

        public $conexcion;

        function __construct($con){
            $this->conexcion=$con;
        }
        function GetEmpleoSearch($search){

            $stmt = $this->conexcion->prepare("select * from empleo where estado='Activo' and ubicacion like '%".$search."%' or posicion like '%".$search."%' or categoria like '%".$search."%' or compañia like '%".$search."%' ");

            $stmt->execute();

            $result = $stmt->get_result();
            $stmt->close();
            
            return $result;
            
        }
    }
?>