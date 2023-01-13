<?= $this->extend('layout/template_customer'); ?>
<?= $this->section('isi'); ?>

<?php
$validation = \Config\Services::validation();
$this->session = \Config\Services::session(); ?>


<div class="site-section py-3" style="background-color: #f2f2f2;">
    <div class="container inline" style="background-color: #ffffff; padding-top:60px;">
        <div class="row pt-3">
            <div class="col-lg-12 mb-1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background-color: white;">
                        <li class="breadcrumb-item"><a href="<?= base_url('/katalog') ?>">Katalog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail laptop</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-sm-12 col-12 mr-5">
                    <div id="carouselExampleIndicators" class="carousel " data-ride="carousel">
                        <ol class="carousel-indicators" style="color: black;">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner pl-5">
                            <?php foreach ($one_pic as $pic) : ?>
                                <div class="carousel-item active">
                                    <img src="<?= base_url('public/img/upload/' . $pic['gambar']) ?>" class="d-block img-fluid" height="250px" alt="responsive image">
                                </div>
                            <?php endforeach; ?>

                            <?php foreach ($multiple as $picture) : ?>
                                <div class="carousel-item">
                                    <img src="<?= base_url('public/img/upload') . '/' . $picture['gambar'] ?>" class="d-block img-fluid" height="350px" alt="...">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <i class="fas fa-chevron-circle-left" style="color: black; font-size: 35px;"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <i class="fas fa-chevron-circle-right" style="color: black; font-size: 35px;"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card border mb-3" style="max-width: 100%;">
                        <div class="card-header ">
                            <h3 class="text-center font-hitam-600"><?= $laptop['merk'] . ' ' . $laptop['seri']; ?></h3>
                        </div>
                        <div class="card-body text-dark px-4">
                            <form method="post" action="<?= base_url('customer/transaksi/index/' . $laptop['id_laptop']); ?>">
                                <div class="form-row">


                                    <div class="form-group col-lg-12 py-0">
                                        <label for="tgl_pinjam" class="font-hitam-400">Tanggal pinjam</label>
                                        <input type="date" class="form-control py-0 my-0" id="tgl_pinjam" name="tgl_pinjam" value="<?= set_value('tgl_pinjam') ?>">
                                        <?php if ($validation->haserror('tgl_pinjam')) : ?>
                                            <small id=" emailHelp" class="form-text text-danger my-0">
                                                <p class="my-0"><?= $validation->getError('tgl_pinjam'); ?></p>
                                            </small>
                                        <?php endif; ?>
                                    </div>


                                    <div class="form-group col-lg-12 py-0">
                                        <label for="tgl_kembali" class="font-hitam-400">Tanggal kembali</label>
                                        <input type="date" class="form-control py-0 my-0" id="tgl_kembali" name="tgl_kembali" value="<?= set_value('tgl_kembali') ?>">
                                        <?php if ($validation->haserror('tgl_kembali')) : ?>
                                            <small id="emailHelp" class="form-text text-danger my-0">
                                                <p class="my-0"><?= $validation->getError('tgl_kembali'); ?></p>
                                            </small>
                                        <?php endif; ?>
                                    </div>


                                    <div class="form-group col-lg-6 py-0">
                                        <input type="hidden" value="<?= $laptop['harga']; ?>" name="harga">
                                        <label for="harga" class="font-hitam-400">Harga sewa/hari</label>
                                        <input type="text" class="form-control py-0 my-0" id="harga" style="background-color: #fbf5e4 !important;" value="Rp. <?php $harga = $laptop['harga'] / 7;
                                                                                                                                                                echo number_format($harga, 0, ',', '.'); ?>" disabled>
                                    </div>


                                    <div class="form-group col-lg-6 py-0">
                                        <input type="hidden" name="denda" value="27000">
                                        <label for="denda" class="font-hitam-400">Denda/hari</label>
                                        <input type="text" class="form-control py-0 my-0" id="denda" value="Rp. 27.000" disabled style="background-color: #fbf5e4 !important;">
                                    </div>


                                    <div class="form-group col-lg-12 col-6 py-0 mt-2 mb-4">
                                        <div class="row d-flex justify-content-end">
                                            <label for="jumlah_pinjam" class="col-sm-3 font-hitam-600 col-form-label"> Jumlah</label>
                                            <div class="col-sm-3 ">
                                                <input type="text" class="form-control py-0 my-0" id="jumlah_pinjam" name="jumlah_pinjam" value="<?= set_value('jumlah_pinjam') ?>">
                                            </div>
                                        </div>
                                        <?php if ($validation->haserror('jumlah_pinjam')) : ?>
                                            <div class="row d-flex justify-content-end">
                                                <div class="col-sm-6">
                                                    <small id="emailHelp" class="form-text text-danger my-0">
                                                        <p class="my-0"><?= $validation->getError('jumlah_pinjam'); ?></p>
                                                    </small>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <?php if ($this->session->getflashdata('gagal')) : ?>
                                        <div class=" col-lg-12">
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong> <?= $this->session->getflashdata('gagal'); ?></strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>

                                    <?php elseif ($this->session->getflashdata('berhasil')) : ?>
                                        <div class=" col-lg-12">
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong> <?= $this->session->getflashdata('berhasil'); ?></strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="col-lg-12">
                                        <?php if ($laptop['jumlah'] == 0) : ?>
                                            <button type="submit" class="btn btn-danger" style="width: 100%;" disabled>Stok Kosong</button>
                                        <?php else : ?>
                                            <?php if (!$user) : ?>
                                                <a href="<?= base_url('auth/' . $laptop['id_laptop']); ?>" class="btn btn-info tombol-report" style="width: 100%;">Masukkan Keranjang</a>
                                            <?php else : ?>
                                                <button type="submit" class="btn btn-info" style="width: 100%;">Masukkan Keranjang</button>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        <h3 class="font-hitam-500">Deskripsi</h3>
                    </p>
                    <p class="font-hitam-400"><?= $laptop['deskripsi']; ?></p>
                </div>
            </div>
            <div class="row mt-3 pb-5">
                <div class="col-lg-7 col-sm-12 col-12">
                    <p>
                        <h3 class="font-hitam-500">Spesifikasi</h3>
                    </p>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-6">
                            <ul style="list-style-type:none;color:#bfbfbf;">
                                <li>Tipe</li>
                                <li>Prosesor</li>
                                <li>RAM</li>
                                <li>Storage</li>
                                <li>VGA</li>
                                <li>Layar</li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-6">
                            <ul style="list-style-type:none;">
                                <li class="font-hitam-400"><?= $laptop['nama_tipe'] ?></li>
                                <li class="font-hitam-400"><?= $laptop['prosesor'] ?></li>
                                <li class="font-hitam-400"><?= $laptop['ram'] ?></li>
                                <li class="font-hitam-400"><?= $laptop['penyimpanan'] ?></li>
                                <li class="font-hitam-400"><?= $laptop['vga'] ?></li>
                                <li class="font-hitam-400"><?= $laptop['layar'] ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endsection('isi'); ?>