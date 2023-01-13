<!DOCTYPE html>
<html lang="en">
<?php
$validation = \Config\Services::validation();
$session = \Config\Services::session(); 
?>

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
    <section class="section">
        <div class="container">
            <?php if ($session->getflashdata()) : ?>
                <div class="row" style="margin-top: 0px;">
                    <div class="offset-lg-3 col-lg-6">
                        <?= $session->getflashdata('pesan'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <div id="app">
                <div class="row justify-content-center" style="margin-top: 130px;">
                    <div class="col-9 col-sm-8  col-md-6  col-lg-6  col-xl-4 ">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>

                            <div class="card-body">
                                <?php if (!empty($id)) : ?>
                                    <form method="post" action="<?= base_url('admin/auth/index/' . $id); ?>">
                                    <?php else : ?>
                                        <form method="post" action="<?= base_url('admin/auth') ?>">
                                        <?php endif; ?>
                                        <div class="form-group">
                                            <input type="hidden" value="<?= $id; ?>" name="id_category">
                                            <label for="email">Email</label>
                                            <input id="email" type="text" class="form-control" name="email" tabindex="1" autofocus value="<?= set_value('email'); ?>">
                                            <?php if ($validation->haserror('email')) : ?>
                                                <small id="emailHelp" class="form-text text-danger my-0">
                                                    <p class="my-0"><?= $validation->getError('email'); ?></p>
                                                </small>
                                            <?php endif; ?>
                                        </div>

                                        <div class="form-group">
                                            <div class="d-block">
                                                <label for="password" class="control-label">Password</label>
                                                <div class="float-right">
                                                    <a href="auth-forgot-password.html" class="text-small">
                                                        Forgot Password?
                                                    </a>
                                                </div>
                                            </div>
                                            <input id="password" type="password" class="form-control" name="password" tabindex="2">
                                            <?php if ($validation) : ?>
                                                <small id="emailHelp" class="form-text text-danger my-0">
                                                    <p class="my-0"><?= $validation->getError('password'); ?></p>
                                                </small>
                                            <?php endif; ?>

                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                                Login
                                            </button>
                                        </div>
                                        </form>
                                        <div class="mt-5 text-muted text-center">
                                            Don't have an account? <a href="<?= base_url('admin/auth/register'); ?>">Create One</a>
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

    <!-- Template JS File -->
    <script src="<?= base_url('public/assets/stisla'); ?>/assets/js/scripts.js"></script>
    <script src="<?= base_url('public/assets/stisla'); ?>/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url('public/assets/stisla'); ?>/assets/js/page/index.js"></script>
</body>

</html>