<?php 
class Api extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function retensi($id){
        if($id != null){
            $q = $this->db->query("SELECT r.* FROM klasifikasi k JOIN retensi r ON k.id_retensi=r.id WHERE k.id='$id'")->row_array();
            echo json_encode($q);
        }
    }
    public function arsip($id){
        if($id != null){
            $q = $this->db->query("SELECT sm.id, sf.status status_publik, sm.image, sm.tanggal_mulai_retensi,sm.no_surat, sm.tanggal_surat, sm.pengirim, sm.file, sm.created_at, j.nama as jenis, p.nama as media, k.nama as klasifikasi, sm.created_by FROM surat_masuk sm 
            JOIN jenis j ON sm.id_jenis=j.id JOIN pengirim p ON sm.id_media_pengirim=p.id
            JOIN sifat sf ON sm.id_sifat=sf.id 
            JOIN klasifikasi k ON sm.id_klasifikasi=k.id WHERE sm.id=$id")->row_array();
            echo json_encode($q);
        }
    }
}

?>