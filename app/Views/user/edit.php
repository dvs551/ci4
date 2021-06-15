<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Home</title>
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/select2.min.css">
        <script src="<?php echo base_url() ?>/assets/js/jquery-3.6.0.min.js"></script>
        <script src="<?php echo base_url() ?>/assets/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url() ?>/assets/js/select2.min.js"></script>
        <style>
            .container {
                max-width: 550px;
            }
        </style>
    </head>

    <body>
        <div class="container mt-5">
            <h2>Edit User</h2>
            <?php $validation = \Config\Services::validation(); ?>

            <form method="post" action="<?php echo base_url('/updateuser') ?>">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>" />
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="<?php echo $user['first_name']; ?>">

                    <!-- Error -->
                    <?php if ($validation->getError('first_name')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?php echo $error = $validation->getError('first_name'); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="<?php echo $user['last_name']; ?>">

                    <!-- Error -->
                    <?php if ($validation->getError('last_name')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?php echo $error = $validation->getError('last_name'); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Birth Date</label>
                    <input type="text" name="birth_date" class="form-control datepicker"  value="<?php echo date("d/m/Y", strtotime($user['birth_date'])); ?>">

                    <!-- Error -->
                    <?php if ($validation->getError('birth_date')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?php echo $error = $validation->getError('birth_date'); ?>
                        </div>
                    <?php } ?>
                </div>


                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control"  value="<?php echo $user['email']; ?>">

                    <!-- Error -->
                    <?php if ($validation->getError('email')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?php echo $error = $validation->getError('email'); ?>
                        </div>
                    <?php } ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">

                    <!-- Error -->
                    <?php if ($validation->getError('password')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?php echo $error = $validation->getError('password'); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="">Select</option>
                        <option value="M" <?php echo ($user['gender'] == "M") ? "selected" : ""; ?>>Male</option>
                        <option value="F" <?php echo ($user['gender'] == "F") ? "selected" : ""; ?>>Female</option>
                    </select>

                    <!-- Error -->
                    <?php if ($validation->getError('gender')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?php echo $error = $validation->getError('gender'); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control"><?php echo $user['address']; ?></textarea>

                    <!-- Error -->
                    <?php if ($validation->getError('address')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?php echo $error = $validation->getError('address'); ?>
                        </div>
                    <?php } ?>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    <a href="<?php echo base_url("/"); ?>" class="btn btn-danger">Back</a>
                </div>
            </form>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('.datepicker').datepicker({
                        format: 'dd/mm/yyyy',
                        autoclose: true
                    });
                    $('select#gender').select2();
                });

            </script>
        </div>
    </body>

</html>