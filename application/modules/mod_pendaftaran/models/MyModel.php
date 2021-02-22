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
}

?>