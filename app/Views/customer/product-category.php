<?= $this->extend('layout/template_customer'); ?>
<?= $this->section('isi'); ?>




<div class="hero inner-page" style="background-image: url('<?= base_url('/public/assets/marketplace/'); ?>/images/slide1.jpg');">
    <div class="container">
        <div class="row align-items-center justify-content-center pt-4 ">
            <div class="col-lg-7 ">
                <div class="intro  ">
                    <h1 style="color: white;"><strong><?= $header; ?></strong></h1>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="site-section py-3" style="background-color: #f2f2f2;">
    <div class="container inline" style="background-color: #ffffff;">
        <div class="row mt-2 pt-3 pb-0 px-2 mb-0">
            <div class="col-lg-12 mb-1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background-color: white;">
                        <li class="breadcrumb-item"><a href="<?= base_url('customer/katalog') ?>">Katalog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Produk kategori</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row mt-0 py-0 px-2">
            <?php foreach ($laptop_product as $bns) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-4 px-2">
                    <a href="<?= base_url('/detail') . '/' . $bns['id_laptop']; ?>">
                        <div class="card border-color border-0 shadow-card">
                            <div class="card-body pl-3 py-1">
                                <div class="div d-flex justify-content-center mb-5">
                                    <img style="width: 170px; height: 150px" src="<?= base_url('/public/img/upload') . '/' . $bns['gambar']; ?>" alt="">
                                </div>
                                <div class="pl-2">
                                    <p style="font-size: 14px;" class="font-hitam-500 card-title my-1"><?= $bns['merk'] . ' ' . $bns['seri']; ?></p>
                                    <p class="card-text mt-0 mb-1 font-hitam-500" style="font-size: 12px;"><?= $bns['prosesor'] . '/' . $bns['ram'] . '/' . $bns['penyimpanan']; ?></p>
                                    <p class="my-0 font-sewa">Biaya sewa</p>
                                    <?php if ($bns['jumlah'] == 0) : ?>
                                        <p class="mt-0" style="color: red; font-weight: bold;">STOK KOSONG</p>
                                    <?php else : ?>
                                        <p class="mt-0 font-orange">Rp <?php $harga = $bns['harga'] / 7;
                                                                        echo number_format($harga, 0, ',', '.'); ?>/hari</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<?= $this->endsection('isi'); ?>