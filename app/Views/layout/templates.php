<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/plugins/fontawesome-free/css/all.min.css">

    <!-- daterange picker -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/plugins/dropzone/min/dropzone.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>//plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>//plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?= $this->include('layout/navbar'); ?>

        <?= $this->include('layout/sidebar'); ?>

        <?= $this->renderSection('content'); ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <!-- <div class="float-right d-none d-sm-inline">
                Anything you want
            </div> -->
            <!-- Default to the left -->
            <!-- <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved. -->
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/'); ?>/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/'); ?>/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="<?= base_url('assets/'); ?>/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="<?= base_url('assets/'); ?>/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url('assets/'); ?>/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="<?= base_url('assets/'); ?>/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="<?= base_url('assets/'); ?>/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url('assets/'); ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="<?= base_url('assets/'); ?>/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="<?= base_url('assets/'); ?>/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="<?= base_url('assets/'); ?>/plugins/dropzone/min/dropzone.min.js"></script>
    <!-- AdminLTE App -->


    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('assets/'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/'); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets/'); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/'); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets/'); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/'); ?>/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('assets/'); ?>/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('assets/'); ?>/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('assets/'); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets/'); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('assets/'); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <?= $this->renderSection('script'); ?>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/'); ?>/dist/js/adminlte.min.js"></script>
    <script>
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        $('#reservationdate2').datetimepicker({
            format: 'L'
        });
    </script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "footer": true,
                "buttons": [{
                        extend: 'copy',
                        footer: true
                    },
                    {
                        extend: 'csv',
                        footer: true
                    },
                    {
                        extend: 'excel',
                        footer: true
                    },
                    {
                        extend: 'pdf',
                        footer: true
                    },
                    {
                        extend: 'print',
                        footer: true
                    },
                    {
                        extend: 'colvis',
                        footer: true
                    }
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script>
        $('#search-kabupaten').select2({
            placeholder: '--- Cari Kabupaten ---',
            theme: 'bootstrap4',
        });
        $('#search-kecamatan').select2({
            placeholder: '--- Cari Kecamatan ---',
            theme: 'bootstrap4',
            ajax: {
                url: "<?= site_url('Pelaporan/ajaxSearchkabupaten'); ?>",
                dataType: 'json',
                delay: 250,
                data: function(data) {
                    return {
                        id_kabupaten: $('#search-kabupaten').val(),
                        searchTerm: data.term
                    };
                },
                processResults: function(data) {
                    return {

                        results: data.data,
                    };
                },
                cache: true
            }
        });
        $('#search-desa').select2({
            placeholder: '--- Cari Desa ---',
            theme: 'bootstrap4',
            ajax: {
                url: "<?= site_url('Pelaporan/ajaxSearchkecamatan'); ?>",
                dataType: 'json',
                delay: 250,
                data: function(data) {
                    return {
                        id_kecamatan: $('#search-kecamatan').val(),
                        searchTerm: data.term
                    };
                },
                processResults: function(data) {
                    return {

                        results: data.data,
                    };
                },
                cache: true
            }
        });
        $('#search-kecamatan1').select2({
            placeholder: '--- Cari Kecamatan ---',
            theme: 'bootstrap4',
        });
    </script>
    <script>
        $("#search-kecamatan").change(function() {
            $('#search-desa').val('').change();
        });
        $('#search-kabupaten').change(function() {
            $('#search-kecamatan').val('').change();
            $('#search-desa').val('').change();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#tabelData').DataTable({
                "order": [
                    [1, "desc"]
                ],
                "ordering": true
            });
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = $('.date_range_filter').val();
                    var max = $('.date_range_filter2').val();
                    var createdAt = data[1]; // -> rubah angka 4 sesuai posisi tanggal pada tabelmu, dimulai dari angka 0
                    if (
                        (min == "" || max == "") ||
                        (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
                    ) {
                        return true;
                    }
                    return false;
                }
            );
            $('.datetime-input').each(function() {
                $(this).datepicker({
                    format: 'yyyy-mm-dd'
                });
            });
            $('.datetime-input').change(function() {
                table.draw();
            });
        });
    </script>


</body>

</html>