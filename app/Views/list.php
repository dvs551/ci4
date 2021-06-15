<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Home</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
        <script src="assets/js/jquery-3.6.0.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-datepicker.js"></script>
        <script src="assets/js/jquery.dataTables.min.js"></script>
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
            <div class="row">
                <div class="col-md-6">
                    <h2>User List</h2>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-primary" href="<?php echo base_url('createuser') ?>">Add</a>
                </div>
            </div>
            <table class="table table-striped table-bordered" id="userTable" style="width: 100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Birth Date</th>
                        <th>Email</th>
                        <th>gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php /* <tbody>
                  <?php
                  foreach ($users_detail as $value) {
                  ?>

                  <tr>

                  <td><?php echo $value['first_name']; ?></td>
                  <td><?php echo $value['last_name']; ?></td>
                  <td><?php echo date("d-m-Y", strtotime($value['birth_date'])); ?></td>
                  <td><?php echo $value['email']; ?></td>
                  <td><?php echo ($value['gender'] == "M") ? "Male" : "Female"; ?></td>
                  <td><a  href="<?php echo base_url(); ?>/edituser/<?php echo $value['id']; ?>">Edit</a>
                  <a  href="<?php echo base_url(); ?>/deleteuser/<?php echo $value['id']; ?>">Delete</a></td>

                  </tr>

                  <?php
                  }
                  ?>
                  </tbody> */ ?>
            </table>

        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#userTable').DataTable({
                    "order": [],
                    "serverSide": true,
                    "ajax": {
                        url: "<?php echo base_url("/ajax_crud/fetch_all"); ?>",
                        type: "POST",
                    }
                });

            });
        </script>
    </body>

</html>