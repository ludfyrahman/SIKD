<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Karyawan extends CI_Controller {
	function __construct()
  	{
		parent::__construct();
		$this->low = "karyawan";
		$this->cap = "Karyawan";
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
		$data['title'] = "Data $this->cap";
		$data['content'] = "$this->low/index";
		$data['data'] = $this->db->query("SELECT k.*, j.nama as jabatan FROM $this->low k JOIN jabatan j ON k.id_jabatan=j.id")->result_array();
        $this->load->view('backend/index',$data);
    }
	public function detail($id)	{
		$data['content'] = "$this->low/_detail";
		$data['type'] = 'Detail';
		$data['title'] = "Detail $this->cap";
		$data['data'] = $this->db->get_where("$this->low", ['id' => $id])->row_array();
		$id_bagian = $data['data']['id_bagian'];
		$id_jabatan = $data['data']['id_jabatan'];
		$id_golongan = $data['data']['id_golongan'];
		$id_pendidikan = $data['data']['id_pendidikan'];
		$data['bagian'] = $this->db->query("SELECT * FROM bagian WHERE id = '$id_bagian'")->row_array();
		$data['jabatan'] = $this->db->query("SELECT * FROM jabatan WHERE id = '$id_jabatan'")->row_array();
		$data['golongan'] = $this->db->query("SELECT * FROM golongan WHERE id = '$id_golongan'")->row_array();
		$data['pendidikan'] = $this->db->query("SELECT * FROM pendidikan WHERE id = '$id_pendidikan'")->row_array();
		
		$this->load->view('backend/index',$data);
	}
	public function add()
	{
		$data['title'] = "Tambah $this->cap";
		$data['content'] = "$this->low/_form";
		$data['data'] = null;
		$data['type'] = 'Tambah';
		$data['bagian'] = $this->db->query("SELECT * FROM bagian")->result_array();
		$data['jabatan'] = $this->db->query("SELECT * FROM jabatan")->result_array();
		$data['golongan'] = $this->db->query("SELECT * FROM golongan")->result_array();
		$data['pendidikan'] = $this->db->query("SELECT * FROM pendidikan")->result_array();
		$this->load->view('backend/index',$data);
		// Response_Helper::render('backend/index', $data);
	}

	public function store(){
		$d = $_POST;
		try{
			$arr =
			[
				'nama' => $this->input->post('nama'), 
				'tanggal_lahir' => date('Y-m-d', strtotime($this->input->post('tanggal_lahir'))), 
				'jenis_kelamin' => $this->input->post('jenis_kelamin'), 
				'id_bagian' => $this->input->post('id_bagian'), 
				'id_jabatan' => $this->input->post('id_jabatan'), 
				'id_golongan' => $this->input->post('id_golongan'), 
				'id_pendidikan' => $this->input->post('id_pendidikan'), 
				'status' => $this->input->post('status'), 
				'alamat' => $this->input->post('alamat'),
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
		$data['bagian'] = $this->db->query("SELECT * FROM bagian")->result_array();
		$data['jabatan'] = $this->db->query("SELECT * FROM jabatan")->result_array();
		$data['golongan'] = $this->db->query("SELECT * FROM golongan")->result_array();
		$data['pendidikan'] = $this->db->query("SELECT * FROM pendidikan")->result_array();
		$data['data'] = $this->db->get_where("$this->low", ['id' => $id])->row_array();		
		$this->load->view('backend/index',$data);
	}
	
	public function update($id){
		$d = $_POST;
		try{
			$arr =
			[
				'nama' => $this->input->post('nama'), 
				'tanggal_lahir' => date('Y-m-d', strtotime($this->input->post('tanggal_lahir'))), 
				'jenis_kelamin' => $this->input->post('jenis_kelamin'), 
				'id_bagian' => $this->input->post('id_bagian'), 
				'id_jabatan' => $this->input->post('id_jabatan'), 
				'id_golongan' => $this->input->post('id_golongan'), 
				'id_pendidikan' => $this->input->post('id_pendidikan'), 
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
			redirect(base_url("admin/$this->low/karyawan"));
		}
	}
}
