<?= $this->extend('layout/template'); ?>
<?= $this->section('isi'); ?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <?php $validation = \Config\Services::validation() ?>

        <div class="row">
            <div class="card border-light mb-3 shadow-sm p mb-3 bg-white px-3 py-3 rounded col-lg-11">
                <div class=" card-body">
                    <div class="row mt-0 mb-2">
                        <div class="col-lg-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="http://localhost/rental_laptop/data_laptop">Data laptop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Form tambah</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col">
                            <h1 class="h3 card-title text-gray-800"><?= $judul; ?></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <form action="<?= base_url('admin/data_laptop/tambah'); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="tipe" class="col-lg-11">Tipe </label>
                                    <div class="col-lg-11">
                                        <select class="custom-select mr-sm-2" id="tipe" name="tipe">
                                            <option selected>Choose...</option>
                                            <?php foreach ($tipe as $tp) : ?>
                                                <option value="<?= $tp ?>"><?= $tp ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                        <?php if ($validation->hasError('tipe')) : ?>
                                            <small id="emailHelp" class="form-text text-danger my-0">
                                                <p class="my-0"><?= $validation->getError('tipe'); ?></p>
                                            </small>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="merk" class="col-lg-11">Merk</label>
                                    <div class="col-lg-11">
                                        <input type="text" class="form-control" id="merk" name="merk" value="<?= set_value('merk'); ?>">
                                        <?php if ($validation->hasError('merk')) : ?>
                                            <small id="emailHelp" class="form-text text-danger my-0">
                                                <p class="my-0"><?= $validation->getError('merk'); ?></p>
                                            </small>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="seri" class="col-lg-11">Seri</label>
                                    <div class="col-lg-11">
                                        <input type="text" class="form-control" id="seri" name="seri" value="<?= set_value('seri'); ?>">
                                        <?php if ($validation->hasError('seri')) : ?>
                                            <small id="emailHelp" class="form-text text-danger my-0">
                                                <p class="my-0"><?= $validation->getError('seri'); ?></p>
                                            </small>
                                        <?php endif; ?>
                                    </div>
                                </div>



                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group ">
                                <label for="prosesor" class="col-lg-12">Prosesor</label>
                                <div class="col-lg-12">
                                    <input type="text" class="form-control" id="prosesor" name="prosesor" value="<?= set_value('prosesor'); ?>">
                                    <?php if ($validation->hasError('prosesor')) : ?>
                                        <small id="emailHelp" class="form-text text-danger my-0">
                                            <p class="my-0"><?= $validation->getError('prosesor'); ?></p>
                                        </small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 col-sm-6 mr-0 pr-0">
                                    <div class="form-group">
                                        <label for="ram" class="col-lg-12 ">RAM</label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" id="ram" name="ram" value="<?= set_value('ram'); ?>">
                                            <?php if ($validation->hasError('ram')) : ?>
                                                <small id="emailHelp" class="form-text text-danger my-0">
                                                    <p class="my-0"><?= $validation->getError('ram'); ?></p>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 ml-0 pl-0">
                                    <div class="form-group">
                                        <label for="penyimpanan" class="col-lg-12">Penyimpanan</label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" id="penyimpanan" name="penyimpanan" value="<?= set_value('penyimpanan'); ?>">
                                            <?php if ($validation->hasError('penyimpanan')) : ?>
                                                <small id="emailHelp" class="form-text text-danger my-0">
                                                    <p class="my-0"><?= $validation->getError('penyimpanan'); ?></p>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 mr-0 pr-0">
                                    <div class="form-group">
                                        <label for="vga" class="col-lg-12 ">VGA</label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" id="vga" name="vga" value="<?= set_value('vga'); ?>">
                                            <?php if ($validation->hasError('vga')) : ?>
                                                <small id="emailHelp" class="form-text text-danger my-0">
                                                    <p class="my-0"><?= $validation->getError('vga'); ?></p>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-6 ml-0 pl-0">
                                    <div class="form-group ">
                                        <label for="layar" class="col-lg-12 ">Layar</label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" id="layar" name="layar" value="<?= set_value('layar'); ?>">
                                            <?php if ($validation->hasError('layar')) : ?>
                                                <small id="emailHelp" class="form-text text-danger my-0">
                                                    <p class="my-0"><?= $validation->getError('layar'); ?></p>
                                                </small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="form-group ">
                                <label for="jumlah" class="col-lg-11">Jumlah</label>
                                <div class="col-lg-11">
                                    <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= set_value('jumlah'); ?>">
                                    <?php if ($validation->hasError('jumlah')) : ?>
                                        <small id="emailHelp" class="form-text text-danger my-0">
                                            <p class="my-0"><?= $validation->getError('jumlah'); ?></p>
                                        </small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="harga" class="col-lg-11">Harga</label>
                                <div class="col-lg-11">
                                    <input type="text" class="form-control" id="harga" name="harga" value="<?= set_value('harga'); ?>">
                                    <?php if ($validation->hasError('harga')) : ?>
                                        <small id="emailHelp" class="form-text text-danger my-0">
                                            <p class="my-0"><?= $validation->getError('harga'); ?></p>
                                        </small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="custom-file pl-3 mt-4 pt-1 mb-4">
                                <div class="col-lg-10">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                    <input type="file" class="custom-file-input " id="image" name="image[]" multiple>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for="deskripsi" style="color:black;">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" style="height:125px;" name="deskripsi" value="<?= set_value('deskripsi'); ?>"></textarea>
                                    <?php if ($validation->hasError('deskripsi')) : ?>
                                        <small id="emailHelp" class="form-text text-danger my-0">
                                            <p class="my-0"><?= $validation->getError('deskripsi'); ?></p>
                                        </small>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-11">
                            <div class="form-group mt-4 pt-3">
                                <div class="col-lg-9">
                                    <button class="btn btn-primary" type="submit">Tambahkan</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
<?= $this->endsection('isi'); ?>