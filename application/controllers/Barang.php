<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (empty($this->session->userdata('id'))) {
            redirect('user/login');
        }

        //memanggil model
        $this->load->model(array('barang_model', 'kategori_barang_model'));
    }

    public function index()
    {
        //mengarahkan ke function read
        $this->read();
    }

    public function read()
    {
        //memanggil function read pada barang model
        //function read berfungsi mengambil/read data dari table barang di database
        $data_barang = $this->barang_model->read();

        //mengirim data ke view
        $output = array(
            'judul' => 'Daftar Barang',
            'theme_page' => 'Barang/barang_read',

            //data kota dikirim ke view
            'data_barang' => $data_barang
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function insert()
    {
        //mengambil daftar kategori barang dari table kategori barang
        $data_kategori = $this->kategori_barang_model->read();

        //mengirim data ke view
        $output = array(
            'judul' => 'Tambah Barang',
            'theme_page' => 'Barang/barang_insert',

            //mengirim daftar ke view
            'data_kategori' => $data_kategori,
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function insert_submit()
    {
        $this->form_validation->set_rules('kategori_id', 'Kategori', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('harga_beli', 'Beli', 'required|numeric');
        $this->form_validation->set_rules('harga_jual', 'Jual', 'required|numeric');
        $this->form_validation->set_rules('stock', 'Stock', 'required|numeric');

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $this->insert();

            //jika validasi sukses
        } else {
            //menangkap data input dari view
            $kategori_id = $this->input->post('kategori_id');
            $nama = $this->input->post('nama');
            $harga_beli = $this->input->post('harga_beli');
            $harga_jual = $this->input->post('harga_jual');
            $stock = $this->input->post('stock');

            //mengirim data ke model
            $input = array(
                //format : nama field/kolom table => data input dari view
                'kategori_id' => $kategori_id,
                'nama' => $nama,
                'harga_beli' => $harga_beli,
                'harga_jual' => $harga_jual,
                'stock' => $stock,
            );

            //memanggil function insert pada kategori_barang model
            //function insert berfungsi menyimpan/create data ke table kategori_barang di database
            $data_barang = $this->barang_model->insert($input);

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

        //function read berfungsi mengambil 1 data dari table barang sesuai id yg dipilih
        $data_barang_single = $this->barang_model->read_single($id);

        //mengambil daftar kategori barang dari table kategori barang
        $data_kategori = $this->kategori_barang_model->read();

        //mengirim data ke view
        $output = array(
            'judul' => 'Ubah Barang',
            'theme_page' => 'Barang/barang_update',

            //mengirim data yang dipilih ke view
            'data_barang_single' => $data_barang_single,

            //mengirim daftar kategori barang ke view
            'data_kategori' => $data_kategori,
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function update_submit()
    {
        //menangkap id data yg dipilih dari view
        $id = $this->uri->segment(3);

        $this->form_validation->set_rules('kategori_id', 'Kategori_Barang', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|numeric');
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|numeric');
        $this->form_validation->set_rules('stock', 'Stock', 'required|numeric');

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $this->update();

            //jika validasi sukses
        } else {
            //menangkap data input dari view
            $kategori_id = $this->input->post('kategori_id');
            $nama = $this->input->post('nama');
            $harga_beli = $this->input->post('harga_beli');
            $harga_jual = $this->input->post('harga_jual');
            $stock = $this->input->post('stock');

            //mengirim data ke model
            $input = array(
                //format : nama field/kolom table => data input dari view
                'kategori_id' => $kategori_id,
                'nama' => $nama,
                'harga_beli' => $harga_beli,
                'harga_jual' => $harga_jual,
                'stock' => $stock,
            );

            //memanggil function update pada barang model
            //function update berfungsi merubah data ke table barang di database
            $this->barang_model->update($input, $id);

            //pesan
            $this->session->set_flashdata('message', 'Data berhasil diubah');

            //mengembalikan halaman ke function read
            redirect('barang/read');
        }
    }

    public function delete()
    {
        //menangkap id data yg dipilih dari view
        $id = $this->uri->segment(3);

        //memanggil function delete pada buku model
        $this->barang_model->delete($id);

        //pesan
        $this->session->set_flashdata('message', 'Data berhasil dihapus');

        //mengembalikan halaman ke function read
        redirect('barang/read');
    }

    public function pie()
    {
        //memanggil function read pada kota model
        //function read berfungsi mengambil/read data dari table kota di database
        $data_barang = $this->barang_model->read();

        //mengirim data ke view
        $output = array(
            'judul' => 'Pie Chart',
            'data_barang' => $data_barang,
            'theme_page' => 'chart_pie',
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function column()
    {
        //memanggil function read pada kota model
        //function read berfungsi mengambil/read data dari table kota di database
        $data_barang = $this->barang_model->read();

        //mengirim data ke view
        $output = array(
            'theme_page' => 'chart_column',
            'judul' => 'Column Chart',
            'data_barang' => $data_barang
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function line()
    {
        //memanggil function read pada barang model
        //function read berfungsi mengambil/read data dari table barang di database
        $data_barang = $this->barang_model->read();

        //mengirim data ke view
        $output = array(
            'judul' => 'Line Chart',
            'data_barang' => $data_barang,
            'theme_page' => 'chart_line',
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }
}
