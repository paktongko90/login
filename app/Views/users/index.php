<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
    <div class="card">
    <div class="card-header">
        <h3 class="card-title">List of User</h3>
              <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th >Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($users as $row):?>
                <tr>
                  <td>1.</td>
                  <td><?= $row['name'];?></td>
                  <td><?= $row['email'];?></td>
                  <td>
                    <a class="btn btn-primary" href="<?= base_url('auth/viewuser/' . $row['id']); ?>" role="button">View</a>
                    <a class="btn btn-danger" href="<?= base_url('auth/viewuser/' . $row['id']); ?>" role="button">Delete</a>
                  </td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
           </div>
    </div>
<?= $this->endSection() ?>