<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	function __construct()
  	{
		parent::__construct();
		$this->load->helper("Response_helper");
		$this->load->helper("Input_helper");
		date_default_timezone_set('Asia/Jakarta');
		// if(!isset($_SESSION['kode_user'])){
		// 	redirect(base_url());
		// }
		if($this->uri->segment(3) == "add" && $_SERVER['REQUEST_METHOD'] == "POST"){
		  $this->store($this->uri->segment(4));
		}else if($this->uri->segment(3) == "edit" && $_SERVER['REQUEST_METHOD'] == "POST"){
		  $this->update($this->uri->segment(4), $this->uri->segment(5));
		}
    }
    public function index(){
		$data['title'] = "Data Pengguna";
		$data['content'] = "pengguna/index";
		// $data['uri'] = base_url(uri_string());
		// echo "<pre>";
		// print_r($data);
        $this->load->view('backend/index',$data);
    }
	
	public function add()
	{
		$data['title'] = "Tambah Pengguna";
		$data['content'] = "pengguna/_form";
		$data['data'] = null;		
		$this->load->view('backend/index',$data);
	}

	public function store(){
		$d = $_POST;
		try{
			$kode = $this->Maksi->random_oke(16);
			$password= $this->input->post('password');
			$arr =
			[
				'kode_user' => $kode,
				'kode_role' => $this->input->post('kode_role'), 
				'nama_user' => $this->input->post('nama_user'), 
				'akses_data' => $this->input->post('akses_data'), 
				'email' => $this->input->post('email'), 
				'create_by' => $_SESSION['kode_user'],  
				'create_at' => date('Y-m-d H:i:s'),
				'password' => password_hash($password, PASSWORD_BCRYPT), 
				'status' => 1
			];
			$this->db->insert("pengguna",$arr);
			$this->session->set_flashdata("message", ['success', 'Berhasil Tambah Data Pengguna', ' Berhasil']);
			redirect(base_url("admin/pengguna/".$this->input->post('kode_role')));
			
		}catch(Exception $e){
			$this->session->set_flashdata("message", ['danger', 'Gagal Tambah Data Pengguna', ' Gagal']);
			redirect(base_url("admin/pengguna/add".$id));
			// $this->add();
		}
	}
		
	public function edit($id, $role){
		$data['title'] = "Tambah Pengguna";
		$data['content'] = "akun/_form";
		$data['dataid'] = $id;
		$data['data'] = $this->db->get_where("user", ['kode_user' => $id])->row_array();		
		$this->load->view('backend/index',$data);
	}
	
	public function update($id){
		try{
			$datlama = $this->db->get_where("user", ['kode_user' => $id])->row_array();	
			$passbaru = $datlama['password'];
			if($this->input->post('password') != ""){
				$password= $this->input->post('password');
				$passbaru = password_hash($password, PASSWORD_BCRYPT);
			}
			$arr =
			[
				'kode_role' => $this->input->post('kode_role'), 
				'nama_user' => $this->input->post('nama_user'), 
				'akses_data' => $this->input->post('akses_data'), 
				'email' => $this->input->post('email'),
				'password' => $passbaru, 
			];
			$this->Maksi->updateData("user",$arr,$id,"kode_user");
				$this->session->set_flashdata("message", ['success', 'Berhasil Edit Data Pengguna', ' Berhasil']);
				redirect(base_url("admin/pengguna/data/".$this->input->post('kode_role')));
			
		}catch(Exception $e){
			$this->session->set_flashdata("message", ['danger', 'Gagal Edit Data Pengguna', ' Gagal']);
			redirect(base_url("admin/pengguna/data/edit/".$id."/".$koderole));
			// $this->add();
		}
	}
		
	public function delete($id){
		$datlama = $this->db->get_where("user", ['kode_user' => $id])->row_array();	
		if(Role_helper::cek_role($_SESSION['kode_role'], $datlama['kode_role'], 4)){
			try{
				$arr = ['status' => 0];
					$this->Maksi->updateData("user",$arr,$id,"kode_user");
		
					$this->session->set_flashdata("message", ['success', 'Berhasil Hapus Data Pengguna', 'Berhasil']);
					redirect(base_url("admin/pengguna/data/".$datlama['kode_role']));
				
			}catch(Exception $e){
				$this->session->set_flashdata("message", ['danger', 'Gagal Hapus Data Pengguna', 'Gagal']);
				redirect(base_url("admin/pengguna/data/".$datlama['kode_role']));
			}
		}else{
			$this->load->view('errors/403');		
		}
	}
}
