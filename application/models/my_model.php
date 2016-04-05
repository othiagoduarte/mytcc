<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#classe padrão para a modelagem de dados
#$autoload['model'] = array('my_model');

class My_Model extends CI_Model {
	
	public $id = 0;
	private $tabela = ""; 
  	
	public function __construct(){
	   	parent::__construct();
	}
	
	public function set_tabela($tabela){
		$this->tabela = $tabela;
	}
	
	public function get_table(){
		return $this->tabela;																			#definir o nome da table onde os dados serão salvos
	}
	
	public function get_all($lmt = 0){
		
		$this->conectarDB();
		if ($lmt > 0) {
			$this->db->limit($lmt);
		}	
		
		return $this->db->get($this->get_table())->result();
	} 
	   
	public function get_by_id($id)	{
		
		$this->conectarDB();
		
		$result = $this->db->get_where( $this->get_table() , array('id' => $id) )->result();
		
		if (count($result) > 0 ) {
			return $result[0];
		}else {
			return null();
		}				
	}
			
	public function insert(){	
		$this->conectarDB();
		$this->db->insert($this->get_table(),$this);		
	}	
	
	public function update(){
		$this->conectarDB();
		$this->db->update($this->get_table(), $this, array('id' => $this->id ) );
	}
	
	public function delete(){		
		$this->conectarDB();
		$this->db->delete($this->get_table(), array('id' => $this->id)); 
	}
	
	public function begintrans(){
		$this->db->trans_start();	
	}
	
	public function rollback(){
		$this->db->trans_off();	
	}
	
	public function commit(){
		$this->db->trans_complete();
	}
	
	public function conectarDB(){
		return $this->load->database();
	}
	
	public function teste(){
		echo "Model ".get_class($this)." esta funcionando !!";
	}	
}