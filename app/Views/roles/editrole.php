<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
    <form action="<?= route_to('roles.update'); ?>" method="post">
        Role Name: <input type="text" name="role_name" value="<?= $role->role_name;?>">
        <input type="hidden" name="id" value="<?= $role->id;?>">
        <button type="submit">Update Role</button>
    </form>
<?= $this->endSection() ?>