<?php
	header('Location: /pages/fangyan/index.php');
	$url = '/pages/fangyan/index.php'; 
	echo <<<EOF
<!DOCTYPE HTML>
<html>
	<head>

EOF;
	echo '<meta http-equiv="refresh" content ="0;url=' . $url . '"/>';
	echo <<<EOF

	</head>
</html>
EOF;
	exit;
?>