<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //check manual
        if (!$this->session->userdata('id') || $this->session->userdata('type') != 'petugas') {
            redirect('auth/login');
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
        $penjualan_id = $this->uri->segment(3);

        $data_penjualan = $this->penjualan_model->read_single($penjualan_id);

        $data_penjualan_barang = $this->penjualan_barang_model->read($penjualan_id);

        //mengirim data ke view
        $output = array(
            'theme_page' => 'penjualan_barang_read',
            'judul' => 'Daftar penjualan',

            //data penjualan_barang dikirim ke view
            'data_penjualan' => $data_penjualan,
            'data_penjualan_barang' => $data_penjualan_barang,
            'penjualan_id' => $penjualan_id
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function insert()
    {
        $penjualan_id = $this->uri->segment(3);

        //drop down barang
        $data_barang = $this->barang_model->read();

        //mengirim data ke view
        $output = array(
            'theme_page' => 'penjualan_barang_insert',
            'judul' => 'Tambah penjualan',
            'data_barang' => $data_barang,
            'penjualan_id' => $penjualan_id
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function insert_submit()
    {
        $penjualan_id = $this->uri->segment(3);

        $this->form_validation->set_rules('barang_id', 'barang', 'required|callback_check_barang');

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $this->insert();

            //jika validasi sukses
        } else {
            //proses multi query
            $this->db->trans_begin();

            //insert penjualan barang
            $barang_id = $this->input->post('barang_id');
            $input = array(
                'penjualan_id' => $penjualan_id,
                'barang_id' => $barang_id
            );

            $this->penjualan_barang_model->insert($input);

            //ambil stok barang
            $data_barang = $this->barang_model->read_single($barang_id);
            $stok_barang = $data_barang['stok'];

            //kurangi stok barang
            $input_barang = array(
                'stok' => ($stok_barang - 1)
            );

            $this->barang_model->update($input_barang, $barang_id);

            //batalkan semua query (jika ada error)
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();

                //execute semua query (jika tidak ada error)
            } else {
                $this->db->trans_commit();

                //membuat pesan
                $this->session->set_flashdata('message', 'Data berhasil ditambah');
            }

            //mengembalikan halaman ke function read
            redirect('penjualan_barang/read/' . $penjualan_id);
        }
    }

    public function check_barang()
    {

        $penjualan_id = $this->uri->segment(3);
        $barang_id = $this->input->post('barang_id');

        //check username & password sesuai dengan di database
        $data_penjualan_barang = $this->penjualan_barang_model->check_barang($penjualan_id, $barang_id);

        //jika sudah pernah dipinjam : dikembalikan ke fungsi login_submit (validasi gagal)
        if (!empty($data_penjualan_barang)) {
            //membuat pesan error
            $this->form_validation->set_message('check_barang', 'barang sudah pernah dipinjam');

            return FALSE;

            //jika barang belum ada di penjualan : dikembalikan ke fungsi login_submit (validasi sukses)
        } else {
            return TRUE;
        }
    }

    public function delete()
    {
        //menangkap id data yg dipilih dari view
        $penjualan_id = $this->uri->segment(3);
        $id = $this->uri->segment(4);

        //memanggil function delete pada penjualan_barang model
        $this->penjualan_barang_model->delete($id);

        //pesan
        $this->session->set_flashdata('message', 'Data berhasil dihapus');

        //mengembalikan halaman ke function read
        redirect('penjualan_barang/read/' . $penjualan_id);
    }
}
