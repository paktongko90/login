<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
        
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Role</h3>
        <a class="btn btn-primary float-right" href="<?= route_to('roles.create'); ?>" role="button">Create Role</a>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Role Name</th>
                    <th>Created Date</th>
                    <th style="width:13%">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($roles as $row):?>
                    <tr>
                        <td><?= $row['role_name'];?></td>
                        <td><?= $row['created_at'];?></td>
                        <td>
                            <a class="btn btn-warning" href="<?php echo base_url('roles/edit/' . $row['id']); ?>" role="button">Edit</a>
                            <a class="btn btn-danger" href="<?php echo base_url('roles/delete/' . $row['id']); ?>" role="button">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>  
    </div>
</div>
    
<?= $this->endSection() ?>