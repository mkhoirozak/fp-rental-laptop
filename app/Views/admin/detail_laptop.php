<?= $this->extend('layout/template'); ?>
<?= $this->section('isi'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="card border-light mb-3 shadow-sm p mb-3 bg-white px-3 py-3 rounded col-lg-11">
                <div class=" card-body">
                    <div class="row mt-0 mb-2">
                        <div class="col-lg-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="http://localhost/rental_laptop/data_laptop">Data laptop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-lg-12">
                            <h1 class="h3 card-title text-gray-800"><?= $laptop['merk'];
                                                                    echo "&nbsp" . $laptop['seri']; ?></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <?php foreach ($image as $img) : ?>
                                <img src="<?= base_url('public/img/upload') . '/' . $img['gambar']; ?>" alt="" width="150">
                            <?php endforeach; ?>
                        </div>
                        <div class="col-lg-2 mr-0 pr-0">
                            <ul style="list-style-type:none;color:#bfbfbf;">
                                <li>Tipe</li>
                                <li>Prosesor</li>
                                <li>RAM</li>
                                <li>Storage</li>
                                <li>VGA</li>
                                <li>Layar</li>
                            </ul>
                        </div>
                        <div class="col-lg-5 ml-0 pl-0">
                            <ul style="list-style-type:none;">
                                <li><?= $laptop['nama_tipe'] ?></li>
                                <li><?= $laptop['prosesor'] ?></li>
                                <li><?= $laptop['ram'] ?></li>
                                <li><?= $laptop['penyimpanan'] ?></li>
                                <li><?= $laptop['vga'] ?></li>
                                <li><?= $laptop['layar'] ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <h4>Deskripsi</h4>
                        <?= $laptop['deskripsi']; ?>
                    </div>
                    <div class="row mt-3 mb-2">
                        <?php date_default_timezone_set('Asia/Jakarta');
                        $tgl = $laptop['tanggal']; ?>
                        <i style="color: #b30c00;">*diupdate pada tanggal: <?= date("d F Y", $tgl); ?>, pukul <?= date("H:i", $tgl); ?> WIB</i>
                    </div>
                    <div class="row mt-4">
                        <a href="<?= base_url('/admin/data_laptop/form_ubah') ?>/<?= $laptop['id_laptop']; ?>" class="btn btn-primary">Ubah</a>
                    </div>
                </div>
            </div>
    </section>
</div>
<?= $this->endsection('isi'); ?>