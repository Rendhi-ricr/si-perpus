<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $this->renderSection('title') ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo (base_url()) ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?php echo (base_url()) ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?php echo (base_url()) ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?= $this->include('layouts/backend/includes/aside') ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?= $this->include('layouts/backend/includes/navbar') ?>
                <!-- Topbar -->

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?= $this->renderSection('content') ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?= $this->include('layouts/backend/includes/footer') ?>

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->

    <!-- Logout Modal-->


    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo (base_url()) ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo (base_url()) ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo (base_url()) ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo (base_url()) ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo (base_url()) ?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo (base_url()) ?>js/demo/chart-area-demo.js"></script>
    <script src="<?php echo (base_url()) ?>js/demo/chart-pie-demo.js"></script>
    <script src="<?php echo (base_url()) ?>js/demo/datatables-demo.js"></script>
    <script src="<?php echo (base_url()) ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo (base_url()) ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Cari...',
                allowClear: true
            });
        });
    </script>

</body>

</html>