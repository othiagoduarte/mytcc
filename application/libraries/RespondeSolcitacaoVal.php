<?php
    class RespondeSolicitacaoVal
    {
        public $db;
        
        public function __construct($params)
        {
            $this->db = $params["c"];            
        }
    }
?>