<?php error_reporting(0)?>

<?= $this->extend('layout/template_customer'); ?>
<?= $this->section('isi'); ?>


<div class="site-section py-3" style="background-color: #f2f2f2; margin-top: 70px">
  <form class="container" style="background-color: #ffffff;" method="POST" action="<?php echo base_url("profile/update") ?>">
    <div class="col-12 py-2">
        <div class="form-group">
            <label class="control-label">Nama <span class="text-danger">*</span></label>
            <input type="text" class="form-control nama" id="nama" name="nama" placeholder="Nama" value="<?php echo $user["nama"] ?>" required>
        </div>
        <div class="form-group">
            <label class="control-label">Jenis Kelamin <span class="text-danger">*</span></label>
            <select name="kelamin" id="kelamin" class="form-control kelamin" required>
                <option value="">Pilih Jenis Kelamin</option>
                <?php foreach($jenis_kelamin as $jk) : ?>
                    <option value="<?php echo $jk ?>" <?php echo $jk==$user["kelamin"] ? "selected" : "" ?>><?php echo $jk ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">Password (<small class="text-center">Isi apabila ingin mengubah password</small>)</label>
            <input type="password" class="password form-control" id="password" name="password" placeholder="***">
        </div>
        <div class="form-group">
            <button class="btn btn-block btn-update btn-success" id="btn-update" type="submit">
                <i class="fa fa-save"></i> Simpan
            </button>
        </div>
    </div>
  </form>
</div>
<?= $this->endsection('isi'); ?>