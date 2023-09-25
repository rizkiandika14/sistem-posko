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
                                <a class="float-right nav-link bg-info rounded" href="/user" role="button">
                                    <i class="fas fa-arrow-left"></i>
                                    Kembali
                                </a>
                            </div>

                        </div><br>
                        <small class="ml-3" style="color:red; font-size:20px;">*Jika data kosong, maka isikan dengan angka 0 (nol)!</small>
                        <!-- form start -->

                        <form action="/pelaporan/save" method="post">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <?php
                                    if (session()->getFlashdata('errid_kabupaten')) {
                                        $isInvalidid_kabupaten = 'is-invalid';
                                    } else {
                                        $isInvalidid_kabupaten = '';
                                    }
                                    ?>
                                    <label>Kabupaten</label>
                                    <select class="form-control <?= $isInvalidid_kabupaten ?>" id="search-kabupaten" name="id_kabupaten" style="width: 100%;">
                                        <option value=""></option>
                                        <?php foreach ($kabupaten as $value) : ?>
                                            <option value="<?= $value['id']; ?>"><?= $value['nama_kabupaten']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php
                                    if (session()->getFlashdata('errid_kabupaten')) {
                                        echo '<div id="validationServer03Feedback" class="invalid-feedback"> ' . session()->getFlashdata('errid_kabupaten') . '</div>';
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                    if (session()->getFlashdata('errid_kecamatan')) {
                                        $isInvalidid_kecamatan = 'is-invalid';
                                    } else {
                                        $isInvalidid_kecamatan = '';
                                    }
                                    ?>
                                    <label>Kecamatan <code style="font-size: 12px;">*pilih Kabupaten dahulu</code></label>
                                    <select class="form-control <?= $isInvalidid_kecamatan ?>" id="search-kecamatan" name="id_kecamatan" style="width: 100%;">
                                        <option value=""></option>
                                    </select>
                                    <?php
                                    if (session()->getFlashdata('errid_kecamatan')) {
                                        echo '<div id="validationServer03Feedback" class="invalid-feedback"> ' . session()->getFlashdata('errid_kecamatan') . '</div>';
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                    if (session()->getFlashdata('errid_desa')) {
                                        $isInvalidid_desa = 'is-invalid';
                                    } else {
                                        $isInvalidid_desa = '';
                                    }
                                    ?>
                                    <label>Desa <code style="font-size: 12px;">*pilih kecamatan dahulu</code></label>
                                    <select class="form-control <?= $isInvalidid_desa ?>" id="search-desa" name="id_desa" style="width: 100%;">
                                        <option value=""></option>
                                    </select>
                                    <?php
                                    if (session()->getFlashdata('errid_desa')) {
                                        echo '<div id="validationServer03Feedback" class="invalid-feedback"> ' . session()->getFlashdata('errid_desa') . '</div>';
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                    if (session()->getFlashdata('errjumlah_rumah')) {
                                        $isInvalidjumlah_rumah = 'is-invalid';
                                    } else {
                                        $isInvalidjumlah_rumah = '';
                                    }
                                    ?>
                                    <label for="jumlah_rumah">Jumlah Rumah terkena banjir <code>(Rumah)</code></label>
                                    <input type="number" class="form-control <?= $isInvalidjumlah_rumah ?>" id="jumlah_rumah" name="jumlah_rumah" placeholder="0" min="0">
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
                                    <label>Jumlah Warga <code>(Orang)</code></label>
                                    <input type="number" class="form-control <?= $isInvalidjumlah_warga ?>" name="jumlah_warga" placeholder="0" min="0">
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
                                    <label>Jumlah Meninggal <code>(Orang)</code></label>
                                    <input type="number" class="form-control <?= $isInvalidjumlah_meninggal ?>" name="jumlah_meninggal" placeholder="0" min="0">
                                    <?php
                                    if (session()->getFlashdata('errjumlah_meninggal')) {
                                        echo '<div id="validationServer03Feedback" class="invalid-feedback"> ' . session()->getFlashdata('errjumlah_meninggal') . '</div>';
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                    if (session()->getFlashdata('errjumlah_pengungsi')) {
                                        $isInvalidjumlah_pengungsi = 'is-invalid';
                                    } else {
                                        $isInvalidjumlah_pengungsi = '';
                                    }
                                    ?>
                                    <label>Jumlah Pengungsi <code>(Orang)</code></label>
                                    <input type="number" class="form-control <?= $isInvalidjumlah_pengungsi ?>" name="jumlah_pengungsi" placeholder="0" min="0">
                                    <?php
                                    if (session()->getFlashdata('errjumlah_pengungsi')) {
                                        echo '<div id="validationServer03Feedback" class="invalid-feedback"> ' . session()->getFlashdata('errjumlah_pengungsi') . '</div>';
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                    if (session()->getFlashdata('errkebutuhan_perahu')) {
                                        $isInvalidkebutuhan_perahu = 'is-invalid';
                                    } else {
                                        $isInvalidkebutuhan_perahu = '';
                                    }
                                    ?>
                                    <label>Kebutuhan Perahu <code>(Perahu)</code></label>
                                    <input type="number" class="form-control <?= $isInvalidkebutuhan_perahu ?>" name="kebutuhan_perahu" placeholder="0" min="0">
                                    <?php
                                    if (session()->getFlashdata('errkebutuhan_perahu')) {
                                        echo '<div id="validationServer03Feedback" class="invalid-feedback"> ' . session()->getFlashdata('errkebutuhan_perahu') . '</div>';
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                    if (session()->getFlashdata('errkebutuhan_tenda')) {
                                        $isInvalidkebutuhan_tenda = 'is-invalid';
                                    } else {
                                        $isInvalidkebutuhan_tenda = '';
                                    }
                                    ?>
                                    <label>Kebutuhan Tenda <code>(Buah)</code></label>
                                    <input type="number" class="form-control <?= $isInvalidkebutuhan_tenda ?>" name="kebutuhan_tenda" placeholder="0" min="0">
                                    <?php
                                    if (session()->getFlashdata('errkebutuhan_tenda')) {
                                        echo '<div id="validationServer03Feedback" class="invalid-feedback"> ' . session()->getFlashdata('errkebutuhan_tenda') . '</div>';
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                    if (session()->getFlashdata('errkebutuhan_beras')) {
                                        $isInvalidkebutuhan_beras = 'is-invalid';
                                    } else {
                                        $isInvalidkebutuhan_beras = '';
                                    }
                                    ?>
                                    <label>Kebutuhan Beras <code>(Kg)</code></label>
                                    <input type="number" class="form-control <?= $isInvalidkebutuhan_beras ?>" name="kebutuhan_beras" placeholder="0" min="0">
                                    <?php
                                    if (session()->getFlashdata('errkebutuhan_beras')) {
                                        echo '<div id="validationServer03Feedback" class="invalid-feedback"> ' . session()->getFlashdata('errkebutuhan_beras') . '</div>';
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                    if (session()->getFlashdata('errkebutuhan_telur')) {
                                        $isInvalidkebutuhan_telur = 'is-invalid';
                                    } else {
                                        $isInvalidkebutuhan_telur = '';
                                    }
                                    ?>
                                    <label>Kebutuhan Telur <code>(Kg)</code></label>
                                    <input type="number" class="form-control <?= $isInvalidkebutuhan_telur ?>" name="kebutuhan_telur" placeholder="0" min="0">
                                    <?php
                                    if (session()->getFlashdata('errkebutuhan_telur')) {
                                        echo '<div id="validationServer03Feedback" class="invalid-feedback"> ' . session()->getFlashdata('errkebutuhan_telur') . '</div>';
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                    if (session()->getFlashdata('errkebutuhan_mineral')) {
                                        $isInvalidkebutuhan_mineral = 'is-invalid';
                                    } else {
                                        $isInvalidkebutuhan_mineral = '';
                                    }
                                    ?>
                                    <label>Kebutuhan Air mineral <code>(Dus)</code></label>
                                    <input type="number" class="form-control <?= $isInvalidkebutuhan_mineral ?>" name="kebutuhan_mineral" placeholder="0" min="0">
                                    <?php
                                    if (session()->getFlashdata('errkebutuhan_mineral')) {
                                        echo '<div id="validationServer03Feedback" class="invalid-feedback"> ' . session()->getFlashdata('errkebutuhan_mineral') . '</div>';
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                    if (session()->getFlashdata('errkebutuhan_minyak')) {
                                        $isInvalidkebutuhan_minyak = 'is-invalid';
                                    } else {
                                        $isInvalidkebutuhan_minyak = '';
                                    }
                                    ?>
                                    <label>Kebutuhan Minyak goreng <code>(Liter)</code></label>
                                    <input type="number" class="form-control <?= $isInvalidkebutuhan_minyak ?>" name="kebutuhan_minyak" placeholder="0" min="0">
                                    <?php
                                    if (session()->getFlashdata('errkebutuhan_minyak')) {
                                        echo '<div id="validationServer03Feedback" class="invalid-feedback"> ' . session()->getFlashdata('errkebutuhan_minyak') . '</div>';
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                    if (session()->getFlashdata('errkebutuhan_pengobatan')) {
                                        $isInvalidkebutuhan_pengobatan = 'is-invalid';
                                    } else {
                                        $isInvalidkebutuhan_pengobatan = '';
                                    }
                                    ?>
                                    <label>Kebutuhan Pengobatan <code>(buah)</code></label>
                                    <input type="number" class="form-control <?= $isInvalidkebutuhan_pengobatan ?>" name="kebutuhan_pengobatan" placeholder="0" min="0">
                                    <?php
                                    if (session()->getFlashdata('errkebutuhan_pengobatan')) {
                                        echo '<div id="validationServer03Feedback" class="invalid-feedback"> ' . session()->getFlashdata('errkebutuhan_pengobatan') . '</div>';
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                    if (session()->getFlashdata('errpenyebab_banjir')) {
                                        $isInvalidpenyebab_banjir = 'is-invalid';
                                    } else {
                                        $isInvalidpenyebab_banjir = '';
                                    }
                                    ?>
                                    <label>Penyebab Banjir</label>
                                    <textarea class="form-control <?= $isInvalidpenyebab_banjir ?>" rows="3" name="penyebab_banjir" placeholder="Ketik penyebab banjir disini ..."></textarea>
                                    <?php
                                    if (session()->getFlashdata('errpenyebab_banjir')) {
                                        echo '<div id="validationServer03Feedback" class="invalid-feedback"> ' . session()->getFlashdata('errpenyebab_banjir') . '</div>';
                                    }
                                    ?>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-plus"></i><b> Tambah</b>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection('content'); ?>