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
                            <h2>Management Kabupaten</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#modal-default"> <i class="fas fa-plus">
                                </i> Tambah Data</button><br><br>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kabupaten</th>
                                        <th>Jumlah Kecamatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($kabupatens as $kabupaten) : ?>
                                        <tr>
                                            <th><?= $no++; ?></th>
                                            <th><?= $kabupaten->nama_kabupaten; ?></th>
                                            <th><?= $kabupaten->jumlah_kecamatan; ?></th>
                                            <th><button type="button" data-toggle="modal" data-target="#modal-edit<?= $kabupaten->id; ?>" class="btn btn-info btn-sm">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </button>
                                                <form action="/kabupaten/<?= $kabupaten->id; ?>" method="post" class="d-inline">
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
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Kabupaten</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/kabupaten/tambah" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kabupaten</label>
                        <input type="text" class="form-control" name="nama_kabupaten" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="sumbit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php foreach ($kabupatens as $kabupaten) : ?>
    <div class="modal fade" id="modal-edit<?= $kabupaten->id; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Kabupaten</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/kabupaten/update/<?= $kabupaten->id; ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" class="form-control" name="id" value="<?= $kabupaten->id; ?>" required>

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Kabupaten</label>
                            <input type="text" class="form-control" name="nama_kabupaten" value="<?= $kabupaten->nama_kabupaten; ?>" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="sumbit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>
<!-- /.modal -->
<?= $this->endsection('content'); ?>