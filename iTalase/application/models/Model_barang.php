<?php
class Model_barang extends CI_Model{
    
    //CRUD Kategori
    
    function tampilkan_data_kategori(){
        return $this->db->get('kategori');
    }
    function tambah_data_kategori($data){
        $this->db->insert('kategori',$data);
    }
    function get_one_kategori($id_kategori){
        $param = array('id_kategori'=>$id_kategori);
        return $this->db->get_where('kategori',$param);
    }
    function edit_kategori($data,$id_kategori){
        $this->db->where('id_kategori',$id_kategori);
        $this->db->update('kategori',$data);
    }
    function delete_kategori($id_kategori){
        $this->db->where('id_kategori',$id_kategori);
        $this->db->delete('kategori');
    }
    
    //CRUD Supplier
    
//    function tampilkan_data_supplier(){
//        return $this->db->get('supplier');
//    }
//    function tambahkan_data_supplier($data){
//        $this->db->insert('supplier',$data);
//    }
//     function get_one_supplier($id_supplier){
//        $param = array('id_supplier'=>$id_supplier);
//        return $this->db->get_where('supplier',$param);
//    }
//    function edit_supplier($data,$id_supplier){
//        $this->db->where('id_supplier',$id_supplier);
//        $this->db->update('supplier',$data);
//    }
//    function delete_supplier($id_supplier){
//        $this->db->where('id_supplier',$id_supplier);
//        $this->db->delete('supplier');
//    }
    
    //CRUD Barang
    
    function tampilkan_data_barang(){
        $query ="SELECT a.id_barang, a.nama_barang,a.berat, a.harga_jual,a.harga_modal,a.gambar,a.deskripsi,a.jumlah_stok,b.nama_kategori
                 FROM barang as a, kategori as b
                 WHERE a.id_kategori=b.id_kategori;";
        return $this->db->query($query);
    }
    function tambahkan_data_barang($data){
        $this->db->insert('barang',$data);
    }
    function edit_data_barang($data,$id_barang){
        $this->db->where('id_barang',$id_barang);
        $this->db->update('barang',$data);
    }
    function get_one_barang ($id_barang){
        $param = array('id_barang'=>$id_barang);
        return $this->db->get_where('barang',$param);
    }
    function delete_barang($id_barang){
        $this->db->where('id_barang',$id_barang);
        $this->db->delete('barang');
    }
    
    // CRUD Gambar Barang
    
    function tampilkan_data_gambar_barang(){
        $this->db->select('barang.*,COUNT(gambar_barang.id_barang) as total_gambar');
        $this->db->from('barang');
        $this->db->join('gambar_barang','gambar_barang.id_barang = barang.id_barang','left');
        $this->db->group_by('barang.id_barang');
        $this->db->order_by('barang.id_barang','desc');
        return $this->db->get()->result();
    }
    function get_one_gambar_barang ($id_barang){
       $this->db->select('*');
       $this->db->from('gambar_barang');
       $this->db->where('id_barang',$id_barang);
       return $this->db->get()->result();
       
    }
    function get_one_data_gambar($id_gambar){
        $this->db->select('*');
        $this->db->from('gambar_barang');
        $this->db->where('id_gambar',$id_gambar);
        return $this->db->get()->row();
    }
    function get_one_data_barang ($id_barang){
       $this->db->select('*');
       $this->db->from('barang');
       $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
       $this->db->where('id_barang',$id_barang);
       return $this->db->get()->row();
       
    }
    function tambahkan_data_gambar_barang($data){
         $this->db->insert('gambar_barang',$data);
    }
    function delete_data_gambar_barang($data){
        
        $this->db->where('id_gambar', $data['id_gambar']);
        $this->db->delete('gambar_barang',$data);
    }
}