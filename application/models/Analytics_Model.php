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
		$novoarray = [];
		//recebe a quantidade de parametros, faz um select pela quantidade de parametros que existem
		foreach ($parametros as $parametro) {

			$this->db->select($parametro);
			$this->db->from('infoinversor');
			$this->db->where('atualizadoEm >=', $data1);
			$this->db->where('atualizadoEm <=', $data2);

			$resultado = $this->db->get()->result_array();

			//cria um novo array pra deixar apenas os valores
			foreach ($resultado as $r) {
				$novoarray[$parametro][] = $r[$parametro];
			}
			
			$arrayResult[$parametro] = $novoarray[$parametro];
		}
		
		return $arrayResult;
	}
}

