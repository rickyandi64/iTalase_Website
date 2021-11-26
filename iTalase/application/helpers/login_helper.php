<?php

function is_logged_in(){
    $ci = get_instance();
    
    if(!$ci->session->userdata('email')){
    
        redirect('auth/login');
    }else{
        $role_id = $ci->session->userdata('id_role');
        $menu = $ci->uri->segment(1);
        

            if($role_id = 2){
                redirect('dashboard_user');
            }
        
        }
}
