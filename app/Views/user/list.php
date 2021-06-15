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