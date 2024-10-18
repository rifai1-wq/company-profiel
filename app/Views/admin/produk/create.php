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
                        <i class="fas fa-table me-1"></i> Tambah Produk
                        <div class="card-body">


                            <!-- notifikasi  berhasil tambah Produk-->
                            <?php if (session('success')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session('success'); ?>
                                </div>
                            <?php endif; ?>

                            <!-- notifikasi  gagal tambah Produk-->
                            <?php if (session('failed')) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session('failed'); ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?= base_url('daftar-produk/create-produk'); ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="nama_produk">Nama Produk</label>
                                        <input type="text" name="nama_produk" id="nama_produk" class="form-control <?= $validation->getError('nama_produk') ? 'is-invalid' : null ?>">

                                        <?php if ($validation->getError('nama_produk')) : ?>
                                            <div class="invalid-feedback"></div>
                                            <?= $validation->getError('nama_produk'); ?>
                                    </div>
                                <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="kategori_slug">Kategori Produk</label>
                                    <select name="kategori_slug" id="kategori_slug" class="form-control <?= $validation->getError('kategori_slug') ? 'is-invalid' : null ?>">
                                        <option value="">-- pilih --</option>
                                        <?php foreach ($kategori_produk as $kategori) : ?>
                                            <option value="<? $kategori->$slug_kategori; ?>"><?= $kategori->nama_kategori; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                    <?php if ($validation->getError('kategori_slug')) : ?>
                                        <div class="invalid-feedback"></div>
                                        <?= $validation->getError('kategri_slug'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi">Deskripsi Produk</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control  <?= $validation->getError('deskripsi'); ?>"></textarea>

                        <?php if ($validation->getError('deskripsi')) : ?>
                            <div class="invalid-feedback"></div>
                            <?= $validation->getError('deskripsi'); ?>
                    </div>
                <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="gambar_produk">Gambar Produk</label>
                    <input type="file" name="gambar_produk" id="gambar_produk" class="form-control">
                </div>
            </div>

            <div class="justify-content-end d-flex">
                <button class="btn btn-primary btn-sm">Tambah</button>
            </div>
        </div>
        </form>
</div>
</div>
</div>

</div>
</main>
<?= $this->endsection() ?>