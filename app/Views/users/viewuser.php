<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>view user</title>
</head>
<body>
	<table>
	  <tr>
	    <th>Name</th>
	    <th>Email</th>
	    <th>Status</th>
	  </tr>
	  <tr>
	    <td><?= $user->name;?></td>
	    <td><?= $user->email;?></td>
	    <td><?= $user->status;?></td>
	  </tr>
</table>
</body>
</html>