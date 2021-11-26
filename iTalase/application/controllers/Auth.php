<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }
    
    public function index()
	{
                $data['title'] = "Website iTalase";
                $this->load->view('template_dashboard/header',$data);
                $this->load->view('template_dashboard/sidebar');
                $this->load->view('dashboard/index');
                $this->load->view('template_dashboard/footer');
	}
        public function blog1(){
                $data['title'] = "Daftar bansos yang cair November 2021: Ada BLT UMKM, diskon listrik PLN, hingga PKH ";
                $this->load->view('template_dashboard/header',$data);
                $this->load->view('dashboard/blog1');
                $this->load->view('template_dashboard/footer');
        }
        public function blog2(){
                $data['title'] = "5 Cara Meningkatkan Bisnis UKM Menjadi Lebih Berkembang.";
                $this->load->view('template_dashboard/header',$data);
                $this->load->view('dashboard/blog2');
                $this->load->view('template_dashboard/footer');
        }
        public function blog3(){
                $data['title'] = "Ini Kiat Sukses Mengembangkan Bisnis UMKM di Era Digital.";
                $this->load->view('template_dashboard/header',$data);
                $this->load->view('dashboard/blog3');
                $this->load->view('template_dashboard/footer');
        }
        public function blog4(){
                $data['title'] = "Ini Sederet Upaya Pemerintah Memajukan UMKM.";
                $this->load->view('template_dashboard/header',$data);
                $this->load->view('dashboard/blog4');
                $this->load->view('template_dashboard/footer');
        }
        public function login(){
            if ($this->session->userdata('id_role')==1){
                redirect('admin');
             }elseif($this->session->userdata('id_role')==2){
                 redirect('dashboard_user');
             }
            $this->form_validation->set_rules('email','Email','trim|required|valid_email',[
            'required' => 'Kolom Email masing kosong silahkan di isi',
            'valid_email' => 'Format Email anda salah'
            ]);
            $this->form_validation->set_rules('password','Password','trim|required',[
                'required' => 'Kolom Password anda masih kosong harap di isi'
            ]);
            
            if($this->form_validation->run()==false){
                $data['title'] = "Login iTalase";
                $this->load->view('template_login/header',$data);
                $this->load->view('login/login');
                $this->load->view('template_login/footer');
            }else{
               $this->_login(); 
            }
                
        }
        private function _login(){
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $user = $this->db->get_where('pengguna',['email' => $email])->row_array();
            
            if($user){
                if($user['is_active'] == 1){
                    if(password_verify($password,$user['password'])){
                        $data = [
                         'email' =>$user['email'],
                         'id_role' => $user['id_role']
                       ];
                       $this->session->set_userdata($data);
                       if($user['id_role']== 1) {
                           redirect('admin');
                       }else{
                            redirect('dashboard_user');
                       }
                    }else{
                       $this->session->set_flashdata('messange','<div class="alert alert-danger" role="alert">
                        Password anda salah
                      </div>');
                    redirect('auth/login'); 
                    }
                    
                }else{
                    $this->session->set_flashdata('messange','<div class="alert alert-danger" role="alert">
                        Akun anda belum aktif !
                      </div>');
                    redirect('auth/login');
                }
            }else{
                $this->session->set_flashdata('messange','<div class="alert alert-danger" role="alert">
                Email anda belum terdaftar !
              </div>');
            redirect('auth/login');
            }
        }
        public function register(){
                
            $this->form_validation->set_rules('name','Name','required|trim',[
            'required' => 'Kolom Nama masih kosong silahkan di isi'
        ]);
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[pengguna.email]',[
            'required' => 'Kolom Email masing kosong silahkan di isi',
            'is_unique' => 'Email anda Sudah Pernah terdaftar',
            'valid_email' => 'Format Email anda salah'
        ]);
        
        $this->form_validation->set_rules('password1','Password','required|trim|min_length[5]|matches[password2]',[
            'required' => 'Kolom Password anda masih kosong harap di isi',
            'matches' => 'Password anda tidak sama',
            'min_length' => 'Password anda terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]',[
            'required' => 'Kolom Ulangi Password anda masih kosong harap di isi',
            'matches' => 'Password anda tidak sama',
            'min_length' => 'Password anda terlalu pendek'
        ]);

            if($this->form_validation->run() == false){
                $data['title'] = "Register iTalase";
                $this->load->view('template_login/header',$data);
                $this->load->view('login/register');
                $this->load->view('template_login/footer');
            }else{
               $email = $this->input->post('email',true); 
            $data = [
                
                'nama_pengguna' => htmlspecialchars($this->input->post('name',true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                'id_role' => 2,
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
            redirect('auth/login');
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
            }else if($type == 'forgot'){
            $this->email->subject('Reset Password');
            $this->email->message('Click Link untuk reset password : <a href="'.  base_url().'auth/resetpassword?email='. $this->input->post('email'). '&token='.urlencode($token).'">Reset Password</a> ');
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
      
      public function forgot_password(){
           $this->form_validation->set_rules('email','Email','trim|required|valid_email',[
            'required' => 'Kolom Email masing kosong silahkan di isi',
            'valid_email' => 'Format Email anda salah'
            ]);
          if($this->form_validation->run() == false){
              
              $data['title'] = "Lupa Password";
                $this->load->view('template_login/header',$data);
                $this->load->view('login/forgot_password');
                $this->load->view('template_login/footer');
          }else{
              $email = $this->input->post('email');
              $user = $this->db->get_where('pengguna',['email' => $email, 'is_active' => 1])->row_array();
          
              if($user){
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                
                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');
                
                $this->session->set_flashdata('messange','<div class="alert alert-success" role="alert">
                            Mohon di cek email anda untuk mengganti password anda
                     </div>');
            redirect('auth/forgot_password');
                
            }else{
                $this->session->set_flashdata('messange','<div class="alert alert-danger" role="alert">
                            Email Anda Belum Terdaftar atau belum aktif !
                     </div>');
            redirect('auth/forgot_password');
            }
          }
                
      }
      public function resetPassword(){
          $email = $this->input->get('email');
          $token = $this->input->get('token');

          $user = $this->db->get_where('pengguna',['email' =>$email])->row_array();
      
          if($user){
            $user_token = $this->db->get_where('user_token',['token'=> $token])->row_array();
            
            if($user_token){
                $this->session->set_userdata('reset_email', $email);
                $this->change_password();
            }else{
               $this->session->set_flashdata('messange','<div class="alert alert-danger" role="alert">
                            Reset Password gagal! Token anda salah
                     </div>');
            redirect('auth/login');  
            }
        }else{
           $this->session->set_flashdata('messange','<div class="alert alert-danger" role="alert">
                            Reset Password gagal! Alamat Email salah
                     </div>');
            redirect('auth/login'); 
        }
      }

      public function change_password(){
          $this->form_validation->set_rules('password1','Password','required|trim|min_length[5]|matches[password2]',[
            'required' => 'Kolom Password anda masih kosong harap di isi',
            'matches' => 'Password anda tidak sama',
            'min_length' => 'Password anda terlalu pendek'
            ]);
            $this->form_validation->set_rules('password2','Ulangi Password','required|trim|matches[password1]',[
                'required' => 'Kolom Ulangi Password anda masih kosong harap di isi',
                'matches' => 'Password anda tidak sama',
                'min_length' => 'Password anda terlalu pendek'
            ]);
            
          
            if($this->form_validation->run() == false){
                $data['title'] = "Ganti Password";
                $this->load->view('template_login/header',$data);
                $this->load->view('login/change_password');
                $this->load->view('template_login/footer');
            }else{
                $password = password_hash($this->input->post('password1'),PASSWORD_DEFAULT);
                $email = $this->session->userdata('reset_email');
                
                $this->db->set('password', $password);
                $this->db->where('email',$email);
                $this->db->update('pengguna');
                
                $this->session->unset_userdata('reset_email');
                
                $this->session->set_flashdata('messange','<div class="alert alert-success" role="alert">
                            Password anda sudah berubah! harap login kembali
                     </div>');
                redirect('auth/login'); 
            }
                
      }
      
        public function logout(){
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('id_role');
            
            $this->session->set_flashdata('messange','<div class="alert alert-success" role="alert">
                Terimakasih sudah mengujungi website iTalase
              </div>');
            redirect('auth/login');
            
        }
}
