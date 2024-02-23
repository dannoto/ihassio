<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_xmailer extends CI_Controller {
    # Api resposanvel por receber interacoes do redirecionar ofertas.run

	function __construct() {

		parent::__construct();
		$this->load->model('admin_model');
	}


    public function get_campanhas() {
        
        $campanhas = $this->admin_model->get_campanhas();


        if ($campanhas) {
            print_r(json_encode($campanhas));
        }
    }


}