<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
    <div class="card">
    <div class="card-header">
              <!-- /.card-header -->
          <a class="btn btn-primary float-right" href="<?= route_to('auth/register'); ?>" role="button">Create User</a>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Email</th>
                  <th style="width:13%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($users as $row):?>
                <tr>
                  <td><?= $row['name'];?></td>
                  <td><?= $row['email'];?></td>
                  <td>
                    <a class="btn btn-warning" href="<?php echo base_url('user/viewuser/' . $row['id']); ?>" role="button">Edit</a>
                    <a class="btn btn-danger" href="<?php base_url('auth/viewuser/' . $row['id']); ?>" role="button">Delete</a>
                  </td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
           </div>
    </div>
<?= $this->endSection() ?>