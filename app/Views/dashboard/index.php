<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>">
</head>
<body>
	<div class="container">
		<div class="row" style="margin-top: 40px;">
			<div class="col-md-4 col-md-offset-4">
				<h4>Dashboard</h4>
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
			</div>
		</div>
	</div>
</body>
</html>