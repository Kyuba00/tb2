<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_barang_model extends CI_Model
{

    //function read berfungsi mengambil/read data dari table penjualan_barang di database
    public function read($penjualan_id = '')
    {

        //sql read
        $this->db->select('penjualan_barang.*');
        $this->db->select('penjualan.tanggal_jual AS tanggal_jual');
        $this->db->select('barang.nama AS nama');
        $this->db->from('penjualan_barang');
        $this->db->join('penjualan', 'penjualan_barang.penjualan_id = penjualan.id');
        $this->db->join('barang', 'penjualan_barang.barang_id = barang.id');

        //filter data sesuai id yang dikirim dari controller
        if ($penjualan_id != '') {
            $this->db->where('penjualan_barang.penjualan_id', $penjualan_id);
        }

        $this->db->order_by('penjualan_barang.penjualan_id ASC, penjualan_barang.barang_id ASC');

        $query = $this->db->get();

        //$query->result_array = mengirim data ke controller dalam bentuk semua data
        return $query->result_array();
    }

    //function read berfungsi mengambil/read data dari table penjualan_barang di database
    public function read_single($penjualan_id)
    {

        //sql read
        $this->db->select('*');
        $this->db->from('penjualan_barang');

        //$penjualan_id = id data yang dikirim dari controller (sebagai filter data yang dipilih)
        //filter data sesuai id yang dikirim dari controller
        $this->db->where('penjualan_id', $penjualan_id);

        $query = $this->db->get();

        //query->row_array = mengirim data ke controller dalam bentuk 1 data
        return $query->row_array();
    }

    //function insert berfungsi menyimpan/create data ke table penjualan_barang di database
    public function insert($input)
    {
        //$input = data yang dikirim dari controller
        return $this->db->insert('penjualan_barang', $input);
    }

    //function update berfungsi merubah data ke table penjualan_barang di database
    public function update($input, $penjualan_id)
    {
        //$penjualan_id = id data yang dikirim dari controller (sebagai filter data yang diubah)
        //filter data sesuai id yang dikirim dari controller
        $this->db->where('penjualan_id', $penjualan_id);

        //$input = data yang dikirim dari controller
        return $this->db->update('penjualan_barang', $input);
    }

    //function delete berfungsi menghapus data dari table penjualan_barang di database
    public function delete($penjualan_id)
    {
        //$penjualan_id = id data yang dikirim dari controller (sebagai filter data yang dihapus)
        $this->db->where('penjualan_id', $penjualan_id);
        return $this->db->delete('penjualan_barang');
    }
}
