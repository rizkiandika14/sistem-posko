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

                            <h2 class="card-title" style=" font-size:25px;">Tambah Data Pelaporan Banjir</h2>
                            <div class="float-right">
                                <a class="float-right nav-link bg-info rounded" href="/pelaporan" role="button">
                                    <i class="fas fa-arrow-left"></i>
                                    Kembali
                                </a>
                            </div>

                        </div><br>
                        <small class="ml-3" style="color:red; font-size:20px;">*Jika data kosong, maka isikan dengan angka 0 (nol)!</small>
                        <!-- form start -->
                        <?php foreach ($laporans as $laporan) : ?>
                            <form action="/pelaporan/update/<?= $laporan['id_pelaporan']; ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Kabupaten</label>
                                        <select class="form-control" id="search-kabupaten" name="id_kabupaten" style="width: 100%;" required>
                                            <option value=""></option>
                                            <?php foreach ($kabupaten as $value) : ?>
                                                <option value="<?= $value['id']; ?>" <?= $laporan['id_kabupaten'] == $value['id'] ? 'selected' : ''; ?>><?= $value['nama_kabupaten']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kecamatan <code style="font-size: 12px;">*pilih kabupaten dahulu</code></label>
                                        <select class="form-control" id="search-kecamatan" name="id_kecamatan" style="width: 100%;" required>
                                            <option value=""></option>
                                            <?php foreach ($kecamatan as $value) : ?>
                                                <option value="<?= $value['id']; ?>" <?= $laporan['id_kecamatan'] == $value['id'] ? 'selected' : ''; ?>><?= $value['nama_kecamatan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Desa <code style="font-size: 12px;">*pilih kecamatan dahulu</code></label>
                                        <select class="form-control" id="search-desa" name="id_desa" style="width: 100%;" required>
                                            <option value=""></option>
                                            <?php foreach ($desa as $value) : ?>
                                                <option value="<?= $value['id']; ?>" <?= $laporan['id_desa'] == $value['id'] ? 'selected' : ''; ?>><?= $value['nama_desa']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <?php
                                        if (session()->getFlashdata('errjumlah_rumah')) {
                                            $isInvalidjumlah_rumah = 'is-invalid';
                                        } else {
                                            $isInvalidjumlah_rumah = '';
                                        }
                                        ?>
                                        <label for="jumlah_rumah">Jumlah Rumah terkena banjir <code style="font-size: 12px;">(Rumah)</code></label>
                                        <input type="number" class="form-control <?= $isInvalidjumlah_rumah ?>" id="jumlah_rumah" name="jumlah_rumah" value="<?= $laporan['jumlah_rumah']; ?>" min="0" required>
                                        <?php
                                        if (session()->getFlashdata('errjumlah_rumah')) {
                                            echo '<div id="validationServer03Feedback" class="invalid-feedback"> ' . session()->getFlashdata('errjumlah_rumah') . '</div>';
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <?php
                                        if (session()->getFlashdata('errjumlah_warga')) {
                                            $isInvalidjumlah_warga = 'is-invalid';
                                        } else {
                                            $isInvalidjumlah_warga = '';
                                        }
                                        ?>
                                        <label>Jumlah Warga <code style="font-size: 12px;">(Orang)</code></label>
                                        <input type="number" class="form-control <?= $isInvalidjumlah_warga ?>" name="jumlah_warga" value="<?= $laporan['jumlah_warga']; ?>" min="0" required>
                                        <?php
                                        if (session()->getFlashdata('errjumlah_warga')) {
                                            echo '<div id="validationServer03Feedback" class="invalid-feedback"> ' . session()->getFlashdata('errjumlah_warga') . '</div>';
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <?php
                                        if (session()->getFlashdata('errjumlah_meninggal')) {
                                            $isInvalidjumlah_meninggal = 'is-invalid';
                                        } else {
                                            $isInvalidjumlah_meninggal = '';
                                        }
                                        ?>
                                        <label>Jumlah Meninggal <code style="font-size: 12px;">(Orang)</code></label>
                                        <input type="number" class="form-control <?= $isInvalidjumlah_meninggal ?>" name="jumlah_meninggal" value="<?= $laporan['jumlah_meninggal']; ?>" min="0" required>
                                        <?php
                                        if (session()->getFlashdata('errjumlah_meninggal')) {
                                            echo '<div id="validationServer03Feedback" class="invalid-feedback"> ' . session()->getFlashdata('errjumlah_meninggal') . '</div>';
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Pengungsi <code style="font-size: 12px;">(Orang)</code></label>
                                        <input type="number" class="form-control" name="jumlah_pengungsi" value="<?= $laporan['jumlah_pengungsi']; ?>" min="0" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Kebutuhan Perahu <code style="font-size: 12px;">(Perahu)</code></label>
                                        <input type="number" class="form-control" name="kebutuhan_perahu" value="<?= $laporan['kebutuhan_perahu']; ?>" min="0" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Kebutuhan Tenda <code style="font-size: 12px;">(Buah)</code></label>
                                        <input type="number" class="form-control" name="kebutuhan_tenda" value="<?= $laporan['kebutuhan_tenda']; ?>" min="0" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Kebutuhan Beras <code style="font-size: 12px;">(Kg)</code></label>
                                        <input type="number" class="form-control" name="kebutuhan_beras" value="<?= $laporan['kebutuhan_beras']; ?>" min="0" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Kebutuhan Telur <code style="font-size: 12px;">(Kg)</code></label>
                                        <input type="number" class="form-control" name="kebutuhan_telur" value="<?= $laporan['kebutuhan_telur']; ?>" min="0" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Kebutuhan Air mineral <code style="font-size: 12px;">(Dus)</code></label>
                                        <input type="number" class="form-control" name="kebutuhan_mineral" value="<?= $laporan['kebutuhan_mineral']; ?>" min="0" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Kebutuhan Minyak goreng <code style="font-size: 12px;">(Liter)</code></label>
                                        <input type="number" class="form-control" name="kebutuhan_minyak" value="<?= $laporan['kebutuhan_minyak']; ?>" min="0" required>
                                    </div>
                                    <div class="form-group">
                                        <?php
                                        if (session()->getFlashdata('errkebutuhan_pengobatan')) {
                                            $isInvalidkebutuhan_pengobatan = 'is-invalid';
                                        } else {
                                            $isInvalidkebutuhan_pengobatan = '';
                                        }
                                        ?>
                                        <label>Kebutuhan Pengobatan <code style="font-size: 12px;">(buah)</code></label>
                                        <input type="number" class="form-control <?= $isInvalidkebutuhan_pengobatan ?>" name="kebutuhan_pengobatan" value="<?= $laporan['kebutuhan_pengobatan']; ?>" placeholder="0" min="0">
                                        <?php
                                        if (session()->getFlashdata('errkebutuhan_pengobatan')) {
                                            echo '<div id="validationServer03Feedback" class="invalid-feedback"> ' . session()->getFlashdata('errkebutuhan_pengobatan') . '</div>';
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Penyebab Banjir</label>
                                        <textarea class="form-control" rows="3" name="penyebab_banjir" required><?= $laporan['penyebab_banjir']; ?></textarea>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-pencil-alt"></i><b> Edit</b>
                                    </button>
                                </div>
                            </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection('content'); ?>