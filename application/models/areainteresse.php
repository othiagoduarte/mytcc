<?php
/*
CREATE TABLE AreaInteresse (
 idAreaInteresse INT NOT NULL,
 nomeArea VARCHAR(50) NOT NULL
);
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class AreaInteresse extends My_Model {

    public $nomeArea = "";
    
    public function __construct(){
	   	parent::__construct();
           $this->set_tabela(get_class($this));        
    }
    
}
