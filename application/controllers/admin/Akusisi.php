<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Akusisi extends CI_Controller {
	function __construct()
  	{
		parent::__construct();
		Auth_helper::secure();
		$this->low = "akusisi";
		$this->cap = "Akusisi";
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
		$data['title'] = "Data $this->low";
		$data['content'] = "$this->low/index";
		$data['data'] = $this->db->query("SELECT a.*, sm.no_surat FROM $this->low a JOIN surat_masuk sm ON a.id_arsip=sm.id")->result_array();
        $this->load->view('backend/index',$data);
    }
	
	public function add()
	{
		$data['title'] = "Tambah $this->cap";
		$data['content'] = "$this->low/_form";
		$data['data'] = null;
		$data['type'] = 'Tambah';
		$data['arsip'] = $this->db->get("surat_masuk")->result_array();
		$this->load->view('backend/index',$data);
		// Response_Helper::render('backend/index', $data);
	}

	public function store(){
		$d = $_POST;
		try{
			$arr =
			[
				'id_arsip' => $this->input->post('id_arsip'), 
				'tanggal_serah_terima' => date("Y-m-d", $this->input->post('tanggal_serah_terima')), 
				'keterangan' => $this->input->post('keterangan'), 
				'created_by' => $_SESSION['userid'],  
			];
			$this->db->insert("$this->low",$arr);
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
		$data['arsip'] = $this->db->get("surat_masuk")->result_array();
		$data['data'] = $this->db->get_where("$this->low", ['id' => $id])->row_array();		
		$this->load->view('backend/index',$data);
		// print_r($data);
	}
	
	public function update($id){
		$d = $_POST;
		try{
			$arr =
			[
				'id_arsip' => $this->input->post('id_arsip'), 
				'tanggal_serah_terima' => $this->input->post('tanggal_serah_terima'), 
				'keterangan' => $this->input->post('keterangan'), 
				// 'updated_at' => date('Y-m-d H:i:s'),
				// 'updated_by' => $_SESSION['userid'],
			];
			
			$this->session->set_flashdata("message", ['success', "Ubah $this->cap Berhasil", ' Berhasil']);
			$this->db->update("$this->low",$arr, ['id' => $id]);
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
