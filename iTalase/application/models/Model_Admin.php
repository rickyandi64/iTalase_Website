<?php
class Model_Admin extends CI_Model{
    
    
    function total_barang(){
        return $this->db->get('barang')->num_rows();
   }
   function total_kategori(){
        return $this->db->get('kategori')->num_rows();
   }
   function data_setting(){
       $this->db->select('*');
       $this->db->from('tbl_setting');
       $this->db->where('id_setting',1);
       return $this->db->get()->row();
   }
   function edit_data_setting($data){
       $this->db->where('id_setting',$data['id_setting']);
       $this->db->update('tbl_setting',$data);
   }
}