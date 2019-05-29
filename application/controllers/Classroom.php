<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Classroom extends CI_Controller
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
        $data['name']=$this->name;
        $this->template->header('ClassBox | Manage Classroom', 'ClassBox Dashboard, Classroom management tool, management system', array('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css'));
        $this->load->view('dashboard/nav');
        $this->load->view('dashboard/menu',$data);
        $this->load->view('dashboard/classroom/index');
        $this->template->footer(array("plugins/jquery-datatable/jquery.dataTables.js","plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js","plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js","js/pages/tables/jquery-datatable.js","js/script.js"));
    }

    function get_all()
    {
        $data['classrooms']=$this->Crud->get_where('class_tbl', array('belongs_to_teacher'=>$this->user_id,'deleted'=>0));
        $data['class_count']=function($id){
            return count($this->students_in_class($id));
        };
        $this->template->header('ClassBox | Classrooms', 'ClassBox Dashboard, Classroom management tool, management system', array('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css'));
        $this->load->view('dashboard/nav');
        $this->load->view('dashboard/menu',$data);
        $this->load->view('dashboard/classroom/all',$data);
        $this->template->footer(array("plugins/jquery-datatable/jquery.dataTables.js","plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js","plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js","js/pages/tables/jquery-datatable.js","js/script.js"));
    }

    function get_class($id)
    {
        $data['classroom']=$this->Crud->get_where('class_tbl', array('class_id'=>$id,'belongs_to_teacher'=>$this->user_id));
        //$data['students']=$this->students_in_class($id);
        $data['students']=$this->Crud->belongs_to('student_tbl', 'students_in_class', 'student_id', 'student_id', array("class_id"=>$id));
        $data['teacher_name']=$this->session->name;
        $data['class_id']=$id;
        $belongs_to_data=array('table'=>'class_tbl','data'=>array('class_id'=>$id,'belongs_to_teacher'=>$this->user_id));
        $belongs_to_user=$this->lib->belongs_to($belongs_to_data);
        if($belongs_to_user)
        {
            $this->template->header('ClassBox | '.$data['classroom'][0]->name, 'ClassBox Dashboard, Classroom management tool, management system', array('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css'));
            $this->load->view('dashboard/nav');
            $this->load->view('dashboard/menu',$data);
            $this->load->view('dashboard/classroom/class',$data);
            $this->template->footer(array("plugins/jquery-datatable/jquery.dataTables.js","plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js","plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js","js/pages/tables/jquery-datatable.js","js/script.js"));
        }else{
            $this->template->header('ClassBox | Invalid Resource', 'ClassBox Dashboard, Classroom management tool, management system', array('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css'));
            $this->load->view('dashboard/nav');
            $this->load->view('dashboard/menu');
            $this->load->view('errors/invalid');
            $this->template->footer();
        }
       
    }

    function add()
    {
       $this->form_validation->set_rules('classname', 'Classroom Name', 'required|min_length[3]');
       $this->form_validation->set_rules('maxnum','Maximum number of Students', 'required');

       if($this->form_validation->run()==FALSE)
       {
         $this->session->set_flashdata('error', validation_errors());
         redirect('classroom');
       }
       else {
          $data=array(
              'name'=>$this->input->post('classname'),
              'maximum_students'=>$this->input->post('maxnum'),
              'belongs_to_teacher'=>$this->user_id,
              'created_at'=>date('Y-m-d H:i:s')
          );
         $this->lib->add_data('class_tbl',$data, array('Classroom Added Successfully','classroom'), array('Failed','classroom'));
       }
    }
    
    function edit($id)
    {
        $data['name']=$this->name;
        $data['classroom']=$this->Crud->get_where('class_tbl', array('class_id'=>$id));
        $belongs_to_data=array('table'=>'class_tbl','data'=>array('class_id'=>$id,'belongs_to_teacher'=>$this->user_id));
        $belongs_to_user=$this->lib->belongs_to($belongs_to_data);
        $this->template->header('ClassBox | Edit Classroom', 'ClassBox Dashboard, Classroom management tool, management system');
        $this->load->view('dashboard/nav');
        $this->load->view('dashboard/menu',$data);
        $belongs_to_user? $this->load->view('dashboard/classroom/edit',$data):$this->load->view('errors/invalid');
        $this->template->footer();
    }

    function update()
    {
        $this->form_validation->set_rules('classname', 'Classroom Name', 'required|min_length[3]');
        $this->form_validation->set_rules('maxnum','Maximum number of Students', 'required');
 
        if($this->form_validation->run()==FALSE)
        {
          $this->session->set_flashdata('error', validation_errors());
          redirect('classroom');
        }
        else {
           $belongs_to_data=array('table'=>'class_tbl','data'=>array('class_id'=>$this->input->post('class_id'),'belongs_to_teacher'=>$this->user_id));
           $belongs_to_user=$this->lib->belongs_to($belongs_to_data);
           if($belongs_to_user)
           {
            $data=array(
                'where'=>array('class_id'=>$this->input->post('class_id')),
                'data'=>array('name'=>$this->input->post('classname'),
                'maximum_students'=>$this->input->post('maxnum'))
            );
            $this->lib->update_data('class_tbl',$data, array('Classroom Updated Successfully','classroom'), array('Update Failed','classroom'));
           }
           else {
                $this->session->set_flashdata('error', "You tried to update an invalid resource");
                redirect('classroom');
           }
           
        }
    }

    function assign_students($class_id)
    {
        $data['class']=$this->Crud->get_where('class_tbl', array('class_id'=>$class_id, 'belongs_to_teacher'=>$this->user_id));
        $data['students']=$this->students_not_in_class($class_id);
        $data['students_in_class']=$this->Crud->belongs_to('student_tbl', 'students_in_class', 'student_id', 'student_id', array("class_id"=>$class_id));
        $data['teacher_name']=$this->session->name;
        $data['name']=$this->name;
        $data['class_id']=$class_id;
        $this->template->header('ClassBox | Assign Students to Class', 'ClassBox Dashboard, Classroom management tool, management system', array('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css'));
        $this->load->view('dashboard/nav');
        $this->load->view('dashboard/menu',$data);
        $belongs_to_data=array('table'=>'class_tbl','data'=>array('class_id'=>$class_id,'belongs_to_teacher'=>$this->user_id));
        $belongs_to_user=$this->lib->belongs_to($belongs_to_data);
        if($belongs_to_user)
        {
            $this->load->view('dashboard/classroom/assign',$data);
        }else{
            $this->load->view('errors/invalid');
        }
        $this->template->footer(array("plugins/jquery-datatable/jquery.dataTables.js","plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js","plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js","js/pages/tables/jquery-datatable.js","js/script.js","js/ajax.js"));

    }

    function assign()
    {
        $student_ids=$this->input->post('student_id');
        $student_id=explode(',',$student_ids);
      
        foreach($student_id as $id)
        {
            $data=array(
                  'student_id'=>$id,
                  'class_id'=>$this->input->post('class_id'),
                  'activated'=>1
            );
            $success=$this->Crud->add('students_in_class', $data);
            if(! $success)
            {
                $this->session->set_flashdata('error', "Error Adding student");
                return false;
            }
            else{
                $this->session->set_flashdata('success', "Student Added Successfully");
            }
        }
        return true;
    }

    function disable()
    {

    }
    
    function students_not_in_class($class_id)
    {
        $filters=function($class_id){
            $in_class=$this->Crud->select('student_id','students_in_class', array('class_id'=>$class_id));
            $not_in=array();
            foreach($in_class as $students_ids)
            {
               $not_in[]=$students_ids->student_id; 
            }
            $not_in_imp=implode(',',$not_in);
            $not_in_ids=explode(',',$not_in_imp);
            return $not_in_ids;
        };
       return $this->Crud->where_not_in('student_tbl','student_id', $filters($class_id), array('added_by'=>$this->user_id));
    }
    
    function students_in_class($id)
    {
        $students=$this->Crud->get_where('students_in_class', array('class_id'=>$id));
        return $students;
    }

    function remove($id)
    {
        $belongs_to_data=array('table'=>'class_tbl','data'=>array('class_id'=>$id,'belongs_to_teacher'=>$this->user_id));
        $belongs_to_user=$this->lib->belongs_to($belongs_to_data);
        if($belongs_to_user)
        {
           if(!empty($this->students_in_class($id))){
            $this->session->set_flashdata('error', "This class has students, It cannot be deleted, you can disable it rather");
            redirect('classroom');
           }else{
            $data=array('where'=>array('class_id'=>$id),
            'data'=>array('deleted'=>1)
         ); 
            $this->lib->update_data('class_tbl',$data, array('Classroom Deleted Successfully','classroom'), array('Delete Failed','classroom'));
           };
          
        }
        else {
            $this->session->set_flashdata('error', "You tried to delete an invalid resource");
            redirect('classroom');
       }
    }
}
