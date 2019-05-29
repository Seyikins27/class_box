<?php

class Template
{
    protected $CI;
	function __construct()
	{
	   $this->CI =& get_instance();
    }
    
    function header($title,$meta, $css=array())
    {
       $data['title']=$title;
       $data['meta']=$meta;
       $data['css']=$css;
       $this->CI->load->view('inc/header',$data);
    }

    function sidebar()
    {

    }

    function footer($js=array())
    {
        $data['js']=$js;
        $this->CI->load->view('inc/footer',$data);
    }
}
