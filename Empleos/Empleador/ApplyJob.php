<?php

    class ApplyJob{
        public $name;
        public $lastName;
        public $gender;
        public $location;
        public $url;
        public $curriculum;
        public $email;
        public $description;
        public $idEmpleador;
        public $jobId;



        function __construct($name,$lastName,$gender,$location,$url,$curriculum,$email,$description,$idEmpleador,$jobId){

            $this->name=$name;
            $this->lastName=$lastName;
            $this->gender=$gender;
            $this->location=$location;
            $this->url=$url;
            $this->curriculum=$curriculum;
            $this->email=$email;
            $this->description=$description;
            $this->idEmpleador=$idEmpleador;
            $this->jobId=$jobId;

        }
    }
?>