<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Klasifikasi extends CI_Controller {
	function __construct()
  	{
		parent::__construct();
		Auth_helper::secure();
		$this->low = "klasifikasi";
		$this->cap = "Klasifikasi";
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
		$data['title'] = "Data $this->cap";
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
		$data['parent'] = $this->db->query("SELECT * FROM $this->low")->result_array();
		$data['retensi'] = $this->db->query("SELECT * FROM retensi")->result_array();
		$this->load->view('backend/index',$data);
		// Response_Helper::render('backend/index', $data);
	}

	public function store(){
		$d = $_POST;
		try{
			$arr =
			[
				'id' => $this->input->post('id'), 
				'nama' => $this->input->post('nama'), 
				'keterangan' => $this->input->post('keterangan'), 
				'id_parent' => $this->input->post('id_parent'), 
				'created_by' => $_SESSION['userid'],  
			];
			$this->db->insert("$this->low",$arr);
			Log_Helper::Insert(['type' => 1, 'deskripsi' => Auth_Helper::Get("nama")." Menambahkan ".$d['nama']." Di $this->cap", 'created_by' => $_SESSION['userid']]);
			$this->session->set_flashdata("message", ['success', "Berhasil Tambah $this->cap", ' Berhasil']);
			redirect(base_url("admin/$this->low/"));
			
		}catch(Exception $e){
			$this->session->set_flashdata("message", ['danger', "Gagal Tambah Data $this->cap", ' Gagal']);
			redirect(base_url("admin/$this->low/add"));
			// $this->add();
		}
	}
		
	public function edit($id){
		$data['title'] = "Ubah $this->cap";
		$data['content'] = "$this->low/_form";
		$data['type'] = 'Ubah';
		$data['retensi'] = $this->db->query("SELECT * FROM retensi")->result_array();
		$data['parent'] = $this->db->query("SELECT * FROM $this->low")->result_array();
		$data['data'] = $this->db->get_where("$this->low", ['id' => $id])->row_array();		
		$this->load->view('backend/index',$data);
	}
	
	public function update($id){
		$d = $_POST;
		try{
			$arr =
			[
				'id' => $this->input->post('id'), 
				'nama' => $this->input->post('nama'), 
				'keterangan' => $this->input->post('keterangan'), 
				'id_parent' => $this->input->post('id_parent'), 
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $_SESSION['userid'],
			];
			
			$this->session->set_flashdata("message", ['success', "Ubah $this->cap Berhasil", ' Berhasil']);
			$this->db->update("$this->low",$arr, ['id' => $id]);
			Log_Helper::Insert(['type' => 2, 'deskripsi' => Auth_Helper::Get("nama")." Mengubah Data ".$d['nama']." Di $this->cap", 'created_by' => $_SESSION['userid']]);
			redirect(base_url("admin/$this->low/"));
			
		}catch(Exception $e){
			$this->session->set_flashdata("message", ['danger', "Gagal Edit Data $this->cap", ' Gagal']);
			redirect(base_url("admin/$this->low/edit/".$id));
			// $this->add();
		}
	}
		
	public function delete($id){
		try{
			$this->db->delete("$this->low", ['id' => $id]);
			$this->session->set_flashdata("message", ['success', "Berhasil Hapus Data $this->cap", 'Berhasil']);
			redirect(base_url("admin/$this->low/"));
			
		}catch(Exception $e){
			$this->session->set_flashdata("message", ['danger', "Gagal Hapus Data $this->cap", 'Gagal']);
			redirect(base_url("admin/$this->low/"));
		}
	}
}
