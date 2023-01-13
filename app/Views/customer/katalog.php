<?= $this->extend('layout/template_customer'); ?>
<?= $this->section('isi'); ?>




<div class="hero inner-page" style="background-image: url('<?= base_url('/public/assets/marketplace/'); ?>/images/slide1.jpg');">
  <div class="container">
    <div class="row align-items-center justify-content-center pt-4 ">
      <div class="col-lg-5 ">
        <div class="intro  ">
          <h1 style="color: white; font-family: arial;"><strong>Katalog laptop</strong></h1>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="site-section py-3" style="background-color: #f2f2f2;">
  <div class="container inline" style="background-color: #ffffff;">
  <div class="row px-2">
      <div class="col-lg-12">
        <form class="form-group row pt-4" method="GET" action="<?php echo base_url("katalog") ?>">
          <label class="form-control-label control-label col-lg-2">Pencarian</label>
          <div class="col-lg-8">
            <input type="text" class="form-control pencarian" name="q" id="pencarian" placeholder="Masukan kata kunci" value="<?php echo $q?>"> 
          </div>
          <div class="col-lg-2">
            <button type="submit" class="btn btn-block btn-success">Cari</button>
          </div>
        </form>
      </div>
  </div>
  </div>
</div>
<div class="site-section py-3" style="background-color: #f2f2f2;">
  <div class="container inline" style="background-color: #ffffff;">
    <div class="row px-2">
      <div class="col-lg-12">
        <div class="row pt-4">
          <?php foreach ($bisnis as $bns) : ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-4 px-2">
              <a href="<?= base_url('/detail') . '/' . $bns['id_laptop']; ?>">
                <div class="card border-color border-0 shadow-card">
                  <div class="card-body pl-3 py-1 pr-0 pr-0">
                    <div class="div d-flex justify-content-center">
                      <img style="width: 140px; height: 130px" src="<?= base_url('/public/img/upload') . '/' . $bns['gambar']; ?>" alt="">
                    </div>
                    <p style="font-size: 14px;" class="font-hitam-500 card-title my-1"><?= $bns['merk'] . ' ' . $bns['seri']; ?></p>
                    <p class="card-text mt-0 mb-1 font-hitam-500" style="font-size: 12px;"><?= $bns['prosesor'] . '/' . $bns['ram'] . '/' . $bns['penyimpanan']; ?></p>
                    <p class="my-0 font-sewa">Biaya sewa</p>
                    <p class="mt-0 font-orange ">Rp <?php $harga = $bns['harga'] / 7;
                                                    echo number_format($harga, 0, ',', '.'); ?>/hari</p>
                  </div>
                </div>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="site-section py-3" style="background-color: #f2f2f2;">
  <div class="container inline" style="background-color: #ffffff;">
    <div class="row px-2">
      <div class="col-lg-12">
        <div class="row pt-4">
          <?php foreach ($gaming as $bns) : ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-4 px-2">
              <a href="<?= base_url('/detail') . '/' . $bns['id_laptop']; ?>">
                <div class="card border-color border-0 shadow-card">
                  <div class="card-body pl-3 py-1 pr-0 pr-0">
                    <div class="div d-flex justify-content-center">
                      <img style="width: 140px; height: 130px" src="<?= base_url('/public/img/upload') . '/' . $bns['gambar']; ?>" alt="">
                    </div>
                    <p style="font-size: 14px;" class="font-hitam-500 card-title my-1"><?= $bns['merk'] . ' ' . $bns['seri']; ?></p>
                    <p class="card-text mt-0 mb-1 font-hitam-500" style="font-size: 12px;"><?= $bns['prosesor'] . '/' . $bns['ram'] . '/' . $bns['penyimpanan']; ?></p>
                    <p class="my-0 font-sewa">Biaya sewa</p>
                    <p class="mt-0 font-orange ">Rp <?php $harga = $bns['harga'] / 7;
                                                    echo number_format($harga, 0, ',', '.'); ?>/hari</p>
                  </div>
                </div>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="site-section py-3" style="background-color: #f2f2f2;">
  <div class="container inline" style="background-color: #ffffff;">
    <div class="row px-2">
      <div class="col-lg-12">
        <div class="row pt-4">
          <?php foreach ($multimedia as $bns) : ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-4 px-2">
              <a href="<?= base_url('/detail') . '/' . $bns['id_laptop']; ?>">
                <div class="card border-color border-0 shadow-card">
                  <div class="card-body pl-3 py-1 pr-0 pr-0">
                    <div class="div d-flex justify-content-center">
                      <img style="width: 140px; height: 130px" src="<?= base_url('/public/img/upload') . '/' . $bns['gambar']; ?>" alt="">
                    </div>
                    <p style="font-size: 14px;" class="font-hitam-500 card-title my-1"><?= $bns['merk'] . ' ' . $bns['seri']; ?></p>
                    <p class="card-text mt-0 mb-1 font-hitam-500" style="font-size: 12px;"><?= $bns['prosesor'] . '/' . $bns['ram'] . '/' . $bns['penyimpanan']; ?></p>
                    <p class="my-0 font-sewa">Biaya sewa</p>
                    <p class="mt-0 font-orange ">Rp <?php $harga = $bns['harga'] / 7;
                                                    echo number_format($harga, 0, ',', '.'); ?>/hari</p>
                  </div>
                </div>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="site-section py-3" style="background-color: #f2f2f2;">
  <div class="container inline" style="background-color: #ffffff;">
    <div class="row px-2">
      <div class="col-lg-12">
        <div class="row pt-4">
          <?php foreach ($ultra as $bns) : ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-4 px-2">
              <a href="<?= base_url('/detail') . '/' . $bns['id_laptop']; ?>">
                <div class="card border-color border-0 shadow-card">
                  <div class="card-body pl-3 py-1 pr-0 pr-0">
                    <div class="div d-flex justify-content-center">
                      <img style="width: 140px; height: 130px" src="<?= base_url('/public/img/upload') . '/' . $bns['gambar']; ?>" alt="">
                    </div>
                    <p style="font-size: 14px;" class="font-hitam-500 card-title my-1"><?= $bns['merk'] . ' ' . $bns['seri']; ?></p>
                    <p class="card-text mt-0 mb-1 font-hitam-500" style="font-size: 12px;"><?= $bns['prosesor'] . '/' . $bns['ram'] . '/' . $bns['penyimpanan']; ?></p>
                    <p class="my-0 font-sewa">Biaya sewa</p>
                    <p class="mt-0 font-orange ">Rp <?php $harga = $bns['harga'] / 7;
                                                    echo number_format($harga, 0, ',', '.'); ?>/hari</p>
                  </div>
                </div>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endsection('isi'); ?>