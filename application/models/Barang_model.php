<?php

class Barang_model extends CI_Model
{
    private $column_order_post_databarang = array(null, 'nama_barang', 'stok', 'harga_beli', 'harga_jual'); //field yang ada di table pasien
    private $column_search_pos_databarang = array('nama_barang', 'stok', 'harga_beli', 'harga_jual'); //field yang diizin untuk pencarian
    private $order_post_databarang = array('id_barang' => 'ASC'); // default order

    private function _get_datatables_query_post_databarang()
    {
        $this->db->select('*');
        $this->db->from("data_barang");
        $this->db->order_by('id_barang ASC');
        $i = 0;

        foreach ($this->column_search_pos_databarang as $item) // looping awal
        {
            if (isset($_POST['search']['value'])) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search_pos_databarang) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {

            $this->db->order_by($this->column_order_post_databarang[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_post_databarang)) {
            $order = $this->order_post_databarang;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables_post_databarang()
    {
        $this->_get_datatables_query_post_databarang();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_post_databarang()
    {
        $this->_get_datatables_query_post_databarang();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_post_databarang()
    {
        $this->db->from("data_barang");
        return $this->db->count_all_results();
    }


    public function detail_barang()
    {
        $this->db->select("*");
        $this->db->from("data_barang");
        $this->db->where("id_barang", $this->input->post("id"));
        return $this->db->get()->row();
    }


    public function simpan()
    {
        $data = [
            'id_barang' => null,
            'nama_barang' => strip_tags($this->input->post("nama_barang")),
            'harga_beli' => strip_tags($this->input->post("harga_beli")),
            'harga_jual' => strip_tags($this->input->post("harga_jual")),
            'stok' => strip_tags($this->input->post("stok_barang")),
            'foto_barang' => md5($this->input->post("nama_barang")) . "." . pathinfo($_FILES['foto_barang']['name'], PATHINFO_EXTENSION),
            'create_date' => date("Y-m-d")
        ];
        if ($this->upload_foto_barang(md5($this->input->post("nama_barang")) . "." . pathinfo($_FILES['foto_barang']['name'], PATHINFO_EXTENSION)) == true) {
            if ($this->db->insert("data_barang", $data)) {
                $output = array(
                    "error_code" => 200,
                    "status" => "success",
                    "message" => "Data barang berhasil disimpan.",
                );
            } else {
                $output = array(
                    "error_code" => 500,
                    "status" => "error",
                    "message" => "Data barang gagal disimpan.",
                );
            }
            echo json_encode($output);
        } else {
            $output = array(
                "error_code" => 500,
                "status" => "error",
                "message" => $this->session->flashdata('alert'),
            );
            echo json_encode($output);
        }
    }

    public function edit_barang()
    {
        if (!empty($_FILES["edit_foto_barang"]["name"])) {
            $foto_barang =  md5($this->input->post("edit_nama_barang")) . "." . pathinfo($_FILES['edit_foto_barang']['name'], PATHINFO_EXTENSION);
            $upload = $this->edit_foto_barang(md5($this->input->post("edit_nama_barang")) . "." . pathinfo($_FILES['edit_foto_barang']['name'], PATHINFO_EXTENSION));
        } else {
            $foto_barang = strip_tags($this->input->post("edit_foto_barang_old"));
        }
        $data = [
            'nama_barang' => strip_tags($this->input->post("edit_nama_barang")),
            'harga_beli' => strip_tags($this->input->post("edit_harga_beli")),
            'harga_jual' => strip_tags($this->input->post("edit_harga_jual")),
            'stok' => strip_tags($this->input->post("edit_stok_barang")),
            'foto_barang' => $foto_barang,
            'update_date' => date("Y-m-d")
        ];
        if($upload == true){
        if ($this->db->update("data_barang", $data, array('id_barang' => $this->input->post("id")))) {
            $output = array(
                "error_code" => 200,
                "status" => "success",
                "message" => "Data barang berhasil diedit.",
                "upload" => $upload
            );
        } else {
            if (!$this->session->flashdata('alert')) {
                $message = "Data barang gagal diedit.";
            } else {
                $message = $this->session->flashdata('alert');
            }
            $output = array(
                "error_code" => 500,
                "status" => "error",
                "message" => "Data barang gagal diedit."
            );
        }
        echo json_encode($output);
    }else{
         $output = array(
                "error_code" => 500,
                "status" => "error",
                "message" => $this->session->flashdata('alert'),
            );
            echo json_encode($output);
        }
    }

    public function hapus()
    {
        $post = $this->input->post();
        if ($this->db->delete("data_barang", ["id_barang" => $post["id"]])) {
            unlink("./storage/barang/" . $post["file"]);
            $output = array(
                "error_code" => 200,
                "status" => "success",
                "message" => "Data Barang berhasil dihapus.",
            );
        } else {
            $output = array(
                "error_code" => 500,
                "status" => "error",
                "message" => "Data Barang gagal dihapus.",
            );
        }
        echo json_encode($output);
    }


    private function upload_foto_barang($name)
    {
        $upload_image = $_FILES['foto_barang']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = '100';
            $config['upload_path'] = './storage/barang/';
            $config['file_name'] = $name;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto_barang')) {
                return true;
            } else {
                if (strip_tags($this->upload->display_errors()) == "The file you are attempting to upload is larger than the permitted size.") {
                    $message = "Ukuran gambar terlalu besar, Ukuran gambar maksimal 100KB";
                } elseif (strip_tags($this->upload->display_errors()) == "The filetype you are attempting to upload is not allowed.") {
                    $message = "Format gambar tidak valid, pastikan format gambar JPG atau PNG";
                }
                $this->session->set_flashdata('alert', ' ' . strip_tags($message) . ' ');
            }
        }
    }

    private function edit_foto_barang($name)
    {
        $upload_image = $_FILES['edit_foto_barang']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = '100';
            $config['upload_path'] = './storage/barang/';
            $config['file_name'] = $name;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('edit_foto_barang')) {
                return true;
            } else {
                if (strip_tags($this->upload->display_errors()) == "The file you are attempting to upload is larger than the permitted size.") {
                    $message = "Ukuran gambar terlalu besar, Ukuran gambar maksimal 100KB";
                } elseif (strip_tags($this->upload->display_errors()) == "The filetype you are attempting to upload is not allowed.") {
                    $message = "Format gambar tidak valid, pastikan format gambar JPG atau PNG";
                }
                $this->session->set_flashdata('alert', ' ' . strip_tags($message) . ' ');
            }
        }
    }
}
