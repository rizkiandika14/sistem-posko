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

                            <h2 class="card-title" style=" font-size:25px;">Data Detail Pelaporan Banjir</h2>

                        </div>
                        <?php foreach ($laporans as $laporan) : ?>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md col-form-label" style="font-size: 20px;">Tanggal Pelaporan : <?= tgl_indo($laporan->dibuat); ?></label><br>
                                    <label class="col-md col-form-label" style="font-size: 20px;">Nama Pelapor : <?= $laporan->nama_lengkap; ?></label><br>
                                    <label class="col-md col-form-label" style="font-size: 20px;">Status Pelaporan :
                                        <?php if ($laporan->status == 'proses') : ?>
                                            <span class="badge badge-warning" style="font-size: 20px;">Proses</span>
                                        <?php elseif ($laporan->status == 'selesai') : ?>
                                            <span class="badge badge-success" style="font-size: 20px;">Selesai</span>
                                        <?php elseif ($laporan->status == 'batal') : ?>
                                            <span class="badge badge-danger" style="font-size: 20px;">Dibatalkan</span>
                                        <?php else : ?>
                                            <span class="badge bg-black" style="font-size: 20px;">Data tidak ditemukan</span>
                                        <?php endif; ?>
                                    </label>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-5 ml-2 mr-2">
                                        <div class="form-group">
                                            <label>Kabupaten</label>
                                            <input type="text" class="form-control form-control-border border-width-2" id="kabupaten" name="kabupaten" value="<?= $laporan->nama_kabupaten; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kecamatan </label>
                                            <input type="text" class="form-control form-control-border border-width-2" id="kecamatan" name="kecamatan" value="<?= $laporan->nama_kecamatan; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Desa </label>
                                            <input type="text" class="form-control form-control-border border-width-2" id="desa" name="desa" value="<?= $laporan->nama_desa; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah_rumah">Jumlah Rumah terkena banjir</label>
                                            <input type="text" class="form-control form-control-border border-width-2" id="jumlah_rumah" name="jumlah_rumah" value="<?= $laporan->jumlah_rumah; ?> rumah" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Warga</label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="jumlah_warga" value="<?= $laporan->jumlah_warga; ?> orang" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Meninggal</label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="jumlah_meninggal" value="<?= $laporan->jumlah_meninggal; ?> orang" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Pengungsi</label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="jumlah_pengungsi" value="<?= $laporan->jumlah_pengungsi; ?> orang" readonly>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="col-md-6 ml-2 mr-2">
                                        <div class="form-group">
                                            <label>Kebutuhan Perahu</label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_perahu" value="<?= $laporan->kebutuhan_perahu; ?> perahu" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kebutuhan Tenda</label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_tenda" value="<?= $laporan->kebutuhan_tenda; ?> buah" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kebutuhan Beras</label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_beras" value="<?= $laporan->kebutuhan_beras; ?> kg" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kebutuhan Telur</label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_telur" value="<?= $laporan->kebutuhan_telur; ?> kg" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kebutuhan Air mineral</label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_mineral" value="<?= $laporan->kebutuhan_mineral; ?> dus" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kebutuhan Minyak goreng</label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_minyak" value="<?= $laporan->kebutuhan_minyak; ?> liter" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kebutuhan Pengobatan</label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_pengobatan" value="<?= $laporan->kebutuhan_pengobatan; ?> buah" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-11 ml-2 mr-2">
                                        <div class="form-group">
                                            <label>Penyebab Banjir</label>
                                            <textarea class="form-control" rows="3" name="penyebab_banjir" readonly><?= htmlspecialchars($laporan->penyebab_banjir); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endsection('content'); ?>