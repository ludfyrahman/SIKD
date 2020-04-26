<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Surat_Masuk extends CI_Controller {
	function __construct()
  	{
		parent::__construct();
		Auth_helper::secure();
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
		$value = ($val == 'sampah' ? 0 : 1);
		$akses = "";
		$akses_id = "";
		if($_SESSION['userlevel'] != 1){
			$akses .="JOIN surat_masuk_tembusan smt ON sm.id=smt.id_surat";
			$akses_id .=" AND smt.id_pengguna=$_SESSION[userid]";
		}
		$search = "";
		if(isset($_POST['search'])){
			$val = $_POST['search'];
			$search .=" AND sm.pengirim like '%$val%' OR k.nama like '%$val%' ";
		}
		$data['inbox'] = $this->db->query("SELECT sm.id, smt.dilihat,sm.pengirim, sm.created_at, k.nama as klasifikasi from surat_masuk sm 
		JOIN surat_masuk_tembusan smt ON sm.id=smt.id_surat
		JOIN klasifikasi k ON sm.id_klasifikasi=k.id $akses_id where sm.status='$value' AND  smt.status=1 GROUP BY smt.id_surat")->result_array();
		$data['data'] = $this->db->query("SELECT sm.*, k.nama as klasifikasi FROM $this->low sm JOIN klasifikasi k ON sm.id_klasifikasi=k.id  where sm.status='$value' and sm.created_by=$_SESSION[userid] $search")->result_array();
		$data['berkas'] = $this->db->query("SELECT sm.id, smt.dilihat,sm.pengirim, sm.created_at, k.nama as klasifikasi from surat_masuk sm 
		JOIN surat_masuk_tembusan smt ON sm.id=smt.id_surat
		JOIN klasifikasi k ON sm.id_klasifikasi=k.id $akses_id where sm.status='$value' AND  smt.status=2 GROUP BY smt.id_surat")->result_array();
		$data['sekarang'] = $this->db->query("SELECT sm.id, smt.dilihat,sm.pengirim, sm.created_at, k.nama as klasifikasi from surat_masuk sm 
		JOIN surat_masuk_tembusan smt ON sm.id=smt.id_surat
		JOIN klasifikasi k ON sm.id_klasifikasi=k.id $akses_id where sm.status='$value' AND  smt.status=3 GROUP BY smt.id_surat")->result_array();
		$data['nanti'] = $this->db->query("SELECT sm.id, smt.dilihat,sm.pengirim, sm.created_at, k.nama as klasifikasi from surat_masuk sm 
		JOIN surat_masuk_tembusan smt ON sm.id=smt.id_surat
		JOIN klasifikasi k ON sm.id_klasifikasi=k.id $akses_id where sm.status='$value' AND  smt.status=4 GROUP BY smt.id_surat")->result_array();
		$data['tidak_ditindak'] = $this->db->query("SELECT sm.id, smt.dilihat,sm.pengirim, sm.created_at, k.nama as klasifikasi from surat_masuk sm 
		JOIN surat_masuk_tembusan smt ON sm.id=smt.id_surat
		JOIN klasifikasi k ON sm.id_klasifikasi=k.id $akses_id where sm.status='$value' AND  smt.status=5 GROUP BY smt.id_surat")->result_array();
		$this->load->view('backend/index',$data);
	}
	public function pencarian($val = null){
		$akses = "";
		$akses_id = "";
		if($_SESSION['userlevel'] != 1){
			$akses .="JOIN surat_masuk_tembusan smt ON sm.id=smt.id_surat";
			$akses_id .=" AND smt.id_pengguna=$_SESSION[userid]";
		}
		$search = "";
		if(isset($_POST['search'])){
			$val = $_POST['search'];
			$search .=" AND (sm.pengirim like '%$val%' OR k.nama like '%$val%') ";
		}
		$value = ($val == 'sampah' ? 0 : 1);
		$data['data'] = $this->db->query("SELECT sm.*, k.nama as klasifikasi FROM $this->low sm JOIN klasifikasi k ON sm.id_klasifikasi=k.id  where sm.status='$value' and smt.status=1 and sm.created_by=$_SESSION[userid] $search")->result_array();
		$this->load->view("backend/content/surat/masuk/_list_arsip", $data);

	}
	public function pencarian_arsip($val = null){
		$akses = "";
		$akses_id = "";
		if($_SESSION['userlevel'] != 1){
			$akses .="JOIN surat_masuk_tembusan smt ON sm.id=smt.id_surat";
			$akses_id .=" AND smt.id_pengguna=$_SESSION[userid]";
		}
		$search = "";
		if(isset($_POST['search'])){
			$val = $_POST['search'];
			$search .=" AND (sm.pengirim like '%$val%' OR k.nama like '%$val%') ";
		}
		$value = ($val == 'sampah' ? 0 : 1);
		$data['inbox'] = $this->db->query("SELECT sm.id, smt.dilihat,sm.pengirim, sm.created_at, k.nama as klasifikasi from surat_masuk sm 
		JOIN surat_masuk_tembusan smt ON sm.id=smt.id_surat
		JOIN klasifikasi k ON sm.id_klasifikasi=k.id $akses_id where sm.status='$value' $search GROUP BY smt.id_surat")->result_array();
		$this->load->view("backend/content/surat/masuk/_list", $data);

	}
	public function detail($id)	{
		$data['title'] = "Detail $this->cap";
		$data['content'] = "$this->content/_detail";
		$data['type'] = 'Detail';
		// $tembusan = "";
		// $tembusan_data = "";
		$user = "";
		$tembusan =" JOIN surat_masuk_tembusan smt ON sm.id=smt.id_surat";
		$tembusan_data = ", smt.id_pengguna, smt.status, smt.id as id_smt ";
		$where = "sm.id='$id'";
		if($_SESSION['userlevel'] !=1){
			
			$user = " AND smt.id_pengguna=$_SESSION[userid]";
			$where = " smt.id_surat='$id'";
		}
		$data['data'] = $this->db->query("SELECT sm.id, sm.tanggal_mulai_retensi,sm.no_surat, sm.tanggal_surat, sm.pengirim, sm.file, sm.created_at, j.nama as jenis, p.nama as media, k.nama as klasifikasi, sm.created_by $tembusan_data FROM $this->low sm 
		JOIN jenis j ON sm.id_jenis=j.id JOIN pengirim p ON sm.id_media_pengirim=p.id
		$tembusan
		JOIN klasifikasi k ON sm.id_klasifikasi=k.id WHERE $where $user")->row_array();		
		$data['pengguna'] = $this->db->get_where("pengguna")->result_array();

		if ($_SESSION['userlevel']!=1) {
			if($data['data']['id_pengguna'] == $_SESSION['userid']){
				$this->db->update("surat_masuk_tembusan", ['dilihat' => 1], ['id_surat' => $id, 'id_pengguna' => $_SESSION['userid']]);
				// echo "berhasil";
			}
		}
		$this->load->view('backend/index',$data);
	}
	public function aksi($status, $response, $id){
		if ($response == 'sekarang') {
			$this->db->update("surat_masuk_tembusan", ['status' => 3], ['id' => $id]);
		}else if($response == 'berkas'){
			$this->db->update("surat_masuk_tembusan", ['status' => 2], ['id' => $id]);
		}else if ($response == 'nanti') {
			$this->db->update("surat_masuk_tembusan", ['status' => 4], ['id' => $id]);
		}else if ($response == 'tidak') {
			$this->db->update("surat_masuk_tembusan", ['status' => 5], ['id' => $id]);
		}
		echo '<script>window.history.go(-2)</script>';
	}
	public function teruskan($id){
		$d = $_POST;
		if($d){
			$akses = explode(',', $d['akses']);
			for ($i=0; $i < count($akses) ; $i++) {
				$this->db->insert("surat_masuk_tembusan", ['id_surat' => $id, 'id_pengguna'=> $akses[$i]]);
			}
			$this->session->set_flashdata("message", ['success', "Berhasil Teruskan Arsip", ' Berhasil']);
			redirect(base_url("admin/$this->low/"));
		}
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
		$data['hak_akses'] = $this->db->query("SELECT p.nama, j.nama as jabatan, p.id FROM pengguna p JOIN jabatan j ON p.id_jabatan=j.id")->result_array();
		$data['retensi'] = $this->db->query("SELECT * FROM retensi")->result_array();
		$data['berkas'] = $this->db->get("berkas")->result_array();
		$this->load->view('backend/index',$data);
		// echo "<pre>";
		// print_r($data);
	}

	public function store(){
		$d = $_POST;
		$f = $_FILES;
		try{
			
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
				$akses = explode(',', $d['akses']);
				$this->db->insert("$this->low", $arr);
				$id  = $this->db->insert_id();
				for ($i=0; $i < count($akses) ; $i++) {
					$this->db->insert("surat_masuk_tembusan", ['id_surat' => $id, 'id_pengguna'=> $akses[$i]]);
				}
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
