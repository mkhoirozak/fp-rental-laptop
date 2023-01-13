<!DOCTYPE html>
<html lang="en">
<?php $validation = \Config\Services::validation() ?>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $judul; ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('public/assets/stisla'); ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url('public/assets/stisla'); ?>/assets/css/components.css">

  <link rel="icon" type="image/png" sizes="64x64" href="<?= base_url('public/'); ?>/laptop1.png">
</head>

<body style="background-color: #2979ff ;">
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-5 offset-md-4 col-lg-5 offset-lg-4 col-xl-5 offset-xl-4">

            <div class="card card-primary">
              <div class="card-header">
                <h4>Register</h4>
              </div>

              <div class="card-body">
                <form method="post" action="<?= base_url('admin/auth/menu_register'); ?>">
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="frist_name">Nama</label>
                      <input id="frist_name" type="text" class="form-control" name="nama" autofocus value="<?= set_value('nama'); ?>">
                      <?php if ($validation->hasError('nama')) : ?>
                        <small id="emailHelp" class="form-text text-danger my-0">
                          <p class="my-0"><?= $validation->getError('nama'); ?></p>
                        </small>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="text" type="text" class="form-control" name="email">
                    <?php if ($validation->hasError('email')) : ?>
                      <small id="emailHelp" class="form-text text-danger my-0">
                        <p class="my-0"><?= $validation->getError('email'); ?></p>
                      </small>
                    <?php endif; ?>
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Jenis Kelamain</label>
                      <select class="form-control selectric" name="kelamin">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                      <?php if ($validation->hasError('kelamin')) : ?>
                        <small id="emailHelp" class="form-text text-danger my-0">
                          <p class="my-0"><?= $validation->getError('kelamin'); ?></p>
                        </small>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password1" class="d-block">Password</label>
                      <input id="password1" type="password" class="form-control" name="password1">
                      <?php if ($validation->hasError('password1')) : ?>
                        <small id="emailHelp" class="form-text text-danger my-0">
                          <p class="my-0"><?= $validation->getError('password1'); ?></p>
                        </small>
                      <?php endif; ?>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password2">
                      <?php if ($validation->hasError('password2')) : ?>
                        <small id="emailHelp" class="form-text text-danger my-0">
                          <p class="my-0"><?= $validation->getError('password2'); ?></p>
                        </small>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
                <div class="mt-3 text-muted text-center">
                  Sudah punya akun? <a href="<?= base_url('admin/auth'); ?>">Logn!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="../node_modules/selectric/public/jquery.selectric.min.js"></script>


  <!-- Template JS File -->
  <script src="<?= base_url('public/assets/stisla'); ?>/assets/js/scripts.js"></script>
  <script src="<?= base_url('public/assets/stisla'); ?>/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url('public/assets/stisla'); ?>/assets/js/page/index.js"></script>
</body>

</html>