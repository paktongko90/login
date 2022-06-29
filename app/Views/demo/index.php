<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Index Page</title>
</head>
<body>
	<fieldset>
		<legend>Demo Controller routing</legend>
		<a href="<?php echo site_url('demo/action1'); ?>">Action 1</a>
		<br>
		<a href="<?php echo site_url('demo/action2'); ?>">Action 2</a>
		<br>
		<form method="POST" action="<?php echo site_url('demo/action2'); ?>">
			<input type="submit" value="Submit to Action" name="">
		</form>
		<a href="<?php echo site_url('demo/action3/12345'); ?>">Action 3</a>
        <br>
        <a href="<?php echo site_url('demo/action4/123/p01'); ?>">Action 4</a>
	</fieldset>
</body>
</html>