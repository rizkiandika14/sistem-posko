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
                            <h3>Data Pelaporan Banjir</h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active">
                                    <form action="/statistik/filter_kabupaten" method="POST">
                                        <span class="badge badge-info text-bold" style="font-size: 15px;">Filter data</span><br>
                                        <!-- Date range -->
                                        <div class="form-group">
                                            <label>Nama Kabupaten</label>
                                            <select class="form-control" id="search-kabupaten" name="id_kabupaten" style="width: 100%;" required>
                                                <option value=""></option>
                                                <?php foreach ($kabupatens as $value) : ?>
                                                    <option value="<?= $value['id']; ?>" <?= $id_kab == $value['id'] ? 'selected' : ''; ?>><?= $value['nama_kabupaten']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Kecamatan</label>
                                            <select class="form-control" id="search-kecamatan" name="id_kecamatan" style="width: 100%;">
                                                <option value=""></option>
                                                <?php foreach ($kecamatans as $value) : ?>
                                                    <option value="<?= $value['id']; ?>"><?= $value['nama_kecamatan']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Desa</label>
                                            <select class="form-control" id="search-desa" name="id_desa" style="width: 100%;">
                                                <option value=""></option>
                                                <?php foreach ($desa as $value) : ?>
                                                    <option value="<?= $value['id']; ?>"><?= $value['nama_desa']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn bg-gradient-primary"> <i class="fas fa-search">
                                                Cari</i></button>
                                        <a href="/statistik" class="btn bg-gradient-primary ml-3"> <i class="fas ">
                                                Semua Data</i></a>
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
                            <div class="row">
                                <div class="col-md-5 mr-2">
                                    <div class="card-header">
                                        <h3 class="card-title">Statistik Total yang terkena banjir Di Kabupaten</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class=""></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class=""></div>
                                            </div>
                                        </div>
                                        <canvas id="jml" style="min-height: 250px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 568px;" width="568" height="250" class="chartjs-render-monitor"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="card-header">
                                        <h3 class="card-title">Statistik Total Kebutuhan Di Kabupaten</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class=""></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class=""></div>
                                            </div>
                                        </div>
                                        <canvas id="kebutuhan" style="min-height: 250px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 568px;" width="568" height="250" class="chartjs-render-monitor"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Total Data</h3>
                        </div>
                        <?php foreach ($laporans as $laporan) : ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5 ml-2 mr-2">
                                        <div class="form-group">
                                            <label>Kabupaten</label>
                                            <input type="text" class="form-control form-control-border border-width-2" id="kabupaten" name="kabupaten" value="<?= $laporan['nama_kabupaten']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Kecamatan terkena banjir <badge type="button" style="color: blue;" class="badge" data-toggle="modal" data-target="#modal-kecamatan">lihat</badge></label>
                                            <input type="text" class="form-control form-control-border border-width-2" id="kecamatan" name="kecamatan" value="<?= $laporan['total_kecamatan']; ?> kecamatan" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Desa terkena banjir <badge type="button" style="color: blue;" class="badge" data-toggle="modal" data-target="#modal-desa">lihat</badge></label>
                                            <input type="text" class="form-control form-control-border border-width-2" id="desa" name="desa" value="<?= $laporan['total_desa']; ?> desa" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah_rumah">Jumlah Rumah terkena banjir <badge type="button" style="color: blue;" class="badge" data-toggle="modal" data-target="#modal-default">lihat</badge></label>
                                            <input type="text" class="form-control form-control-border border-width-2" id="jumlah_rumah" name="jumlah_rumah" value="<?= $laporan['total_rumah']; ?> rumah" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Warga <badge type="button" style="color: blue;" class="badge" data-toggle="modal" data-target="#modal-warga">lihat</badge></label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="jumlah_warga" value="<?= $laporan['total_warga']; ?> orang" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Meninggal <badge type="button" style="color: blue;" class="badge" data-toggle="modal" data-target="#modal-meninggal">lihat</badge></label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="jumlah_meninggal" value="<?= $laporan['total_meninggal']; ?> orang" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Pengungsi <badge type="button" style="color: blue;" class="badge" data-toggle="modal" data-target="#modal-pengungsi">lihat</badge></label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="jumlah_pengungsi" value="<?= $laporan['total_pengungsi']; ?> orang" readonly>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="col-md-6 ml-2 mr-2">
                                        <div class="form-group">
                                            <label>Kebutuhan Perahu <badge type="button" style="color: blue;" class="badge" data-toggle="modal" data-target="#modal-perahu">lihat</badge></label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_perahu" value="<?= $laporan['total_perahu']; ?> perahu" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kebutuhan Tenda <badge type="button" style="color: blue;" class="badge" data-toggle="modal" data-target="#modal-tenda">lihat</badge></label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_tenda" value="<?= $laporan['total_tenda']; ?> buah" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kebutuhan Beras <badge type="button" style="color: blue;" class="badge" data-toggle="modal" data-target="#modal-beras">lihat</badge></label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_beras" value="<?= $laporan['total_beras']; ?> kg" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kebutuhan Telur <badge type="button" style="color: blue;" class="badge" data-toggle="modal" data-target="#modal-telur">lihat</badge></label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_telur" value="<?= $laporan['total_telur']; ?> kg" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kebutuhan Air mineral <badge type="button" style="color: blue;" class="badge" data-toggle="modal" data-target="#modal-mineral">lihat</badge></label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_mineral" value="<?= $laporan['total_mineral']; ?> dus" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kebutuhan Minyak goreng <badge type="button" style="color: blue;" class="badge" data-toggle="modal" data-target="#modal-minyak">lihat</badge></label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_minyak" value="<?= $laporan['total_minyak']; ?> liter" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kebutuhan Pengobatan <badge type="button" style="color: blue;" class="badge" data-toggle="modal" data-target="#modal-pengobatan">lihat</badge></label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_pengobatan" value="<?= $laporan['total_pengobatan']; ?> buah" readonly>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Rincian Data</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kecamatan</th>
                                        <th>Jumlah Desa</th>
                                        <th>Jumlah Rumah</th>
                                        <th>Jumlah Warga</th>
                                        <th>Jumlah Meninggal</th>
                                        <th>Jumlah Pengungsi</th>
                                        <th>Kebutuhan Perahu</th>
                                        <th>Kebutuhan Tenda</th>
                                        <th>Kebutuhan Beras</th>
                                        <th>Kebutuhan Telur</th>
                                        <th>Kebutuhan Air Mineral</th>
                                        <th>Kebutuhan Minyak Goreng</th>
                                        <th>Kebutuhan Pengobatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($stats as $laporan) : ?>
                                        <tr>
                                            <th><?= $no++; ?></th>
                                            <th><?= $laporan->nama_kecamatan; ?></th>
                                            <th><?= $laporan->total_desa; ?></th>
                                            <th><?= $laporan->total_rumah; ?></th>
                                            <th><?= $laporan->total_warga; ?></th>
                                            <th><?= $laporan->total_meninggal; ?></th>
                                            <th><?= $laporan->total_pengungsi; ?></th>
                                            <th><?= $laporan->total_perahu; ?></th>
                                            <th><?= $laporan->total_tenda; ?></th>
                                            <th><?= $laporan->total_beras; ?></th>
                                            <th><?= $laporan->total_telur; ?></th>
                                            <th><?= $laporan->total_mineral; ?></th>
                                            <th><?= $laporan->total_minyak; ?></th>
                                            <th><?= $laporan->total_pengobatan; ?></th>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <?php foreach ($laporans as $laporan) : ?>
                                        <tr>
                                            <th>TOTAL</th>
                                            <th><?= $laporan['total_kecamatan']; ?></th>
                                            <th><?= $laporan['total_desa']; ?></th>
                                            <th><?= $laporan['total_rumah']; ?></th>
                                            <th><?= $laporan['total_warga']; ?></th>
                                            <th><?= $laporan['total_meninggal']; ?></th>
                                            <th><?= $laporan['total_pengungsi']; ?></th>
                                            <th><?= $laporan['total_perahu']; ?></th>
                                            <th><?= $laporan['total_tenda']; ?></th>
                                            <th><?= $laporan['total_beras']; ?></th>
                                            <th><?= $laporan['total_telur']; ?></th>
                                            <th><?= $laporan['total_mineral']; ?></th>
                                            <th><?= $laporan['total_minyak']; ?></th>
                                            <th><?= $laporan['total_pengobatan']; ?></th>
                                        </tr>
                                    <?php endforeach; ?>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JUMLAH KECAMATAN  -->
<div class="modal fade" id="modal-kecamatan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Jumlah Kecamatan terkena banjir per Kabupaten</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <?php foreach ($laporans as $laporan) : ?>
                        <div class="card-header">
                            <h3 class="card-title">Jumlah Kecamatan : <?= $laporan['total_kecamatan']; ?> kecamatan</h3>
                        </div>
                    <?php endforeach; ?>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="total_kec" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 568px;" width="568" height="250" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- JUMLAH DESA  -->
<div class="modal fade" id="modal-desa">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Jumlah Desa terkena banjir per Kabupaten</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <?php foreach ($laporans as $laporan) : ?>
                        <div class="card-header">
                            <h3 class="card-title">Jumlah Desa : <?= $laporan['total_desa']; ?> desa</h3>
                        </div>
                    <?php endforeach; ?>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="total_des" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 568px;" width="568" height="250" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- JUMLAH RUMAH -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Jumlah Rumah terkena banjir per Kabupaten</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <?php foreach ($laporans as $laporan) : ?>
                        <div class="card-header">
                            <h3 class="card-title">Jumlah Rumah : <?= $laporan['total_rumah']; ?> rumah</h3>
                        </div>
                    <?php endforeach; ?>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="jml_kabupaten" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 568px;" width="568" height="250" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- JUMLAH WARGA -->
<div class="modal fade" id="modal-warga">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Jumlah Warga terkena banjir per Kabupaten</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <?php foreach ($laporans as $laporan) : ?>
                        <div class="card-header">
                            <h3 class="card-title">Jumlah Warga : <?= $laporan['total_warga']; ?> orang</h3>
                        </div>
                    <?php endforeach; ?>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="stat_warga" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 568px;" width="568" height="250" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- JUMLAH MENINGGAL  -->
<div class="modal fade" id="modal-meninggal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Jumlah Meninggal terkena banjir per Kabupaten</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <?php foreach ($laporans as $laporan) : ?>
                        <div class="card-header">
                            <h3 class="card-title">Jumlah Meninggal : <?= $laporan['total_meninggal']; ?> orang</h3>
                        </div>
                    <?php endforeach; ?>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="stat_meninggal" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 568px;" width="568" height="250" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- JUMLAH PENGUNGSI  -->
<div class="modal fade" id="modal-pengungsi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Jumlah Pengungsi terkena banjir per Kabupaten</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <?php foreach ($laporans as $laporan) : ?>
                        <div class="card-header">
                            <h3 class="card-title">Jumlah Pengungsi : <?= $laporan['total_pengungsi']; ?> orang</h3>
                        </div>
                    <?php endforeach; ?>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="stat_pengungsi" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 568px;" width="568" height="250" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- JUMLAH PERAHU  -->
<div class="modal fade" id="modal-perahu">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kebutuhan Perahu per Kabupaten</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <?php foreach ($laporans as $laporan) : ?>
                        <div class="card-header">
                            <h3 class="card-title">Kebutuhan Perahu : <?= $laporan['total_perahu']; ?> perahu</h3>
                        </div>
                    <?php endforeach; ?>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="stat_perahu" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 568px;" width="568" height="250" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- JUMLAH TENDA  -->
<div class="modal fade" id="modal-tenda">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kebutuhan Tenda per Kabupaten</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <?php foreach ($laporans as $laporan) : ?>
                        <div class="card-header">
                            <h3 class="card-title">Kebutuhan Tenda : <?= $laporan['total_tenda']; ?> buah</h3>
                        </div>
                    <?php endforeach; ?>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="stat_tenda" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 568px;" width="568" height="250" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- JUMLAH BERAS  -->
<div class="modal fade" id="modal-beras">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kebutuhan Beras per Kabupaten</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <?php foreach ($laporans as $laporan) : ?>
                        <div class="card-header">
                            <h3 class="card-title">Kebutuhan Beras : <?= $laporan['total_beras']; ?> kg</h3>
                        </div>
                    <?php endforeach; ?>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="stat_beras" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 568px;" width="568" height="250" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- JUMLAH TELUR  -->
<div class="modal fade" id="modal-telur">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kebutuhan Telur per Kabupaten</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <?php foreach ($laporans as $laporan) : ?>
                        <div class="card-header">
                            <h3 class="card-title">Kebutuhan Telur : <?= $laporan['total_telur']; ?> kg</h3>
                        </div>
                    <?php endforeach; ?>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="stat_telur" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 568px;" width="568" height="250" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- JUMLAH MINERAL  -->
<div class="modal fade" id="modal-mineral">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kebutuhan Air Mineral per Kabupaten</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <?php foreach ($laporans as $laporan) : ?>
                        <div class="card-header">
                            <h3 class="card-title">Kebutuhan Air Mineral : <?= $laporan['total_mineral']; ?> dus</h3>
                        </div>
                    <?php endforeach; ?>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="stat_mineral" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 568px;" width="568" height="250" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- JUMLAH MINYAK  -->
<div class="modal fade" id="modal-minyak">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kebutuhan Minyak Goreng per Kabupaten</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <?php foreach ($laporans as $laporan) : ?>
                        <div class="card-header">
                            <h3 class="card-title">Kebutuhan Minyak Goreng : <?= $laporan['total_minyak']; ?> liter</h3>
                        </div>
                    <?php endforeach; ?>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="stat_minyak" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 568px;" width="568" height="250" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- JUMLAH PENGOBATAN  -->
<div class="modal fade" id="modal-pengobatan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kebutuhan Pengobatan per Kabupaten</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <?php foreach ($laporans as $laporan) : ?>
                        <div class="card-header">
                            <h3 class="card-title">Kebutuhan Pengobatan : <?= $laporan['total_pengobatan']; ?> buah</h3>
                        </div>
                    <?php endforeach; ?>
                    <div class="card-body">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="stat_pengobatan" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 568px;" width="568" height="250" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection('content'); ?>
<?= $this->section('script'); ?>
<script src="<?= base_url('assets/'); ?>/plugins/chart.js/Chart.min.js"></script>
<script>
    // JUMLAH 
    const jml = document.getElementById('jml');

    <?php foreach ($laporans as $value) : ?>
        $nama = ['<?= $value['nama_kabupaten']; ?>']

        var chart_rumah_kabupaten = new Chart(jml, {
            type: 'bar',
            data: {
                labels: $nama,
                datasets: [{
                    label: 'Kecamatan',
                    data: [<?= $value['total_kecamatan']; ?>],
                    backgroundColor: ['#f56954'],
                    borderWidth: 1
                }, {
                    label: 'Desa',
                    data: [<?= $value['total_desa']; ?>],
                    backgroundColor: ['#00a65a', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                    borderWidth: 1
                }, {
                    label: 'Jumlah Rumah',
                    data: [<?= $value['total_rumah']; ?>],
                    backgroundColor: ['#f39c12', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                    borderWidth: 1
                }, {
                    label: 'Jumlah Warga',
                    data: [<?= $value['total_warga']; ?>],
                    backgroundColor: ['#00c0ef', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                    borderWidth: 1
                }, {
                    label: 'Jumlah Meninggal',
                    data: [<?= $value['total_meninggal']; ?>],
                    backgroundColor: ['#3c8dbc', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                    borderWidth: 1
                }, {
                    label: 'Jumlah Pengungsi',
                    data: [<?= $value['total_pengungsi']; ?>],
                    backgroundColor: ['#20c997', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                    borderWidth: 1
                }],
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    <?php endforeach; ?>
</script>
<script>
    //    KEBUTUHAN 
    const kebutuhan = document.getElementById('kebutuhan');

    <?php foreach ($laporans as $value) : ?>
        $nama = ['<?= $value['nama_kabupaten']; ?>']

        var chart_rumah_kabupaten = new Chart(kebutuhan, {
            type: 'bar',
            data: {
                labels: $nama,
                datasets: [{
                    label: 'Kebutuhan Perahu',
                    data: [<?= $value['total_perahu']; ?>],
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                    borderWidth: 1
                }, {
                    label: 'Kebutuhan Tenda',
                    data: [<?= $value['total_tenda']; ?>],
                    backgroundColor: ['#00a65a', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                    borderWidth: 1
                }, {
                    label: 'Kebutuhan Beras',
                    data: [<?= $value['total_beras']; ?>],
                    backgroundColor: ['#f39c12', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                    borderWidth: 1
                }, {
                    label: 'Kebutuhan Telur',
                    data: [<?= $value['total_telur']; ?>],
                    backgroundColor: ['#00c0ef', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                    borderWidth: 1
                }, {
                    label: 'Kebutuhan Air Mineral',
                    data: [<?= $value['total_mineral']; ?>],
                    backgroundColor: ['#3c8dbc', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                    borderWidth: 1
                }, {
                    label: 'Kebutuhan Minyak Goreng',
                    data: [<?= $value['total_minyak']; ?>],
                    backgroundColor: ['#20c997', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                    borderWidth: 1
                }, {
                    label: 'Kebutuhan Pengobatan',
                    data: [<?= $value['total_pengobatan']; ?>],
                    backgroundColor: ['#6610f2', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                    borderWidth: 1
                }],
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    <?php endforeach; ?>
</script>



<script>
    // JUMLAH Kecamatan
    var jml_kabupaten = $('#total_kec').get(0).getContext('2d');
    var data_jml_kabupaten = [];
    var label_jml_kabupaten = [];

    <?php foreach ($stats as $key => $value) : ?>
        data_jml_kabupaten.push(<?= $value->total_kecamatan; ?>);
        label_jml_kabupaten.push('<?= $value->nama_kecamatan; ?>');
    <?php endforeach; ?>

    var data_rumah_kabupaten = {
        datasets: [{
            data: data_jml_kabupaten,
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }],
        labels: label_jml_kabupaten,
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    var chart_rumah_kabupaten = new Chart(jml_kabupaten, {
        type: 'doughnut',
        data: data_rumah_kabupaten,
        options: donutOptions
    });
</script>
<script>
    // JUMLAH DESA
    var jml_kabupaten = $('#total_des').get(0).getContext('2d');
    var data_jml_kabupaten = [];
    var label_jml_kabupaten = [];

    <?php foreach ($stats as $key => $value) : ?>
        data_jml_kabupaten.push(<?= $value->total_desa; ?>);
        label_jml_kabupaten.push('<?= $value->nama_kecamatan; ?>');
    <?php endforeach; ?>

    var data_rumah_kabupaten = {
        datasets: [{
            data: data_jml_kabupaten,
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }],
        labels: label_jml_kabupaten,
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    var chart_rumah_kabupaten = new Chart(jml_kabupaten, {
        type: 'doughnut',
        data: data_rumah_kabupaten,
        options: donutOptions
    });
</script>
<script>
    // JUMLAH RUMAH PER KABUPATEN
    var jml_kabupaten = $('#jml_kabupaten').get(0).getContext('2d');
    var data_jml_kabupaten = [];
    var label_jml_kabupaten = [];

    <?php foreach ($stats as $key => $value) : ?>
        data_jml_kabupaten.push(<?= $value->total_rumah; ?>);
        label_jml_kabupaten.push('<?= $value->nama_kecamatan; ?>');
    <?php endforeach; ?>

    var data_rumah_kabupaten = {
        datasets: [{
            data: data_jml_kabupaten,
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }],
        labels: label_jml_kabupaten,
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    var chart_rumah_kabupaten = new Chart(jml_kabupaten, {
        type: 'doughnut',
        data: data_rumah_kabupaten,
        options: donutOptions
    });
</script>
<script>
    // STATISTIK WARGA
    var jml_kabupaten = $('#stat_warga').get(0).getContext('2d');
    var data_jml_kabupaten = [];
    var label_jml_kabupaten = [];

    <?php foreach ($stats as $key => $value) : ?>
        data_jml_kabupaten.push(<?= $value->total_warga; ?>);
        label_jml_kabupaten.push('<?= $value->nama_kecamatan; ?>');
    <?php endforeach; ?>

    var data_rumah_kabupaten = {
        datasets: [{
            data: data_jml_kabupaten,
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }],
        labels: label_jml_kabupaten,
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    var chart_rumah_kabupaten = new Chart(jml_kabupaten, {
        type: 'doughnut',
        data: data_rumah_kabupaten,
        options: donutOptions
    });
</script>

<!-- // STATISTIK MENINGGAL -->
<script>
    var jml_kabupaten = $('#stat_meninggal').get(0).getContext('2d');
    var data_jml_kabupaten = [];
    var label_jml_kabupaten = [];

    <?php foreach ($stats as $key => $value) : ?>
        data_jml_kabupaten.push(<?= $value->total_meninggal; ?>);
        label_jml_kabupaten.push('<?= $value->nama_kecamatan; ?>');
    <?php endforeach; ?>

    var data_rumah_kabupaten = {
        datasets: [{
            data: data_jml_kabupaten,
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }],
        labels: label_jml_kabupaten,
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    var chart_rumah_kabupaten = new Chart(jml_kabupaten, {
        type: 'doughnut',
        data: data_rumah_kabupaten,
        options: donutOptions
    });
</script>

<!-- STATISTIK PENGUNGSI -->
<script>
    var jml_kabupaten = $('#stat_pengungsi').get(0).getContext('2d');
    var data_jml_kabupaten = [];
    var label_jml_kabupaten = [];

    <?php foreach ($stats as $key => $value) : ?>
        data_jml_kabupaten.push(<?= $value->total_pengungsi; ?>);
        label_jml_kabupaten.push('<?= $value->nama_kecamatan; ?>');
    <?php endforeach; ?>

    var data_rumah_kabupaten = {
        datasets: [{
            data: data_jml_kabupaten,
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }],
        labels: label_jml_kabupaten,
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    var chart_rumah_kabupaten = new Chart(jml_kabupaten, {
        type: 'doughnut',
        data: data_rumah_kabupaten,
        options: donutOptions
    });
</script>

<!-- STATISTIK PERAHU -->
<script>
    var jml_kabupaten = $('#stat_perahu').get(0).getContext('2d');
    var data_jml_kabupaten = [];
    var label_jml_kabupaten = [];

    <?php foreach ($stats as $key => $value) : ?>
        data_jml_kabupaten.push(<?= $value->total_perahu; ?>);
        label_jml_kabupaten.push('<?= $value->nama_kecamatan; ?>');
    <?php endforeach; ?>

    var data_rumah_kabupaten = {
        datasets: [{
            data: data_jml_kabupaten,
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }],
        labels: label_jml_kabupaten,
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    var chart_rumah_kabupaten = new Chart(jml_kabupaten, {
        type: 'doughnut',
        data: data_rumah_kabupaten,
        options: donutOptions
    });
</script>

<!-- STATISTIK TENDA -->
<script>
    var jml_kabupaten = $('#stat_tenda').get(0).getContext('2d');
    var data_jml_kabupaten = [];
    var label_jml_kabupaten = [];

    <?php foreach ($stats as $key => $value) : ?>
        data_jml_kabupaten.push(<?= $value->total_tenda; ?>);
        label_jml_kabupaten.push('<?= $value->nama_kecamatan; ?>');
    <?php endforeach; ?>

    var data_rumah_kabupaten = {
        datasets: [{
            data: data_jml_kabupaten,
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }],
        labels: label_jml_kabupaten,
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    var chart_rumah_kabupaten = new Chart(jml_kabupaten, {
        type: 'doughnut',
        data: data_rumah_kabupaten,
        options: donutOptions
    });
</script>

<!-- STATISTIK BERAS -->
<script>
    var jml_kabupaten = $('#stat_beras').get(0).getContext('2d');
    var data_jml_kabupaten = [];
    var label_jml_kabupaten = [];

    <?php foreach ($stats as $key => $value) : ?>
        data_jml_kabupaten.push(<?= $value->total_beras; ?>);
        label_jml_kabupaten.push('<?= $value->nama_kecamatan; ?>');
    <?php endforeach; ?>

    var data_rumah_kabupaten = {
        datasets: [{
            data: data_jml_kabupaten,
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }],
        labels: label_jml_kabupaten,
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    var chart_rumah_kabupaten = new Chart(jml_kabupaten, {
        type: 'doughnut',
        data: data_rumah_kabupaten,
        options: donutOptions
    });
</script>

<!-- STATISTIK TELUR -->
<script>
    var jml_kabupaten = $('#stat_telur').get(0).getContext('2d');
    var data_jml_kabupaten = [];
    var label_jml_kabupaten = [];

    <?php foreach ($stats as $key => $value) : ?>
        data_jml_kabupaten.push(<?= $value->total_telur; ?>);
        label_jml_kabupaten.push('<?= $value->nama_kecamatan; ?>');
    <?php endforeach; ?>

    var data_rumah_kabupaten = {
        datasets: [{
            data: data_jml_kabupaten,
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }],
        labels: label_jml_kabupaten,
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    var chart_rumah_kabupaten = new Chart(jml_kabupaten, {
        type: 'doughnut',
        data: data_rumah_kabupaten,
        options: donutOptions
    });
</script>

<!-- STATISTIK MINERAL -->
<script>
    var jml_kabupaten = $('#stat_mineral').get(0).getContext('2d');
    var data_jml_kabupaten = [];
    var label_jml_kabupaten = [];

    <?php foreach ($stats as $key => $value) : ?>
        data_jml_kabupaten.push(<?= $value->total_mineral; ?>);
        label_jml_kabupaten.push('<?= $value->nama_kecamatan; ?>');
    <?php endforeach; ?>

    var data_rumah_kabupaten = {
        datasets: [{
            data: data_jml_kabupaten,
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }],
        labels: label_jml_kabupaten,
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    var chart_rumah_kabupaten = new Chart(jml_kabupaten, {
        type: 'doughnut',
        data: data_rumah_kabupaten,
        options: donutOptions
    });
</script>

<!-- STATISTIK MINYAK -->
<script>
    var jml_kabupaten = $('#stat_minyak').get(0).getContext('2d');
    var data_jml_kabupaten = [];
    var label_jml_kabupaten = [];

    <?php foreach ($stats as $key => $value) : ?>
        data_jml_kabupaten.push(<?= $value->total_minyak; ?>);
        label_jml_kabupaten.push('<?= $value->nama_kecamatan; ?>');
    <?php endforeach; ?>

    var data_rumah_kabupaten = {
        datasets: [{
            data: data_jml_kabupaten,
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }],
        labels: label_jml_kabupaten,
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    var chart_rumah_kabupaten = new Chart(jml_kabupaten, {
        type: 'doughnut',
        data: data_rumah_kabupaten,
        options: donutOptions
    });
</script>

<!-- STATISTIK PENGOBATAN  -->
<script>
    var jml_kabupaten = $('#stat_pengobatan').get(0).getContext('2d');
    var data_jml_kabupaten = [];
    var label_jml_kabupaten = [];

    <?php foreach ($stats as $key => $value) : ?>
        data_jml_kabupaten.push(<?= $value->total_pengobatan; ?>);
        label_jml_kabupaten.push('<?= $value->nama_kecamatan; ?>');
    <?php endforeach; ?>

    var data_rumah_kabupaten = {
        datasets: [{
            data: data_jml_kabupaten,
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }],
        labels: label_jml_kabupaten,
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    var chart_rumah_kabupaten = new Chart(jml_kabupaten, {
        type: 'doughnut',
        data: data_rumah_kabupaten,
        options: donutOptions
    });
</script>

<?= $this->endsection('script'); ?>