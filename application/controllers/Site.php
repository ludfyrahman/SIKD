<?php
class Site extends CI_Controller { //mengextends CI_Controller 
    public function __construct(){
        parent::__construct();
    }
    public function index () {
        $data['title'] = "Login";
        $data['content'] = "login/index";
		$this->load->view('frontend/index',$data);
    }
    public function doLogin(){
        $d = $_POST;
        if(!$d){
            redirect(base_url(""));
        }
        try {
            if($d){
                $a = $this->db->get_where("pengguna", ['email' => $d['email']])->result_array();
                // print_r($a);
                // echo count($a);
                // $a = $this->akun->Select('*', "WHERE email = '$d[email]'")[1];

                if(count($a) < 1) {
                    $this->session->set_flashdata("message", ['danger', 'Login gagal, silahkan cek email anda kembali', ' Gagal']);
                    return $this->index();
                }

                $a = $a[0];
                if($a['status'] == 0) {
                    $this->session->set_flashdata("message", ['danger', 'Login gagal, Akun anda sedang dinonaktifkan', ' Gagal']);
                    return $this->index();
                }
                if(!password_verify($d['password'], $a['password'])) {
                    $this->session->set_flashdata("message", ['danger', 'Login gagal, Password anda salah', ' Gagal']);
                    return $this->index();
                }

                $_SESSION['userid'] = $a['id'];
                $_SESSION['userlevel'] = $a['level'];
                redirect(base_url("admin/dashboard"));
            }
        }
        catch(Exception $e) {
            // $this->login();
            echo "gagal";
        }
    }
    public function database(){
        $data['title'] = "DataBase";
		$data['content'] = "database/index";
        $this->load->view('backend/index',$data);
    }
    public function backup(){
        $this->load->dbutil();
        $prefs = array(
            'format' => 'zip',
            'filename' => 'my_backup.zip'
        );
        $backup = $this->dbutil->backup($prefs);
        $db_name = 'backup_on'.date('Y-m-d-H-i-s').".zip";
        $save = base_url('assets/').$db_name;
        $this->load->helper('file');
        write_file($save, $backup);
        $this->load->helper('download');
        force_download($db_name, $backup);
        $this->session->set_flashdata("message", ['success', "Berhasil Backup File", ' Berhasil']);
        redirect(base_url("site/database"));
    }
    public function logout(){
        // session_unset("userid");
        // session_unset("userlevel");
        session_destroy();
        redirect(base_url());
    }
}
?>