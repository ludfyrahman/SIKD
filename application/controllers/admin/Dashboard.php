<?php
class Dashboard extends CI_Controller { //mengextends CI_Controller 
    public function __construct(){
        parent::__construct();
    }
    public function index () {
        $data['title'] = "Dashboard";
        $data['content'] = "dashboard/index";
        $data['pengguna'] = $this->db->get_where("pengguna", ['status' => 1])->num_rows();
        $data['surat_masuk'] = $this->db->get_where("surat_masuk", ['status' => 1])->num_rows();
        $akses ="JOIN surat_masuk_tembusan smt ON sm.id=smt.id_surat";
        $akses_id = "";
        $log_where = "";
        if($_SESSION['userlevel'] != 1 ){
            $akses_id =" AND smt.id_pengguna=$_SESSION[userid]";
            $log_where = " WHERE created_by='$_SESSION[userid]'";
        }
        $data['jenis'] = $this->db->get("jenis")->num_rows();
        $data['notifikasi_surat_masuk'] = $this->db->query("SELECT sm.id,sm.no_surat, sm.pengirim, sm.created_at, k.nama as klasifikasi from surat_masuk sm 
		JOIN surat_masuk_tembusan smt ON sm.id=smt.id_surat
		JOIN klasifikasi k ON sm.id_klasifikasi=k.id $akses_id GROUP BY smt.id_surat")->result_array();
        $data['surat_keluar'] = $this->db->get_where("surat_keluar", ['status' => 1])->num_rows();
        $data['sifat'] = $this->db->get("sifat")->num_rows();
        $data['log'] = $this->db->query("SELECT * FROM log $log_where order by created_at desc LIMIT 10")->result_array();
        $data['day'] = $this->db->query("SELECT * FROM log $log_where GROUP BY DAY(created_at) LIMIT 5")->result_array();
        
        $surat = $this->db->query("SELECT COUNT(*) jumlah, created_at FROM surat_masuk GROUP BY DATE(created_at)")->result_array();
        // echo "<pre>";
        // print_r($surat);
        $data['line'] = [];
        $i = 0;
        foreach ($surat as $s) {
            // array_push($array, $s);
            // $array['y'] += "Surat";
            // $array['item1'] += 2666;
            // $array['item2'] += 2666;
            $push =[
                'y' => date('Y-m-d', strtotime($s['created_at'])),
                'item1' => $s['jumlah'],
                // 'item2' => $i,
            ];
            array_push($data['line'], $push);
            $i++;
        }
		$this->load->view('backend/index',$data);

    }
}
?>