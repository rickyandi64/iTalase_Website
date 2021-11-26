<?php
class Model_user extends CI_Model{
  function tampilkan_data_user(){
        $query = "SELECT a.id_pengguna, a.nama_pengguna, a.email, a.nama_usaha,a.image, b.role, a.date_created
                FROM pengguna as a, user_role as b
                WHERE a.id_role=b.id;";
        return $this->db->query($query);
    }  
    function tampilkan_data_role(){
        return $this->db->get('user_role');
    }  
    function get_one_user($id_user){
        $param = array('id_pengguna'=>$id_user);
        return $this->db->get_where('pengguna',$param);
    }
    function delete_user($id_user){
        $this->db->where('id_pengguna',$id_user);
        $this->db->delete('pengguna');
    }
    
}
