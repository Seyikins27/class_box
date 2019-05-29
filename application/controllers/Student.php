<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
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
        $data['students']=$this->Crud->get_where('student_tbl', array('added_by'=>$this->user_id));
        $data['name']=$this->name;
        $this->template->header('ClassBox | Manage Students', 'ClassBox Dashboard, Classroom management tool, management system', array('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css'));
        $this->load->view('dashboard/nav');
        $this->load->view('dashboard/menu',$data);
        $this->load->view('dashboard/student/index');
        $this->template->footer(array("plugins/jquery-datatable/jquery.dataTables.js","plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js","plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js","js/pages/tables/jquery-datatable.js","js/script.js"));
    }

    function add()
    {
        $this->form_validation->set_rules('student_id','Unique Student Id','required|min_length[2]');
        $this->form_validation->set_rules('firstname','First name','required|min_length[2]');
        $this->form_validation->set_rules('middlename','Middle name','required|min_length[2]');
        $this->form_validation->set_rules('lastname','Last name','required|min_length[2]');
        $this->form_validation->set_rules('gender','Gender','required');
        $this->form_validation->set_rules('dob','Date of Birth','required');
        $this->form_validation->set_rules('phone','Phone nUmber','required');
        $this->form_validation->set_rules('email','Email','required|min_length[3]|is_unique[student_tbl.email]',
        array(
                'required'      => '%s. is a required field',
                'is_unique'     => 'This email already exists.'
        ));
        if($this->form_validation->run()==FALSE)
        {
            $this->session->set_flashdata('error', validation_errors());
            redirect('student');
        }
        else{
            $picture=$this->lib->upload_file('picture','jpg|png|gif|jpeg','assets/images/');
            $profile_picture=$picture['upload_path'].$picture['raw_name'].$picture['file_ext'];
            $thumbnail_picture=$picture['upload_path'].$picture['raw_name']."_thumb".$picture['file_ext'];
            $student_id=$this->lib->random(5);
            $data=array(
                'student_id'=>$student_id,
                'unique_id'=>$this->input->post('student_id'),
                'firstname'=>$this->input->post('firstname'),
                'middlename'=>$this->input->post('middlename'),
                'lastname'=>$this->input->post('lastname'),
                'picture'=>$profile_picture,
                'picture_thumbnail'=>$thumbnail_picture,
                'gender'=>$this->input->post('gender'),
                'date_of_birth'=>$this->input->post('dob'),
                'phone'=>$this->input->post('phone'),
                'email'=>$this->input->post('email'),
                'address'=>$this->input->post('address'),
                'added_by'=>$this->user_id,
                'created_at'=>date('Y-m-d H:i:s')
            );
            $this->lib->add_data('student_tbl',$data, array('Student Added Successfully','student'), array('Failed','student'));
        }
    }

    function student_belongs_to_class($student_id)
    {
        $students=$this->Crud->get_where('students_in_class', array('student_id'=>$student_id));
        return $students;
    }

    function remove($id)
    {
        $belongs_to_data=array('table'=>'student_tbl','data'=>array('student_id'=>$id,'added_by'=>$this->user_id));
        $belongs_to_user=$this->lib->belongs_to($belongs_to_data);
        if($belongs_to_user)
        {
           if(!empty($this->student_belongs_to_class($id))){
            $this->session->set_flashdata('error', "This Student belongs to at least one class, remove the student from the class(es) first");
            redirect('student');
           }else{
            $get_data=$this->Crud->get_where('student_tbl', array('student_id'=>$id));
            $trash_data=array('table_name'=>'student_tbl', 'data'=>serialize($get_data));
            $trashed=$this->lib->trash_bin($trash_data, $this->user_id);  
                if($trashed)
                {
                    $data=array('student_id'=>$id);
                    $this->lib->delete_data('student_tbl',$data, array('Student Deleted Successfully','student'), array('Delete Failed','student'));
                }else{
                    $this->session->set_flashdata('error', "Error Deleting resource !!");
                    redirect('student');
                }

            } 

        }
        else {
            $this->session->set_flashdata('error', "You tried to delete an invalid resource");
            redirect('student');
       }
    }

    function get_all()
    {
        $data['classes']=$this->Crud->get_where('class_tbl', array('belongs_to_teacher'=>$this->user_id));
        $data['students']=$this->Crud->get_where('student_tbl', array('added_by'=>$this->user_id));
        $data['name']=$this->name;
        $this->template->header('ClassBox | Manage Students', 'ClassBox Dashboard, Classroom management tool, management system', array('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css'));
        $this->load->view('dashboard/nav');
        $this->load->view('dashboard/menu',$data);
        $this->load->view('dashboard/student/all');
        $this->template->footer(array("plugins/jquery-datatable/jquery.dataTables.js","plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js","plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js","js/pages/tables/jquery-datatable.js","js/script.js"));
    }
}