<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('email')){
            redirect('auth/login');
        }
        $this->load->model('Model_Admin');
    }
    
    public function index(){
        $data['barang']= $this->Model_Admin->total_barang();
        $data['kategori']= $this->Model_Admin->total_kategori();
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Dashboard Admin";
          $this->load->view('template_admin/header',$data);
          $this->load->view('template_admin/sidebar',$data);
          $this->load->view('admin/dashboard_admin',$data);
          $this->load->view('template_admin/footer');
        }
    public function edit_profile(){
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Edit Profile";
        
        $this->form_validation->set_rules('name', 'Nama Lengkap', 'trim|required',[
            'required' => 'Kolom Nama Lengkap masing kosong silahkan di isi'
        ]);
        $this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'trim|required',[
            'required' => 'Kolom Nama Usaha masing kosong silahkan di isi'
        ]);
        if($this->form_validation->run() == false){
            $this->load->view('template_admin/header',$data);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('admin/edit_profile',$data);
            $this->load->view('template_admin/footer');
        } else{
            $email = $this->input->post('email');
            $name = $this->input->post('name');
            $nama_usaha = $this->input->post('nama_usaha');
            
              $upload_image = $_FILES['image']['name'];
                
                if($upload_image){
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']      = '10000';
                    $config['upload_path']   = './assets/img/profile';
                    
                    $this->load->library('upload',$config);
                    
                    if($this->upload->do_upload('image')){
                        $old_image = $data['user']['image'];
                        if($old_image != 'default.jpg'){
                            unlink(FCPATH . 'assets/img/profile' . $old_image);
                        }

                        $new_image = $this->upload->data('file_name');
                        $this->db->set('image',$new_image);
                    }else{
                        echo $this->upload->display_errors();
                    }
                }
            
            $this->db->set('nama_pengguna',$name);
            $this->db->set('nama_usaha',$nama_usaha);
            $this->db->where('email',$email);
            $this->db->update('pengguna');
            
              $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                Profile anda sudah di update!
              </div>');
            redirect('admin/my_profile');
        }
          
    }
    public function my_profile(){
        $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Profile Saya";
          $this->load->view('template_admin/header',$data);
          $this->load->view('template_admin/sidebar',$data);
          $this->load->view('admin/my_profile',$data);
          $this->load->view('template_admin/footer');
        
    }
    
       public function ganti_password(){
        $data['user'] = $this->db->get_where('pengguna',['email'=> $this->session->userdata('email')])->row_array();
        $data['title'] = "Ganti Password";
        
        $this->form_validation->set_rules('current_password','Current Password','required|trim',[
            'required' => 'Kolom Password lama masih kosong silahkan di isi',
        ]);
        $this->form_validation->set_rules('new_password1','New Password','required|trim|min_length[3]|matches[new_password2]',[
            'required' => 'Kolom Password Baru masih kosong silahkan di isi',
        ]);
        $this->form_validation->set_rules('new_password2','Confirm New Password','required|trim|min_length[3]|matches[new_password1]',[
            'required' => 'Kolom Ulangi Password Baru masih kosong silahkan di isi',
        ]);
        
            if($this->form_validation->run() == false){
                $this->load->view('Template_admin/header',$data);
                $this->load->view('Template_admin/sidebar',$data);
                $this->load->view('admin/change_password',$data);
                $this->load->view('Template_admin/footer');
            } else{
                $current_password = $this->input->post('current_password');
                $new_password = $this->input->post('new_password1');
                if(!password_verify($current_password,$data['user']['password'])){
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    Password lama anda salah
                  </div>');
                redirect('admin/ganti_password');
                }else{
                    if($current_password == $new_password){
                        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    Password lama dengan password baru anda tidak sama 
                  </div>');
                    redirect('admin/ganti_password');
                    }else{
                        $password_hash = password_hash($new_password,PASSWORD_DEFAULT);
                        
                        $this->db->set('password',$password_hash);
                        $this->db->where('email',$this->session->userdata('email'));
                        $this->db->update('pengguna');
                        
                        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                                Selamat password lama anda telah di ganti
                              </div>');
                        redirect('admin/ganti_password');
                    }
                }
            }
            
    }
    public function lihat_data_setting(){
         $this->form_validation->set_rules('nama_toko','Nama Toko','required|trim',[
            'required' => 'Nama Toko masih kosong harap di isi dulu',
        ]);
        $this->form_validation->set_rules('no_telepon','No Telepon','required|trim',[
            'required' => 'No Telepon masih kosong harap di isi dulu',
        ]);
        $this->form_validation->set_rules('alamat_toko','alamat toko','required|trim',[
            'required' => 'Alamat Toko masih kosong harap di isi dulu',
        ]);
        
            if($this->form_validation->run() == false){
                $data['setting']= $this->Model_Admin->data_setting();
                $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
                $data['title'] = "Settings Toko";
                $this->load->view('template_admin/header',$data);
                $this->load->view('template_admin/sidebar',$data);
                $this->load->view('admin/tampilkan_setting',$data);
                $this->load->view('template_admin/footer');
            }else{
                $data = array(
                'id_setting'      => 1,
                'lokasi'          => $this->input->post('kota'),
                'nama_toko'       => $this->input->post('nama_toko'),
                'alamat_toko'     => $this->input->post('alamat_toko'),
                'no_telepon'      => $this->input->post('no_telepon')
               
                
            );
                
                $this->Model_Admin->edit_data_setting($data);
                $this->session->set_flashdata('messange','<div class="alert alert-success" role="alert">
                    Data Barang berhasil di rubah!
                 </div>');
                redirect('admin/lihat_data_setting');
            }
          
    }
}