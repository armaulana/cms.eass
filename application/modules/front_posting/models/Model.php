<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
	}

	function blog($num,$offset,$id_kat){
		$this->db->select('*'); 
		$this->db->from('bucket_posting a');
		$this->db->where('a.id_kat', $id_kat);
		$this->db->join('bucket_posting_category b','a.id_kat = b.id', 'left');
        $this->db->order_by('a.tanggal_posting', 'ASC');
		$query = $this->db->get();
		return $query->result();
    }
    
    function kategori_berita($num,$offset,$kat){
        $this->db->limit($num,$offset);
        $this->db->select('a.slug, a.judul, a.tanggal_posting, a.foto, a.deskripsi, b.nm_kat, a.insert_by');
		$this->db->where('a.id_kat', $kat);
		$this->db->where('a.is_trash', 1);
		$this->db->where('b.is_trash', 1); 
        $this->db->join('bucket_kategori b','a.id_kat = b.id', 'right');
        $this->db->order_by('a.tanggal_posting', 'DESC');
		$query = $this->db->get('bc_indag_p_blog a');
		return $query->result();
    }

}

?>