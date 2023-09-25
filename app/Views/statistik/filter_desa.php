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
                                            <select class="form-control" id="search-kecamatan" name="id_kecamatan" style="width: 100%;" required>
                                                <option value=""></option>

                                                <?php foreach ($kecamatans as $value) : ?>
                                                    <option value="<?= $value['id']; ?>" <?= $id_kec == $value['id'] ? 'selected' : ''; ?>><?= $value['nama_kecamatan']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Desa</label>
                                            <select class="form-control" id="search-desa" name="id_desa" style="width: 100%;">
                                                <option value=""></option>
                                                <?php foreach ($desa as $value) : ?>
                                                    <option value="<?= $value['id']; ?>" <?= $id_desa == $value['id'] ? 'selected' : ''; ?>><?= $value['nama_desa']; ?></option>
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
                                        <h3 class="card-title">Statistik Total yang terkena banjir Di desa Per kecamatan</h3>
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
                                        <h3 class="card-title">Statistik Total Kebutuhan Di desa Per kecamatan</h3>
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
                                            <label>Kecamatan</label>
                                            <input type="text" class="form-control form-control-border border-width-2" id="kecamatan" name="kecamatan" value="<?= $laporan['nama_kecamatan']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Desa</label>
                                            <input type="text" class="form-control form-control-border border-width-2" id="desa" name="desa" value="<?= $laporan['nama_desa']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah_rumah">Jumlah Rumah terkena banjir</label>
                                            <input type="text" class="form-control form-control-border border-width-2" id="jumlah_rumah" name="jumlah_rumah" value="<?= $laporan['total_rumah']; ?> rumah" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Warga</label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="jumlah_warga" value="<?= $laporan['total_warga']; ?> orang" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Meninggal</label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="jumlah_meninggal" value="<?= $laporan['total_meninggal']; ?> orang" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Pengungsi</label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="jumlah_pengungsi" value="<?= $laporan['total_pengungsi']; ?> orang" readonly>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="col-md-6 ml-2 mr-2">
                                        <div class="form-group">
                                            <label>Kebutuhan Perahu</label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_perahu" value="<?= $laporan['total_perahu']; ?> perahu" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kebutuhan Tenda</label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_tenda" value="<?= $laporan['total_tenda']; ?> buah" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kebutuhan Beras</label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_beras" value="<?= $laporan['total_beras']; ?> kg" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kebutuhan Telur</label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_telur" value="<?= $laporan['total_telur']; ?> kg" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kebutuhan Air mineral</label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_mineral" value="<?= $laporan['total_mineral']; ?> dus" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kebutuhan Minyak goreng</label>
                                            <input type="text" class="form-control form-control-border border-width-2" name="kebutuhan_minyak" value="<?= $laporan['total_minyak']; ?> liter" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kebutuhan Pengobatan</label>
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

<?= $this->endsection('content'); ?>
<?= $this->section('script'); ?>
<script src="<?= base_url('assets/'); ?>/plugins/chart.js/Chart.min.js"></script>
<script>
    // JUMLAH 
    const jml = document.getElementById('jml');

    <?php foreach ($laporans as $value) : ?>
        $nama = ['<?= $value['nama_desa']; ?>']

        var chart_rumah_kabupaten = new Chart(jml, {
            type: 'bar',
            data: {
                labels: $nama,
                datasets: [{
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
        $nama = ['<?= $value['nama_desa']; ?>']

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


<?= $this->endsection('script'); ?>