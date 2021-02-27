<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
     
        $this->load->library('form_validation');
        $this->load->model('_content');
        $this->load->helper('text');

    }
    public function index(){
        $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
        $data['data_content'] = $this->_content->getcontent_limit()->result();
        $data['news'] = $this->_content->getcontent_akhir()->row_array();
        $data['role'] = $this->db->get_where('user_role',['id'=> $data['user']['role_id']])->row_array();
        $data['title']="Home";
       $this->load->view('tema/header',$data);
       $this->load->view('tema/toolbar',$data);
       $this->load->view('user/index',$data);
       $this->load->view('tema/footer');
    }
    public function perkara(){
        $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
        $data['data_content'] = $this->_content->getcontent()->result();
        $data['role'] = $this->db->get_where('user_role',['id'=> $data['user']['role_id']])->row_array();
        $data['title']="Perkara";
        if ($key=$this->input->post('key')) {
            $data['data_content'] = $this->_content->get_content_keyword($key)->result();
        }else{
            $data['data_content'] = $this->_content->getcontent()->result();
        }
       $this->load->view('tema/header',$data);
       $this->load->view('tema/toolbar',$data);
       $this->load->view('user/perkara',$data);
       $this->load->view('tema/footer');
    }
    public function message(){
        $set = [
            'message'=> htmlspecialchars($this->input->post('mesagge', true)),
            'email_user'=> htmlspecialchars($this->input->post('email', true)),
            'date_created'=> time()
        ];
        $this->db->insert('message',$set);
        $this->session->set_flashdata('message','<div class="alert alert-success">Pesan Berhasil Dikirim</div>');
        redirect('user');
    }

    public function profil(){
        $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role',['id'=> $data['user']['role_id']])->row_array();
        $data['title']="profil";
        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email');
        $this->form_validation->set_rules('password','Password','required|trim');
        if ($this->form_validation->run() == false) {
       $this->load->view('tema/header',$data);
       $this->load->view('tema/toolbar',$data);
       $this->load->view('user/profil',$data);
       $this->load->view('tema/footer');
    }else{ 
        $this->_update();

     }

    }
    public function _update()
    {
        $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
        $password2=$data['user']['password'];
        $password=$this->input->post('password');
        if ($password==$password2) {
        $id=$data['user']['id'];
        $set = [
            'name'=> htmlspecialchars($this->input->post('name', true)),
            'email'=> htmlspecialchars($this->input->post('email', true)),
            'role_id' => $data['user']['role_id'],
            'is_active'=> $data['user']['is_active'],
            'date_created'=> $data['user']['date_created']
        ];
        $where=array('id'=>$id);
       
        $this->db->where($where);
        $this->db->update('user',$set);
        $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil diubah!</div>');
        redirect('user/profil');
        }else
        {
            $id=$data['user']['id'];
            $set = [
                'name'=> htmlspecialchars($this->input->post('name', true)),
                'email'=> htmlspecialchars($this->input->post('email', true)),
                'password'=>password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                'role_id' => $data['user']['role_id'],
                'is_active'=> $data['user']['is_active'],
                'date_created'=> $data['user']['date_created']
            ];
            $where=array('id'=>$id);
           
            $this->db->where($where);
            $this->db->update('user',$set);
            
            $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil diubah!</div>');
            redirect('user/profil');

        }
    }

    
    public function gambar(){
        $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
       
        $data['role'] = $this->db->get_where('user_role',['id'=> $data['user']['role_id']])->row_array();
        
    
            
    $image=$_FILES['gambar'];
   
    $config['upload_path'] = './assets/img/profil';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['file_name']=time().$data['user']['id'].'-'.substr(md5(rand()),0,10).'.'.'jpg';
    $config['max_size']  = '2048';
    
  
    $this->load->library('upload', $config);
     // Load konfigurasi uploadnya

    if ($image['error']==4) {
        $this->session->set_flashdata('message','<div class="alert alert-danger">input foto kosong!</div>');
        redirect('user/profil');
    }else{
        if($this->upload->do_upload('gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
        // Jika berhasil :
        $id=$data['user']['id'];
        $set = [
            'image'=> $config['file_name']
        ];
        $where=array('id'=>$id);
       
        $this->db->where($where);
        $this->db->update('user',$set);
        
        $this->session->set_flashdata('message','<div class="alert alert-success">Gambar berhasil di upload!</div>');
        redirect('user/profil');
        }else{
         $error=$this->upload->display_errors();
        // Jika gagal :
        $this->session->set_flashdata('message',$error);
        redirect('user/profil');
        }
    }


        
    }
    public function single_content($id=null){
        $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role',['id'=> $data['user']['role_id']])->row_array();
        $data['data_content'] = $this->_content->getcontent_byid($id)->row_array();
        $data['title']="content";

       $this->load->view('tema/header',$data);
       $this->load->view('tema/toolbar',$data);
       $this->load->view('user/single',$data);
       $this->load->view('tema/footer');


    }

}

