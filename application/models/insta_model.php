<?php
defined('BASEPATH') or exit('No direct script access allowed');

class insta_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->database();
    }

    public function get_tarefas_ativas()
	{
        $this->db->where('tarefa_status', 1);
        $this->db->where('is_deleted', 0);

        return $this->db->get('persona_tarefas')->result();

    }

    public function get_tarefas_finalizadas()
	{
        $this->db->where('tarefa_status', 3);
        $this->db->where('is_deleted', 0);

        return $this->db->get('persona_tarefas')->result();

    }

    public function update_tarefa_status($tarefa_id, $tarefa_status)
	{
        // 3 processando
        // 4 - finalizado

        $this->db->where('id', $tarefa_id);

        $data = array(
            'tarefa_status' => $tarefa_status
        );

        return $this->db->update('persona_tarefas', $data);

    }

    public function check_lead($username, $tarefa_id, $tag_id) {

        $this->db->where('username', $username);
        $this->db->where('tarefa_id', $tarefa_id);
        $this->db->where('tag_id', $tag_id);

        return $this->db->get('insta_leads')->row_array();

    }

    public function check_lead_demanda($username, $post_id, $tarefa_id, $tag_id) {
        
        $this->db->where('username', $username);
        $this->db->where('tarefa_id', $tarefa_id);
        $this->db->where('tag_id', $tag_id);
        $this->db->where('post_id', $post_id);

        return $this->db->get('insta_leads_demandas')->row_array();

    }

    public function add_instalead_demanda($data) {
        return $this->db->insert('insta_leads_demandas', $data);
    }


    public function add_instalead($data) {
        return $this->db->insert('insta_leads', $data);
    }

 

}