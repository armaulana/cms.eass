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
        $this->db->from($this->table);

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
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_data($kode){
        $this->db->where('id', $kode);
        $hsl=$this->db->get('bucket_sdm');
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'status' => TRUE
                    );
            }
        }else{
                $hasil=array(
                    'status' => false,
                );
        }
        return $hasil;
    }

    function get_by_id($id){
        $this->db->from('setting_profile');
        $this->db->where($this->idq,$id);
        $query = $this->db->get();
        return $query->row();
    }

    function update($where, $data){
        $this->db->update('setting_profile', $data, $where);
        return $this->db->affected_rows();
    }

    public function get_provinsi()
    {
            $this->db->order_by('nama_provinsi', 'asc');
            return $this->db->get('ref_provinsi')->result();
    }
 
    public function get_kota()
    {
            // kita joinkan tabel kota dengan provinsi
            $this->db->order_by('nama_kota', 'asc');
            $this->db->join('ref_provinsi a', 'b.id_provinsi_fk = a.id_provinsi');
            return $this->db->get('ref_kota b')->result();
    }
 
    public function get_kecamatan()
    {
            // kita joinkan tabel kecamatan dengan kota
            $this->db->order_by('nama_kecamatan', 'asc');
            $this->db->join('ref_kota a', 'b.id_kota_fk = a.id_kota');
            return $this->db->get('ref_kecamatan b')->result();
    }
 
 
        // untuk edit ambil dari id level paling bawah
    public function get_selected_by_id_kecamatan($id_kecamatan)
    {
            $this->db->where('id_kecamatan', $id_kecamatan);
            $this->db->join('ref_kota a', 'c.id_kota_fk = a.id_kota');
            $this->db->join('ref_provinsi b', 'a.id_provinsi_fk = b.id_provinsi');
            return $this->db->get('ref_kecamatan c')->row();
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