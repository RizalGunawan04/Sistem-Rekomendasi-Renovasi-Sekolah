<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistem Rekomendasi Renovasi Sekolah</title>
    <link href="<?= base_url('assets/sb-admin2/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/sb-admin2/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('logo.png') ?>" rel="icon">
</head>

<body style="background-image:url('<?=base_url('bg.jpg')?>');background-size: cover;background-repeat: no-repeat;">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-md-4 mx-auto">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="text-center pb-2">
                            <img src="<?= base_url('logo.png') ?>" height="86"/>
                            <h6><font color="black">DINAS PENDIDIKAN DAN KEBUDAYAAN DAERAH KOTA TOMOHON</font></h6>
                        </div>
                        <?= print_error() ?>
                        <form method="post" action="<?= site_url('user/login_action') ?>">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" name="user" autofocus />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="pass" />
                            </div>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/sb-admin2/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/sb-admin2/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/sb-admin2/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/sb-admin2/js/sb-admin-2.min.js') ?>"></script>
</body>

</html>