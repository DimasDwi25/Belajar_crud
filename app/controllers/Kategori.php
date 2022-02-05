<?php 

class Kategori extends Controller
{
    //
    public function index()
    {
        //
        $data['title'] = 'Data Kategori';
        $data['kategori'] = $this->model('KategoriModel')->getAllKategori();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('kategori/index', $data);
        $this->view('templates/footer');
    } 

    //tambah kategori
    public function tambah()
    {
        $data['title'] = 'Tambah Kategori';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('kategori/create', $data);
        $this->view('templates/footer');
    }

    public function simpan()
    {
        if($this->model('KategoriModel')->tambahKategori($_POST) > 0)
        {
            header('location: '.base_url . '/kategori');
            exit;
        } else
        {
            header('location: '. base_url . 404);
            exit;
        }
    }

    //edit kategori
    public function edit($id)
    {
        $data['title'] = 'Detail Kategori';
		$data['kategori'] = $this->model('KategoriModel')->getKategoriById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('kategori/edit', $data);
		$this->view('templates/footer');
    }

    public function update()
    {
        if($this->model('KategoriModel')->updateDataKategori($_POST) > 0)
        {
            header('location: '. base_url . '/kategori');
            exit;
        } else
        {
            header('location: '. base_url . 404);
            exit;
        }
    }

    //hapus kategori
    public function hapus($id)
    {
        if($this->model('KategoriModel')->deleteKategori($id) > 0)
        {
            header('location: '. base_url . '/kategori');
            exit;
        } else
        {
            header('location: '. base_url . 404);
            exit;
        }
    }

}