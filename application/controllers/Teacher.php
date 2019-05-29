<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teacher extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->logged_in !=TRUE){
            redirect('login');
        }
        else{
            
        }
    }
 
    function index()
    {
        
    }
}