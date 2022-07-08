<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
	  <div class="card">
	  	<div class="card-header">
	  		<div class="card-body">
	  			<input class="btn btn-primary float-right" type="button" value="Edit" id="curtainInput" onclick="myFunction()">
	  			Name: <input type="text" id="myText" disabled>
	  			<h3 class="card-title">User Details</h3>
				 <table class="table table-bordered">
				  <tbody>
				    <tr>
				      <th>Name</th>
				      <td><?= $user->name;?></td>
				    <tr>
				      <th>Email</th>
				      <td><?= $user->email;?></td>
				    </tr>
				    <tr>
				      <th>Status</th>
				      <td><?= $user->status;?></td>
				    </tr>
				  </tbody>
				</table>
	  		</div>
	  	</div>
	  </div>
<?= $this->endSection() ?>