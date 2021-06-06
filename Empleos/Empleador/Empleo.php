<?php

    class Empleo{
        public $name;
        public $company;
        public $type;
        public $category;
        public $position;
        public $location;
        public $url;
        public $photo;
        public $email;
        public $status;
        public $description;
        public $idEmpleador;


        function __construct($name,$company,$type,$category,$position,$location,$url,$photo,$email,$status,$description,$idEmpleador){

            $this->name=$name;
            $this->company=$company;
            $this->type=$type;
            $this->category=$category;
            $this->position=$position;
            $this->location=$location;
            $this->url=$url;
            $this->photo=$photo;
            $this->email=$email;
            $this->status=$status;
            $this->description=$description;
            $this->idEmpleador=$idEmpleador;

        }
    }
?>