<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('email')){
            redirect('auth/login');
        }
        $this->load->model('Model_Pengguna');
    }
    public function index(){
       
          $data['barang']= $this->Model_Pengguna->tampilkan_data_barang();
          $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
          $data['title'] = "Website iTalase";
          $this->load->view('template_user/header',$data);
          $this->load->view('template_user/sidebar',$data);
          $this->load->view('user/dashboard_user',$data);
          $this->load->view('template_user/footer');
        
    }
    public function tampilkan_kategori_barang($id_kategori){
        $kategori = $this->Model_Pengguna->tampilkan_kategori_barang($id_kategori);
         $data['barang']= $this->Model_Pengguna->tampilkan_data_barang_id($id_kategori);
          $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
          $data['title'] = "Kategori Barang ". $kategori->nama_kategori;
          $this->load->view('template_user/header',$data);
          $this->load->view('template_user/sidebar',$data);
          $this->load->view('user/dashboard_user',$data);
          $this->load->view('template_user/footer');
    }
   
    public function detail_barang($id_barang){
          $data['gambar']= $this->Model_Pengguna->tampilkan_gambar_barang($id_barang);  
          $data['barang']= $this->Model_Pengguna->tampilkan_detail_barang($id_barang);
          $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
          $data['title'] = "Detail Barang";
          $this->load->view('template_user/header',$data);
          $this->load->view('template_user/sidebar',$data);
          $this->load->view('user/detail_barang',$data);
          $this->load->view('template_user/footer');
    }
    public function tambah_belanja(){
        $redirect_page = $this->input->post('redirect_page');
        
        $data = array(
            'id'     =>  $this->input->post('id'),
            'qty'    =>  $this->input->post('qty'),
            'price'  =>  $this->input->post('price'),
            'name'   =>  $this->input->post('name')
         );
        
        $this->cart->insert($data);
        redirect($redirect_page,'refresh');
    }
    public function tampilkan_belanja(){
        if(empty($this->cart->contents())){
            redirect('dashboard_user');
        }else{
          $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
          $data['title'] = "Keranjang Belanja";
          $this->load->view('template_user/header',$data);
          $this->load->view('template_user/sidebar',$data);
          $this->load->view('user/keranjang_belanja',$data);
          $this->load->view('template_user/footer');
        }
    } 
    public function update_belanja(){
        $i = 1;
        foreach($this->cart->contents() as $items){
            $data = array(
              'rowid' => $items['rowid'],
              'qty'   => $this->input->post($i.'[qty]') 
            );
            $this->cart->update($data);
            $i++;
            redirect('dashboard_user/tampilkan_belanja');
        }
    }
    public function hapus_belanja($rowid){
        $this->cart->remove($rowid);
        redirect('dashboard_user/tampilkan_belanja');
    }
    public function clear_belanja(){
        $this->cart->destroy();
        redirect('dashboard_user/tampilkan_belanja');
    }
    public function check_out_belanja(){
          $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
          $data['title'] = "Check Out Belanja";
          $this->load->view('template_user/header',$data);
          $this->load->view('template_user/sidebar',$data);
          $this->load->view('user/check_out_belanja',$data);
          $this->load->view('template_user/footer');
    }
}