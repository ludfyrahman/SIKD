<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengguna extends CI_Controller {
	function __construct()
  	{
		parent::__construct();
		Auth_helper::secure();
		$this->low = "pengguna";
		$this->cap = "Pengguna";
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
		$data['jabatan'] = $this->db->query("SELECT * FROM jabatan")->result_array();
		$data['type'] = 'Tambah';
		$this->load->view('backend/index',$data);
		// Response_Helper::render('backend/index', $data);
	}
	public function detail($id)	{
		$data['content'] = "$this->low/_detail";
		$data['type'] = 'Detail';
		$data['title'] = "Detail $this->cap";
		$data['data'] = $this->db->get_where("$this->low", ['id' => $id])->row_array();
		$data['jabatan'] = $this->db->query("SELECT j.nama, hk.id FROM jabatan j JOIN hak_akses hk ON j.id=hk.id_jabatan WHERE hk.id_pengguna=$id")->result_array();
		$data['jabatan_all'] = $this->db->get("jabatan")->result_array();
		// echo "<pre>";
		// print_r($data);
		$this->load->view('backend/index',$data);
	}
	public function add_jabatan($id){
		$d = $_POST;
		try{
			$arr =
			[
				'id_jabatan' => $this->input->post('id_jabatan'), 
				'id_pengguna' => $idc, 
				'created_by' => $_SESSION['userid'],  
			];
				$this->db->insert("hak_akses",$arr);
				$this->session->set_flashdata("message", ['success', "Berhasil Tambah Jabatan", ' Berhasil']);
			
		}catch(Exception $e){
			$this->session->set_flashdata("message", ['danger', "Gagal Tambah Jabatan", ' Gagal']);
			// $this->add();
		}
		echo '<script>window.history.go(-1)</script>';
	}
	public function store(){
		$d = $_POST;
		try{
			$arr =
			[
				'nama' => $this->input->post('nama'), 
				'email' => $this->input->post('email'), 
				'level' => $this->input->post('level'), 
				'id_jabatan' => $this->input->post('id_jabatan'),
				'created_by' => $_SESSION['userid'],  
				'status' => $this->input->post('status')
			];
			if($d['password'] != $d['password_konfirmasi']){
				$this->session->set_flashdata("message", ['success', 'Password konfirmasi dengan password tidak sama', ' Berhasil']);
				return $this->add();
			}else{
				$arr['password'] = password_hash($d['password'], PASSWORD_DEFAULT);
				$this->db->insert("$this->low",$arr);
				$this->session->set_flashdata("message", ['success', "Berhasil Tambah $this->cap", ' Berhasil']);
				redirect(base_url("admin/$this->low/"));
			}
			
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
		$data['jabatan'] = $this->db->query("SELECT * FROM jabatan")->result_array();
		$data['data'] = $this->db->get_where("$this->low", ['id' => $id])->row_array();		
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
				'id_jabatan' => $this->input->post('id_jabatan'), 
				'status' => $this->input->post('status'),
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $_SESSION['userid'],
			];
			if($d['password'] !=''){
				if($d['password'] != $d['password_konfirmasi']){
					$this->session->set_flashdata("message", ['danger', 'Password konfirmasi dengan password tidak sama', ' Berhasil']);
					redirect(base_url("admin/$this->low/edit/".$id));
				}else{
					$arr['password'] = password_hash($d['password'], PASSWORD_DEFAULT);
				}
			}
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
	public function deleteJabatan($id){
		try{
			$this->db->delete("hak_akses", ['id' => $id]);
			$this->session->set_flashdata("message", ['success', "Berhasil Hapus Jabatan", 'Berhasil']);
			
		}catch(Exception $e){
			$this->session->set_flashdata("message", ['danger', "Gagal Hapus Jabatan", 'Gagal']);
			redirect(base_url("admin/$this->low/"));
		}
		echo '<script>window.history.go(-1)</script>';
	}
}
