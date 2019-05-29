<?php

class Lib
{
    protected $CI;
	function __construct()
	{
       $this->CI =& get_instance();
       $this->CI->load->model('Crud');
       $this->CI->load->library(array('upload','image_lib'));
    }
    
   function add_data($table, $data, $success=array(), $failure=array())
   {
    $result=$this->CI->Crud->add($table, $data);
    if($result)
    {
      $this->CI->session->set_flashdata('success', $success[0]);
      redirect($success[1]);
    }
    else{
      $this->CI->session->set_flashdata('error', $failure[0]);
      redirect($failure[1]);
    }
   }

   function update_data($table, $data=array(), $success=array(), $failure=array())
   {
    $result=$this->CI->Crud->update($table, $data['where'], $data['data']);
    if($result)
    {
      $this->CI->session->set_flashdata('success', $success[0]);
      redirect($success[1]);
    }
    else{
      $this->CI->session->set_flashdata('error', $failure[0]);
      redirect($failure[1]);
    }
   }

   function delete_data($table, $data=array(), $success=array(), $failure=array())
   {
    $result=$this->CI->Crud->delete($table, $data);
    if($result)
    {
      $this->CI->session->set_flashdata('success', $success[0]);
      redirect($success[1]);
    }
    else{
      $this->CI->session->set_flashdata('error', $failure[0]);
      redirect($failure[1]);
    }
   }

   function belongs_to($data=array())
   {
     $result=FALSE;
      $query=$this->CI->Crud->get_where($data['table'], $data['data']);
      if($query)
      {
        $result=TRUE;
      }
      return $result;
   }

   function upload_file($filename, $allowed_ext, $dir)
   {
      $config['upload_path']= $dir;
      $config['allowed_types']=$allowed_ext;
      $config['max_size']=0;
      $config['max_width']='6000';
      $config['max_height']='6000';
      $config['file_name']=$this->random(3).time();
      $this->CI->upload->initialize($config);
      if(!$this->CI->upload->do_upload($filename))
      {
        $error=array('error'=>$this->CI->upload->display_errors());
        $data['error']=$error;
      }
      else
      {
        $data['success']='Successfully Uploaded';
        $data['path']=$this->CI->upload->data('full_path');
        $data['file_ext']=$this->CI->upload->data('file_ext');
        $data['file_name']=$this->CI->upload->data('file_name');
        $data['upload_path']= $dir;
        $data['raw_name']= $this->CI->upload->data('raw_name');
        $this->resize($data['path'], 330, 225);
      }
      //var_dump($data);
      return $data;
   }

   function resize($file_path, $width, $height)
   {
     $config=array(
           'image_library' => 'gd2',
           'source_image' => $file_path,
           'quality'=>120,
           'maintain_ratio' => FALSE,
           'create_thumb' => TRUE,
           'thumb_marker' => '_thumb',
           'width' => $width,
           'height' => $height
       );
       $this->CI->image_lib->initialize($config);
       $this->CI->image_lib->resize();
   }

   function random($str_length, $prefix="")
   {
    $length=$str_length;
    $rand=substr(str_shuffle("0123456789AaBbCdDdEeFfGgHhIiJjKkLlMmNnPpQqRrSsTtVvZz"), 0, $length);
    $prefix=!empty($prefix)?$prefix:null;
    $name=$prefix.$rand;
    return $name;
   }

   function trash_bin($data, $user)
   {
     $trashed=FALSE;
      $contents=array(
        'table_name'=>$data['table_name'],
        'data'=>$data['data'],
        'deleted_by'=> $user,
        'date_deleted'=>date('Y-m-d H:i:s')
      );
      $result=$this->CI->Crud->add('trash_bin', $contents);
      if($result)
      {
        $trashed=TRUE;
      }
     return $trashed;
   }
 
}
