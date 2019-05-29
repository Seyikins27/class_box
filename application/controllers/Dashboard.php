<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public $name="";
    function __construct()
    {
        parent::__construct();
        $this->load->library('Template');
        if($this->session->logged_in !=TRUE){
            redirect('login');
        }
        else{
            $this->user_id=$this->session->user_id;
            $this->email=$this->session->email;
            $this->name=$this->session->name;
        }
    }

    function index()
    {
        $data['name']=$this->name;
        $this->template->header('ClassBox | Dashboard', 'ClassBox Dashboard, Classroom management tool, management system');
        $this->load->view('dashboard/nav');
        $this->load->view('dashboard/menu',$data);
        $this->template->footer();
    }

    
}