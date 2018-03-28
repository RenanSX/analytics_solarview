<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Analytics_Model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function consultaParametros(){
	  $campos = $this->db->list_fields('infoinversor');

	  return $campos;
	}

	public function buscaInformacoes($parametros, $data1, $data2){
		$this->db->select($parametros);
		$this->db->from('infoinversor');
		$this->db->where('atualizadoEm >=', $data1);
		$this->db->where('atualizadoEm <=', $data2);
		return $this->db->get()->result_array();
	}
}

