<?= $this->extend('layout/templates'); ?>


<?= $this->section('content'); ?>
<div class="content-wrapper" style="min-height: 2838.44px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header">
                <center><b>
                        <h1>SELAMAT DATANG DI SISTEM SAKOMSIBA</h1>
                        <h2>Satuan Komando Sigap Bencana</h2>
                    </b>
                </center>
            </div>

        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Dashboard</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-lightblue elevation-1"><i class="	fab fa-microsoft"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Kabupaten</span>
                                <span class="info-box-number">
                                    <?php foreach ($kabs as $laporan) : ?>
                                        <?= $laporan['total_kabupaten']; ?>
                                    <?php endforeach; ?>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-lightblue elevation-1"><i class="fas fa-map-pin"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Kecamatan</span>
                                <span class="info-box-number"> <?php foreach ($kabs as $laporan) : ?>
                                        <?= $laporan['total_kecamatan']; ?>
                                    <?php endforeach; ?></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-lightblue elevation-1"><i class="fas fa-map-marker-alt"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Desa</span>
                                <span class="info-box-number"> <?php foreach ($kabs as $laporan) : ?>
                                        <?= $laporan['total_desa']; ?>
                                    <?php endforeach; ?></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-lightblue elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Penguna</span>
                                <span class="info-box-number"> <?php foreach ($user as $laporan) : ?>
                                        <?= $laporan->total; ?>
                                    <?php endforeach; ?></span></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <?php if (session()->role == 'admin' || session()->role == 'superadmin') : ?>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-folder"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Pelaporan</span>
                                    <span class="info-box-number">
                                        <?php foreach ($pelaporan_total as $laporan) : ?>
                                            <?= $laporan->total_pelaporan; ?>
                                        <?php endforeach; ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="far fa-clock"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Pelaporan Proses</span>
                                    <span class="info-box-number"> <?php foreach ($pelaporan_proses as $laporan) : ?>
                                            <?= $laporan->total_pelaporan; ?>
                                        <?php endforeach; ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Pelaporan Dibatalkan</span>
                                    <span class="info-box-number"> <?php foreach ($pelaporan_batal as $laporan) : ?>
                                            <?= $laporan->total_pelaporan; ?>
                                        <?php endforeach; ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Pelaporan Selesai</span>
                                    <span class="info-box-number"> <?php foreach ($pelaporan_selesai as $laporan) : ?>
                                            <?= $laporan->total_pelaporan; ?>
                                        <?php endforeach; ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                <?php endif; ?>
                <?php if (session()->role == 'user') : ?>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-folder"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Pelaporan</span>
                                    <span class="info-box-number">
                                        <?php foreach ($pelaporan_totaluser as $laporan) : ?>
                                            <?= $laporan->total_pelaporan; ?>
                                        <?php endforeach; ?>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="far fa-clock"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Pelaporan Proses</span>
                                    <span class="info-box-number"> <?php foreach ($pelaporan_prosesuser as $laporan) : ?>
                                            <?= $laporan->total_pelaporan; ?>
                                        <?php endforeach; ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Pelaporan Dibatalkan</span>
                                    <span class="info-box-number"> <?php foreach ($pelaporan_bataluser as $laporan) : ?>
                                            <?= $laporan->total_pelaporan; ?>
                                        <?php endforeach; ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Pelaporan Selesai</span>
                                    <span class="info-box-number"> <?php foreach ($pelaporan_selesaiuser as $laporan) : ?>
                                            <?= $laporan->total_pelaporan; ?>
                                        <?php endforeach; ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                <?php endif; ?>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card-header">
                                <h3 class="card-title">Statistik Jumlah yang terkena banjir</h3>
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
                                <canvas id="jml" style="min-height: 400px; height: 400px; max-height: 500px; max-width: 100%; display: block; width: 568px;" width="568" height="250" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-header">
                                <h3 class="card-title">Statistik Kebutuhan</h3>
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
                                <canvas id="kebutuhan" style="min-height: 400px; height: 400px; max-height: 500px; max-width: 100%; display: block; width: 568px;" width="568" height="250" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!-- /.content -->
</div>
<?= $this->endsection('content'); ?>

<?= $this->section('script'); ?>
<!-- ChartJS -->
<script src="<?= base_url('assets/'); ?>/plugins/chart.js/Chart.min.js"></script>
<script>
    // STATISTIK KEBUTUHAN
    const kebutuhan = document.getElementById('kebutuhan');

    <?php foreach ($kabs as $value) : ?>
        $nama = ['<?= $value['nama_kabupaten']; ?>']

        var chart_rumah_kabupaten = new Chart(kebutuhan, {
            type: 'bar',
            data: {
                labels: ['Statistik Kebutuhan'],
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
    //STATISTIK JUMLAH
    const jml = document.getElementById('jml');

    <?php foreach ($kabs as $value) : ?>
        $nama = ['<?= $value['nama_kabupaten']; ?>']

        var chart_rumah_kabupaten = new Chart(jml, {
            type: 'bar',
            data: {
                labels: ['Statistik jumlah'],
                datasets: [{
                    label: 'Kabupaten',
                    data: [<?= $value['total_kabupaten']; ?>],
                    backgroundColor: ['#f56954'],
                    borderWidth: 1
                }, {
                    label: 'Kecamatan',
                    data: [<?= $value['total_kecamatan']; ?>],
                    backgroundColor: ['#00a65a', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                    borderWidth: 1
                }, {
                    label: 'Desa',
                    data: [<?= $value['total_desa']; ?>],
                    backgroundColor: ['#6610f2', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
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
<?= $this->endsection('script'); ?>