<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instaapi extends CI_Controller {

	function __construct() {

		parent::__construct();

		$this->load->model('admin_model');
		$this->load->model('insta_model');


	}

	public function get_tarefas_ativas()
	{

        $response = $this->insta_model->get_tarefas_ativas();

		print_r(json_encode($response));
	}

    public function get_tarefas_finalizadas()
	{

        $response = $this->insta_model->get_tarefas_finalizadas();

		print_r(json_encode($response));
	}

    public function update_tarefa_status()
	{
        $tarefa_id = htmlspecialchars($this->input->get('tarefa_id'));
        $tarefa_status = htmlspecialchars($this->input->get('tarefa_status'));

        $response = $this->insta_model->update_tarefa_status($tarefa_id, $tarefa_status);

        if ($response) {
            $response = array('status' => 'true', 'message' => 'Concluido');
        } else {
            $response = array('status' => 'false', 'message' => 'Erro');

        }

		print_r(json_encode($response));
	}

    public function add_instalead_demanda()
	{
        $data['tarefa_id'] = htmlspecialchars($this->input->post('tarefa_id'));
        $data['tag_id'] = htmlspecialchars($this->input->post('tag_id'));
        $data['username'] = htmlspecialchars($this->input->post('username'));
        $data['full_name'] = htmlspecialchars($this->input->post('full_name'));
        $data['interacao_tipo'] = htmlspecialchars($this->input->post('interacao_tipo'));
        $data['interacao_conteudo'] = htmlspecialchars($this->input->post('interacao_conteudo'));
        $data['interacao_data'] = htmlspecialchars($this->input->post('interacao_data'));
        $data['post_id'] = htmlspecialchars($this->input->post('post_id'));
        $data['post_slug'] = htmlspecialchars($this->input->post('post_slug'));
        $data['post_data'] = htmlspecialchars($this->input->post('post_data'));
        $data['post_descricao'] = htmlspecialchars($this->input->post('post_descricao'));
        $data['post_imagem'] = htmlspecialchars($this->input->post('post_imagem'));

        if ($this->insta_model->check_lead_demanda($data['username'], $data['post_id'], $data['tarefa_id'], $data['tag_id'])) {

            echo "Ja existe";

        } else {

            $response = $this->insta_model->add_instalead_demanda($data);
        }

        if ($response) {
            $response = array('status' => 'true', 'message' => 'Concluido');
        } else {
            $response = array('status' => 'false', 'message' => 'Erro');

        }

		print_r(json_encode($response));
	}

    public function add_instalead()
	{
        $data['tarefa_id'] = htmlspecialchars($this->input->post('tarefa_id'));
        $data['tag_id'] = htmlspecialchars($this->input->post('tag_id'));
        $data['username'] = htmlspecialchars($this->input->post('username'));
        $data['full_name'] = htmlspecialchars($this->input->post('full_name'));
        $data['is_private'] = htmlspecialchars($this->input->post('is_private'));
        $data['biografia'] = htmlspecialchars($this->input->post('biografia'));
        $data['links'] = htmlspecialchars($this->input->post('links'));
        $data['mencoes'] = htmlspecialchars($this->input->post('mencoes'));
        $data['categoria'] = htmlspecialchars($this->input->post('categoria'));
        $data['email'] = htmlspecialchars($this->input->post('email'));
        $data['telefone'] = htmlspecialchars($this->input->post('telefone'));
        $data['convertido'] = htmlspecialchars($this->input->post('convertido'));

        if ($data['email'] == "False") {
            $data['email'] = "";
        }
        
        if ($data['telefone'] == "False") {
            $data['telefone'] = "";
        }

        if ($this->insta_model->check_lead($data['username'], $data['post_id'], $data['tarefa_id'], $data['tag_id'])) {

            echo "Ja existe";

        } else {

            $response = $this->insta_model->add_instalead($data);
        }

        if ($response) {
            $response = array('status' => 'true', 'message' => 'Concluido');
        } else {
            $response = array('status' => 'false', 'message' => 'Erro');

        }

		print_r(json_encode($response));
	}
   
}