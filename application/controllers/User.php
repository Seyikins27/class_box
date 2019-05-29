<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
   function __construct()
   {
       parent::__construct();
       $this->load->library(array('upload','form_validation','Template','encryption'));
       $this->load->model(array('Crud'));
   }

   public function add_user()
   {
        $this->form_validation->set_rules('title', 'Title','required');
        $this->form_validation->set_rules('firstname', 'Firstname','required');
        $this->form_validation->set_rules('middlename', 'Middlename','required');
        $this->form_validation->set_rules('lastname', 'Lastname','required');
        $this->form_validation->set_rules('gender', 'welcome message','required');
        $this->form_validation->set_rules('phone', 'Phone Number','required');
        $this->form_validation->set_rules('email', 'Email','required|valid_email|is_unique[teacher_tbl.email]');
        $this->form_validation->set_rules('password', 'Password','required|min_length[8]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation','required|min_length[8]|matches[password]');
        
        if($this->form_validation->run()==FALSE)
        {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect('signup');
        }
        else {
            $password=$this->encryption->encrypt($this->input->post('passconf'));
            $data=array(
                'title'=>$this->input->post('title'),
                'firstname'=>$this->input->post('firstname'),
                'middlename'=>$this->input->post('middlename'),
                'lastname'=>$this->input->post('lastname'),
                'gender'=>$this->input->post('gender'),
                'phone'=>$this->input->post('phone'),
                'email'=>$this->input->post('email'), 
                'created_at'=>date('Y-m-d H:i:s')
            );
            $success=$this->Crud->insert('teacher_tbl',$data);
           
            if($success)
            {
                $login_data=array(
                    'user_id'=>$success,
                    'email'=>$this->input->post('email'),
                    'password'=>$password   
                );
              $login=$this->Crud->add('user_login_tbl',$login_data);
              if($login){
                $this->session->set_flashdata('success', "Registration Successful");
                redirect('login');
              }
              else{
                $this->session->set_flashdata('error', "Registration Not Successful");
                redirect('signup');
              }
            }
        }
   }

   public function auth()
   {
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'password', 'required');
    $password=$this->encryption->encrypt($this->input->post('password'));
    $dec=$this->encryption->decrypt($password);
    $login_data=array('email'=>$this->input->post('email'));
    $login_result=$this->Crud->get_where('user_login_tbl',$login_data);
     if($login_result)
      {
        $dec_pass=$this->encryption->decrypt($login_result[0]->password);
        if($dec_pass==$dec)
         {
          $user=$this->Crud->get_where('teacher_tbl',array('email'=>$login_result[0]->email));
          $session_data=array(
           'user_id'=>$login_result[0]->user_id,
           'email'=>$login_result[0]->email,
           'name'=>$user[0]->title." ".ucfirst($user[0]->lastname)." ".ucfirst($user[0]->firstname),
           'logged_in'=>true);
           $this->session->set_userdata($session_data);
           $this->session->set_flashdata('success','Welcome '.$this->session->user_name);
           redirect('home');
          }
          else
          {
            $this->session->set_flashdata('error','Wrong Password');
            redirect('login');
          }
      }
      else
      {
         $this->session->set_flashdata('error','Wrong Email or Password');
         redirect('login');
      }
   }

   function logout()
   {
     $this->session->sess_destroy();
     redirect('login');
   }
}