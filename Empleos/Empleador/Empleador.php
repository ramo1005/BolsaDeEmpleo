<?php

    class Empleador{
        public $nombre;
        public $compañia;
        public $email;
        public $user;
        public $password;


        function __construct($nombre,$compañia,$email,$user,$password){

            $this->nombre=$nombre;
            $this->compañia=$compañia;
            $this->email=$email;
            $this->user=$user;
            $this->password=$password;

        }
    }
?>