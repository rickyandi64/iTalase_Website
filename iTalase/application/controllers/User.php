<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('email')){
            redirect('auth/login');
        }
        $this->load->model('model_user');
    }
    
    public function lihat_data_user(){
        $data['pengguna']= $this->model_user->tampilkan_data_user()->result();
         $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Data Pengguna";
          $this->load->view('template_admin/header',$data);
          $this->load->view('template_admin/sidebar',$data);
          $this->load->view('admin/user/lihat_data_user',$data);
          $this->load->view('template_admin/footer');
    }
    public function tambah_data_user(){
        $this->form_validation->set_rules('name', 'Nama Lengkap', 'trim|required',[
            'required' => 'Kolom Nama Lengkap masing kosong silahkan di isi'
        ]);
        $this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'trim|required',[
            'required' => 'Kolom Nama Usaha masing kosong silahkan di isi'
        ]);
     if($this->form_validation->run() == false){
         $data['role'] = $this->model_user->tampilkan_data_role()->result();
         $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Tambah Data Pengguna";
          $this->load->view('template_admin/header',$data);
          $this->load->view('template_admin/sidebar',$data);
          $this->load->view('admin/user/tambah_data_user',$data);
          $this->load->view('template_admin/footer');   
     }else{
            $email = $this->input->post('email',true); 
            $data = [
                
                'nama_pengguna' => htmlspecialchars($this->input->post('name',true)),
                'email' => htmlspecialchars($email),
                'nama_usaha' => htmlspecialchars($this->input->post('nama_usaha',true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                'id_role' => htmlspecialchars($this->input->post('role',true)),
                'is_active' => 0,
                'date_created' => time()
                ];
            
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email'         =>  $email,
                'token'         => $token,
                'date_created'  => time() 
            ];
            
            $this->db->insert('pengguna',$data);
            $this->db->insert('user_token',$user_token);
            
            $this->_sendEmail($token, 'verify');
            
            $this->session->set_flashdata('messange','<div class="alert alert-success" role="alert">
                Selamat Akun anda berhasil di buat silahkan melakukan Aktivasi 
              </div>');
            redirect('user/lihat_data_user');
     }
    }
    private function _sendEmail($token, $type){
            $config = [
              'protocol'  => 'smtp',
              'smtp_host' => 'ssl://smtp.googlemail.com',
              'smtp_user' => 'italase5@gmail.com',
              'smtp_pass' => 'italase111121',
              'smtp_port' => 465,
              'mailtype'   => 'html',
              'charset'   => 'utf-8',
              'newline'   => "\r\n"
            ];
            
            $this->load->library('email', $config);
            $this->email->initialize($config);
            $this->email->from('italase5@gmail.com', 'Admin iTalase');
            $this->email->to($this->input->post('email'));
            
            if($type == 'verify'){
                $this->email->subject('Verifikasi Akun');
                $this->email->message('Click Link untuk verifikasi akun : <a href="'.  base_url().'auth/verify?email='. $this->input->post('email'). '&token='.urlencode($token).'">Klik Disini</a> ');
            }
            if($this->email->send()){
                return true;
            }else{
                echo $this->email->print_debugger();
                die;
            }
    }
            public function verify(){
         $email = $this->input->get('email');
         $token = $this->input->get('token');
         
         $user = $this->db->get_where('pengguna',['email' => $email])->row_array();
         
                 if($user){
            $user_token = $this->db->get_where('user_token',['token' => $token])->row_array();
            
            if($user_token){
                if(time() - $user_token['date_created'] < (60 * 60 *48)){
                    
                    $this->db->set('is_active',1);
                    $this->db->where('email',$email);
                    $this->db->update('pengguna');
                    
                    $this->db->delete('user_token',['email' =>$email]);
                    
                    $this->session->set_flashdata('messange','<div class="alert alert-success" role="alert">'.$email.' sudah aktif silahkan login</div>');
                   redirect('auth/login'); 
                }else{
                    
                    $this->db->delete('pengguna',['email' => $email]);
                    $this->db->delete('user_token',['email' =>$email]);
                    
                    $this->session->set_flashdata('messange','<div class="alert alert-danger" role="alert">
                    Akun aktivasi anda gagal! token anda sudah expired. 
                    </div>');
                   redirect('auth/login'); 
                }
            }else{
                $this->session->set_flashdata('messange','<div class="alert alert-danger" role="alert">
                Akun aktivasi anda gagal! token anda salah
                </div>');
               redirect('auth/login'); 
            }
        }else{
           $this->session->set_flashdata('messange','<div class="alert alert-danger" role="alert">
                Akun aktivasi anda gagal! email anda salah
             </div>');
            redirect('auth/login'); 
        }
      }
      
      public function edit_data_user(){
       $this->form_validation->set_rules('name', 'Nama Lengkap', 'trim|required',[
            'required' => 'Kolom Nama Lengkap masing kosong silahkan di isi'
        ]);
        $this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'trim|required',[
            'required' => 'Kolom Nama Usaha masing kosong silahkan di isi'
        ]);
       if($this->form_validation->run() == false){
         $id_user     = $this->uri->segment(3);
         $data['record'] = $this->model_user->get_one_user($id_user)->row_array();
         $data['role'] = $this->model_user->tampilkan_data_role()->result();
         $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
         $data['title'] = "Edit Data Pengguna";
          $this->load->view('template_admin/header',$data);
          $this->load->view('template_admin/sidebar',$data);
          $this->load->view('admin/user/edit_data_user',$data);
          $this->load->view('template_admin/footer');   
        }else{
            $email = $this->input->post('email');
            $name = $this->input->post('name');
            $nama_usaha = $this->input->post('nama_usaha');
            $role = $this->input->post('role');
            
            $this->db->set('nama_pengguna',$name);
            $this->db->set('nama_usaha',$nama_usaha);
            $this->db->set('id_role',$role);
            $this->db->where('email',$email);
            $this->db->update('pengguna');
            
              $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                Profile anda sudah di update!
              </div>');
            redirect('user/lihat_data_user');
        }
      }
      public function hapus_data_user(){
        $id_user = $this->uri->segment(3);
        $this->model_user->delete_user($id_user);
         redirect('user/lihat_data_user');
        }
        
}