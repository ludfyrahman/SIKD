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
        
    }
}
?>