<?= $this->extend('admin/layout/template') ?>

<?= $this->Section('content'); ?>
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
                        Kategori Produk
                        <div class="card-body">
                            <button type="button" class="btn btn-primary btn-sm-bm-2" data-bs-toggle="modal" data-bs-target="#tambahModal">
                                <i class="fas fa-plus"></i>Tambah
                            </button>

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
                                        <th>Nama Kategori</th>
                                        <th>Tangggal input</th>
                                        <th>Fungsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($daftar_kategori as $kategori) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $kategori->nama_kategori; ?></td>
                                            <td><?= date('d/m/Y H:i:s', strtotime($kategori->tanggal_input)); ?></td>
                                            <td width="15%" class="text-center">
                                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ubahModal<?= $kategori->id_kategori; ?>"><i class="fas fa-edit"></i>Ubah</button>
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
    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-plus"></i> Tambah Kategori Produk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('daftar-kategori/tambah') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal ubah -->
    <?php foreach ($daftar_kategori as $kategori) : ?>
        <div class="modal fade" id="ubahModal<?= $kategori->id_kategori; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-whaite">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-edit"></i>Ubah Kategoori Produk</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('daftar-kategori/ubah/' . $kategori->id_kategori); ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="mb-3">
                                <label for="nama_kategori">Nama kategori</label>
                                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="<?= $kategori->nama_kategori; ?>" required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary btn-sm">Ubah</button>
                    </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
        </main>

        <!-- hapus modal -->
        <?php foreach ($daftar_kategori as $kategori) : ?>
            <div class="modal fade" id="hapusModal<?= $kategori->id_kategori; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fas fa-trash"></i>Hapus produk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('delete-kategori/hapus' . $kategori->id_kategori) ?>" method="post">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <p>Yakin Data produk <?= $kategori->nama_kategori; ?>, Ingin Di hapus</p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </div>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            </main>
            <?= $this->endSection() ?>