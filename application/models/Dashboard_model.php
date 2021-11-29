<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    public function rekap_penjualan_perbarang()
    {

        //sql read
        $this->db->select('barang.judul');
        $this->db->select('COUNT(penjualan_barang.barang_id) AS total_penjualan');
        $this->db->from('penjualan');
        $this->db->join('barang', 'penjualan.barang_id = barang.id');
        $this->db->group_by('barang.judul');
        $this->db->order_by('COUNT(penjualan.barang_id) DESC');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function rekap_penjualan_perhari()
    {

        //sql read
        $this->db->select('penjualan.tanggal_jual');
        $this->db->select('COUNT(penjualan.barang_id) AS total_barang');
        $this->db->from('penjualan_barang');
        $this->db->join('penjualan', 'penjualan_barang.penjualan_id = penjualan.id');
        $this->db->group_by('penjualan.tanggal_jual');
        $this->db->order_by('penjualan.tanggal_jual', 'DESC');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function rekap_penjualan_perbarang()
    {

        //sql read
        $this->db->select('anggota.nama');
        $this->db->select('COUNT(penjualan.barang_id) AS total_penjualan');
        $this->db->from('penjualan');
        $this->db->join('penjualan', 'penjualan_barang.penjualan_id = penjualan_id');
        $this->db->join('anggota', 'penjualan.nim = anggota.nim');
        $this->db->group_by('anggota.nama');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function total_penjualan_barang()
    {

        //sql read
        $this->db->select('COUNT(penjualan_barang.barang_id) AS total');
        $this->db->from('penjualan_barang');
        $query = $this->db->get();

        return $query->row_array();
    }

    public function total_pembelian_barang()
    {

        //sql read
        $this->db->select('COUNT(pembelian_barang.barang_id) AS total');
        $this->db->from('pembelian_barang');
        $query = $this->db->get();

        return $query->row_array();
    }
}
