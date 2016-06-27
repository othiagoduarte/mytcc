<?php
    class DesativaProfessorVal
    {
        public $db;

        function __construct($params)
        {
            $this->db = $params["c"];

            $idProfessor = $this->db->id;

            $projetosAtivos = $this->db->buscaProjetos($idProfessor);
        }
    }
?>