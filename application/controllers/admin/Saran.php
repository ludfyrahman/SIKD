<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Saran extends CI_Controller {
	function __construct()
  	{
		parent::__construct();
		Auth_helper::secure();
		$this->low = "saran";
		$this->cap = "Saran";
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
		$where = "";
		if($_SESSION['userlevel'] != 1){
			$where.=" WHERE s.id_pengguna='$_SESSION[userid]'";
		}
		$data['data'] = $this->db->query("SELECT s.*, p.nama, p.email FROM $this->low s JOIN pengguna p ON s.id_pengguna=p.id $where")->result_array();
        $this->load->view('backend/index',$data);
    }
	
	public function add()
	{
		$data['title'] = "Tambah $this->cap";
		$data['content'] = "$this->low/_form";
		$data['data'] = null;
		$data['type'] = 'Tambah';
		$data['pengguna'] = null;
		$this->load->view('backend/index',$data);
		// Response_Helper::render('backend/index', $data);
	}

	public function store(){
		$d = $_POST;
		try{
			$arr =
			[
				'id_pengguna' => $this->input->post('id_pengguna'), 
				'saran' => $this->input->post('saran'), 
				// 'deskripsi' => $this->input->post('deskripsi'), 
				// 'created_at' => date,  
			];
			$this->db->insert("$this->low",$arr);
			Log_Helper::Insert(['type' => 1, 'deskripsi' => Auth_Helper::Get("nama")." Menambahkan Data Di $this->cap", 'created_by' => $_SESSION['userid']]);
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
		$data['data'] = $this->db->get_where("$this->low", ['id' => $id])->row_array();
		$data['pengguna'] = $this->db->get_where("pengguna", ['id' => $data['data']['id_pengguna']])->row_array();
		// print_r($data);
		$this->load->view('backend/index',$data);
	}
	
	public function update($id){
		$d = $_POST;
		try{
			$arr =
			[
				'id_pengguna' => $this->input->post('id_pengguna'), 
				'saran' => $this->input->post('saran'), 
			];
			Log_Helper::Insert(['type' => 2, 'deskripsi' => Auth_Helper::Get("nama")." Mengubah Data  Di $this->cap", 'created_by' => $_SESSION['userid']]);
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
