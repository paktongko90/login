<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
<div class="card">
	<div class="card-header">
		<div class="card-body">
			<form action="<?= base_url('auth/save') ?>" method="post" autocomplete="off">
				<?= csrf_field(); ?>
				<?php if(!empty(session()->getFlashdata('fail'))): ?>
				<div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
				<?php endif ?>

				<?php if(!empty(session()->getFlashdata('success'))): ?>
				<div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
				<?php endif ?>

				<div class="form-group">
					<label for="">Name</label>
					<input type="text" name="name" placeholder="Enter Your Full Name" class="form-control" value="<?= set_value('name'); ?>">
					<span class="text-danger"><?= isset($validation) ? display_error($validation,'name') : '' ?></span>
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="text" name="email" placeholder="Enter Your Email" class="form-control" value="<?= set_value('email'); ?>">
					<span class="text-danger"><?= isset($validation) ? display_error($validation,'email') : '' ?></span>
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name="password" placeholder="Enter Your Password" class="form-control" value="<?= set_value('password'); ?>">
					<span class="text-danger"><?= isset($validation) ? display_error($validation,'password') : '' ?></span>
				</div>
				<div class="form-group">
					<label for="">Confirm Password</label>
					<input type="password" name="cpassword" placeholder="Enter Your Confirm Password" class="form-control" value="<?= set_value('cpassword'); ?>">
					<span class="text-danger"><?= isset($validation) ? display_error($validation,'cpassword') : '' ?></span>
				</div>
				<div class="form-group">
					<button class="btn btn-primary btn-block" type="submit">Sign Up</button>
				</div>

			</form>
		</div>
		</div>
	</div>
</div>
		
<?= $this->endSection() ?>