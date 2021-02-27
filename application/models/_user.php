<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class _user extends CI_Model 
{
    public function getuser()
    {

        $hasil=$this->db->query("SELECT user.*,user_role.role as role
        FROM user
        INNER JOIN user_role ON user.role_id=user_role.id");
        return $hasil;


    }
    public function getuser_byid($id = null)
    {

        $hasil =$this->db->query("SELECT user.*,user_role.role as role
        FROM user
        INNER JOIN user_role ON user.role_id=user_role.id where user.id= $id ");
        return $hasil;


    }
    public function _hapus($id = null)
    {

        $hasil =$this->db->query("DELETE FROM user where id=$id");
        return $hasil;


    }
    public function get_user_keyword($key){
        $hasil =$this->db->query("SELECT user.*,user_role.role as role
        FROM user
        INNER JOIN user_role ON user.role_id=user_role.id where user.name LIKE '%".$key."%' or user.email LIKE '%".$key."%'");
        return $hasil;
    }

    public function user_chard(){
        $hasil =$this->db->query("SELECT COUNT(user.name) as jumlah,user_role.role  as role
        FROM user
        INNER JOIN user_role ON user.role_id=user_role.id group by user_role.role");
        return $hasil;
    }


}