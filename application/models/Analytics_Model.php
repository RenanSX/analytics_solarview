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
		$arrayResult = array();
		$teste = [];
		foreach ($parametros as $parametro) {

			$this->db->select($parametro);
			$this->db->from('infoinversor');
			$this->db->where('atualizadoEm >=', $data1);
			$this->db->where('atualizadoEm <=', $data2);

			$resultado = $this->db->get()->result_array();


			foreach ($resultado as $r) {

					$teste[$parametro][] = $r[$parametro];
			}
			
			$arrayResult[$parametro] = $teste[$parametro];
		}
		
		return $arrayResult;
	}
}

