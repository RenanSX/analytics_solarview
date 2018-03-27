<?php
class Infoinversor {

	private $atualizadoEm;
	private $correnteFaseA;
	private $correnteFaseB;
	private $correnteFaseC;
	private $tensaoLinhaAB;
	private $tensaoLinhaBC;
	private $tensaoLinhaCA;
	private $tensaoFaseAN;
	private $tensaoFaseBN;
	private $tensaoFaseCN;
	private $potenciaAC;
	private $frequenciaDaLinha;
	private $fatorDePotencia;
	private $energiaAC;
	private $horasInjecao;
	private $correnteDC;
	private $tensaoDC;
	private $potenciaDC;
	private $correnteCCString2;
	private $tensaoCCString2;
	private $temperaturaOutro;

	public function __construct(){}

	public function get($atributo){  return $this->$atributo;  }

	public function set($atributo, $valor){  $this->$atributo = $valor; }

}