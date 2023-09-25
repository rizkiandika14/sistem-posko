<?= $this->extend('layout/templates'); ?>


<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-secondary">
                        <div class="card-header bg-lightblue">

                            <h2 class="card-title" style=" font-size:25px;">Tambah Data Pengguna</h2>
                            <div class="float-right">
                                <a class="float-right nav-link bg-info rounded" href="/user" role="button">
                                    <i class="fas fa-arrow-left"></i>
                                    Kembali
                                </a>
                            </div>

                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="/user/save" method="post">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <?php
                                    if (session()->getFlashdata('errUsername')) {
                                        $isInvalidUsername = 'is-invalid';
                                    } else {
                                        $isInvalidUsername = '';
                                    }
                                    ?>
                                    <label>Username</label>
                                    <input type="text" class="form-control  <?= $isInvalidUsername ?>" name="username" value="<?= old('username'); ?>">
                                    <?php
                                    if (session()->getFlashdata('errUsername')) {
                                        echo '<div id="validationServer03Feedback" class="invalid-feedback"> ' . session()->getFlashdata('errUsername') . '</div>';
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                    if (session()->getFlashdata('errNama')) {
                                        $isInvalidNama = 'is-invalid';
                                    } else {
                                        $isInvalidNama = '';
                                    }
                                    ?>
                                    <label>Nama Pengguna</label>
                                    <input type="text" class="form-control <?= $isInvalidNama ?>" name="nama_lengkap">
                                    <?php
                                    if (session()->getFlashdata('errNama')) {
                                        echo '<div id="validationServer03Feedback" class="invalid-feedback"> ' . session()->getFlashdata('errNama') . '</div>';
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Kabupaten</label>
                                    <select class="form-control" id="search-kabupaten" name="id_kabupaten" style="width: 100%;">
                                        <option value=""></option>
                                        <?php foreach ($kabupaten as $value) : ?>
                                            <option value="<?= $value['id']; ?>"><?= $value['nama_kabupaten']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <select class="form-control" id="search-kecamatan" name="id_kecamatan" style="width: 100%;">
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Desa</label>
                                    <select class="form-control" id="search-desa" name="id_desa" style="width: 100%;">
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" name="role">
                                        <option value="superadmin">superadmin</option>
                                        <option value="admin">admin</option>
                                        <option value="user">user</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-plus"></i><b> Tambah</b>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection('content'); ?>