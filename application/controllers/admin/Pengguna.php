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
		$data['data'] = $this->db->get("pengguna")->result_array();
        $this->load->view('backend/index',$data);
    }
	
	public function add()
	{
		$data['title'] = "Tambah Pengguna";
		$data['content'] = "pengguna/_form";
		$data['data'] = null;
		$data['type'] = 'Tambah';
		$this->load->view('backend/index',$data);
		// Response_Helper::render('backend/index', $data);
	}

	public function store(){
		$d = $_POST;
		try{
			$arr =
			[
				'nama' => $this->input->post('nama'), 
				'email' => $this->input->post('email'), 
				'level' => $this->input->post('level'), 
				// 'create_by' => $_SESSION['id_user'],  
				'created_by' => 1,  
				'status' => $this->input->post('status')
			];
			if($d['password'] != $d['password_konfirmasi']){
				$this->session->set_flashdata("message", ['success', 'Password konfirmasi dengan password tidak sama', ' Berhasil']);
				return $this->add();
			}else{
				$arr['password'] = password_hash($d['password'], PASSWORD_DEFAULT);
				$this->db->insert("pengguna",$arr);
				redirect(base_url("admin/pengguna/"));
			}
			
		}catch(Exception $e){
			$this->session->set_flashdata("message", ['danger', 'Gagal Tambah Data Pengguna', ' Gagal']);
			redirect(base_url("admin/pengguna/add"));
			// $this->add();
		}
	}
		
	public function edit($id){
		$data['title'] = "Ubah Pengguna";
		$data['content'] = "pengguna/_form";
		$data['type'] = 'Ubah';
		$data['data'] = $this->db->get_where("pengguna", ['id' => $id])->row_array();		
		$this->load->view('backend/index',$data);
	}
	
	public function update($id){
		$d = $_POST;
		try{
			$arr =
			[
				'nama' => $this->input->post('nama'), 
				'email' => $this->input->post('email'), 
				'level' => $this->input->post('level'), 
				// 'create_by' => $_SESSION['id_user'],  
				'created_by' => 1,  
				'status' => $this->input->post('status')
			];
			if($d['password'] !=''){
				if($d['password'] != $d['password_konfirmasi']){
					$this->session->set_flashdata("message", ['danger', 'Password konfirmasi dengan password tidak sama', ' Berhasil']);
					redirect(base_url("admin/pengguna/edit/".$id));
				}else{
					$arr['password'] = password_hash($d['password'], PASSWORD_DEFAULT);
				}
			}
			$this->session->set_flashdata("message", ['success', 'Ubah Pengguna Berhasil', ' Berhasil']);
			$this->db->update("pengguna",$arr, ['id' => $id]);
			redirect(base_url("admin/pengguna/"));
			
		}catch(Exception $e){
			$this->session->set_flashdata("message", ['danger', 'Gagal Edit Data Pengguna', ' Gagal']);
			redirect(base_url("admin/pengguna/data/edit/".$id."/".$koderole));
			// $this->add();
		}
	}
		
	public function delete($id){
			try{
				$this->db->delete("pengguna", ['id' => $id]);
				$this->session->set_flashdata("message", ['success', 'Berhasil Hapus Data Pengguna', 'Berhasil']);
				redirect(base_url("admin/pengguna/"));
				
			}catch(Exception $e){
				$this->session->set_flashdata("message", ['danger', 'Gagal Hapus Data Pengguna', 'Gagal']);
				redirect(base_url("admin/pengguna/"));
			}
	}
}
