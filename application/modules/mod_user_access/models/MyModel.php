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

    function _get_datatables_query(){
        $cek_user_id = $this->db->select('count(*) as total')->where('users_level_id', $this->input->post('users_level_id'))->get('users_access2')->row();
        if($cek_user_id->total > 0 ){

        }else{
            $this->db->where('id', 0);
        }

        $this->db->order_by('sort', 'asc');
        $this->db->from('master_menu_administrator');
        
        $i = 0;
        foreach ($this->column_search as $item){
            if($_POST['search']['value']){
                if($i===0) {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else{
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;

        }
         if(isset($_POST['order'])){
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables(){
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered(){
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all(){
        $this->db->from('master_menu_administrator');
        return $this->db->count_all_results();
    }

    function save($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function get_by_id($id){
        $this->db->from($this->table);
        $this->db->where($this->idq,$id);
        $query = $this->db->get();
        return $query->row();
    }

    function update($where, $data){
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    function delete_by_id($where, $data){
        $this->db->update('users_access2', $data, $where);
        return $this->db->affected_rows();
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