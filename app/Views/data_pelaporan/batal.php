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
                            <h2>Data Dibatalkan Pelaporan Banjir</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="/data_pelaporan/filter_batal" method="POST">
                                <span class="badge badge-info text-bold" style="font-size: 15px;">Filter data</span><br>
                                <!-- Date range -->
                                <div class="form-group">
                                    <label>Dari Tanggal :</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input date_range_filter" data-target="#reservationdate" name="date1" required>
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Sampai Tanggal :</label>
                                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input date_range_filter2" data-target="#reservationdate2" name="date2" required>
                                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <button type="sumbit" class="btn bg-gradient-primary" data-toggle="modal" data-target="#modal-default"> <i class="fas fa-search">
                                        Cari</i></button>
                            </form>
                            <!-- /.form group -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table id="tabelData" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Pelaporan</th>
                                        <th>Desa</th>
                                        <th>Kecamatan</th>
                                        <th>Kabupaten</th>
                                        <th>Status</th>
                                        <th>Tanggal Dibatalkan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($laporans as $laporan) : ?>
                                        <tr>
                                            <th><?= $no++; ?></th>
                                            <th><?= tgl_indo($laporan['dibuat']); ?></th>
                                            <th><?= $laporan['nama_desa']; ?></th>
                                            <th><?= $laporan['nama_kecamatan']; ?></th>
                                            <th><?= $laporan['nama_kabupaten']; ?></th>
                                            <th><?= $laporan['waktu_status']; ?></th>
                                            <th><span class="badge badge-danger text-bold" style="font-size: 15px;"><?= $laporan['status']; ?></span></th>
                                            <th><a class="btn btn-primary btn-sm" href="/pelaporan/detail/<?= $laporan['id_pelaporan']; ?>">
                                                    <i class="fas fa-eye"> Detail </i>
                                                </a>

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