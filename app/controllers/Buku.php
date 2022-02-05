<?php 

class Buku extends Controller
{
    //
    public function index()
    {
        $data['title'] = 'Data Buku';
        $data['buku'] = $this->model('BukuModel')->getAllBuku();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('buku/index', $data);
        $this->view('templates/footer');
    }

    //menambah buku
    public function tambah()
    {
        $data['title'] = 'Tambah Buku';
        $data['kategori'] = $this->model('KategoriModel')->getAllKategori();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('buku/create', $data);
        $this->view('templates/footer');
    }

    public function simpanBuku()
    {
        if($this->model('BukuModel')->tambahBuku($_POST) > 0)
        {
            header('location: '. base_url . '/buku');
            exit;
        } else
        {
            header('location: '. base_url. 404);
            exit;
        }
    }

    //edit buku
    public function edit($id)
    {
        $data['title'] = 'Edit Buku';
        $data['kategori'] = $this->model('KategoriModel')->getAllKategori();
        $data['buku'] = $this->model('BukuModel')->getBukuById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('buku/edit', $data);
        $this->view('templates/footer');
    }

    public function updateBuku()
    {
        if($this->model('BukuModel')->updateDataBuku($_POST) > 0)
        {
            header('location: '. base_url . '/buku');
            exit;
        }else
        {
            header('location: '. base_url . 404);
            exit;
        }
    }

    //menghapus buku
    public function hapus($id)
    {
        if($this->model('BukuModel')->delete($id) > 0)
        {
            header('location: '. base_url . '/buku');
            exit;
        } else
        {
            header('location: '. base_url . 404);
            exit;
        }
    }
}