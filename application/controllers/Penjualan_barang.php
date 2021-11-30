<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (empty($this->session->userdata('id'))) {
            redirect('user/login');
        }

        //memanggil model
        $this->load->model(array('penjualan_barang_model', 'penjualan_model', 'barang_model'));
    }

    public function index()
    {
        //mengarahkan ke function read
        $this->read();
    }

    public function read()
    {
        //memanggil function read pada penjualan_barang model
        //function read berfungsi mengambil/read data dari table penjualan_barang di database
        $data_penjualan_barang = $this->penjualan_barang_model->read();

        //mengirim data ke view
        $output = array(
            'judul' => 'Daftar penjualan_barang',
            'theme_page' => 'Penjualan_Barang/penjualan_barang_read',

            //data penjualan_barang dikirim ke view
            'data_penjualan_barang' => $data_penjualan_barang
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function insert()
    {
        //mengambil daftar penjualan dari table penjualan
        $data_penjualan = $this->penjualan_model->read();
        $data_barang = $this->barang_model->read();


        //mengirim data ke view
        $output = array(
            'judul' => 'Tambah penjualan barang',
            'theme_page' => 'Penjualan_Barang/penjualan_barang_insert',

            //mengirim daftar penjualan ke view
            'data_penjualan' => $data_penjualan,
            'data_barang' => $data_barang,
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function insert_submit()
    {
        //menangkap data input dari view
        $penjualan_id = $this->input->post('penjualan_id');
        $barang_id = $this->input->post('barang_id');

        //mengirim data ke model
        $input = array(
            //format : nama field/kolom table => data input dari view
            'penjualan_id' => $penjualan_id,
            'barang_id' => $barang_id,
        );

        //memanggil function insert pada penjualan_barang model
        //function insert berfungsi menyimpan/create data ke table penjualan_barang di database
        $data_penjualan_barang = $this->penjualan_barang_model->insert($input);

        //mengembalikan halaman ke function read
        redirect('penjualan_barang/read');
    }

    public function update()
    {
        //menangkap id data yg dipilih dari view (parameter get)
        $penjualan_id = $this->uri->segment(3);

        //function read berfungsi mengambil 1 data dari table penjualan_barang sesuai id yg dipilih
        $data_penjualan_barang_single = $this->penjualan_barang_model->read_single($penjualan_id);

        //mengambil daftar penjualan dari table penjualan
        $data_penjualan = $this->penjualan_model->read();
        $data_barang = $this->barang_model->read();

        //mengirim data ke view
        $output = array(
            'judul' => 'Ubah penjualan barang',
            'theme_page' => 'Penjualan_Barang/penjualan_barang_update',

            //mengirim data penjualan_barang yang dipilih ke view
            'data_penjualan_barang_single' => $data_penjualan_barang_single,

            //mengirim daftar penjualan ke view
            'data_penjualan' => $data_penjualan,
            'data_barang' => $data_barang,
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function update_submit()
    {
        //menangkap id data yg dipilih dari view
        $penjualan_id = $this->uri->segment(3);

        //menangkap data input dari view
        $penjualan_id = $this->input->post('penjualan_id');
        $barang_id = $this->input->post('barang_id');

        //mengirim data ke model
        $input = array(
            //format : nama field/kolom table => data input dari view
            'penjualan_id' => $penjualan_id,
            'barang_id' => $barang_id,
        );

        //memanggil function update pada penjualan_barang model
        //function update berfungsi merubah data ke table penjualan_barang di database
        $data_penjualan_barang = $this->penjualan_barang_model->update($input, $penjualan_id);

        //mengembalikan halaman ke function read
        redirect('penjualan_barang/read');
    }

    public function delete()
    {
        //menangkap id data yg dipilih dari view
        $penjualan_id = $this->uri->segment(3);

        //memanggil function delete pada penjualan_barang model
        $data_penjualan_barang = $this->penjualan_barang_model->delete($penjualan_id);

        //mengembalikan halaman ke function read
        redirect('penjualan_barang/read');
    }
}
