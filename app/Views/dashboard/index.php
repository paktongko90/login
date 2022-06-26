<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?= ucfirst($userInfo['name']); ?></td>
				<td><?= $userInfo['email']; ?></td>
				<td><a href="<?= site_url('auth/logout'); ?>">Logout</a></td>
			</tr>
		</tbody>
	</table>
<?= $this->endSection() ?>