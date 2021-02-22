<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class myModel extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

    function last_login($user_id){
        $this->db->where('id', $user_id);
        return $this->db->get('users')->result();
    }

	function all(){
        return $this->db->get($this->table);
    }
    
    function check_allow_access($mod){
        if($this->session->userdata('user_id') == ''){
            redirect('auth');
        }else{
            $sql = ("
            SELECT *
            FROM (SELECT
                    a.id,
                    `d`.`access_show`,
                    `d`.`access_add`,
                    `d`.`access_detail`,
                    `d`.`access_edit`,
                    `d`.`access_delete`
                FROM users a
                    LEFT JOIN users_groups b
                    ON b.user_id = a.id
                    LEFT JOIN groups c
                    ON c.id = a.users_level_id
                    LEFT JOIN users_access2 d
                    ON d.users_level_id = a.users_level_id
                    LEFT JOIN master_menu_administrator e
                    ON e.id = d.users_menu_id
                WHERE e.link = '".strtolower($mod)."') sub
            WHERE sub.id = ".$this->session->userdata('user_id').";");
            $query = $this->db->query($sql);
            return $query->result_array();  
        }
    }
}