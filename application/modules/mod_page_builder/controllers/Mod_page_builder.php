<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_page_builder extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('MyModel');
		$this->load->model('ModelMenu');
	}

	private function template($content,$data=null){
		if(!$this->ion_auth->logged_in()){
			redirect('auth/login', 'refresh');
		}elseif ($this->ion_auth->is_user()){
			redirect('auth/login', 'refresh');
		}else{
			$data['content'] = $this->load->view($content,$data,true);
			$this->load->view('2_back/template', $data);
		}
	}

	public function index(){
		$CheckAllowAccess = $this->MyModel->CheckAllowAccess(get_class($this));
		if($CheckAllowAccess[0]['access_show'] == null){
			redirect('mod_dashboard');
		}
		if($CheckAllowAccess[0]['access_show'] == 0 or $CheckAllowAccess[0]['access_show'] == ''){ 
			redirect('mod_dashboard', 'refresh'); 
		}
		if (!$this->ion_auth->logged_in()){
			redirect('auth', 'refresh');
		}
		$data['CheckAllowAccess'] 		= $this->MyModel->CheckAllowAccess(get_class($this));
		$data['last_login']				= $this->MyModel->last_login($this->session->userdata('user_id'));
		$data['menu_active_parent'] 	= 'Page Builder';
		$data['menu_active_sub'] 		= '';
		$data['menu_active_sub1'] 		= '';
		$data['title'] 					= 'Page Builder';
		$data['exsist']					= $this->db->order_by('page_order', 'asc')->get('page_builder')->result();
		$this->load->view('view', $data);
	}

	function ajax_add(){
		$this->load->helper('directory');
		$this->load->helper('file');
		
		$dir_fiels = directory_map('./application/views/1_front_home/');
		$len = sizeOf($dir_fiels);
		for($i=0; $i<$len;$i++){
			unlink('./application/views/1_front_home/'.$dir_fiels[$i]);
		}

		if($this->input->post('action') == 'send'){
			$this->db->where('id IS NOT NULL');
      		$this->db->delete('page_builder');

			$dom = new DOMDocument();
			@$dom->loadHtml($this->input->post('content'));
			$x = new DOMXpath($dom);

			$i = 1;
			foreach($x->query('//section[@class="container"]') as $table){
				$data = array(
					'page_judul_title' => 'section '.$i,
					'page_title' => 'section '.$i,
			    	'page_url' => '1_front_home/'.$i.'section.php',
			    	'page_order' => $i,
			    	'crud_title' => 0,
			    	'crud_aktif' => 0,
			    	'extra_crud_aktif' => 0,
			    	'deskripsi' => '-',
			    	'kontent' => '-',
			    	'foto' => '-',
					'status' => '-',
					'video' => '-',
			    	'source' => $table->C14N(),
			    	'status' => 1
				);
			    $this->db->insert('page_builder', $data);
			    $content = $table->C14N(); 
				if (!write_file('./application/views/1_front_home/'.$i.'section.php', $content)) {
					echo "Unable write ";
				}else{
					echo "Write";
				}
			    $i++;
			}
		}else{
			echo "Error";
		}
	}

	function walKul($ul, &$ar){
 		foreach( $ul->children as $li )
        {
            if ( $li->tag != "li" )
            {
                continue;
            }
            $arar = array( );
            foreach( $li->children as $ulul )
            {
                if ( $ulul->tag != "ul" )
                {
                    continue;
                }
                $this->walKul( $ulul, $arar );
            }
            $ar[ $li->find( "a", 0 )->plaintext ] = $arar;
        }
	}

	function write(){
		require_once(APPPATH.'libraries/simplehtmldom/simple_html_dom.php');
		$dom = file_get_html("./test.php");
		$arr = array();
		$this->walKul($dom->find("ul", 0), $arr);
		print_r($arr);
	}

	function coba(){
		require_once(APPPATH.'libraries/simplehtmldom/simple_html_dom.php');
		$html = file_get_html('./section.php');
		$first_level_items = $html->find('section', 0)->children();
		foreach($first_level_items as $item){
			echo "section<br/>";
		}
	}
}

?>