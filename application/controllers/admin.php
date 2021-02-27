<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->load->model('_user');
        $this->load->model('_content');
        $data['user'] = $this->db->get_where('user',['id'=> $this->session->userdata('id')])->row_array();
        if($data['user']['role_id'] != 1){
			redirect(base_url("auth"));
		}
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user',['id'=> $this->session->userdata('id')])->row_array();
        $data['data_user'] =$this->_user->user_chard()->result();
        $data['data_content'] =$this->_content->content_chard()->result();
        $data['role'] = $this->db->get_where('user_role',['id'=> $data['user']['role_id']])->row_array();
        $data['title']="Home";
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/toolbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    public function profil()
    {
        $data['user'] = $this->db->get_where('user',['id'=> $this->session->userdata('id')])->row_array();
       
        $data['role'] = $this->db->get_where('user_role',['id'=> $data['user']['role_id']])->row_array();
        $data['title']="My Profil";
        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email');
        $this->form_validation->set_rules('password','Password','required|trim');

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/toolbar', $data);
        $this->load->view('admin/profil', $data);
        $this->load->view('templates/footer');
        
        }else{ 
            $this->_update();

         }
        
    }

    public function _update()
    {
        $data['user'] = $this->db->get_where('user',['id'=> $this->session->userdata('id')])->row_array();
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
        redirect('admin/profil');
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
            redirect('admin/profil');

        }
        
      

    }

    public function gambar(){
        $data['user'] = $this->db->get_where('user',['id'=> $this->session->userdata('id')])->row_array();
       
        $data['role'] = $this->db->get_where('user_role',['id'=> $data['user']['role_id']])->row_array();
        $data['title']="Foto";
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/toolbar', $data);
        $this->load->view('admin/upgambar', $data);
        $this->load->view('templates/footer');
        
    }

    public function upgambar(){
        $data['user'] = $this->db->get_where('user',['id'=> $this->session->userdata('id')])->row_array();
       
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
        redirect('admin/gambar');
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
        redirect('admin/gambar');
        }else{
         $error=$this->upload->display_errors();
        // Jika gagal :
        $this->session->set_flashdata('message',$error);
        redirect('admin/gambar');
        }
    }
    }

    public function data_user(){
        $data['title']="Data User";
        
        $data['user'] = $this->db->get_where('user',['id'=> $this->session->userdata('id')])->row_array();
        $data['role'] = $this->db->get_where('user_role',['id'=> $data['user']['role_id']])->row_array();
        $this->form_validation->set_rules('key','key','required|trim');
        if ($this->form_validation->run() == false) {
        $data['data_user'] =$this->_user->getuser()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/toolbar', $data);
        $this->load->view('admin/data_user', $data);
        $this->load->view('templates/footer');
        }else{
        $key=$this->input->post('key');
        $data['data_user'] = $this->_user->get_user_keyword($key)->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/toolbar', $data);
        $this->load->view('admin/data_user', $data);
        $this->load->view('templates/footer');
        }
        
    }

    public function detail_user($id=null){
        
        $data['data_user'] =$this->_user->getuser_byid($id)->row_array();
        $data['data_role'] =$this->db->get('user_role')->result();
        $data['user'] = $this->db->get_where('user',['id'=> $this->session->userdata('id')])->row_array();
        $data['role'] = $this->db->get_where('user_role',['id'=> $data['user']['role_id']])->row_array();
        $data['title']="Detail User";
        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email');
        $this->form_validation->set_rules('password','Password','required|trim');
        $this->form_validation->set_rules('role','Role','required|trim');
        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/toolbar', $data);
        $this->load->view('admin/edit', $data);
        $this->load->view('templates/footer');
        }else{ 
            $this->edit($id);
        }
    }

    public function edit($id=null){
        $data['user'] = $this->db->get_where('user',['id'=> $id])->row_array();
        $password2=$data['user']['password'];
        $password=$this->input->post('password');
        if ($password==$password2) {
        $set = [
            'name'=> htmlspecialchars($this->input->post('name', true)),
            'email'=> htmlspecialchars($this->input->post('email', true)),
            'role_id' => htmlspecialchars($this->input->post('role', true)),
            'is_active'=> $data['user']['is_active'],
            'date_created'=> $data['user']['date_created']
        ];
        $where=array('id'=>$id);
       
        $this->db->where($where);
        $this->db->update('user',$set);
        $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil diubah!</div>');
        redirect('admin/detail_user/'.$id);
        }else
        {
            $id=$data['user']['id'];
            $set = [
                'name'=> htmlspecialchars($this->input->post('name', true)),
                'email'=> htmlspecialchars($this->input->post('email', true)),
                'password'=>password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                'role_id' => htmlspecialchars($this->input->post('role', true)),
                'is_active'=> $data['user']['is_active'],
                'date_created'=> $data['user']['date_created']
            ];
            $where=array('id'=>$id);
           
            $this->db->where($where);
            $this->db->update('user',$set);
            
            $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil diubah!</div>');
            redirect('admin/detail_user/'.$id);
    }
}
public function hapus($id = null){
    $delete = $this->_user->_hapus($id);
    if ($data=true) {
        $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil dihapus!</div>');
        redirect('admin/data_user/');
    }else{
        $this->session->set_flashdata('message','<div class="alert alert-danger">Data gagal dihapus!</div>');
        redirect('admin/data_user/');
    }
}

public function content(){
    $data['user'] = $this->db->get_where('user',['id'=> $this->session->userdata('id')])->row_array();
    $data['role'] = $this->db->get_where('user_role',['id'=> $data['user']['role_id']])->row_array();
    
    if ($key=$this->input->post('key')) {
        $data['data_content'] = $this->_content->get_content_keyword($key)->result();
    }else{
        $data['data_content'] = $this->_content->getcontent()->result();
    }
    $data['title']="Data content";
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/toolbar', $data);
    $this->load->view('admin/data_content', $data);
    $this->load->view('templates/footer');

}


public function upload_content($id = null){
    $data['user'] = $this->db->get_where('user',['id'=> $this->session->userdata('id')])->row_array();
    $data['role'] = $this->db->get_where('user_role',['id'=> $data['user']['role_id']])->row_array();
    $data['title']="Upload content";
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/toolbar', $data);
    $this->load->view('admin/upload_content', $data);
    $this->load->view('templates/footer');
    
}

public function upcontent(){
    $image=$_FILES['gambar'];
   
    $config['upload_path'] = './assets/img/content';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['file_name']=time().'-'.substr(md5(rand()),0,10).'.'.'jpg';
    $config['max_size']  = '2048';
    
  
    $this->load->library('upload', $config);
     // Load konfigurasi uploadnya

    if ($image['error']==4) {
        $this->session->set_flashdata('message','<div class="alert alert-danger">input foto kosong!</div>');
        redirect('admin/upload_content');
    }else{
        if($this->upload->do_upload('gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
        // Jika berhasil :
        $time=time();
        $set = [
            'image'=> $config['file_name'],
            'judul'=> $this->input->post('judul', true),
            'isi'=> $this->input->post('ckeditor', true),
            'kategory_id'=> $this->input->post('kategory', true),
            'date_created'=> $time,
            'date'=>date('Y-m-d',$time)
        ];
       

        $this->db->insert('content',$set);
        
        $this->session->set_flashdata('message','<div class="alert alert-success">Content berhasil di upload!</div>');
        redirect('admin/upload_content');
        }else{
         $error=$this->upload->display_errors();
        // Jika gagal :
        $this->session->set_flashdata('message',$error);
        redirect('admin/upload_content');
        }
    }
    
}
public function hapus_content($id = null){
    $delete = $this->_content->_hapus_content($id);
    if ($data=true) {
        $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil dihapus!</div>');
        redirect('admin/content/');
    }else{
        $this->session->set_flashdata('message','<div class="alert alert-danger">Data gagal dihapus!</div>');
        redirect('admin/content/');
    }
}

public function detail_content($id=null){
    $data['user'] = $this->db->get_where('user',['id'=> $this->session->userdata('id')])->row_array();
    $data['role'] = $this->db->get_where('user_role',['id'=> $data['user']['role_id']])->row_array();
    $data['data_content'] = $this->_content->getcontent_byid($id)->row_array();
    $data['title']="Detail Content";
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/toolbar', $data);
    $this->load->view('admin/detail_content', $data);
    $this->load->view('templates/footer');
}
public function updatecontent($id=null){
    $image=$_FILES['gambar'];
    if ($image['error']==4) {
        $set = [
            'judul'=> $this->input->post('judul', true),
            'isi'=> $this->input->post('ckeditor', true),
            'kategory_id'=> $this->input->post('kategory', true)
        ];
        $where=array('id'=>$id);
        $this->db->where($where);
        $this->db->update('content',$set);

        $this->session->set_flashdata('message','<div class="alert alert-success">Content berhasil di upload!</div>');
        redirect('admin/detail_content/'.$id);
    }else{
    $image=$_FILES['gambar'];
   
    $config['upload_path'] = './assets/img/content';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['file_name']=time().'-'.substr(md5(rand()),0,10).'.'.'jpg';
    $config['max_size']  = '2048';
    
  
    $this->load->library('upload', $config);
     // Load konfigurasi uploadnya

    if ($image['error']==4) {
        $this->session->set_flashdata('message','<div class="alert alert-danger">input foto kosong!</div>');
        redirect('admin/detail_content/'.$id);
    }else{
        if($this->upload->do_upload('gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
        // Jika berhasil :
        
        $set = [
            'image'=> $config['file_name'],
            'judul'=> $this->input->post('judul', true),
            'isi'=> $this->input->post('ckeditor', true),
            'kategory_id'=> $this->input->post('kategory', true)
        ];
        $where=array('id'=>$id);
        $this->db->where($where);
        $this->db->update('content',$set);
        
        $this->session->set_flashdata('message','<div class="alert alert-success">Content berhasil di upload!</div>');
        redirect('admin/detail_content/'.$id);
        }else{
         $error=$this->upload->display_errors();
        // Jika gagal :
        $this->session->set_flashdata('message',$error);
        redirect('admin/detail_content/'.$id);
        }
    }
}
    
}

function kategory(){
   
    $data['user'] = $this->db->get_where('user',['id'=> $this->session->userdata('id')])->row_array();
    $data['role'] = $this->db->get_where('user_role',['id'=> $data['user']['role_id']])->row_array();
    $data['data_kategori'] = $this->db->get('kategory_content')->result();
    $data['title']="Kategori";
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/toolbar', $data);
    $this->load->view('admin/kategori', $data);
    $this->load->view('templates/footer');
}

function tambah_kategory(){
    $data = [
        'kategory'=> htmlspecialchars($this->input->post('kategory', true))
    ];
    
    $this->db->insert('kategory_content',$data);
    $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil di tambahakan!</div>');
     redirect('admin/kategory');
}

function hapus_kategory($id=null){
    
    if ($this->_content->_hapus_kategory($id)) {
        $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil dihapus!</div>');
        redirect('admin/kategory');
    }else{
        $this->session->set_flashdata('message','<div class="alert alert-danger">Data gagal dihapus!</div>');
        redirect('admin/kategory');
    }

     
}



}