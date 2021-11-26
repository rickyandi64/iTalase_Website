<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('email')){
            redirect('auth/login');
        }
        $this->load->model('model_barang');
    }
    
    // CRUD Kategori
    
    public function lihat_data_kategori(){
         $data['kategori']= $this->model_barang->tampilkan_data_kategori()->result();
         $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
         $data['title'] = "Data Kategori";
          $this->load->view('template_admin/header',$data);
          $this->load->view('template_admin/sidebar',$data);
          $this->load->view('admin/data_barang/kategori/lihat_data_kategori',$data);
          $this->load->view('template_admin/footer');
    }
    public function tambah_data_kategori(){
        $this->form_validation->set_rules('name_kategori', 'Nama Supplier', 'trim|required',[
            'required' => 'Kolom Nama Supplier masih kosong silahkan di isi'
        ]);
        if($this->form_validation->run() == false){
         
          $data['user'] = $this->db->get_where('pengguna',['email'=> $this->session->userdata('email')])->row_array();
            $data['title'] = "Tambah Data Kategori";
            $this->load->view('Template_admin/header',$data);
            $this->load->view('Template_admin/sidebar',$data);
            $this->load->view('admin/data_barang/kategori/tambah_data_kategori',$data);
            $this->load->view('Template_admin/footer');
     }else{
            $nama_kategori   =   $this->input->post('name_kategori');
         
            $data      = array('nama_kategori'           =>$nama_kategori);
            $this->model_barang->tambah_data_kategori($data);
            $this->session->set_flashdata('messange','<div class="alert alert-success" role="alert">
                Data Kategori berhasil di tambah!
             </div>');
            redirect('barang/lihat_data_kategori');
     }     
   }
   
   public function edit_data_kategori(){
         if (isset($_POST['submit'])){
            $id_kategori     =   $this->input->post('id_kategori');
            $nama_kategori   =   $this->input->post('name_kategori');
            
            $data      = array('nama_kategori'           =>$nama_kategori,
                               'id_kategori'             =>$id_kategori);
            $this->model_barang->edit_kategori($data,$id_kategori);
            $this->session->set_flashdata('messange','<div class="alert alert-success" role="alert">
                Data Kategori berhasil di rubah!
             </div>');
            redirect('barang/lihat_data_kategori');
          }else{
                $id_kategori = $this->uri->segment(3);
                $data['record'] = $this->model_barang->get_one_kategori($id_kategori)->row_array();
                $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
                $data['title'] = "Edit Data Kategori";
                $this->load->view('template_admin/header',$data);
                $this->load->view('template_admin/sidebar',$data);

                $this->load->view('admin/data_barang/kategori/edit_data_kategori',$data);
                $this->load->view('template_admin/footer'); 
          }
   }
   
   public function hapus_data_kategori(){
         $id_kategori = $this->uri->segment(3);
         $this->model_barang->delete_kategori($id_kategori);
                     $this->session->set_flashdata('messange','<div class="alert alert-success" role="alert">
                Data Kategori berhasil di hapus!
             </div>');
         redirect('barang/lihat_data_kategori');
   }
   
   //CRUD Supplier
    
//    public function lihat_data_supplier(){
//         $data['supplier']= $this->model_barang->tampilkan_data_supplier()->result();
//         $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
//         $data['title'] = "Data Supplier";
//          $this->load->view('template_admin/header',$data);
//          $this->load->view('template_admin/sidebar',$data);
//          $this->load->view('admin/data_barang/supplier/lihat_data_supplier',$data);
//          $this->load->view('template_admin/footer');
//    }
//    public function tambah_data_supplier(){
//        $this->form_validation->set_rules('name_supplier', 'Nama Supplier', 'trim|required',[
//            'required' => 'Kolom Nama Supplier masih kosong silahkan di isi'
//        ]);
//        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'trim|required',[
//            'required' => 'Kolom Nomor Hp masih kosong silahkan di isi'
//        ]);
//        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required',[
//            'required' => 'Kolom Alamat masih kosong silahkan di isi'
//        ]);
//        $this->form_validation->set_rules('desc', 'Deskripsi', 'trim|required',[
//            'required' => 'Kolom Deskripsi masing kosong silahkan di isi'
//        ]);
//        if($this->form_validation->run() == false){
//         
//          $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
//          $data['title'] = "Tambah Data Supplier";
//          $this->load->view('template_admin/header',$data);
//          $this->load->view('template_admin/sidebar',$data);
//          $this->load->view('admin/data_barang/Supplier/tambah_data_supplier',$data);
//          $this->load->view('template_admin/footer');   
//     }else{
//            $nama_supplier   =   $this->input->post('name_supplier');
//            $no_hp           =   $this->input->post('no_hp');
//            $alamat          =   $this->input->post('alamat');
//            $desc            =   $this->input->post('desc');
//         
//            $data      = array('name'           =>$nama_supplier,
//                               'phone'          =>$no_hp,
//                               'address'        =>$alamat,
//                               'description'    => $desc);
//            $this->model_barang->tambahkan_data_supplier($data);
//            $this->session->set_flashdata('messange','<div class="alert alert-success" role="alert">
//                Data Supplier berhasil di tambah!
//             </div>');
//            redirect('barang/lihat_data_supplier');
//     }
//    }
//    public function edit_data_supplier(){
//            
//          if (isset($_POST['submit'])){
//            $id_supplier     =   $this->input->post('id_supplier');
//            $nama_supplier   =   $this->input->post('name_supplier');
//            $no_hp           =   $this->input->post('no_hp');
//            $alamat          =   $this->input->post('alamat');
//            $desc            =   $this->input->post('desc');
//            
//            $data      = array('name'           =>$nama_supplier,
//                               'phone'          =>$no_hp,
//                               'address'        =>$alamat,
//                               'description'    => $desc,
//                               'updated'        => date('Y-m-d H:i:s'));
//            $this->model_barang->edit_supplier($data,$id_supplier);
//            $this->session->set_flashdata('messange','<div class="alert alert-success" role="alert">
//                Data Supplier berhasil di rubah!
//             </div>');
//            redirect('barang/lihat_data_supplier');
//          }else{
//                $id_supplier = $this->uri->segment(3);
//                $data['record'] = $this->model_barang->get_one_supplier($id_supplier)->row_array();
//                $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
//                $data['title'] = "Edit Data Supplier";
//                $this->load->view('template_admin/header',$data);
//                $this->load->view('template_admin/sidebar',$data);
//
//                $this->load->view('admin/data_barang/Supplier/edit_data_supplier',$data);
//                $this->load->view('template_admin/footer'); 
//          }
//          
//   }
//    public function hapus_data_supplier(){
//        $id_supplier = $this->uri->segment(3);
//        $this->model_barang->delete_supplier($id_supplier);
//             $this->session->set_flashdata('messange','<div class="alert alert-success" role="alert">
//                Data Supplier berhasil di hapus!
//             </div>');
//         redirect('barang/lihat_data_supplier');
//        
//    }
//    
    //CRUD Barang 
    public function lihat_data_barang(){
         $data['barang']= $this->model_barang->tampilkan_data_barang()->result();
         $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
         $data['title'] = "Data Barang";
          $this->load->view('template_admin/header',$data);
          $this->load->view('template_admin/sidebar',$data);
          $this->load->view('admin/data_barang/barang/lihat_data_barang',$data);
          $this->load->view('template_admin/footer');
    }
    
    public function tambah_data_barang(){
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required',[
            'required' => 'Kolom Nama Barang masih kosong silahkan di isi'
        ]);
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'trim|required',[
            'required' => 'Kolom Harga Jual masih kosong silahkan di isi'
        ]);
        $this->form_validation->set_rules('harga_modal', 'Harga Modal', 'trim|required',[
            'required' => 'Kolom Harga Modal masih kosong silahkan di isi'
        ]);
        $this->form_validation->set_rules('desc', 'Deskripsi', 'trim|required',[
            'required' => 'Kolom Deskripsi masing kosong silahkan di isi'
        ]);
        $this->form_validation->set_rules('jumlah_stok', 'Jumlah Stok', 'trim|required',[
            'required' => 'Kolom Jumlah Stok masing kosong silahkan di isi'
        ]);
        $this->form_validation->set_rules('berat', 'Berat Barang', 'trim|required',[
            'required' => 'Kolom Berat Barang masing kosong silahkan di isi'
        ]);
        
        if($this->form_validation->run() == TRUE){
            $config['upload_path'] = './assets/img/barang/';
            $config['allowed_types'] = 'gif|png|jpg|jpeg|ico';
            $config['max_sixe']     = '10000';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $field_name="gambar";
            
            if(!$this->upload->do_upload($field_name)){
                redirect('barang/tambah_data_barang');
            }else{
                
                $upload_data      = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image']  = './assets/img/barang/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                
                $data = array(
                'nama_barang'     => $this->input->post('nama_barang'),
                'id_kategori'     => $this->input->post('nama_kategori'),
//                'id_supplier'     => $this->input->post('nama_supplier'),
                'harga_jual'      => $this->input->post('harga_jual'),
                'harga_modal'     => $this->input->post('harga_modal'),
                'deskripsi'       => $this->input->post('desc'),
                'berat'           => $this->input->post('berat'),
                'jumlah_stok'     => $this->input->post('jumlah_stok'),
                'gambar'          => $upload_data ['uploads']['file_name'],
                
            );
                
                $this->model_barang->tambahkan_data_barang($data);
                $this->session->set_flashdata('messange','<div class="alert alert-success" role="alert">
                    Data Barang berhasil di rubah!
                 </div>');
                redirect('barang/lihat_data_barang');
            }
               
        }
                $data['kategori'] = $this->model_barang->tampilkan_data_kategori()->result();
//                $data['supplier'] = $this->model_barang->tampilkan_data_supplier()->result();
                $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
                $data['title'] = "Tambah Data Barang";
                $this->load->view('template_admin/header',$data);
                $this->load->view('template_admin/sidebar',$data);
                $this->load->view('admin/data_barang/barang/tambah_data_barang',$data);
                $this->load->view('template_admin/footer');
    }
    public function edit_data_barang(){
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required',[
            'required' => 'Kolom Nama Barang masih kosong silahkan di isi'
        ]);
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'trim|required',[
            'required' => 'Kolom Harga Jual masih kosong silahkan di isi'
        ]);
        $this->form_validation->set_rules('harga_modal', 'Harga Modal', 'trim|required',[
            'required' => 'Kolom Harga Modal masih kosong silahkan di isi'
        ]);
        $this->form_validation->set_rules('desc', 'Deskripsi', 'trim|required',[
            'required' => 'Kolom Deskripsi masing kosong silahkan di isi'
        ]);
        $this->form_validation->set_rules('jumlah_stok', 'Jumlah Stok', 'trim|required',[
            'required' => 'Kolom Jumlah Stok masing kosong silahkan di isi'
        ]); 
        $this->form_validation->set_rules('berat', 'Berat Barang', 'trim|required',[
            'required' => 'Kolom Berat Barang masing kosong silahkan di isi'
        ]);
        if($this->form_validation->run() == TRUE){
            $config['upload_path'] = './assets/img/barang/';
            $config['allowed_types'] = 'gif|png|jpg|jpeg|ico';
            $config['max_sixe']     = '10000';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $field_name="gambar";
            
            if(!$this->upload->do_upload($field_name)){
                 $id_barang = $this->uri->segment(3);
                $data['record'] = $this->model_barang->get_one_barang($id_barang)->row_array();
                $data['kategori'] = $this->model_barang->tampilkan_data_kategori()->result();
//                $data['supplier'] = $this->model_barang->tampilkan_data_supplier()->result();
                $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
                $data['title'] = "Edit Data Barang";
                $this->load->view('template_admin/header',$data);
                $this->load->view('template_admin/sidebar',$data);
                $this->load->view('admin/data_barang/barang/edit_data_barang',$data);
                $this->load->view('template_admin/footer');
            }else{
                
               $barang = $this->model_barang->get_one_barang($id_barang);
               if($barang->gambar !=""){
                   unlink('./assets/img/barang/' . $barang->gambar);
               }
                $upload_data      = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image']  = './assets/img/barang/' . $upload_data['uploads']['file_name'];
                $config['upload_path'] = FCPATH.'./assets/img/barang/';
                $this->load->library('image_lib', $config);
                $id_barang      = $this->input->post('id_barang');
                $data = array(
                'nama_barang'     => $this->input->post('nama_barang'),
                'id_kategori'     => $this->input->post('nama_kategori'),
//                'id_supplier'     => $this->input->post('nama_supplier'),
                'harga_jual'      => $this->input->post('harga_jual'),
                'harga_modal'     => $this->input->post('harga_modal'),
                'berat'           => $this->input->post('berat'),
                'deskripsi'       => $this->input->post('desc'),
                'jumlah_stok'     => $this->input->post('jumlah_stok'),
                'gambar'          => $upload_data ['uploads']['file_name'],
                
            );
                
                $this->model_barang->edit_data_barang($data,$id_barang);
                $this->session->set_flashdata('messange','<div class="alert alert-success" role="alert">
                    Data Barang berhasil di rubah!
                 </div>');
                redirect('barang/lihat_data_barang');
            }
                $id_barang      = $this->input->post('id_barang');
                $data = array(
                'nama_barang'     => $this->input->post('nama_barang'),
                'id_kategori'     => $this->input->post('nama_kategori'),
//                'id_supplier'     => $this->input->post('nama_supplier'),
                'harga_jual'      => $this->input->post('harga_jual'),
                'harga_modal'     => $this->input->post('harga_modal'),
                'deskripsi'       => $this->input->post('desc'),
                'jumlah_stok'     => $this->input->post('jumlah_stok'),
                
                
            );
                
                $this->model_barang->edit_data_barang($data,$id_barang);
                $this->session->set_flashdata('messange','<div class="alert alert-success" role="alert">
                    Data Barang berhasil di rubah!
                 </div>');
                redirect('barang/lihat_data_barang');
        }
                $id_barang = $this->uri->segment(3);
                $data['record'] = $this->model_barang->get_one_barang($id_barang)->row_array();
                $data['kategori'] = $this->model_barang->tampilkan_data_kategori()->result();
//                $data['supplier'] = $this->model_barang->tampilkan_data_supplier()->result();
                $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
                $data['title'] = "Edit Data Barang";
                $this->load->view('template_admin/header',$data);
                $this->load->view('template_admin/sidebar',$data);
                $this->load->view('admin/data_barang/barang/edit_data_barang',$data);
                $this->load->view('template_admin/footer');
        }
        
        public function hapus_data_barang(){
               $id_barang = $this->uri->segment(3);
               $barang = $this->model_barang->get_one_barang($id_barang);
               if($barang->gambar !=""){
                   unlink('./assets/img/barang/' .$barang->gambar);
               }
               
               $this->model_barang->delete_barang($id_barang);
               $this->session->set_flashdata('messange','<div class="alert alert-success" role="alert">
                   Data Supplier berhasil di hapus!
               </div>');
               redirect('barang/lihat_data_barang');
            
        }
        //CRUD Gambar Barang
        public function lihat_data_gambar_barang(){
                $data['gambar']= $this->model_barang->tampilkan_data_gambar_barang();
                $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
                $data['title'] = "Gambar Barang";
                $this->load->view('template_admin/header',$data);
                $this->load->view('template_admin/sidebar',$data);
                $this->load->view('admin/data_barang/gambar_barang/lihat_gambar_barang',$data);
                $this->load->view('template_admin/footer');
        }
        public function tambah_data_gambar_barang($id_barang){
        $this->form_validation->set_rules('ket', 'Keterangan', 'trim|required',[
            'required' => 'Kolom Keterangan masih kosong silahkan di isi'
        ]);
        
        
        if($this->form_validation->run() == TRUE){
            $config['upload_path'] = './assets/img/gambar_barang/';
            $config['allowed_types'] = 'gif|png|jpg|jpeg|ico|jfif';
            $config['max_sixe']     = '10000';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $field_name="gambar";
            
            if(!$this->upload->do_upload($field_name)){
                $id_barang = $this->uri->segment(3);
                $data['gambar'] = $this->model_barang->get_one_gambar_barang($id_barang);
                $data['barang'] = $this->model_barang->get_one_data_barang($id_barang);
                $data['data_barang'] = $this->model_barang->get_one_barang($id_barang)->row_array();
                //$data['gambar']= $this->model_barang->tampilkan_data_gambar_barang();
                $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
                $data['title'] = "Gambar Barang";
                $this->load->view('template_admin/header',$data);
                $this->load->view('template_admin/sidebar',$data);
                $this->load->view('admin/data_barang/gambar_barang/tambah_gambar_barang',$data);
                $this->load->view('template_admin/footer');
            }else{
                
                $upload_data      = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image']  = './assets/img/gambar_barang/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                
                $data = array(
                'id_barang'       => $id_barang,
                'ket'             => $this->input->post('ket'),
                'gambar'          => $upload_data ['uploads']['file_name'],
                
            );
                
                $this->model_barang->tambahkan_data_gambar_barang($data);
                $this->session->set_flashdata('messange','<div class="alert alert-success" role="alert">
                    Data Gambar Barang berhasil di tambahkan!
                 </div>');
                redirect('barang/tambah_data_gambar_barang/'. $id_barang);
            }  
        }
                $id_barang = $this->uri->segment(3);
                $data['gambar'] = $this->model_barang->get_one_gambar_barang($id_barang);
                $data['barang'] = $this->model_barang->get_one_data_barang($id_barang);
                $data['data_barang'] = $this->model_barang->get_one_barang($id_barang)->row_array();
                //$data['gambar']= $this->model_barang->tampilkan_data_gambar_barang();
                $data['user'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
                $data['title'] = "Gambar Barang";
                $this->load->view('template_admin/header',$data);
                $this->load->view('template_admin/sidebar',$data);
                $this->load->view('admin/data_barang/gambar_barang/tambah_gambar_barang',$data);
                $this->load->view('template_admin/footer');
    }
    public function delete_data_gambar_barang($id_barang,$id_gambar){
    
        $gambar = $this->model_barang->get_one_data_gambar($id_gambar);
        if($gambar->gambar !=""){
                   unlink('./assets/img/gambar_barang/' .$gambar->gambar);
               }
               $data = array('id_gambar' => $id_gambar);
               $this->model_barang->delete_data_gambar_barang($data);
               $this->session->set_flashdata('messange','<div class="alert alert-success" role="alert">
                   Gambar berhasil di hapus!
               </div>');
               redirect('barang/tambah_data_gambar_barang/'. $id_barang);
        
    }
}