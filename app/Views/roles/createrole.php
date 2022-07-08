<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
    <form action="<?= route_to('roles.save'); ?>" method="post">
        Role Name: <input type="text" name="role_name">
        <button type="submit">Save</button>
    </form>
<?= $this->endSection() ?>