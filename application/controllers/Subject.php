<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subject extends CI_Controller
{
    public $user_id;
    
    function __construct()
    {
        parent:: __construct();
        $this->load->library(array('form_validation','Template','Lib'));
        $this->load->model(array('Crud'));
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
        $data['classrooms']=$this->Crud->get_where('class_tbl', array('belongs_to_teacher'=>$this->user_id,'deleted'=>0));
        $data['class_name']=function($class_id){
            $this->Crud->get_where('class_tbl', array('belongs_to_teacher'=>$this->user_id,'deleted'=>0));
        };
        $data['subjects']= $this->Crud->get_where('subject_tbl', array('belongs_to_teacher'=>$this->user_id,'deleted'=>0));
        $this->template->header('ClassBox | Manage Subjects', 'ClassBox Dashboard, Classroom management tool, management system', array('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css'));
        $this->load->view('dashboard/nav');
        $this->load->view('dashboard/menu',$data);
        $this->load->view('dashboard/subject/index');
        $this->template->footer(array("plugins/jquery-datatable/jquery.dataTables.js","plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js","plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js","js/pages/tables/jquery-datatable.js","js/script.js"));
    }

    function add()
    {
       $this->form_validation->set_rules('classroom', 'Classroom', 'required');
       $this->form_validation->set_rules('subject_name', 'Subject Name', 'required');
       $this->form_validation->set_rules('subject_description','Subject Description', 'required');

       if($this->form_validation->run()==FALSE)
       {
         $this->session->set_flashdata('error', validation_errors());
         redirect('subject');
       }
       else {
          $data=array(
              'name'=>$this->input->post('subject_name'),
              'description'=>$this->input->post('subject_description'),
              'belongs_to_class'=>$this->input->post('classroom'),
              'created_at'=>date('Y-m-d H:i:s'),
              'activated'=>1
          );
         $this->lib->add_data('subject_tbl',$data, array('Subject Added Successfully','subject'), array('Failed','subject'));
       }
    }

    function update()
    {

    }

    function disable()
    {
        
    }

    function remove()
    {

    }
}