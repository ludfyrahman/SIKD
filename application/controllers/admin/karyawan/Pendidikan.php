<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pendidikan extends CI_Controller {
	function __construct()
  	{
		parent::__construct();
		Auth_helper::secure();
		$this->low = "pendidikan";
		$this->cap = "Pendidikan";
		date_default_timezone_set('Asia/Jakarta');
		// if(!isset($_SESSION['kode_user'])){
		// 	redirect(base_url());
		// }
		if($this->uri->segment(4) == "add" && $_SERVER['REQUEST_METHOD'] == "POST"){
			$this->store();
		}else if($this->uri->segment(4) == "edit" && $_SERVER['REQUEST_METHOD'] == "POST"){
			$this->update($this->uri->segment(5), $this->uri->segment(5));
		}
    }
    public function index(){
		$data['title'] = "Data $this->low";
		$data['content'] = "$this->low/index";
		$data['data'] = $this->db->get("$this->low")->result_array();
        $this->load->view('backend/index',$data);
    }
	
	public function add()
	{
		$data['title'] = "Tambah $this->cap";
		$data['content'] = "$this->low/_form";
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
				'status' => $this->input->post('status'),
				'created_by' => $_SESSION['userid'],  
			];
			$this->db->insert("$this->low",$arr);
			$this->session->set_flashdata("message", ['success', "Berhasil Tambah $this->cap", ' Berhasil']);
			redirect(base_url("admin/karyawan/$this->low/"));
			
		}catch(Exception $e){
			$this->session->set_flashdata("message", ['danger', "Gagal Tambah Data $this->cap", ' Gagal']);
			redirect(base_url("admin/karyawan/$this->low/add"));
			// $this->add();
		}
	}
		
	public function edit($id){
		$data['title'] = "Ubah $this->cap";
		$data['content'] = "$this->low/_form";
		$data['type'] = 'Ubah';
		$data['data'] = $this->db->get_where("$this->low", ['id' => $id])->row_array();		
		$this->load->view('backend/index',$data);
	}
	
	public function update($id){
		$d = $_POST;
		try{
			$arr =
			[
				'nama' => $this->input->post('nama'), 
				'status' => $this->input->post('status'),
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $_SESSION['userid'],
			];
			
			$this->session->set_flashdata("message", ['success', "Ubah $this->cap Berhasil", ' Berhasil']);
			$this->db->update("$this->low",$arr, ['id' => $id]);
			redirect(base_url("admin/karyawan/$this->low/"));
			
		}catch(Exception $e){
			$this->session->set_flashdata("message", ['danger', "Gagal Edit Data $this->cap", ' Gagal']);
			redirect(base_url("admin/karyawan/$this->low/edit/".$id));
			// $this->add();
		}
	}
		
	public function delete($id){
		try{
			$this->db->delete("$this->low", ['id' => $id]);
			$this->session->set_flashdata("message", ['success', "Berhasil Hapus Data $this->cap", 'Berhasil']);
			redirect(base_url("admin/karyawan/$this->low/"));
			
		}catch(Exception $e){
			$this->session->set_flashdata("message", ['danger', "Gagal Hapus Data $this->cap", 'Gagal']);
			redirect(base_url("admin/karyawan/$this->low/"));
		}
	}
}
