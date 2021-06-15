<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Home</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/alertify.min.css">
        <script src="<?php echo base_url(); ?>/assets/js/jquery-3.6.0.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/alertify.min.js"></script>
    </head>

    <body>

        <div class="container">
            <?php
// Display Response
            if (session()->has('message')) {
                ?>
                <div class="alert <?php echo session()->getFlashdata('alert-class') ?>">
                    <?php echo session()->getFlashdata('message') ?>
                </div>
                <?php
            }
            ?>
            <?php echo $this->renderSection("list"); ?>
        