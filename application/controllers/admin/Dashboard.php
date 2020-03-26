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
        $data['surat_keluar'] = $this->db->get_where("surat_keluar", ['status' => 1])->num_rows();
        $data['jabatan'] = $this->db->get("jabatan")->num_rows();
        $data['log'] = $this->db->query("SELECT * FROM log order by created_at desc LIMIT 10")->result_array();
        $data['day'] = $this->db->query("SELECT * FROM log GROUP BY DAY(created_at) LIMIT 5")->result_array();
        // echo "<pre>";
        // print_r($data);
		$this->load->view('backend/index',$data);

    }
}
?>