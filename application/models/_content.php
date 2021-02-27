<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class _content extends CI_Model 
{
    public function getcontent()
    {
        
        $hasil=$this->db->query("SELECT content.*,kategory_content.kategory as kategory
        FROM content
        INNER JOIN kategory_content ON content.kategory_id=kategory_content.id ORDER BY content.id DESC");
        return $hasil;
    }
    public function getcontent_limit()
    {
        
        $hasil=$this->db->query("SELECT content.*,kategory_content.kategory as kategory
        FROM content
        INNER JOIN kategory_content ON content.kategory_id=kategory_content.id ORDER BY content.id DESC limit 5");
        return $hasil;
    }
    public function getcontent_akhir()
    {
        
        $hasil=$this->db->query("SELECT content.*,kategory_content.kategory as kategory
        FROM content
        INNER JOIN kategory_content ON content.kategory_id=kategory_content.id ORDER BY content.id DESC limit 1");
        return $hasil;
    }
    public function getcontent_byid($id=null)
    {
        $hasil=$this->db->query("SELECT content.*,kategory_content.kategory as kategory
        FROM content
        INNER JOIN kategory_content ON content.kategory_id=kategory_content.id where content.id = $id");
        return $hasil;
    }
    public function _hapus_content($id = null)
    {
        $hasil =$this->db->query("DELETE FROM content where id=$id");
        return $hasil;
    }

    public function content_chard(){
        $hasil =$this->db->query("SELECT COUNT(id) as jumlah, date FROM content group by date");
        return $hasil;
    }
    public function get_content_keyword($key){
        $hasil =$this->db->query("SELECT content.*,kategory_content.kategory as kategory
        FROM content
        INNER JOIN kategory_content ON content.kategory_id=kategory_content.id where content.judul LIKE '%".$key."%' or kategory_content.kategory LIKE '%".$key."%'");
        return $hasil;
    }
    
    public function _hapus_kategory($id = null)
    {
        $hasil =$this->db->query("DELETE FROM kategory_content where id=$id");
        return $hasil;
    }

}