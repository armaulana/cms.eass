<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model {

	function __construct()
	{
				// Call the Model constructor
		parent::__construct();
	}

	function berita($num,$offset)
	{

		$this->db->select('*'); 
		$this->db->limit($num,$offset);
        $this->db->where('a.is_trash', 1);
        $this->db->where('b.is_trash', 1); 
		$this->db->join('bucket_kategori b','a.id_kat = b.id', 'right');
        $this->db->order_by('a.tanggal_posting', 'DESC');

		$query = $this->db->get('bucket_blog a');
		return $query->result();

    }
    
    function kategori_berita($num,$offset,$kat)
	{

		$this->db->limit($num,$offset);
		$this->db->where('a.id_kat', $kat);
		$this->db->where('a.is_trash', 1);
		$this->db->where('b.is_trash', 1); 
		$this->db->join('bucket_kategori b','a.id_kat = b.id', 'right');

		$query = $this->db->get('bucket_blog a');
		return $query->result();

	}

	function waktu_lalu($timestamp)
    {
        $selisih = time() - strtotime($timestamp) ;
     
        $detik = $selisih ;
        $menit = round($selisih / 60 );
        $jam = round($selisih / 3600 );
        $hari = round($selisih / 86400 );
        $minggu = round($selisih / 604800 );
        $bulan = round($selisih / 2419200 );
        $tahun = round($selisih / 29030400 );
     
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
