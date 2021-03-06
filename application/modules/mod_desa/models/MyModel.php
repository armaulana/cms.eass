<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyModel extends CI_Model{
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
        $this->db->select('a.lib_id, a.id_desa, d.nama_provinsi, c.nama_kota, b.nama_kecamatan, a.nama_desa, a.status');
        $this->db->join('bucket_ref_kecamatan b', 'a.id_kecamatan_fk = b.id_kecamatan', 'left');
        $this->db->join('bucket_ref_kota c', 'a.id_kota_fk = c.id_kota', 'left');
        $this->db->join('bucket_ref_provinsi d', 'a.id_provinsi_fk = d.id_provinsi', 'left');
        $this->db->from('bucket_ref_desa a');
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
        $this->db->select('a.id_desa, d.nama_provinsi, c.nama_kota, b.nama_kecamatan, a.nama_desa, a.status');
        $this->db->join('bucket_ref_kecamatan b', 'a.id_kecamatan_fk = b.id_kecamatan', 'left');
        $this->db->join('bucket_ref_kota c', 'a.id_kota_fk = c.id_kota', 'left');
        $this->db->join('bucket_ref_provinsi d', 'a.id_provinsi_fk = d.id_provinsi', 'left');
        $this->db->from('bucket_ref_desa a');
        return $this->db->count_all_results();
    }

    function save($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function cek_id($id){
        $this->db->select('count(*) as total');
        $this->db->from('bucket_ref_desa');
        $this->db->where($this->idq,$id);
        $query = $this->db->get();
        return $query->row();
    }

    function get_by_id($id){
        $this->db->from('bucket_ref_desa');
        $this->db->where('lib_id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    function update($where, $data){
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    function delete_by_id($id){
        $this->db->where($this->idq, $id);
        $this->db->delete($this->table);
    }
 
    public function get_provinsi(){
            $this->db->order_by('nama_provinsi', 'asc');
            return $this->db->get('bucket_ref_provinsi')->result();
    }

    public function get_kota(){
            // joinkan tabel kota dengan provinsi
            $this->db->order_by('nama_kota', 'asc');
            $this->db->join('bucket_ref_provinsi a', 'b.id_provinsi_fk = a.id_provinsi');
            return $this->db->get('bucket_ref_kota b')->result();
    }
 
    public function get_kecamatan(){
            // joinkan tabel kecamatan dengan kota
            $this->db->order_by('nama_kecamatan', 'asc');
            $this->db->join('bucket_ref_kota a', 'b.id_kota_fk = a.id_kota');
            return $this->db->get('bucket_ref_kecamatan b')->result();
    }
 
    // untuk edit ambil dari id level paling bawah
    public function get_selected_by_id_kecamatan($id_kecamatan){
            $this->db->select('a.id_kecamatan,a.id_kota_fk,a.nama_kecamatan,b.id_kota,b.id_provinsi_fk,b.nama_kota');
            $this->db->where('id_kecamatan', $id_kecamatan);
            $this->db->join('bucket_ref_kota b', 'a.id_kota_fk = b.id_kota');
            return $this->db->get('bucket_ref_kecamatan a')->row();
    }

    function CheckAllowAccess($mod){
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

?>