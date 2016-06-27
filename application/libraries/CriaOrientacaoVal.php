<?php
    class CriaOrientacaoVal
    {
        public $db; 
        
        public function __construct($params)
        {
            $this->db = $params["c"];
            
            $date = new DateTime();
            $idProjeto = $this->db->idProjeto;
                        
            $mesmoDia = $this->db->orientacaoMesmoDia($idProjeto,$date);                       
            $emAberto = $this->db->orientacaoEmAberto($idProjeto);
            
            if(sizeof($mesmoDia) > 0)
            {
                throw new Exception("Não foi possível agendar. Ja existe um agendamento para hoje.");   
            }
                
            if(sizeof($emAberto) > 0)
            {
                throw new Exception("Não foi possível agendar. Ainda existe uma orientacao em aberto.");
            }            
        }                
    }
?>