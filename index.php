<?php
/**
 * Main entry point - displays form for URL and creates redirect entry
 */
require_once('lib/common.php');

switch(strtoupper($_SERVER['REQUEST_METHOD'])) {
case 'GET':
	if (isset($_GET['url']))
		$SHORTURL = 'Shorter'.$_GET['url'];
	break;
default:
	header('405 Method Not Allowed');
	printf('Method [%s] not understood', $_SERVER['REQUEST_METHOD']); 
}

?><!DOCTYPE html>
<html>
<head>
	<title>ickl.me</title>
</head>
<body>
	<h1>ickl.me</h1>
	<?php
	if (isset($SHORTURL)) {
	?>
	<p><?php echo "Short URL is ".$SHORTURL?></p>
	<?php } else { ?>
	<form action="/" method="get">
		<input type="text" name="url">
	</form>
	<?php } ?>
</body>
</html>
