<?= $this->extend('layout/templates'); ?>


<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success">
                            <i class="icon fas fa-check"></i>
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card">
                        <div class="card-header">
                            <h2>Management Pengguna</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="/user/tambah" class="btn bg-gradient-primary"> <i class="fas fa-plus">
                                </i> Tambah Data</a><br><br>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama Pengguna</th>
                                        <th>Nama Desa</th>
                                        <th>Nama Kecamatan</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($users as $user) : ?>
                                        <tr>
                                            <th><?= $no++; ?></th>
                                            <th><?= $user['username']; ?></th>
                                            <th><?= $user['nama_lengkap']; ?></th>
                                            <th><?= $user['nama_desa']; ?></th>
                                            <th><?= $user['nama_kecamatan']; ?></th>
                                            <th><?= $user['role']; ?></th>
                                            <th><a href="/user/edit/<?= $user['id_user']; ?>" class="btn btn-info btn-sm">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                                <form action="/user/<?= $user['id_user']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data?');"> <i class="fas fa-trash">
                                                        </i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </th>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection('content'); ?>