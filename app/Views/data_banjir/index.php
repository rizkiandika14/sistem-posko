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
                            <h2>Pelaporan Banjir</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="/pelaporan/tambah" class="btn bg-gradient-primary"> <i class="fas fa-plus">
                                </i> Tambah Data</a><br><br>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Pelaporan</th>
                                        <th>Desa</th>
                                        <th>Kecamatan</th>
                                        <th>Kabupaten</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($laporans as $laporan) : ?>
                                        <tr>
                                            <th><?= $no++; ?></th>
                                            <th><?= tgl_indo($laporan['created_at']); ?></th>
                                            <th><?= $laporan['nama_desa']; ?></th>
                                            <th><?= $laporan['nama_kecamatan']; ?></th>
                                            <th><?= $laporan['nama_kabupaten']; ?></th>
                                            <th><span class="badge badge-warning text-bold" style="font-size: 15px;"><?= $laporan['status']; ?></span></th>
                                            <th><a class="btn btn-primary btn-sm" href="/pelaporan/detail/<?= $laporan['id_pelaporan']; ?>">
                                                    <i class="fas fa-eye"> Detail </i>
                                                </a>
                                                <a class="btn btn-warning btn-sm" href="/pelaporan/edit/<?= $laporan['id_pelaporan']; ?>">
                                                    <i class="fas fa-pencil-alt"> Edit</i>
                                                </a>
                                                <form action="/pelaporan/<?= $laporan['id_pelaporan']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data?');"> <i class="fas fa-trash">
                                                            Delete</i>

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