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
                            <h2>Management Desa</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#modal-default"> <i class="fas fa-plus">
                                </i> Tambah Data</button><br><br>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Desa</th>
                                        <th>Nama Kecamatan</th>
                                        <th>Nama Kabupaten</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($desas as $desa) : ?>
                                        <tr>
                                            <th><?= $no++; ?></th>
                                            <th><?= $desa->nama_desa; ?></th>
                                            <th><?= $desa->nama_kecamatan; ?></th>
                                            <th><?= $desa->nama_kabupaten; ?></th>
                                            <th><button type="button" data-toggle="modal" data-target="#modal-edit<?= $desa->id; ?>" class="btn btn-info btn-sm">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </button>
                                                <form action="/desa/<?= $desa->id; ?>" method="post" class="d-inline">
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
                <h4 class="modal-title">Tambah Data Desa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/desa/tambah" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kabupaten</label>
                        <select class="form-control" id="search-kabupaten" name="id_kabupaten" style="width: 100%;" required>
                            <option value=""></option>
                            <?php foreach ($kabupatens as $value) : ?>
                                <option value="<?= $value['id']; ?>"><?= $value['nama_kabupaten']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Kecamatan</label>
                        <select class="form-control" id="search-kecamatan" name="id_kecamatan" style="width: 100%;" required>
                            <option value=""></option>
                            <?php foreach ($kecamatans as $value) : ?>
                                <option value="<?= $value['id']; ?>"><?= $value['nama_kecamatan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Desa</label>
                        <input type="text" class="form-control" name="nama_desa" required>
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

<?php foreach ($desas as $desa) : ?>
    <div class="modal fade" id="modal-edit<?= $desa->id; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Desa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/desa/update/<?= $desa->id; ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" class="form-control" name="id" value="<?= $desa->id; ?>" required>

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Kabupaten</label>
                            <select class="form-control" id="search-kabupaten" name="id_kabupaten" style="width: 100%;" required>
                                <option value=""></option>
                                <?php foreach ($kabupatens as $value) : ?>
                                    <option value="<?= $value['id']; ?>" <?= $desa->id_kabupaten == $value['id'] ? 'selected' : ''; ?>><?= $value['nama_kabupaten']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Kecamatan</label>
                            <select class="form-control" id="search-kecamatan" name="id_kecamatan" style="width: 100%;" required>
                                <option value=""></option>
                                <?php foreach ($kecamatans as $value) : ?>
                                    <option value="<?= $value['id']; ?>" <?= $desa->id_kecamatan == $value['id'] ? 'selected' : ''; ?>><?= $value['nama_kecamatan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Desa</label>
                            <input type="text" class="form-control" name="nama_desa" value="<?= $desa->nama_desa; ?>" required>
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
<?= $this->endsection('content'); ?>