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
                        <div class="card-header">
                            <h3 class="card-title">Edit User</h3>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php foreach ($users as $user) : ?>
                            <form action="/user/update/<?= $user['id_user']; ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="card-body">
                                    <input type="hidden" name="id" value="<?= $user['id_user']; ?>">
                                    <div class="form-group">
                                        <?php
                                        if (session()->getFlashdata('errUsername')) {
                                            $isInvalidUsername = 'is-invalid';
                                        } else {
                                            $isInvalidUsername = '';
                                        }
                                        ?>
                                        <label>Username</label>
                                        <input type="text" class="form-control <?= $isInvalidUsername ?>" name="username" value="<?= $user['username']; ?>">
                                        <?php
                                        if (session()->getFlashdata('errUsername')) {
                                            echo '<div id="validationServer03Feedback" class="invalid-feedback"> ' . session()->getFlashdata('errUsername') . '</div>';
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Pengguna</label>
                                        <input type="text" class="form-control" name="nama_lengkap" value="<?= $user['nama_lengkap']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Kabupaten</label>
                                        <select class="form-control" id="search-kabupaten" name="id_kabupaten" style="width: 100%;" required>
                                            <option value=""></option>
                                            <?php foreach ($kabupaten as $value) : ?>
                                                <option value="<?= $value['id']; ?>" <?= $user['id_kabupaten'] == $value['id'] ? 'selected' : ''; ?>><?= $value['nama_kabupaten']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <select class="form-control" id="search-kecamatan" name="id_kecamatan" style="width: 100%;" required>
                                            <option value=""></option>
                                            <?php foreach ($kecamatan as $value) : ?>
                                                <option value="<?= $value['id']; ?>" <?= $user['id_kecamatan'] == $value['id'] ? 'selected' : ''; ?>><?= $value['nama_kecamatan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Desa</label>
                                        <select class="form-control" id="search-desa" name="id_desa" style="width: 100%;" required>
                                            <option value=""></option>
                                            <?php foreach ($desa as $value) : ?>
                                                <option value="<?= $value['id']; ?>" <?= $user['id_desa'] == $value['id'] ? 'selected' : ''; ?>><?= $value['nama_desa']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control" name="role" required>
                                            <option value="<?= $user['role']; ?>"><?= $user['role']; ?></option>
                                            <option value="superadmin">superadmin</option>
                                            <option value="admin">admin</option>
                                            <option value="user">user</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-right">
                                        <i class="fas fa-plus"></i><b> Edit Data</b>
                                    </button>
                                </div>
                            </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection('content'); ?>