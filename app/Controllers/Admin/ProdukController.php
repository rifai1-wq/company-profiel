<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ProdukController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Produk',
            'daftar_produk' => $this->ProdukModel->orderBy('id_produk', 'DESC')->findAll()

        ];
        return view('admin/produk/index', $data);
    }
    public function form_create()
    {
        $data = [
            'title' => 'Tambah Produk',
            'kategori_produk' => $this->KategoriModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/produk/create', $data);
    }
    public function create_produk()
    {
        $rules = $this->validate([
            'nama_produk'   => 'required',
            'kategori_slug' => 'required',
            'deskripsi'     => 'required',
        ]);

        // jika validasi gagal
        if (!$rules) {
            session()->setFlashdata('failed', 'Data Produk Gaga Ditambahkan');
            return redirect()->back()->withInput();
        }

        // membuat slug
        $slug_produk = url_title($this->request->getPost('nama_produk'), '_', TRUE);

        //
        $gambar = $this->request->getFile('gambar_produk');

        // ambil ranodm nama file
        $namaGambar = $gambar->getRandomName();

        //pindahkan file
        $gambar->move(WRITEPATH . '../public/asset-admin/img', $namaGambar);

        // jika data valid
        $this->ProdukModel->insert([
            'slug_produk' => $slug_produk,
            'nama_produk' => esc($this->request->getPost('nama_produk')),
            'kategori_slug' => esc($this->request->getPost('kategori_slug')),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar_produk' => $namaGambar
        ]);

        return redirect()->to(base_url('daftar-produk'))->with('success', 'Data Produk Berhasil Ditambahkan');
    }
    public function kategori()
    {
        $data = [
            'title' => 'test',
            'daftar_kategori' => $this->KategoriModel->orderBy('id_kategori', 'DESC')->findAll(),
        ];
        return view('admin/produk/kategori', $data);
    }

    //
    public function insert()
    {

        $slug = url_title($this->request->getPost('nama_kategori'), '-', true);

        $data = [
            'nama_kategori' => esc($this->request->getPost('nama_kategori')),
            'slug_kategori' => $slug
        ];


        $this->KategoriModel->insert($data);

        return redirect()->back()->with('success', 'Data Kategori Produk Berhasil Ditambahkan');
    }

    public function update($id_kategori)
    {
        $slug = url_title($this->request->getPost('nama_kategori'), '-', true);

        $data = [
            'nama_kategori' => esc($this->request->getPost('nama_kategori')),
            'slug_kategori' => $slug
        ];


        $this->KategoriModel->update($id_kategori, $data);

        return redirect()->back()->with('success', 'Data Kategori Produk Berhasil Diubah');
    }

    // hapus kategori hapus
    public function hapus($id_kategori)
    {
        if (!$this->KategoriModel->find($id_kategori)) {
            return redirect()->to('/daftar-kategori')->with('error', 'Kategori tidak ditemukan.');
        }

        if ($this->KategoriModel->delete($id_kategori)) {
            return redirect()->to('/daftar-kategori')->with('success', 'Data Kategori Produk Berhasil Dihapuskan');
        } else {
            return redirect()->to('/daftar-kategori')->with('error', 'Gagal menghapus kategori.');
        }
    }
}
