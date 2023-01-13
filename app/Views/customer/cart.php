<?= $this->extend('layout/template_customer'); ?>
<?= $this->section('isi'); ?>

<?php
$validation = \Config\Services::validation();
$this->session = \Config\Services::session(); 
?>


<form class="site-section py-1" style="background-color: #f2f2f2;" action="<?php echo base_url("cart/pay") ?>" method="POST">
    <div class="container inline mb-4" style="background-color: #ffffff; padding-top:60px;">
        <div class="container pt-3">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-11 my-2 table-responsive ">

                    <!-- TAMPILAN DEKSTOP -->
                    <div class="sm-none">
                        <div class="col-lg-12">
                            <h3 class="font-hitam-500">Keranjang</h3>
                        </div>
                        <table class="table table-hover mt-4">
                            <thead>
                                <tr>
                                    <td scope="col" class="font-hitam-500 d-flex justify-content-center">No</td>
                                    <td scope="col" class="font-hitam-500">Detail Produk</td>
                                    <td scope="col" class="font-hitam-500">Biaya Sewa</td>
                                    <td scope="col" class="font-hitam-500">Aksi</td>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 1;
                                foreach ($carts as $cart) : ?>
                                    <tr>
                                        <td class="pt-5">
                                            <div class="row ">
                                                <div class="col-sm-12 d-flex justify-content-center align-items-center  ">
                                                    <p><?= $i++; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td width="40%">
                                            <div class="row">
                                                <div class="col-sm-5 d-flex justify-content-center align-items-center ">
                                                    <img src="<?= base_url('public/img/upload/' . $cart['gambar']) ?>" class="d-block img-fluid" height="70px" width="130px" alt="responsive image">
                                                </div>
                                                <div class="col-sm-7 pr-0">
                                                    <p style="font-size: 16px;" class="font-hitam-400 card-title my-1"><?= $cart['merk'] . ' ' . $cart['seri']; ?></p>
                                                    <p class="card-text mt-0 mb-2 font-hitam-400" style="font-size: 12px;"><?= $cart['prosesor'] . '/' . $cart['ram'] . '/' . $cart['penyimpanan']; ?></p>
                                                    <hr class="my-0 py-0">
                                                    <p class="card-text mt-0 mb-0 font-hitam-500" style="font-size: 14px;">Jumlah: <?= $cart['jumlah_pinjam']; ?> unit</p>

                                                    <?php $lama = strtotime($cart['tgl_kembali']) - strtotime($cart['tgl_pinjam']);
                                                    $durasi = $lama / (60 * 60 * 24); ?>

                                                    <p class="card-text mt-0 mb-1 font-hitam-500" style="font-size: 12px;">Durasi pinjam: <?= $durasi; ?> hari</p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="pt-4">
                                            <p style="font-size: 13px;">Rp <?php $harga = $cart['harga'] / 7;
                                                                            echo number_format($harga, 0, ',', '.'); ?>/hari x <?= $cart['jumlah_pinjam']; ?> unit x <?= $durasi; ?> hari</p>

                                            <p class="font-hitam-400" style="font-size: 18px;">Biaya: Rp <?= number_format($cart['total'], 0, ',', '.'); ?>
                                            </p>
                                        </td>

                                        <td class="pt-5">
                                            <?php if (!empty($diajukan["belum_rental"])) : ?>
                                            <div class="d-flex align-items-center">
                                                <a href="<?= base_url('delete/' . $cart['id_rental']); ?>"><i class="fas fa-trash-alt" style="color: red; font-size:25px;"></i></a>
                                            </div>
                                            <?php endif?>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php if ($numrows_cart['numrows'] == 0) : ?>
                            <div class="col-lg-12 d-flex justify-content-center my-3 pt-3 ">
                                <h4 class="font-hitam-300">Tidak ada peminjaman</h4>
                            </div>
                        <?php elseif (!empty($numrows_cart['numrows']) && !empty($diajukan["belum_rental"])) : ?>
                            <div class="col-lg-12 col-md-12 d-flex justify-content-end py-1 mt-5">
                                <div class="col-lg-6 col-md-9 d-flex align-items-center pr-0 rounded-lg" style="border: 0.5px solid #e65100;">
                                    <div class="col-lg-7 col-md-8  py-2">
                                        <h5 class="font-orange" style="font-weight: 600;">Total biaya: Rp <?= number_format($sum['total'], 0, ',', '.'); ?></h5>
                                    </div>

                                    <div class="col-lg-5 col-md-4 py-2 bayar-color">
                                    <a href="javascript:void(0)" onclick="document.querySelector('form').submit()">
                                            <div class="d-flex justify-content-center">
                                                <h5 style="color: white; font-weight: 600;">Bayar</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>


                    <!-- TAMPILAN UNTUK MOBILE -->

                    <div class="sm-v">
                        <?php $i = 1;
                        foreach ($carts as $cart) : ?>
                            <div class="row mt-3 border-right">
                                <div class="col-12">
                                    <p style="font-size: 19px;" class="font-hitam-500 card-title my-0"><?= $i++; ?>. <?= $cart['merk'] . ' ' . $cart['seri']; ?></p>
                                </div>
                            </div>
                            <div class="row border-bottom border-right shadow-sm pb-3">
                                <div class="col-4 d-flex align-items-center">

                                    <img src="<?= base_url('public/img/upload/' . $cart['gambar']) ?>" class="d-block img-fluid" height="90px" width="150px" alt="responsive image">
                                </div>

                                <div class="col-6">
                                    <p class="card-text mt-2 mb-0 font-abu" style="font-size: 12px; font-weight:400;"><?= $cart['prosesor'] . '/' . $cart['ram'] . '/' . $cart['penyimpanan']; ?></p>

                                    <p class="card-text mt-0 mb-0 font-abu-400" style="font-size: 13px;">Jumlah: <?= $cart['jumlah_pinjam']; ?> unit</p>

                                    <?php $lama = strtotime($cart['tgl_kembali']) - strtotime($cart['tgl_pinjam']);
                                    $durasi = $lama / (60 * 60 * 24); ?>

                                    <p class="card-text mt-0 mb-3 font-abu-400" style="font-size: 12px;">Durasi pinjam: <?= $durasi; ?> hari</p>

                                    <p class="font-hitam-400 my-0 py-0" style="font-size: 18px;">Biaya: Rp <?= number_format($cart['total'], 0, ',', '.'); ?>
                                    </p>
                                </div>
                                <div class="col-1 d-flex align-items-center">
                                    <a href="<?= base_url('delete/' . $cart['id_rental']); ?>"><i class="fas fa-trash-alt" style="color: red; font-size:22px;"></i></a>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <?php if ($numrows_cart['numrows'] == 0) : ?>
                            <div class="col-12 d-flex justify-content-center my-3 pt-3 ">
                                <h4 class="font-hitam-300">Tidak ada peminjaman</h4>
                            </div>
                        <?php elseif (!empty($numrows_cart['numrows'])) : ?>
                            <div class="col-12  d-flex justify-content-end py-1 mt-5 pr-0 mx-0">
                                <div class="col-11 d-flex align-items-center px-0 mx-0 rounded" style="border: 0.5px solid #e65100;">
                                    <div class="col-9 py-2">
                                        <h6 class="font-orange" style="font-weight: 600;">Total biaya: Rp <?= number_format($sum['total'], 0, ',', '.'); ?></h6>
                                    </div>

                                    <div class="col-3 py-2 bayar-color">
                                        <a href="javascript:void(0)" onclick="document.querySelector('form').submit()">
                                            <div class="d-flex justify-content-center">
                                                <h6 style="color: white; font-weight: 600;">Bayar</h6>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


    <?= $this->endsection('isi'); ?>