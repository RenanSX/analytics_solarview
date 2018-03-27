<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'models/infoinversor.php'); 


class Analytics_Model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function consultaInfoinversor(){
	   $lista_objetos = []; 
	   $lista_dados = $this->db->get('infoinversor')->result();
	   
	   foreach($lista_dados as $linha){
	      $objInfoinversor = $this->arrayToObject($linha);
	      array_push($lista_objetos, $objInfoinversor);
	   }

	   return $lista_objetos;
	}



	public function arrayToObject($dados){

	  $objInfoinversor = new Infoinversor(); 

	  $objInfoinversor->set('atualizadoEm', $dados->atualizadoEm);
	  $objInfoinversor->set('correnteFaseA', $dados->correnteFaseA); 
	  $objInfoinversor->set('correnteFaseB', $dados->correnteFaseB); 
	  $objInfoinversor->set('correnteFaseC', $dados->correnteFaseC); 
	  $objInfoinversor->set('tensaoLinhaAB', $dados->tensaoLinhaAB); 
	  $objInfoinversor->set('tensaoLinhaBC', $dados->tensaoLinhaBC); 
	  $objInfoinversor->set('tensaoLinhaCA', $dados->tensaoLinhaCA); 
	  $objInfoinversor->set('tensaoFaseAN', $dados->tensaoFaseAN); 
	  $objInfoinversor->set('tensaoFaseBN', $dados->tensaoFaseBN); 
	  $objInfoinversor->set('tensaoFaseCN', $dados->tensaoFaseCN); 
	  $objInfoinversor->set('potenciaAC', $dados->potenciaAC); 
	  $objInfoinversor->set('frequenciaDaLinha', $dados->frequenciaDaLinha); 
	  $objInfoinversor->set('fatorDePotencia', $dados->fatorDePotencia); 
	  $objInfoinversor->set('energiaAC', $dados->energiaAC); 
	  $objInfoinversor->set('horasInjecao', $dados->horasInjecao); 
	  $objInfoinversor->set('correnteDC', $dados->correnteDC); 
	  $objInfoinversor->set('tensaoDC', $dados->tensaoDC); 
	  $objInfoinversor->set('potenciaDC', $dados->potenciaDC); 
	  $objInfoinversor->set('correnteCCString2', $dados->correnteCCString2); 
	  $objInfoinversor->set('tensaoCCString2', $dados->tensaoCCString2); 
	  $objInfoinversor->set('temperaturaOutro', $dados->temperaturaOutro);

	  return $objInfoinversor;

	}
}

