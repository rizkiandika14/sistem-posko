<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <center>
                <h1><b> Satuan Komando Sigap Bencana </b></h1>

            </center>
            <div class="card-header text-center">

                <a href="/" class="h3">SAKOMSIBA <br>Kab.Cilacap</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Silahkan login untuk masuk ke sistem</p>

                <form action="/login/cekUser" method="post">
                    <?= csrf_field(); ?>
                    <div class="input-group mb-3">
                        <?php
                        if (session()->getFlashdata('errUsername')) {

                            $isInvalidUsername = 'is-invalid';
                        } else {
                            $isInvalidUsername = '';
                        }
                        ?>
                        <input type="text" name="username" class="form-control <?= $isInvalidUsername ?>" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <?php
                        if (session()->getFlashdata('errUsername')) {
                            echo '<div id="validationServer03Feedback" class="invalid-feedback"> ' . session()->getFlashdata('errUsername') . '</div>';
                        }
                        ?>
                    </div>
                    <div class="input-group mb-3">
                        <?php
                        if (session()->getFlashdata('errPassword')) {

                            $isInvalidPassword = 'is-invalid';
                        } else {
                            $isInvalidPassword = '';
                        }
                        ?>

                        <input type="password" name="password" class="form-control <?= $isInvalidPassword ?>" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                        <?php
                        if (session()->getFlashdata('errPassword')) {
                            echo '<div id="validationServer03Feedback" class="invalid-feedback"> ' . session()->getFlashdata('errPassword') . '</div>';
                        }
                        ?>

                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>




            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/'); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/'); ?>/dist/js/adminlte.min.js"></script>
</body>

</html>