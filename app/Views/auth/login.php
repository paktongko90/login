<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign In</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>">
</head>
<body>
	<div class="container">
		<div class="col-md-4 col-md-offset-4">
			<h4>Sign In</h4><hr>
			<form action="<?= base_url('auth/check') ?>" method="post" autocomplete="off">
				<?= csrf_field(); ?>

				<?php if(!empty(session()->getFlashdata('fail'))): ?>
				<div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
				<?php endif ?>

				<div class="form-group">
					<label for="">Email</label>
					<input type="text" name="email" placeholder="Enter Your Email" class="form-control" value="<?= set_value('email'); ?>">
					<span class="text-danger"><?= isset($validation) ? display_error($validation,'email') : '' ?></span>
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name="password" placeholder="Enter Your Password" class="form-control">
					<span class="text-danger"><?= isset($validation) ? display_error($validation,'password') : '' ?></span>
				</div>
				<div class="form-group">
					<button class="btn btn-primary btn-block" type="submit">Sign In</button>
				</div>
				<br>
				<a href="<?= site_url('auth/register') ?>">I have no account, create new account</a>
			</form>
		</div>
	</div>
</body>
</html>