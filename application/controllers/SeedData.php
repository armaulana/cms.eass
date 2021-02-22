<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SeedData extends CI_Controller {

	function __construct()
    {
        parent::__construct();
 		 // initiate faker
        $this->faker = Faker\Factory::create();
 		
 		 // load any required models
        $this->load->model('user_model');
    }
 	
 	function index()
 	{
 		$data['users'] = $this->user_model->get();
 		$this->load->view('seed', $data);
 	}
    /**
     * seed local database
     */
    function seed()
    {
        // purge existing data
        //$this->_truncate_db();
 
        // seed users
        //$this->_seed_kategori_barang(10);
        //$this->_seed_barang(5);
        //$this->_seed_gedung(5);
        $this->_seed_ruangan(5);
 
        // call more seeds here...
    }
 
    /**
     * seed users
     *
     * @param int $limit
     */
    //function _seed_users($limit)
    //{
    //    for ($i = 0; $i < $limit; $i++) {
    //        $data = array(
    //            'username' => $this->faker->unique()->userName, // get a unique nickname
    //            'password' => md5('12345'), // run this via your password hashing function
    //            'firstname' => $this->faker->firstName,
    //            'lastName' => $this->faker->lastName,
    //            'gender' => rand(0, 1) ? 'male' : 'female',
    //            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, rem, est! Omnis perferendis, nisi obcaecati modi aliquam, neque! Culpa quia, animi itaque numquam praesentium nemo ut repudiandae eius, debitis nulla.',
    //            'address' => $this->faker->streetAddress,
    //            'city' => $this->faker->city,
    //            'state' => $this->faker->state,
    //            'country' => $this->faker->country,
    //            'postcode' => $this->faker->postcode,
    //            'email' => $this->faker->email,
    //            'email_verified' => mt_rand(0, 1) ? '0' : '1',
    //            'phone' => $this->faker->phoneNumber,
    //            'birthdate' => $this->faker->dateTimeThisCentury->format('Y-m-d H:i:s'),
    //            'registration_date' => $this->faker->dateTimeThisYear->format('Y-m-d H:i:s'),
    //            'ip_address' => mt_rand(0, 1) ? $this->faker->ipv4 : $this->faker->ipv6,
    //            'status' => $i === 0 ? true : rand(0, 1),
    //        );
    //        $this->user_model->insert($data);
    //    }
 	//	$this->session->set_flashdata('message', 'Database Seeds Successfully 25 Records Added In Database');
    //    redirect('seeddata/index', 'location');
    //}

    function _seed_kategori_barang($limit)
    {
        for ($i = 0; $i < $limit; $i++) {     
 
            $data = array(
                'kd_kat' => 'KD-'.rand(), // get a unique nickname
                'nm_kat' => 'kategori barang '.$i, // run this via your password hashing function
                'insert_date' => $this->faker->dateTimeThisCentury->format('Y-m-d H:i:s'),
                'insert_by' => 1,
                'is_trash' => 1,
            );
 
            $this->db->insert('bucket_kategori_barang', $data);
        }
 		//$this->session->set_flashdata('message', 'Database Seeds Successfully 25 Records Added In Database');
        //redirect('seeddata/index', 'location');
    }

    function _seed_barang($limit)
    {
        for ($i = 0; $i < $limit; $i++) {     
 
            $data = array(
                'id_kat' => '1305', // get a unique nickname
                'kd_brg' => 'KDB-'.rand(), // run this via your password hashing function
                'nm_brg' => 'Barang '.$i, // run this via your password hashing function
                'insert_date' => $this->faker->dateTimeThisCentury->format('Y-m-d H:i:s'),
                'insert_by' => 1,
                'is_trash' => 1,
            );
 
            $this->db->insert('bucket_barang', $data);
        }
 		//$this->session->set_flashdata('message', 'Database Seeds Successfully 25 Records Added In Database');
        //redirect('seeddata/index', 'location');
    }

    function _seed_gedung($limit)
    {
        for ($i = 0; $i < $limit; $i++) {     
 
            $data = array(
                'kd_gedung' => 'KD-'.rand(), // run this via your password hashing function
                'nm_gedung' => 'Gedung '.$i, // run this via your password hashing function
                'insert_date' => $this->faker->dateTimeThisCentury->format('Y-m-d H:i:s'),
                'insert_by' => 1,
                'is_trash' => 1,
            );
 
            $this->db->insert('bucket_gedung', $data);
        }
 		//$this->session->set_flashdata('message', 'Database Seeds Successfully 25 Records Added In Database');
        //redirect('seeddata/index', 'location');
    }

    function _seed_ruangan($limit)
    {
        for ($i = 0; $i < $limit; $i++) {
            $data = array(
                'id_gedung' => '16', // run this via your password hashing function
                'kd_ruang' => 'KD-'.rand(), // run this via your password hashing function
                'nm_ruang' => 'Ruangan '.$i,
                'insert_date' => $this->faker->dateTimeThisCentury->format('Y-m-d H:i:s'),
                'insert_by' => 1,
                'is_trash' => 1,
            );
 
            $this->db->insert('bucket_ruang', $data);
        }
 		//$this->session->set_flashdata('message', 'Database Seeds Successfully 25 Records Added In Database');
        //redirect('seeddata/index', 'location');
    }

    private function _truncate_db()
    {
        $this->user_model->truncate();
    }



}

/* End of file user.php */
/* Location: ./application/controllers/user.php */