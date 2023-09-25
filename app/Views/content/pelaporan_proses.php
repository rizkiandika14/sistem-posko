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
                            <h3>Data Pelaporan Banjir Proses</h3>
                        </div>
                        <div class="card-header p-2">
                            <ul class="nav nav-pills ml-3">
                                <li class="nav-item"><a class="nav-link" href="/manage_pelaporan">Semua Data</a></li>
                                <li class="nav-item"><a class="nav-link" href="/manage_pelaporan/batal">Dibatalkan</a></li>
                                <li class="nav-item"><a class="nav-link" href="/manage_pelaporan/selesai">Selesai</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active">
                                    <form action="/manage_pelaporan/filter_proses" method="POST">
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
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                    </div>
                    <?php if (session()->getFlashdata('alert')) : ?>
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="icon fas fa-info"></i>
                            <?= session()->getFlashdata('alert'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card">
                        <div class="card-body">
                            <table id="tabelData" class="table table-bordered table-striped">

                                <?php $no = 1; ?>

                                <tr>
                                    <th>No</th>
                                    <?php foreach ($laporans as $laporan) : ?>
                                        <th><?= $no++; ?></th>
                                    <?php endforeach; ?>
                                </tr>
                                <tr>
                                    <th>Desa</th>
                                    <?php foreach ($laporans as $laporan) : ?>
                                        <th><?= $laporan['nama_desa']; ?></th>
                                    <?php endforeach; ?>
                                </tr>
                                <tr>
                                    <th>Kecamatan</th>
                                    <th><?= $laporan['nama_kecamatan']; ?></th>
                                </tr>


                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Batal -->
<?php foreach ($laporans as $laporan) : ?>
    <div class="modal fade" id="modal-konfirmasi<?= $laporan['id_pelaporan']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Rincian Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group ml-2">
                            <label>Kabupaten</label>
                            <input type="text" class="form-control form-control-border border-width-2" id="kabupaten" name="kabupaten" value="<?= $laporan['nama_kabupaten']; ?>" readonly>
                        </div>
                        <div class="form-group ml-2">
                            <label>Kecamatan </label>
                            <input type="text" class="form-control form-control-border border-width-2" id="kecamatan" name="kecamatan" value="<?= $laporan['nama_kecamatan']; ?>" readonly>
                        </div>
                        <div class="form-group ml-2">
                            <label>Desa </label>
                            <input type="text" class="form-control form-control-border border-width-2" id="desa" name="desa" value="<?= $laporan['nama_desa']; ?>" readonly>
                        </div>
                        <div class="form-group ml-2">
                            <label for="jumlah_rumah">Jumlah Rumah terkena banjir</label>
                            <input type="text" class="form-control form-control-border border-width-2" id="jumlah_rumah" name="jumlah_rumah" value="<?= $laporan['jumlah_rumah']; ?>" readonly>
                        </div>
                        <div class="form-group ml-2">
                            <label>Jumlah Warga</label>
                            <input type="text" class="form-control form-control-border border-width-2" name="jumlah_warga" value="<?= $laporan['jumlah_warga']; ?>" readonly>
                        </div>
                        <div class="form-group ml-2">
                            <label>Jumlah Meninggal</label>
                            <input type="text" class="form-control form-control-border border-width-2" name="jumlah_meninggal" value="<?= $laporan['jumlah_meninggal']; ?>" readonly>
                        </div>
                        <div class="form-group ml-2">
                            <label>Jumlah Pengungsi</label>
                            <input type="text" class="form-control form-control-border border-width-2" name="jumlah_pengungsi" value="<?= $laporan['jumlah_pengungsi']; ?>" readonly>
                        </div>
                        <div class="form-group ml-2">
                            <label>Kebutuhan Perahu</label>
                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_perahu" value="<?= $laporan['kebutuhan_perahu']; ?>" readonly>
                        </div>
                        <div class="form-group ml-2">
                            <label>Kebutuhan Tenda</label>
                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_tenda" value="<?= $laporan['kebutuhan_tenda']; ?>" readonly>
                        </div>
                        <div class="form-group ml-2">
                            <label>Kebutuhan Beras</label>
                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_beras" value="<?= $laporan['kebutuhan_beras']; ?>" readonly>
                        </div>
                        <div class="form-group ml-2">
                            <label>Kebutuhan Telur</label>
                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_telur" value="<?= $laporan['kebutuhan_telur']; ?>" readonly>
                        </div>
                        <div class="form-group ml-2">
                            <label>Kebutuhan Air mineral</label>
                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_mineral" value="<?= $laporan['kebutuhan_mineral']; ?>" readonly>
                        </div>
                        <div class="form-group ml-2">
                            <label>Kebutuhan Minyak goreng</label>
                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_minyak" value="<?= $laporan['kebutuhan_minyak']; ?>" readonly>
                        </div>
                        <div class="form-group ml-2">
                            <label>Penyebab Banjir</label>
                            <textarea class="form-control" rows="3" name="penyebab_banjir" readonly><?= htmlspecialchars($laporan['penyebab_banjir']); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                    <form action="/manage_pelaporan/batalkan/<?= $laporan['id_pelaporan']; ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <button type="submit" class="btn btn-warning">Batalkan Data</button>
                    </form>
                    <form action="/manage_pelaporan/selesaikan/<?= $laporan['id_pelaporan']; ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <button type="sumbit" class="btn btn-primary">Selesaikan Data</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>
<?= $this->endsection('content'); ?>