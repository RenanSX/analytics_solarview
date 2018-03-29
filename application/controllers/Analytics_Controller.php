<?php

class Analytics_Controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Analytics_Model', 'am');
		$this->load->helper('template');
	}

	public function index(){
		//busca os parametros
		$parametros = $this->am->consultaParametros();

		//retira o campo de data do banco
		for ($i=0; $i < count($parametros); $i++) { 
			if($parametros[$i] == "atualizadoEm"){
				unset($parametros[$i]);
			}
		}

		//envia os dados para a página
		$dados['parametros'] = $parametros;
		loadTemplate('home', $dados);
		
	}

	public function buscaInformacoes(){
		//carrega o helper de datas
		$this->load->helper('converter_datas');

		//recebe os dados da pagina via ajax
		$parametros = $this->input->post();
		$arrayDatas = array();

		//Separa das datas do array de parametros
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

		//seta as datas em outro array
		$data1 = dataPadraoBanco($arrayDatas['data1']);
		$data2 = dataPadraoBanco($arrayDatas['data2']);

		//resultado do banco
		$result = $this->am->buscaInformacoes($parametros, $data1, $data2);


		//Cria um novo array de resultado formatado para colocar no gráfico
		$arrayResult = array();
		foreach ($result as $key => $value) {
			$object = new stdClass();

			$newvalue = str_replace("'", "", $value);
			
			$arrayResult[$key]['name'] = $object->name = $key;
			$arrayResult[$key]['data'] = $object->data = $newvalue;
		}


		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($arrayResult));
	}

	public function buscaParametros(){
		//Recebe os dados da pagina via ajax
		$parametros = $this->am->consultaParametros();

		//retira o campo de data do banco
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