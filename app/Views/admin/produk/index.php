<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $title; ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Daftar Produk
                        <div class="card-body">
                            <a href="<?= base_url('daftar-produk/tambah'); ?>" class="btn btn-primary btn-sm-bm-2">
                                <i class="fas fa-plus"></i>Tambah
                            </a>

                            <!-- notifikasi -->
                            <?php if (session('success')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session('success'); ?>
                                </div>
                            <?php endif; ?>
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Tangggal input</th>
                                        <th>Fungsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($daftar_produk as $produk) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $produk->nama_produk; ?></td>
                                            <td><?= $produk->slug_produk; ?></td>
                                            <td><?= date('d/m/Y H:i:s', strtotime($produk->tanggal_input)); ?></td>
                                            <td width="15%" class="text-center">
                                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ubahModal<?= $produk->id_produk; ?>"><i class="fas fa-edit"></i>Ubah</button>
                                                <a href="" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
    </main>
    <?= $this->endsection() ?>