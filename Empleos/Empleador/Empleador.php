<?php

    class Empleador{
        public $nombre;
        public $compañia;
        public $user;
        public $password;


        function __construct($nombre,$compañia,$user,$password){

            $this->nombre=$nombre;
            $this->compañia=$compañia;
            $this->user=$user;
            $this->password=$password;

        }
    }
?>