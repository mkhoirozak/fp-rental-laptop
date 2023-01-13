<?= $this->extend('layout/template_customer'); ?>
<?= $this->section('isi'); ?>

<div class="hero" style="background-color:white;">

    <div class="container" style="padding-top: 50px;">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
                <h1 style="font-size: 55px;" class="justify-content-top">Platform Sewa Elektronik B2B Pertama di Indonesia</h1>
                <p style="padding-top: 20px;font-size: 17px;">Alvita merupakan marketplace berbasis teknologi yang bertindak untuk menghubungkan Lessor (pemilik aset) dengan Lessee (penyewa aset). Temukan solusi sewa modern untuk kebutuhan elektronik perusahaan Anda hanya di Alvita!<p>
                        <!-- <button class="btn btn-info mt-2 btn-lg">Coba sekarang!</button> -->
                        <a class="btn btn-info mt-2 btn-lg" href="<?= base_url('customer/katalog') ?>">Coba sekarang!</a>
            </div>
            <div class="col-lg-6 md-none" style="padding-left: 150px;">
                <img class="optionalstuff" src="<?= base_url('/public/assets/marketplace/'); ?>/images/asani.png" alt="" width="425">
            </div>
        </div>
    </div>
</div>


<?= $this->endsection('isi'); ?>