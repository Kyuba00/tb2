<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (empty($this->session->userdata('id'))) {
            redirect('user/login');
        }

        //memanggil model
        $this->load->model(array('penjualan_model', 'barang_model'));
    }

    public function index()
    {
        //mengarahkan ke function read
        $this->read();
    }

    public function read()
    {
        //memanggil function read pada penjualan model
        //function read berfungsi mengambil/read data dari table penjualan di database
        $data_penjualan = $this->penjualan_model->read();

        //mengirim data ke view
        $output = array(
            'judul' => 'Daftar Penjualan',
            'theme_page' => 'Penjualan/penjualan_read',

            //data kota dikirim ke view
            'data_penjualan' => $data_penjualan
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function insert()
    {
        //mengambil daftar barang dari table barang
        $data_barang = $this->barang_model->read();

        //mengirim data ke view
        $output = array(
            'judul' => 'Tambah Penjualan',
            'theme_page' => 'Penjualan/penjualan_insert',

            //mengirim daftar ke view
            'data_barang' => $data_barang,
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function insert_submit()
    {
        $this->form_validation->set_rules('barang_id', 'Barang', 'required');
        $this->form_validation->set_rules('tanggal_jual', 'Tanggal', 'required');
        $this->form_validation->set_rules('harga_jual', 'Jual', 'required');
        $this->form_validation->set_rules('total', 'Total', 'required|numeric');

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $this->insert();

            //jika validasi sukses
        } else {
            //menangkap data input dari view
            $barang_id = $this->input->post('barang_id');
            $tanggal_jual = $this->input->post('tanggal_jual');
            $harga_jual = $this->input->post('harga_jual');
            $total = $this->input->post('total');

            //mengirim data ke model
            $input = array(
                //format : nama field/kolom table => data input dari view
                'barang_id' => $barang_id,
                'tanggal_jual' => $tanggal_jual,
                'harga_jual' => $harga_jual,
                'total' => $total,
            );

            //memanggil function insert pada barang model
            //function insert berfungsi menyimpan/create data ke table barang di database
            $this->barang_model->insert($input);

            //pesan
            $this->session->set_flashdata('message', 'Data berhasil ditambah');

            //mengembalikan halaman ke function read
            redirect('barang/read');
        }
    }

    public function update()
    {
        //menangkap id data yg dipilih dari view (parameter get)
        $id = $this->uri->segment(3);

        //function read berfungsi mengambil 1 data dari table penjualan sesuai id yg dipilih
        $data_penjualan_single = $this->penjualan_model->read_single($id);

        //mengambil daftar barang dari table barang
        $data_barang = $this->barang_model->read();

        //mengirim data ke view
        $output = array(
            'judul' => 'Ubah Penjualan',
            'theme_page' => 'Penjualan/penjualan_update',

            //mengirim data yang dipilih ke view
            'data_penjualan_single' => $data_penjualan_single,

            //mengirim daftar barang ke view
            'data_barang' => $data_barang,
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function update_submit()
    {
        //menangkap id data yg dipilih dari view
        $id = $this->uri->segment(3);

        $this->form_validation->set_rules('barang_id', 'Barang', 'required');
        $this->form_validation->set_rules('tanggal_jual', 'Tanggal', 'required');
        $this->form_validation->set_rules('total', 'Total', 'required|numeric');

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $this->update();

            //jika validasi sukses
        } else {
            //menangkap data input dari view
            $barang_id = $this->input->post('barang_id');
            $tanggal_jual = $this->input->post('tanggal_jual');
            $total = $this->input->post('total');

            //mengirim data ke model
            $input = array(
                //format : tanggal_jual field/kolom table => data input dari view
                'barang_id' => $barang_id,
                'tanggal_jual' => $tanggal_jual,
                'total' => $total,
            );

            //memanggil function update pada penjualan model
            //function update berfungsi merubah data ke table penjualan di database
            $this->penjualan_model->update($input, $id);

            //pesan
            $this->session->set_flashdata('message', 'Data berhasil diubah');

            //mengembalikan halaman ke function read
            redirect('penjualan/read');
        }
    }

    public function delete()
    {
        //menangkap id data yg dipilih dari view
        $id = $this->uri->segment(3);

        //memanggil function delete pada penjualan model
        $data_penjualan = $this->penjualan_model->delete($id);

        //mengembalikan halaman ke function read
        redirect('penjualan/read');
    }

    public function pie()
    {
        //memanggil function read pada kota model
        //function read berfungsi mengambil/read data dari table kota di database
        $data_penjualan = $this->penjualan_model->read();

        //mengirim data ke view
        $output = array(
            'judul' => 'Pie Chart',
            'data_penjualan' => $data_penjualan,
            'theme_page' => 'chart_pie',
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function column()
    {
        //memanggil function read pada kota model
        //function read berfungsi mengambil/read data dari table kota di database
        $data_penjualan = $this->penjualan_model->read();

        //mengirim data ke view
        $output = array(
            'theme_page' => 'chart_column',
            'judul' => 'Column Chart',
            'data_penjualan' => $data_penjualan
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function line()
    {
        //memanggil function read pada penjualan model
        //function read berfungsi mengambil/read data dari table penjualan di database
        $data_penjualan = $this->penjualan_model->read();

        //mengirim data ke view
        $output = array(
            'judul' => 'Line Chart',
            'data_penjualan' => $data_penjualan,
            'theme_page' => 'chart_line',
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }
}
