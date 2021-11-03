<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
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
                $data['title'] = "Login iTalase";
                $this->load->view('template_login/header',$data);
                $this->load->view('login/login');
                $this->load->view('template_login/footer');
        }
        public function register(){
                $data['title'] = "Login iTalase";
                $this->load->view('template_login/header',$data);
                $this->load->view('login/register');
                $this->load->view('template_login/footer');
        }
}
