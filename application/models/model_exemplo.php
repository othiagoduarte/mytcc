<?php
/*
CREATE TABLE model_exemplo (
 id,
 nome,
);
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Exemplo extends My_Model {

    public $nome = "";
    
    public function __construct(){
	   	parent::__construct();
           $this->set_tabela(get_class($this));        
    }
    
}