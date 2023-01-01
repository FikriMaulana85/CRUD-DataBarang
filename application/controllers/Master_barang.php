<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_barang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("barang_model");
    }

    public function index()
    {
        $this->load->view("admin/master_barang/list");
    }

    public function list_barang()
    {
        $lists = $this->barang_model->get_datatables_post_databarang();
        $data = array();
        $no = $_POST['start'];
        foreach ($lists as $list) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->nama_barang;
            $row[] = "Rp " . number_format($list->harga_beli, 0, ',', '.');
            $row[] = "Rp " . number_format($list->harga_jual, 0, ',', '.');
            $row[] = $list->stok;
            $row[] = "<button class='btn btn-info btn-sm details' idbarang='$list->id_barang'><i class='fa fa-eye'></i></button>
            <button class='btn btn-warning btn-sm edit' idbarang='$list->id_barang'><i class='fa fa-edit'></i></button>
            <button class='btn btn-danger btn-sm hapusbarang' idbarang='$list->id_barang' file='$list->foto_barang'><i class='fa fa-trash'></i></button>";
            $data[] = $row;
        }
        $output = array(
            "error_code" => 0,
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->barang_model->count_all_post_databarang(),
            "recordsFiltered" => $this->barang_model->count_filtered_post_databarang(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function simpan_barang()
    {
        $this->form_validation->set_rules(
            'nama_barang',
            'Nama Barang',
            'required|is_unique[data_barang.nama_barang]',
            array(
                'is_unique'     => '%s sudah ada, masukan barang lainnya !'
            )
        );
        $this->form_validation->set_rules('stok_barang', 'Stok Barang', 'required|numeric');
        $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|numeric');
        $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|numeric');
        if ($this->form_validation->run() == true) {
            $this->barang_model->simpan();
        } else {
            $output = array(
                "error_code" => 500,
                "status" => "error",
                "message" => strip_tags(form_error('nama_barang')),
            );
            echo json_encode($output);
        }
    }

    public function detail_barang()
    {
        echo json_encode($this->barang_model->detail_barang());
    }

    public function edit_barang()
    {
        $this->barang_model->edit_barang();
    }

    public function hapus_barang()
    {
        $this->barang_model->hapus();
    }
}
