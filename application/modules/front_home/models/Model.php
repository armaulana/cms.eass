<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model extends CI_Model {

	function __construct(){
		// Call the Model constructor
		parent::__construct();
	}

    function block(){
        $this->db->order_by('page_order');
        $this->db->where('status', 1);
        $query = $this->db->get('page_builder');
        return $query->result();
    }    

    function slider(){
        $this->db->select('a.slug, a.judul, a.deskripsi, a.tanggal_posting, a.jam, a.foto, b.nm_kat');
        $this->db->from('bucket_posting a');
        $this->db->join('bucket_posting_category b', 'b.id = a.id_kat', 'left');
        $this->db->where('a.slider', 1);
        $this->db->where('a.is_trash', 1);
        $this->db->limit(4);
        $this->db->order_by('a.tanggal_posting', 'DESC');
        return $query = $this->db->get()->result();
    }

    function posting(){
        $this->db->select('a.slug, a.judul, a.deskripsi, a.tanggal_posting, a.jam, a.foto, b.nm_kat');
        $this->db->from('bucket_posting a');
        $this->db->join('bucket_posting_category b', 'b.id = a.id_kat', 'left');
        $this->db->where('a.is_trash', 1);
        $this->db->limit(3);
        $this->db->order_by('a.tanggal_posting', 'DESC');
        return $query = $this->db->get()->result();
    }

    function profile(){
        $query = $this->db->get('setting_profile');
        return $query->row();
    }

	function waktu_lalu($timestamp){
        $selisih    = time() - strtotime($timestamp) ;
     
        $detik      = $selisih ;
        $menit      = round($selisih / 60 );
        $jam        = round($selisih / 3600 );
        $hari       = round($selisih / 86400 );
        $minggu     = round($selisih / 604800 );
        $bulan      = round($selisih / 2419200 );
        $tahun      = round($selisih / 29030400 );
     
        if ($detik <= 60) {
            $waktu = $detik.' detik yang lalu';
        } else if ($menit <= 60) {
            $waktu = $menit.' menit yang lalu';
        } else if ($jam <= 24) {
            $waktu = $jam.' jam yang lalu';
        } else if ($hari <= 7) {
            $waktu = $hari.' hari yang lalu';
        } else if ($minggu <= 4) {
            $waktu = $minggu.' minggu yang lalu';
        } else if ($bulan <= 12) {
            $waktu = $bulan.' bulan yang lalu';
        } else {
            $waktu = $tahun.' tahun yang lalu';
        }
        
        return $waktu;
    }
}
