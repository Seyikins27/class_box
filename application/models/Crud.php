<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get($tablename)
    {
        $query=$this->db->get($tablename);
        return $query->result();      
    }

    function get_where($tablename, $data=array())
    {
        $query=$this->db->get_where($tablename, $data);
        return $query->result();
    }
    
    function select($items, $table, $where=NULL)
    {
        $this->db->select($items);
        $this->db->from($table);
        !empty($where)?$this->db->where($where):null;
        $query=$this->db->get();
        return $query->result();
    }

    function where_not_in($table, $column, $filters, $where="")
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->where_not_in($column, $filters);
        $query=$this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

    function insert($tablename, $data)
    {
      $this->db->insert($tablename, $data);
       return $this->db->insert_id();
    }

    function add($tablename, $data)
    {
       return $this->db->insert($tablename, $data);
    }

    function update($tablename,$where=array(),$data=array())
    {
        $this->db->set($data);
        $this->db->where($where);
        $this->db->update($tablename);
        if($this->db->affected_rows())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function delete($tablename,$where=array())
    {
        $this->db->delete($tablename, $where);
        if($this->db->affected_rows())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function has_many($parent, $child, $primary_key, $foreign_key)
    {
       $this->db->select('*')
                ->from($parent)
                ->join($child,$child.".".$foreign_key."=".$parent.".".$primary_key);
        $query=$this->db->get();
        return $query->result();
    }

    function belongs_to($parent, $child, $primary_key, $foreign_key, $where)
    {
        $this->db->select('*')
                ->from($child)
                ->where($where)
                ->join($parent,$parent.".".$primary_key."=".$child.".".$foreign_key);
        $query=$this->db->get();
        return $query->result();
    }
}