<?php

function loadTemplate($view, $data = []){
	CI =& get_instance();
	$CI->load->view('template/header');
	$CI->load->view($view, $data);
	$CI->load->view('template/footer');
}