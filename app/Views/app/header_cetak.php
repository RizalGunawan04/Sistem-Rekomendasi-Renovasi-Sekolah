<?php
if (!session()->get('logged_in')) {
    header('location:' . site_url('user/login'));
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Rekomendasi Renovasi Sekolah</title>
    <link href="<?= base_url('logo.png') ?>" rel="icon">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/sb-admin2/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/sb-admin2/css/sb-admin-2.min.css') ?>" rel="stylesheet">

</head>

<body onload="window.print()">
    <div class="container">
        <h1><?= $title ?></h1>