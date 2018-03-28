<?php

class Analytics_Controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Analytics_Model', 'am');
		$this->load->helper('template');
	}

	public function index(){
		$parametros = $this->am->consultaParametros();

		for ($i=0; $i < count($parametros); $i++) { 
			if($parametros[$i] == "atualizadoEm"){
				unset($parametros[$i]);
			}
		}

		$dados['parametros'] = $parametros;

		loadTemplate('home', $dados);
		
	}

	public function buscaInformacoes(){
		$this->load->helper('converter_datas');

		$parametros = $this->input->post();
		$arrayDatas = array();
		if(array_key_exists('data1', $parametros)){
			$arrayDatas['data1'] = $parametros['data1'];
			unset($parametros['data1']);
		}
		if(array_key_exists('data2', $parametros)){
			$arrayDatas['data2'] = $parametros['data2'];
			unset($parametros['data2']);
		}

		/*$strParametros = "";

		foreach ($parametros as $parametro) {
			$strParametros .= $parametro.",";
		}*/

		$data1 = dataPadraoBanco($arrayDatas['data1']);
		$data2 = dataPadraoBanco($arrayDatas['data2']);

		$result = $this->am->buscaInformacoes($parametros, $data1, $data2);
		var_dump($result);
		exit();

		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($result));
	}

	public function buscaParametros(){
		$parametros = $this->am->consultaParametros();

		for ($i=0; $i < count($parametros); $i++) { 
			if($parametros[$i] == "atualizadoEm"){
				unset($parametros[$i]);
			}
		}

		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($parametros));

	}

}