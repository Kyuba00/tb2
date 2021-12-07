<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_model extends CI_Model
{

    //function read berfungsi mengambil/read data dari table penjualan di database
    public function read($barang_id = '', $search_param = array())
    {

        //sql read
        $this->db->select('penjualan.*');
        $this->db->select('barang.nama AS nama_barang');
        $this->db->select('(SELECT COUNT(penjualan_barang.barang_id) FROM penjualan_barang WHERE penjualan_barang.penjualan_id = penjualan.id) AS jumlah_terjual');
        $this->db->from('penjualan');
        $this->db->join('barang', 'penjualan.barang_id = barang.id');

        if ($barang_id != '')
            $this->db->where('penjualan.barang_id', $barang_id);

        //filter cari
        if (!empty($search_param['barang_id']) && $search_param['barang_id'] != '-') {
            $this->db->where('penjualan.barang_id', $search_param['barang_id']);
        }

        if (!empty($search_param['barang_nama']) && $search_param['barang_nama'] != '-') {
            $this->db->like('barang.nama', $search_param['barang_nama'], 'both');
        }

        if (!empty($search_param['tanggal_jual']) && $search_param['tanggal_jual'] != '-') {
            $this->db->where('penjualan.tanggal_jual >=', $search_param['tanggal_jual']);
        }
        //end filter

        $this->db->order_by('penjualan.tanggal_jual DESC');
        $query = $this->db->get();

        //$query->result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
    }

    //function read berfungsi mengambil/read data dari table penjualan di database
    public function read_single($id)
    {

        //sql read
        $this->db->select('penjualan.*');
        $this->db->select('barang.nama AS nama_barang');
        $this->db->select('barang.harga_jual AS harga_jual');
        $this->db->from('penjualan');
        $this->db->join('barang', 'penjualan.barang_id = barang.id');;

        //$id = id data yang dikirim dari controller (sebagai filter data yang dipilih)
        //filter data sesuai id yang dikirim dari controller
        $this->db->where('penjualan.id', $id);

        $query = $this->db->get();

        //query->row_array = mengirim data ke controller dalam bentuk 1 data
        return $query->row_array();
    }

    //function insert berfungsi menyimpan/create data ke table penjualan di database
    public function insert($input)
    {
        //$input = data yang dikirim dari controller
        return $this->db->insert('penjualan', $input);
    }

    //function update berfungsi merubah data ke table penjualan di database
    public function update($input, $id)
    {
        //$id = id data yang dikirim dari controller (sebagai filter data yang diubah)
        //filter data sesuai id yang dikirim dari controller
        $this->db->where('id', $id);

        //$input = data yang dikirim dari controller
        return $this->db->update('penjualan', $input);
    }

    //function delete berfungsi menghapus data dari table penjualan di database
    public function delete($id)
    {
        //$id = id data yang dikirim dari controller (sebagai filter data yang dihapus)
        $this->db->where('id', $id);
        return $this->db->delete('penjualan');
    }
}
