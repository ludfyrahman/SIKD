<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Surat_Masuk extends CI_Controller {
	function __construct()
  	{
		parent::__construct();
		$this->low = "surat_masuk";
		$this->content = "surat/masuk";
		$this->cap = "Surat Masuk";
		date_default_timezone_set('Asia/Jakarta');
		if($this->uri->segment(3) == "add" && $_SERVER['REQUEST_METHOD'] == "POST"){
		  $this->store($this->uri->segment(4));
		}else if($this->uri->segment(3) == "edit" && $_SERVER['REQUEST_METHOD'] == "POST"){
		  $this->update($this->uri->segment(4), $this->uri->segment(5));
		}
    }
    public function index($val = null){
		$data['title'] = "Data $this->cap";
		$data['content'] = "$this->content/index";
		$value = ($val == null ? 1 : $val);
		$data['data'] = $this->db->query("SELECT sm.*, k.nama as klasifikasi FROM $this->low sm JOIN klasifikasi k ON sm.id_klasifikasi=k.id where sm.status='$value'")->result_array();
        $this->load->view('backend/index',$data);
    }
	public function detail($id)	{
		$data['title'] = "Detail $this->cap";
		$data['content'] = "$this->content/_detail";
		$data['type'] = 'Detail';
		$data['data'] = $this->db->query("SELECT sm.*, j.nama as jenis, p.nama as media, k.nama as klasifikasi FROM $this->low sm 
		JOIN jenis j ON sm.id_jenis=j.id JOIN pengirim p ON sm.id_media_pengirim=p.id
		JOIN klasifikasi k ON sm.id_klasifikasi=k.id WHERE sm.id='$id'")->row_array();		
		
		$this->load->view('backend/index',$data);
	}
	public function add()
	{
		$data['title'] = "Tambah $this->cap";
		$data['content'] = "$this->content/_form";
		$data['data'] = null;
		$data['type'] = 'Tambah';
		$data['klasifikasi'] = $this->db->get("klasifikasi")->result_array();
		$data['jenis'] = $this->db->get("jenis")->result_array();
		$data['pengiriman'] = $this->db->get("pengirim")->result_array();
		$data['retensi'] = $this->db->query("SELECT * FROM retensi")->result_array();
		$this->load->view('backend/index',$data);
		// Response_Helper::render('backend/index', $data);
	}

	public function store(){
		$d = $_POST;
		$f = $_FILES;
		try{
			// print_r($f);
			$typefile = Response_Helper::getformatfile($f['file']['name']);
			$arr =
			[
				'id_klasifikasi' => $this->input->post('id_klasifikasi'), 
				'no_surat' => $this->input->post('no_surat'), 
				'tanggal_surat' => $this->input->post('tanggal_surat'), 
				'pengirim' => $this->input->post('pengirim'), 
				'id_jenis' => $this->input->post('id_jenis'), 
				'id_media_pengirim' => $this->input->post('id_media_pengirim'), 
				'tanggal_mulai_retensi' => date('Y-m-d', strtotime($this->input->post('tanggal_mulai_retensi'))), 
				'file' => $this->input->post('no_surat').".$typefile", 
				'created_by' => $_SESSION['userid'],  
			];
			if(Input_Helper::validateTypeUpload(['image/png', 'image/jpg', 'image/jpeg', 'application/pdf'], $f['file'])){
				Input_Helper::uploadImage($f['file'], 'surat/masuk', $this->input->post('no_surat').".$typefile");
				$this->db->insert("$this->low", $arr);
				$this->session->set_flashdata("message", ['success', "Berhasil Tambah $this->cap", ' Berhasil']);
				redirect(base_url("admin/$this->low/"));
			}else{
				$this->session->set_flashdata("message", ['danger', "file yang anda upload tidak sesuai.", ' Gagal']);
				$this->add();
			}
			
		}catch(Exception $e){
			$this->session->set_flashdata("message", ['danger', "Gagal Tambah Data $this->cap", ' Gagal']);
			redirect(base_url("admin/$this->low/add"));
			// $this->add();
		}
	}
		
	public function edit($id){
		$data['title'] = "Ubah $this->cap";
		$data['content'] = "$this->content/_form";
		$data['type'] = 'Ubah';
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
				'id_parent' => $this->input->post('id_parent'), 
				'id_retensi' => $this->input->post('id_retensi'), 
				'updated_at' => date('Y-m-d H:i:s'),
				'updated_by' => $_SESSION['userid'],
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
